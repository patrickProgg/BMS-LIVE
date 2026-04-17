<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterfile_cont extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_fish_inventory()
    {
        $this->db->select('
           a.id,
           a.fish_type,
           a.price_per_kg,
           a.date_added,
           ROUND(COALESCE(SUM(CASE WHEN b.trans_type = "in" THEN b.qty ELSE 0 END), 0) / 1000, 3) as total_in,
           ROUND(COALESCE(SUM(CASE WHEN b.trans_type = "out" THEN b.qty ELSE 0 END), 0) / 1000, 3) as total_out,
           ROUND(COALESCE(SUM(CASE WHEN b.trans_type = "remove" THEN b.qty ELSE 0 END), 0) / 1000, 3) as total_remove,
           ROUND(COALESCE(SUM(CASE WHEN b.trans_type = "in" THEN b.qty ELSE 0 END), 0) / 1000, 3) as total_qty,
           ROUND((COALESCE(SUM(CASE WHEN b.trans_type = "in" THEN b.qty ELSE 0 END), 0) - COALESCE(SUM(CASE WHEN b.trans_type = "out" THEN b.qty ELSE 0 END), 0) - COALESCE(SUM(CASE WHEN b.trans_type = "remove" THEN b.qty ELSE 0 END), 0)) / 1000, 3) as rem_qty
        ');

        $this->db->from('tbl_fish as a');
        $this->db->join('tbl_fish_stock as b', 'a.id = b.fish_id', 'left');
        $this->db->where('a.status', '0');

        $this->db->group_by('a.id, a.fish_type, a.price_per_kg, a.date_added');

        $query = $this->db->get();
        $data = $query->result_array();

        $total_kg = 0;
        $low_stock_count = 0;

        // Calculate status and add total_kg for each row
        foreach ($data as &$row) {
            // use remaining stock as current total
            $row['total_kg'] = $row['rem_qty'];

            if ($row['rem_qty'] <= 0) {
                $row['status'] = 'No Stock';
            } elseif ($row['rem_qty'] < 1) {
                $row['status'] = 'Low Stock';
            } else {
                $row['status'] = 'In Stock';
            }

            // Add to summary totals
            $total_kg += $row['total_kg'];

            // Count low stock (below 1kg)
            if ($row['total_kg'] > 0 && $row['total_kg'] < 1) {
                $low_stock_count++;
            }
        }

        echo json_encode([
            "draw" => intval($this->input->post('draw')),
            "data" => $data,
            "summary" => [
                "total_kg" => $total_kg,
                "low_stock_count" => $low_stock_count
            ]
        ]);
    }

    public function get_fish_transactions()
    {
        $fish_id = $this->input->post('fish_id');

        $sql = "
            SELECT 
                b.trans_date,
                b.trans_type,
                b.qty,
                a.fish_type
            FROM tbl_fish_stock b
            JOIN tbl_fish a ON b.fish_id = a.id
            WHERE 1=1
        ";

        $params = [];

        if (!empty($fish_id)) {
            $sql .= " AND b.fish_id = ?";
            $params[] = $fish_id;
        }

        $sql .= " ORDER BY b.id DESC";

        $query = $this->db->query($sql, $params);
        $data = $query->result_array();

        // Format the data
        foreach ($data as &$row) {
            $row['trans_date'] = date('Y-m-d', strtotime($row['trans_date']));
            $row['qty_grams'] = intval($row['qty']);
            $row['qty_kg'] = round($row['qty'] / 1000, 3);

            // $total_kg += $row['total_kg'];
        }

        echo json_encode([
            "data" => $data
        ]);
    }
    public function add_item()
    {
        $item_details = [
            'fish_type' => $this->input->post('fish_name'),
            'price_per_kg' => $this->input->post('amount_per_kg'),
            'date_added' => $this->input->post('date_added'),
        ];

        $inserted = $this->db->insert('tbl_fish', $item_details);

        if (!$inserted) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to add pull out record.'
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'message' => 'Pull out saved successfully.',
            ]);
        }
    }

    public function update_item($id)
    {
        $item_details = [
            'item_name' => $this->input->post('fish_name'),
            'item_amt' => $this->input->post('amount_per_kg'),
            'item_interest' => $this->input->post('interest'),
            'date_added' => $this->input->post('date_added'),
        ];

        $this->db->where('id', $id);
        $updated = $this->db->update('tbl_fish', $item_details);

        if (!$updated) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update item record.'
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'message' => 'Item updated successfully.',
            ]);
        }

    }
    public function delete_id()
    {
        $id = $this->input->post('id');

        $data = [
            'status' => "1"
        ];

        $this->db->where('id', $id);
        $updated = $this->db->update('tbl_fish', $data);

        if (!$updated) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to delete item record.'
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'message' => 'Item deleted successfully.',
            ]);
        }
    }

    public function add_stock()
    {
        // Get posted data
        $item_id = $this->input->post('item_id');
        $added_qty = floatval($this->input->post('added_qty'));

        // Validate input
        if (empty($item_id)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Item ID is required'
            ]);
            return;
        }

        if ($added_qty <= 0) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Quantity must be greater than 0'
            ]);
            return;
        }

        // Convert kg to grams for storage
        $added_qty_grams = round($added_qty * 1000, 0);

        // Check if item exists
        $item = $this->db->get_where('tbl_fish', ['id' => $item_id])->row();

        if (!$item) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Fish not found'
            ]);
            return;
        }

        // Start transaction
        $this->db->trans_start();

        // Insert into tbl_fish_stock
        $this->db->insert('tbl_fish_stock', [
            'fish_id' => $item_id,
            'qty' => $added_qty_grams,
            'trans_type' => 'in',
            'trans_date' => date('Y-m-d H:i:s')
        ]);

        // Complete transaction
        $this->db->trans_complete();

        // Check if transaction was successful
        if ($this->db->trans_status() === FALSE) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to add stock. Please try again.'
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'message' => 'Successfully added ' . number_format($added_qty, 3) . ' kg of stock',
                'data' => [
                    'item_id' => $item_id,
                    'item_name' => $item->fish_type,
                    'added_qty' => $added_qty
                ]
            ]);
        }
    }

    // --------------------------------------------RICE TAB---------------------------------------------
