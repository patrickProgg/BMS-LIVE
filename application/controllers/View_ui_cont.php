<?php
defined('BASEPATH') or exit('No direct script access allowed');

class View_ui_cont extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Manila');
        // $this->db->query("SET time_zone = '+08:00'");

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        // Get Fish Statistics
        $data['fish_total_investment'] = $this->get_fish_total_investment();
        $data['fish_total_stock_value'] = $this->get_fish_total_stock_value();
        $data['fish_total_payments'] = $this->get_fish_total_payments();
        $data['fish_total_receivables'] = $this->get_fish_total_receivables();
        $data['fish_actual_profit'] = $this->get_fish_actual_profit();

        // Get Rice Statistics
        $data['rice_total_investment'] = $this->get_rice_total_investment();
        $data['rice_total_stock_value'] = $this->get_rice_total_stock_value();
        $data['rice_total_payments'] = $this->get_rice_total_payments();
        $data['rice_total_receivables'] = $this->get_rice_total_receivables();
        $data['rice_actual_profit'] = $this->get_rice_actual_profit();

        // Get other statistics
        $data['total_client'] = $this->db->count_all('tbl_client');
        $data['active_loans'] = $this->db->where('status', 'ongoing')->count_all_results('tbl_fish_transaction');
        $data['completed_loans'] = $this->db->where('status', 'completed')->count_all_results('tbl_fish_transaction');

        // Load views with data
        $this->load->view('layouts/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('layouts/footer');
    }

    // FISH STATISTICS METHODS
    private function get_fish_total_investment()
    {
        $result = $this->db->select("COALESCE(SUM(capital), 0) AS total")
            ->from('tbl_fish_stock')
            ->where('trans_type', 'in')
            ->get()
            ->row();
        return (float) $result->total;
    }

    private function get_fish_total_stock_value()
    {
        $sql = "
        SELECT COALESCE(
            SUM(CASE WHEN fs.trans_type = 'in' THEN (fs.qty/1000) * f.price_per_kg ELSE 0 END) - 
            SUM(CASE WHEN fs.trans_type = 'remove' THEN (fs.qty/1000) * f.price_per_kg ELSE 0 END), 0
        ) AS total
        FROM tbl_fish_stock fs
        JOIN tbl_fish f ON fs.fish_id = f.id
    ";
        $result = $this->db->query($sql)->row();
        return (float) $result->total;
    }

    private function get_fish_total_payments()
    {
        $result = $this->db->select("COALESCE(SUM(amt), 0) AS total")
            ->from('tbl_payment')
            ->where('type', 'fish')
            ->get()
            ->row();
        return (float) $result->total;
    }

    private function get_fish_total_receivables()
    {
        $sql = "
        SELECT COALESCE(SUM(
            ft.total_amt - COALESCE(p.paid_amount, 0)
        ), 0) AS total
        FROM tbl_fish_transaction ft
        LEFT JOIN (
            SELECT trans_id, SUM(amt) AS paid_amount
            FROM tbl_payment
            WHERE type = 'fish'
            GROUP BY trans_id
        ) p ON ft.id = p.trans_id
        WHERE ft.status = 'ongoing'
        AND ft.total_amt > COALESCE(p.paid_amount, 0)
    ";
        $result = $this->db->query($sql)->row();
        return max(0, (float) $result->total);
    }

    private function get_fish_actual_profit()
    {
        $total_payments = $this->get_fish_total_payments();
        $total_investment = $this->get_fish_total_investment();
        return $total_payments - $total_investment;
    }

    // RICE STATISTICS METHODS
    // RICE STATISTICS METHODS

    private function get_rice_total_investment()
    {
        $result = $this->db->select("COALESCE(SUM(capital), 0) AS total")
            ->from('tbl_rice_stock')
            ->where('trans_type', 'in')
            ->get()
            ->row();
        return (float) $result->total;
    }

    private function get_rice_total_stock_value()
    {
        // Join with tbl_rice to get sack_type and price_per_kg
        $sql = "
        SELECT COALESCE(SUM(
            CASE 
                WHEN rs.trans_type = 'in' THEN 
                    CASE 
                        WHEN r.sack_type = '25kg' THEN (rs.qty * 25) * r.price_per_kg
                        WHEN r.sack_type = '50kg' THEN (rs.qty * 50) * r.price_per_kg
                        ELSE 0
                    END
                ELSE 0 
            END - 
            CASE 
                WHEN rs.trans_type = 'remove' THEN 
                    CASE 
                        WHEN r.sack_type = '25kg' THEN (rs.qty * 25) * r.price_per_kg
                        WHEN r.sack_type = '50kg' THEN (rs.qty * 50) * r.price_per_kg
                        ELSE 0
                    END
                ELSE 0 
            END
        ), 0) AS total
        FROM tbl_rice_stock rs
        JOIN tbl_rice r ON rs.rice_id = r.id
    ";
        $result = $this->db->query($sql)->row();
        return (float) $result->total;
    }

    private function get_rice_total_payments()
    {
        $result = $this->db->select("COALESCE(SUM(amt), 0) AS total")
            ->from('tbl_payment')
            ->where('type', 'rice')
            ->get()
            ->row();
        return (float) $result->total;
    }

    private function get_rice_total_receivables()
    {
        $sql = "
        SELECT COALESCE(SUM(
            rt.total_amt - COALESCE(p.paid_amount, 0)
        ), 0) AS total
        FROM tbl_rice_transaction rt
        LEFT JOIN (
            SELECT trans_id, SUM(amt) AS paid_amount
            FROM tbl_payment
            WHERE type = 'rice'
            GROUP BY trans_id
        ) p ON rt.id = p.trans_id
        WHERE rt.status = 'ongoing'
        AND rt.total_amt > COALESCE(p.paid_amount, 0)
    ";
        $result = $this->db->query($sql)->row();
        return max(0, (float) $result->total);
    }

    private function get_rice_actual_profit()
    {
        $total_payments = $this->get_rice_total_payments();
        $total_investment = $this->get_rice_total_investment();
        return $total_payments - $total_investment;
    }

    // Optional: Get rice stock quantity in sacks
    private function get_rice_current_stock()
    {
        $sql = "
        SELECT 
            r.rice_type,
            r.sack_type,
            COALESCE(SUM(CASE WHEN rs.trans_type = 'in' THEN rs.qty ELSE 0 END), 0) - 
            COALESCE(SUM(CASE WHEN rs.trans_type = 'out' THEN rs.qty ELSE 0 END), 0) -
            COALESCE(SUM(CASE WHEN rs.trans_type = 'remove' THEN rs.qty ELSE 0 END), 0) AS current_sacks
        FROM tbl_rice r
        LEFT JOIN tbl_rice_stock rs ON r.id = rs.rice_id
        GROUP BY r.id, r.rice_type, r.sack_type
    ";
        return $this->db->query($sql)->result_array();
    }

    public function masterfile()
    {
        $this->load->view('layouts/header');
        $this->load->view('masterfile');
        $this->load->view('layouts/footer');
    }

    public function product($id = null)
    {
        $data['product_id'] = $id;

        $this->load->view('layouts/header');
        $this->load->view('products', $data);
        $this->load->view('layouts/footer');
    }

    public function monitoring()
    {
        $this->load->view('layouts/header');
        $this->load->view('monitoring');
        $this->load->view('layouts/footer');
    }

    public function pull_out()
    {
        $this->load->view('layouts/header');
        $this->load->view('pull_out');
        $this->load->view('layouts/footer');
    }

    public function expenses()
    {
        $this->load->view('layouts/header');
        $this->load->view('expenses');
        $this->load->view('layouts/footer');
    }

    public function history()
    {
        $this->load->view('layouts/header');
        $this->load->view('history');
        $this->load->view('layouts/footer');
    }

}