// --------------------------------------------RICE TAB---------------------------------------------
// --------------------------------------------RICE TAB---------------------------------------------

    public function get_rice_inventory()
    {
        $searchValue = trim($this->input->post('search')['value']);

        // First, get the stock calculations per rice type and sack size
        $this->db->select('
            a.id,
            a.rice_type,
            a.sack_type,
            a.price_per_kg,
            a.date_added,
            COALESCE(SUM(CASE WHEN b.trans_type = "in" THEN b.qty ELSE 0 END), 0) as total_in,
            COALESCE(SUM(CASE WHEN b.trans_type = "out" THEN b.qty ELSE 0 END), 0) as total_out,
            COALESCE(SUM(CASE WHEN b.trans_type = "remove" THEN b.qty ELSE 0 END), 0) as total_remove
        ');

        $this->db->from('tbl_rice as a');
        $this->db->join('tbl_rice_stock as b', 'a.id = b.rice_id', 'left');

        if (!empty($searchValue)) {
            $this->db->group_start();
            $this->db->like('a.rice_type', $searchValue);
            $this->db->group_end();
        }

        $this->db->group_by('a.id, a.rice_type, a.sack_type, a.price_per_kg, a.date_added');

        $subquery = $this->db->get_compiled_select();

        // Now pivot the results to combine 25kg and 50kg per rice type
        $this->db->select('
            rice_type,
            MAX(price_per_kg) as price_per_kg,
            MAX(date_added) as date_added,
            COALESCE(SUM(CASE WHEN sack_type = "25kg" THEN (total_in - total_out - total_remove) ELSE 0 END), 0) as sacks_25kg,
            COALESCE(SUM(CASE WHEN sack_type = "50kg" THEN (total_in - total_out - total_remove) ELSE 0 END), 0) as sacks_50kg,
            COALESCE(SUM(CASE WHEN sack_type = "25kg" THEN total_in ELSE 0 END), 0) as total_in_25kg,
            COALESCE(SUM(CASE WHEN sack_type = "50kg" THEN total_in ELSE 0 END), 0) as total_in_50kg,
            COALESCE(SUM(CASE WHEN sack_type = "25kg" THEN total_out ELSE 0 END), 0) as total_out_25kg,
            COALESCE(SUM(CASE WHEN sack_type = "50kg" THEN total_out ELSE 0 END), 0) as total_out_50kg,
            COALESCE(SUM(CASE WHEN sack_type = "25kg" THEN total_remove ELSE 0 END), 0) as total_remove_25kg,
            COALESCE(SUM(CASE WHEN sack_type = "50kg" THEN total_remove ELSE 0 END), 0) as total_remove_50kg
        ');

        $this->db->from("($subquery) as sub");
        $this->db->group_by('rice_type');

        $query = $this->db->get();
        $data = $query->result_array();

        // Initialize summary variables
        $total_kg = 0;
        $total_sacks = 0;
        $total_sacks_25kg = 0;
        $total_sacks_50kg = 0;
        $low_stock_count = 0;

        // Calculate KG for each row and summary totals
        foreach ($data as &$row) {
            $row['total_kg'] = ($row['sacks_25kg'] * 25) + ($row['sacks_50kg'] * 50);
            $row['remaining_stock'] = $row['sacks_25kg'] + $row['sacks_50kg'];

            // Calculate total in/out in KG
            $row['total_in_kg'] = ($row['total_in_25kg'] * 25) + ($row['total_in_50kg'] * 50);
            $row['total_out_kg'] = ($row['total_out_25kg'] * 25) + ($row['total_out_50kg'] * 50);
            $row['total_remove_kg'] = ($row['total_remove_25kg'] * 25) + ($row['total_remove_50kg'] * 50);
            $row['total_sacks_in'] = $row['total_in_25kg'] + $row['total_in_50kg'];
            $row['total_sacks_out'] = $row['total_out_25kg'] + $row['total_out_50kg'];
            $row['total_sacks_remove'] = $row['total_remove_25kg'] + $row['total_remove_50kg'];

            // Add to summary totals
            $total_kg += $row['total_kg'];
            $total_sacks += $row['remaining_stock'];
            $total_sacks_25kg += $row['sacks_25kg'];
            $total_sacks_50kg += $row['sacks_50kg'];

            // Count low stock (below 100kg)
            if ($row['total_kg'] > 0 && $row['total_kg'] < 200) {
                $low_stock_count++;
            }

            // Status
            if ($row['total_kg'] <= 0) {
                $row['status'] = 'Out of Stock';
            } elseif ($row['total_kg'] < 200) {
                $row['status'] = 'Low Stock';
            } else {
                $row['status'] = 'In Stock';
            }
        }

        // Return both data and summary
        echo json_encode([
            "draw" => intval($this->input->post('draw')),
            "data" => $data,
            "summary" => [
                "total_kg" => $total_kg,
                "total_sacks" => $total_sacks,
                "total_sacks_25kg" => $total_sacks_25kg,
                "total_sacks_50kg" => $total_sacks_50kg,
                "total_kg_25kg" => $total_sacks_25kg * 25,
                "total_kg_50kg" => $total_sacks_50kg * 50,
                "low_stock_count" => $low_stock_count
            ]
        ]);
    }

    public function get_rice_transactions()
    {
        $rice_type = $this->input->post('rice_type');
        $rice_id = $this->input->post('rice_id');

        $sql = "
        SELECT 
            b.trans_date,
            b.trans_type,
            b.qty,
            a.sack_type as sack_size,
            (b.qty * CASE WHEN a.sack_type = '25kg' THEN 25 ELSE 50 END) as total_kg
        FROM tbl_rice_stock b
        JOIN tbl_rice a ON b.rice_id = a.id
        WHERE 1=1
    ";

        $params = [];

        if (!empty($rice_type)) {
            $sql .= " AND a.rice_type = ?";
            $params[] = $rice_type;
        }

        if (!empty($rice_id)) {
            $sql .= " AND a.id = ?";
            $params[] = $rice_id;
        }

        $sql .= " ORDER BY b.trans_date DESC LIMIT 20";

        $query = $this->db->query($sql, $params);
        $data = $query->result_array();

        // Format the data
        foreach ($data as &$row) {
            $row['trans_date'] = date('Y-m-d', strtotime($row['trans_date']));
            $row['qty'] = intval($row['qty']);
            $row['total_kg'] = intval($row['total_kg']);
        }

        echo json_encode([
            "data" => $data
        ]);
    }

    public function add_rice()
    {
        $rice_type = $this->input->post('rice_type');
        $price_per_kg = $this->input->post('rice_amount_per_kg');
        $date_added = $this->input->post('rice_date_added');

        // Check if rice_type already exists
        $existing = $this->db->get_where('tbl_rice', ['rice_type' => $rice_type])->result_array();

        if (!empty($existing)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Rice type already exists.'
            ]);
            return;
        }

        // Insert two records: one for 25kg and one for 50kg
        $rice_data_25kg = [
            'rice_type' => $rice_type,
            'sack_type' => '25kg',
            'price_per_kg' => $price_per_kg,
            'date_added' => $date_added,
        ];

        $rice_data_50kg = [
            'rice_type' => $rice_type,
            'sack_type' => '50kg',
            'price_per_kg' => $price_per_kg,
            'date_added' => $date_added,
        ];

        // Start transaction
        $this->db->trans_start();

        $this->db->insert('tbl_rice', $rice_data_25kg);
        $this->db->insert('tbl_rice', $rice_data_50kg);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to add rice records.'
            ]);
        } else {
            echo json_encode([
                'status' => 'success',
                'message' => 'Rice type added successfully with 25kg and 50kg variants.',
            ]);
        }
    }

    public function add_rice_stock()
    {
        $this->db->trans_start();

        $rice_type = $this->input->post('rice_type');
        $sack_type = $this->input->post('sack_type');
        $quantity = $this->input->post('quantity');
        $trans_date = $this->input->post('trans_date');

        // Validate inputs
        if (!$rice_type || !$sack_type || !$quantity || !$trans_date) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
            return;
        }

        if (!in_array($sack_type, ['25kg', '50kg'])) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid sack type']);
            return;
        }

        if ($quantity < 1) {
            echo json_encode(['status' => 'error', 'message' => 'Quantity must be at least 1']);
            return;
        }

        // Check if rice exists
        $rice = $this->db->get_where('tbl_rice', ['rice_type' => $rice_type, 'sack_type' => $sack_type])->row();
        if (!$rice) {
            echo json_encode(['status' => 'error', 'message' => 'Rice type not found']);
            return;
        }

        // Calculate total kg
        $sack_size = $sack_type == '25kg' ? 25 : 50;
        $total_kg = $quantity * $sack_size;

        // Insert into tbl_rice_stock
        $data = [
            'rice_id' => $rice->id,
            'trans_type' => 'in',
            'qty' => $quantity,
            'trans_date' => $trans_date
        ];

        $this->db->insert('tbl_rice_stock', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(['status' => 'error', 'message' => 'Failed to add rice stock']);
            return;
        }

        $this->db->trans_commit();

        echo json_encode([
            'status' => 'success',
            'message' => "Successfully added {$quantity} {$sack_type} sacks ({$total_kg}kg) of {$rice->rice_type}"
        ]);
    }

    public function update_rice()
    {
        $this->db->trans_start();

        $original_rice_type = $this->input->post('original_rice_type');
        $rice_type = $this->input->post('rice_type');
        $price_per_kg = $this->input->post('price_per_kg');
        $date_added = $this->input->post('date_added');
        $trans_type = $this->input->post('trans_type');
        $trans_date = $this->input->post('trans_date');
        $qty_25kg = $this->input->post('qty_25kg');
        $qty_50kg = $this->input->post('qty_50kg');

        // Validation
        if (!$rice_type || !$price_per_kg || !$date_added) {
            echo json_encode(['status' => 'error', 'message' => 'Required fields are missing']);
            return;
        }

        // Update rice records (both 25kg and 50kg variants)
        $this->db->where('rice_type', $original_rice_type ?: $rice_type);
        $this->db->update('tbl_rice', [
            'rice_type' => $rice_type,
            'price_per_kg' => $price_per_kg,
            'date_added' => $date_added
        ]);

        // Process stock transactions (only remove operations)
        if ($qty_25kg > 0) {
            $rice_25kg = $this->db->get_where('tbl_rice', ['rice_type' => $rice_type, 'sack_type' => '25kg'])->row();
            if ($rice_25kg) {
                // Check current stock level
                $current_stock_25kg = $this->db->select('COALESCE(SUM(CASE WHEN trans_type = "in" THEN qty ELSE 0 END), 0) - COALESCE(SUM(CASE WHEN trans_type = "out" THEN qty ELSE 0 END), 0) as current_stock')
                    ->from('tbl_rice_stock')
                    ->where('rice_id', $rice_25kg->id)
                    ->get()->row()->current_stock;

                if ($qty_25kg > $current_stock_25kg) {
                    $this->db->trans_rollback();
                    echo json_encode(['status' => 'error', 'message' => "Cannot remove {$qty_25kg} sacks of 25kg. Only {$current_stock_25kg} available."]);
                    return;
                }

                $data = [
                    'rice_id' => $rice_25kg->id,
                    'trans_type' => 'remove',
                    'qty' => $qty_25kg,
                    'trans_date' => $trans_date
                ];
                $this->db->insert('tbl_rice_stock', $data);
            }
        }

        if ($qty_50kg > 0) {
            $rice_50kg = $this->db->get_where('tbl_rice', ['rice_type' => $rice_type, 'sack_type' => '50kg'])->row();
            if ($rice_50kg) {
                // Check current stock level
                $current_stock_50kg = $this->db->select('COALESCE(SUM(CASE WHEN trans_type = "in" THEN qty ELSE 0 END), 0) - COALESCE(SUM(CASE WHEN trans_type = "out" THEN qty ELSE 0 END), 0) as current_stock')
                    ->from('tbl_rice_stock')
                    ->where('rice_id', $rice_50kg->id)
                    ->get()->row()->current_stock;

                if ($qty_50kg > $current_stock_50kg) {
                    $this->db->trans_rollback();
                    echo json_encode(['status' => 'error', 'message' => "Cannot remove {$qty_50kg} sacks of 50kg. Only {$current_stock_50kg} available."]);
                    return;
                }

                $data = [
                    'rice_id' => $rice_50kg->id,
                    'trans_type' => 'remove',
                    'qty' => $qty_50kg,
                    'trans_date' => $trans_date
                ];
                $this->db->insert('tbl_rice_stock', $data);
            }
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode(['status' => 'error', 'message' => 'Failed to update rice']);
            return;
        }

        $this->db->trans_commit();

        echo json_encode([
            'status' => 'success',
            'message' => 'Rice updated and stock removed successfully'
        ]);
    }

    public function update_fish()
    {
        $fish_id = $this->input->post('fish_id');
        $fish_type = $this->input->post('fish_type');
        $price_per_kg = $this->input->post('price_per_kg');
        $date_added = $this->input->post('date_added');
        $trans_date = $this->input->post('trans_date');
        $qty = $this->input->post('qty');

        $this->db->where("id", $fish_id);
        $updated = $this->db->update("tbl_fish", [
            'fish_type' => $fish_type,
            'price_per_kg' => $price_per_kg,
            'date_added' => $date_added
        ]);

        if ($updated) {
            $data = [
                'fish_id' => $fish_id,
                'trans_type' => 'remove',
                'qty' => $qty * 1000,
                'trans_date' => $trans_date
            ];

            $this->db->insert('tbl_fish_stock', $data);

            echo json_encode([
                'status' => 'success',
                'message' => 'Fish updated and stock removed successfully'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to update fish record.'
            ]);
        }

    }
}