<style>
    .form-control:focus,
    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .tab-content {
        visibility: hidden;
        position: absolute;
        height: 0;
        overflow: hidden;
    }

    .tab-content.active {
        visibility: visible;
        position: relative;
        height: auto;
    }

    .tab-link:hover {
        color: var(--bs-dark);
    }

    .nav-tabs-custom {
        display: flex;
        width: 100%;
        list-style: none;
        border: none;
        box-shadow: none;
        background: none;
        margin: 0;
        padding: 0;
        cursor: pointer;
    }

    .nav-tabs-custom li {
        flex: 1;
        text-align: center;
        box-shadow: none;
        font-size: 14px;
        margin: 0;
        padding: 0;
    }

    .nav-tabs-custom a {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 36.53px;
        width: 100%;
        text-decoration: none;
        color: var(--bs-dark);
        /* transition: background 0.2s; */
        transition: background 0.5s;
        border-bottom: 1px solid var(--bs-dark);
    }

    .nav-tabs-custom a.active {
        background: var(--bs-dark);
        color: white;
    }
</style>
<section id="content">
    <main>
        <div class="table-data">
            <div class="order pt-2" style="background-color:transparent">

                <div class="head-title mt-0 mb-4">
                    <ul class="breadcrumb nav-tabs-custom row">
                        <li>
                            <a class="col-6 tab-link active" style="border-radius: 5px 0 0 5px;" data-tab="fish">DRIED
                                FISH</a>
                        </li>
                        <li>
                            <a class="col-6 tab-link" style="border-radius: 0 5px 5px 0;" data-tab="rice">RICE</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content active mb-5" id="fish" role="tabpanel">
                    <div class="row mb-3">
                        <div class="col-12 d-flex">
                            <button class="btn btn-primary me-2" onclick="openFishModal('addItem')">
                                <i class="fas fa-list me-1"></i> Add New
                            </button>
                        </div>
                    </div>

                    <!-- Summary Cards -->
                    <div class="row g-4 mb-2">
                        <!-- Total Rice Stock Card -->
                        <div class="col-md-3">
                            <div id="total-fish-stock" class="card bg-success text-white card-hover">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="fas fa-warehouse"></i> Total Dried Fish Stock</h6>
                                    <h2 class="mb-0">0 KG</h2>
                                    <small>Dried fish to sell</small>
                                </div>
                            </div>
                        </div>

                        <!-- Low Stock Alert Card -->
                        <div class="col-md-3">
                            <div id="low-fish-stock" class="card bg-warning text-dark card-hover">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="fas fa-exclamation-triangle"></i> Low Stock Alert
                                    </h6>
                                    <h2 class="mb-0">0</h2>
                                    <small>Dried fish types below 10kg</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="fish_table" class="table table-hover" style="width:100%">
                        <thead class="table-secondary">
                            <tr>
                                <th style="width: 5%"></th>
                                <th style="width: 6%">NO</th>
                                <th>FISH TYPE</th>
                                <th>TOTAL KG</th>
                                <th>REMAINING KG</th>
                                <th>PRICE/KG</th>
                                <th>STATUS</th>
                                <th style="width: 18%">ACTION</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div class="tab-content mb-5" id="rice" role="tabpanel">

                    <div class="row mb-3">
                        <div class="col-12 d-flex">
                            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#riceModal">
                                <i class="fas fa-list me-1"></i> Add New
                            </button>
                        </div>
                    </div>
                    <!-- Summary Cards -->
                    <div class="row g-4 mb-2">
                        <!-- Total Rice Stock Card -->
                        <div class="col-md-3">
                            <div id="total-rice-stock" class="card bg-success text-white card-hover">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="fas fa-warehouse"></i> Total Rice Stock</h6>
                                    <h2 class="mb-0">0 KG</h2>
                                    <small>0 total sacks</small>
                                </div>
                            </div>
                        </div>

                        <!-- 25kg Sacks Card -->
                        <div class="col-md-3">
                            <div id="sacks-25kg" class="card bg-warning text-white card-hover">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="fas fa-box"></i> 25kg Sack</h6>
                                    <h2 class="mb-0">0</h2>
                                    <small>0 KG</small>
                                </div>
                            </div>
                        </div>

                        <!-- 50kg Sacks Card -->
                        <div class="col-md-3">
                            <div id="sacks-50kg" class="card bg-info text-white card-hover">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="fas fa-cubes"></i> 50kg Sack</h6>
                                    <h2 class="mb-0">0</h2>
                                    <small>0 KG</small>
                                </div>
                            </div>
                        </div>

                        <!-- Low Stock Alert Card -->
                        <div class="col-md-3">
                            <div id="low-stock" class="card bg-warning text-dark card-hover">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="fas fa-exclamation-triangle"></i> Low Stock Alert
                                    </h6>
                                    <h2 class="mb-0">0</h2>
                                    <small>Rice types below 200kg</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="rice_table" class="table table-hover" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 5%"></th>
                                <th style="width: 5%">NO</th>
                                <th>RICE TYPE</th>
                                <th>25KG SACKS</th>
                                <th>50KG SACKS</th>
                                <th>TOTAL KG</th>
                                <th>PRICE/KG</th>
                                <th>STATUS</th>
                                <th style="width: 15%">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="modal fade" id="fishModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog" style="max-width:500px; margin-top: 10px;">
                <div class="modal-content">
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-database me-2 text-danger"></i>
                            Item Masterfile
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="container p-0">
                            <!-- Item Masterfile Form -->
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-header bg-white border-0">
                                    <h6 class="fw-bold mb-0">
                                        <i class="fas fa-fish me-2 text-danger"></i>
                                        Item Details
                                    </h6>
                                </div>
                                <div class="card-body py-2 pb-0">
                                    <form id="item_masterfile_form">
                                        <!-- Fish Name -->
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-fish me-1"></i> FISH NAME
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0">
                                                        <i class="fas fa-tag text-muted"></i>
                                                    </span>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="Enter fish name" id="fish_name" name="fish_name"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-dollar-sign me-1"></i> AMOUNT PER KG
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                    <input type="number" class="form-control form-control-lg"
                                                        placeholder="0.00" id="amount_per_kg" name="amount_per_kg"
                                                        autocomplete="off" min="0" step="0.01">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-calendar-alt me-1"></i> DATE ADDED
                                                </label>
                                                <input type="date" class="form-control form-control-lg" id="date_added"
                                                    name="date_added" value="<?= date('Y-m-d') ?>">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="d-flex justify-content-end">
                                    <button type="button" onclick="handleFormSubmit(currentAction, currentId)"
                                        id="submitBtn" name="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Save Item
                                    </button>
                                    <button type="button" class="btn btn-light ms-2" data-bs-dismiss="modal"
                                        id="closeModalBtn">
                                        <i class="fas fa-times me-1"></i> Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="riceModal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog" style="max-width:500px; margin-top: 10px;">
                <div class="modal-content">
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-seedling me-2 text-danger"></i>
                            Rice Details
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="container p-0">
                            <!-- Item Masterfile Form -->
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-body py-2 pb-0">
                                    <form id="item_masterfile_form">
                                        <!-- Rice Type -->
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-seedling  me-1"></i> RICE TYPE
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0">
                                                        <i class="fas fa-tag text-muted"></i>
                                                    </span>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="Enter rice type" id="rice_type" name="rice_type"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-dollar-sign me-1"></i> AMOUNT PER KG
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                    <input type="number" class="form-control form-control-lg"
                                                        placeholder="0.00" id="rice_amount_per_kg"
                                                        name="rice_amount_per_kg" autocomplete="off" min="0"
                                                        step="0.01">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-calendar-alt me-1"></i> DATE ADDED
                                                </label>
                                                <input type="date" class="form-control form-control-lg"
                                                    id="rice_date_added" name="rice_date_added"
                                                    value="<?= date('Y-m-d') ?>">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="d-flex justify-content-end">
                                    <button type="button" id="saveRice" name="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Save
                                    </button>
                                    <button type="button" class="btn btn-light ms-2" data-bs-dismiss="modal"
                                        id="closeModalBtn">
                                        <i class="fas fa-times me-1"></i> Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<!-- Edit Rice Modal -->
<div class="modal fade" id="editRiceModal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog" style="max-width:600px; margin-top: 10px;">
        <div class="modal-content">
            <div class="modal-header bg-light border-bottom">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-seedling me-2 text-warning"></i>
                    Edit Rice Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="container p-0">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body py-2 pb-0">
                            <form id="edit_rice_form">
                                <!-- Rice Type -->
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold text-muted small mb-2">
                                            <i class="fas fa-seedling me-1"></i> RICE TYPE
                                        </label>
                                        <input type="text" class="form-control form-control-lg" id="edit_rice_type"
                                            name="edit_rice_type">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small mb-2">
                                            <i class="fas fa-tag me-1"></i> PRICE PER KG
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">₱</span>
                                            <input type="number" class="form-control form-control-lg"
                                                id="edit_rice_amount_per_kg" name="edit_rice_amount_per_kg" step="0.01"
                                                min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small mb-2">
                                            <i class="fas fa-calendar-alt me-1"></i> DATE ADDED
                                        </label>
                                        <input type="date" class="form-control form-control-lg"
                                            id="edit_rice_date_added" name="edit_rice_date_added">
                                    </div>
                                </div>

                                <!-- Transaction Section -->
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <h6 class="fw-bold text-danger mb-3">
                                            <i class="fas fa-minus-circle me-2"></i> Remove Stock
                                        </h6>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold text-muted small mb-2">
                                            <i class="fas fa-calendar-alt me-1"></i> TRANSACTION DATE
                                        </label>
                                        <input type="date" class="form-control form-control-lg" id="edit_trans_date"
                                            name="edit_trans_date" value="<?= date('Y-m-d') ?>">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small mb-2">
                                            <i class="fas fa-box me-1"></i> CURRENT 25KG SACKS
                                        </label>
                                        <div class="alert alert-info py-2 mb-2">
                                            <strong id="current_25kg">0</strong> sacks available
                                        </div>
                                        <label class="form-label fw-bold text-muted small mb-2">
                                            <i class="fas fa-minus me-1"></i> REMOVE 25KG SACKS
                                        </label>
                                        <input type="number" class="form-control form-control-lg" id="edit_qty_25kg"
                                            name="edit_qty_25kg" min="0" value="0"
                                            placeholder="Enter quantity to remove">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-muted small mb-2">
                                            <i class="fas fa-cubes me-1"></i> CURRENT 50KG SACKS
                                        </label>
                                        <div class="alert alert-info py-2 mb-2">
                                            <strong id="current_50kg">0</strong> sacks available
                                        </div>
                                        <label class="form-label fw-bold text-muted small mb-2">
                                            <i class="fas fa-minus me-1"></i> REMOVE 50KG SACKS
                                        </label>
                                        <input type="number" class="form-control form-control-lg" id="edit_qty_50kg"
                                            name="edit_qty_50kg" min="0" value="0"
                                            placeholder="Enter quantity to remove">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="d-flex justify-content-end">
                            <button type="button" id="saveEditRice" name="submit" class="btn btn-warning">
                                <i class="fas fa-save me-1"></i> Update
                            </button>
                            <button type="button" class="btn btn-light ms-2" data-bs-dismiss="modal"
                                id="closeEditModalBtn">
                                <i class="fas fa-times me-1"></i> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/fraction.js@4.2.0/fraction.min.js"></script>

<script>
    let currentId = 0;

    $(document).ready(function () {
        $('.tab-link').on('click', function (e) {
            e.preventDefault();

            const $this = $(this);
            const tabId = $this.data('tab');
            const tabValue = $this.data('value') || tabId;

            $('.tab-link').removeClass('active');
            $this.addClass('active');

            $('.tab-content').removeClass('active');
            $('#' + tabId).addClass('active');

            handleTabChange(tabValue, $this);
        });

        function handleTabChange(tabValue, $tabElement) {
            console.log('Tab changed to:', tabValue);

            if (tabValue === 'rice') {
                if (typeof rice_table !== 'undefined') {
                    rice_table.ajax.reload();
                }

            } else {
                console.log('ORDER mode');

                $('#bundle input[type="checkbox"], #bo input[type="checkbox"], #withdrawal input[type="checkbox"]')
                    .prop('checked', false);

                $('#bundle, #bo, #withdrawal').hide();
                $('#booking, #panel, #external, #internal').show();

                if (typeof fish_table !== 'undefined') {
                    fish_table.ajax.reload();
                }
                if (typeof rice_table !== 'undefined') {
                    rice_table.ajax.reload();
                }
            }
        }
    });

    // columnDefs: [
    //         { targets: 0, orderable: false, className: 'dt-control' },
    //         { targets: '_all', orderable: false }
    //     ],
    //     lengthMenu: [10, 25, 50, 100],
    //     processing: true,
    //     serverSide: true,
    //     searching: false,
    //     ordering: false,
    //     info: false,
    //     paging: false,
    var fish_table = $("#fish_table").DataTable({
        columnDefs: [
            { targets: 0, orderable: false, className: 'dt-control' },
            { targets: '_all', orderable: false }
        ],
        lengthMenu: [10, 25, 50, 100],
        processing: true,
        serverSide: true,
        searching: false,
        ordering: false,
        info: false,
        paging: false,
        ajax: {
            url: '<?php echo site_url('Masterfile_cont/get_fish_inventory'); ?>',
            type: 'POST',
            data: function (d) {
                d.start = d.start || 0;
                d.length = d.length || 10;
            },
            dataType: 'json',
            dataSrc: function (json) {
                updateSummaryCardsFish(json.summary);
                return json.data;
            },
            error: function (xhr, status, error) {
                console.error("AJAX request failed: " + error);
            }
        },
        columns: [
            {
                data: null,
                className: 'dt-control text-center',
                orderable: false,
                defaultContent: '',
                render: function () {
                    return '<i class="fas fa-plus-circle text-primary"></i>';
                }
            },
            {
                data: null,
                class: 'text-center',
                orderable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1 + (fish_table.page() * fish_table.page.len());
                }
            },
            {
                data: 'fish_type',
                render: function (data) {
                    return data ? data.toUpperCase() : '';
                }
            },
            {
                data: 'total_qty',
                render: function (data) {
                    if (data === null || data === undefined) return '0.000 kg';
                    return parseFloat(data).toFixed(3) + ' kg';
                }
            },
            {
                data: 'rem_qty',
                render: function (data) {
                    if (data === null || data === undefined) return '0.000 kg';
                    return parseFloat(data).toFixed(3) + ' kg';
                }
            },
            // {
            //     data: 'total_qty',
            //     className: 'text-center',
            //     render: function (data) {
            //         var kg = parseFloat(data) || 0;
            //         var fraction = new Fraction(kg);

            //         if (fraction.d === 1) {
            //             return `<strong>${fraction.n} KG</strong>`;
            //         } else {
            //             var whole = Math.floor(fraction.n / fraction.d);
            //             var remainder = fraction.n % fraction.d;

            //             if (whole === 0) {
            //                 return `<strong>${remainder}/${fraction.d} KG</strong>`;
            //             } else {
            //                 return `<strong>${whole} and ${remainder}/${fraction.d} KG</strong>`;
            //             }
            //         }
            //     }
            // },
            // {
            //     data: 'rem_qty',
            //     className: 'text-center',
            //     render: function (data) {
            //         var kg = parseFloat(data) || 0;
            //         var fraction = new Fraction(kg);

            //         if (fraction.d === 1) {
            //             return `<strong>${fraction.n} KG</strong>`;
            //         } else {
            //             var whole = Math.floor(fraction.n / fraction.d);
            //             var remainder = fraction.n % fraction.d;

            //             if (whole === 0) {
            //                 return `<strong>${remainder}/${fraction.d} KG</strong>`;
            //             } else {
            //                 return `<strong>${whole} and ${remainder}/${fraction.d} KG</strong>`;
            //             }
            //         }
            //     }
            // },

            {
                data: 'price_per_kg',
                className: 'text-center',
                render: function (data) {
                    return `<strong>₱ ${data || 0}</strong>`;
                }
            },
            {
                data: 'status',
                className: 'text-center',
                render: function (data, type, row) {
                    let badgeClass = 'bg-success';
                    if (data === 'No Stock') {
                        badgeClass = 'bg-danger';
                    } else if (data === 'Low Stock') {
                        badgeClass = 'bg-warning text-dark';
                    }
                    return `<span class="badge ${badgeClass}">${data || 'In Stock'}</span>`;
                }
            },
            {
                data: 'id',
                className: 'text-center',
                orderable: false,
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-primary" onclick="addBtn(this)" data-fish-id="${data}" data-fish-type="${row.fish_type ? row.fish_type.replace(/"/g, '&quot;') : ''}">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button class="btn btn-sm btn-success" onclick='openFishModal("editItem", ${JSON.stringify(row)})'>
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteBtn('${data}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                }
            }

        ],
        initComplete: function () {
            $('#fish_table tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = fish_table.row(tr);
                var rowData = row.data(); // Get the row data first

                if (row.child.isShown()) {
                    row.child.hide();
                    tr.removeClass('shown');
                    $(this).html('<i class="fas fa-plus-circle text-primary"></i>');
                } else {
                    row.child(getFishDetailHtml(rowData)).show();
                    tr.addClass('shown');
                    $(this).html('<i class="fas fa-minus-circle text-primary"></i>');

                    // Pass the correct fish_id from rowData
                    loadTransactionHistoryFish(rowData.id); // Make sure your data has 'id' field
                }
            });
        }
    });

    // Store fish transactions cache
    var fishTransactionsCache = {};

    function getFishDetailHtml(data) {
        console.log(data);

        var total_in = Number(data.total_in) || 0;
        var total_out = Number(data.total_out) || 0;
        var current_stock = Number(data.rem_qty) || 0;
        var safeId = data.id.toString().replace(/\s/g, '');

        return `
        <div class="card m-2">
            <div class="card-header bg-dark text-white">
                <strong>Stock History - ${data.fish_type}</strong>
            </div>
            <div class="card-body">
            
                <div class="row mb-1">
                    <div class="col-md-4">
                        <div class="alert alert-info">
                            <small>Total Stock In (All Time)</small>
                            <h5>${total_in} kgs</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-warning">
                            <small>Total Stock Out (All Time)</small>
                            <h5>${total_out} kgs</h5>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-success">
                            <small>Current Stock</small>
                            <h5>${current_stock} kgs</h5>
                        </div>
                    </div>
                </div>

                <h6>Recent Transactions</h6>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Transaction Type</th>
                                <th>Quantity (Kg)</th>
                            </tr>
                        </thead>
                        <tbody id="transaction-history-${safeId}">
                            <tr><td colspan="3" class="text-center">Loading...</td></tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination controls -->
                <div id="fish-pagination-${safeId}" class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <span id="fish-page-info-${safeId}" class="text-muted"></span>
                    </div>
                    <div>
                        <nav>
                            <ul class="pagination pagination-sm mb-0" id="fish-pagination-buttons-${safeId}">
                            </ul>
                        </nav>
                    </div>
                </div>
            
            </div>
        </div>
    `;
    }

    function loadTransactionHistoryFish(fish_id) {
        // Make sure fish_id is valid
        if (!fish_id) {
            console.error("No fish_id provided");
            return;
        }

        var safeId = fish_id.toString().replace(/\s/g, '');
        console.log("Loading transactions for fish_id: " + fish_id);
        console.log("Looking for tbody id: transaction-history-" + safeId);

        // Check if element exists
        if ($('#transaction-history-' + safeId).length === 0) {
            console.log("Element not found for id: transaction-history-" + safeId);
            return;
        }

        $.ajax({
            url: '<?php echo site_url('Masterfile_cont/get_fish_transactions'); ?>',
            type: 'POST',
            data: { fish_id: fish_id },
            dataType: 'json',
            success: function (response) {
                console.log("Response received:", response);

                if (response.data && response.data.length > 0) {
                    console.log("Found " + response.data.length + " transactions");
                    // Store transactions in cache
                    fishTransactionsCache[safeId] = response.data;
                    // Display first page
                    displayFishTransactionsPage(fish_id, 1);
                } else {
                    console.log("No transactions found");
                    $('#transaction-history-' + safeId).html('<tr><td colspan="3" class="text-center">No transactions found</td></tr>');
                    $('#fish-pagination-' + safeId).hide();
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + error);
                console.log("Response Text: " + xhr.responseText);
                $('#transaction-history-' + safeId).html('<tr><td colspan="3" class="text-center">Error loading transactions</td></tr>');
                $('#fish-pagination-' + safeId).hide();
            }
        });
    }

    function displayFishTransactionsPage(fish_id, page) {
        var safeId = fish_id.toString().replace(/\s/g, '');
        var transactions = fishTransactionsCache[safeId];

        if (!transactions || transactions.length === 0) {
            return;
        }

        var itemsPerPage = 5;
        var totalItems = transactions.length;
        var totalPages = Math.ceil(totalItems / itemsPerPage);

        // Ensure page is within bounds
        if (page < 1) page = 1;
        if (page > totalPages) page = totalPages;

        // Calculate start and end indices
        var start = (page - 1) * itemsPerPage;
        var end = start + itemsPerPage;
        var pageTransactions = transactions.slice(start, end);

        // Display transactions
        var tbody = $('#transaction-history-' + safeId);
        tbody.empty();

        $.each(pageTransactions, function (i, trans) {
            // Set badge class and text based on trans_type
            var badgeClass = '';
            var transText = '';

            if (trans.trans_type === 'in') {
                badgeClass = 'bg-success';
                transText = 'STOCK IN';
            } else if (trans.trans_type === 'out') {
                badgeClass = 'bg-danger';
                transText = 'SOLD';
            } else if (trans.trans_type === 'remove') {
                badgeClass = 'bg-warning text-dark';
                transText = 'REMOVED';
            }

            tbody.append(`
                <tr>
                    <td>${new Date(trans.trans_date).toLocaleDateString()}</td>
                    <td><span class="badge ${badgeClass}">${transText}</span></td>
                    <td>${trans.qty_kg} kg</td>
                </tr>
            `);
        });

        // Update page info
        var startNum = start + 1;
        var endNum = Math.min(end, totalItems);
        $('#fish-page-info-' + safeId).text(`Showing ${startNum} to ${endNum} of ${totalItems} transactions`);

        // Generate pagination buttons
        generateFishPaginationButtons(fish_id, page, totalPages);
    }

    function generateFishPaginationButtons(fish_id, currentPage, totalPages) {
        var safeId = fish_id.toString().replace(/\s/g, '');
        var paginationContainer = $('#fish-pagination-buttons-' + safeId);
        paginationContainer.empty();

        if (totalPages <= 1) {
            $('#fish-pagination-' + safeId).hide();
            return;
        }

        $('#fish-pagination-' + safeId).show();

        // Previous button
        var prevDisabled = currentPage === 1 ? 'disabled' : '';
            paginationContainer.append(`
            <li class="page-item ${prevDisabled}">
                <a class="page-link" href="#" data-fish-id="${fish_id}" data-page="${currentPage - 1}">&laquo; Previous</a>
            </li>
        `);

        // Calculate page range to show (max 5 pages)
        var startPage = Math.max(1, currentPage - 2);
        var endPage = Math.min(totalPages, startPage + 4);

        if (endPage - startPage < 4 && startPage > 1) {
            startPage = Math.max(1, endPage - 4);
        }

        // First page button if not in range
        if (startPage > 1) {
            paginationContainer.append(`
            <li class="page-item">
                <a class="page-link" href="#" data-fish-id="${fish_id}" data-page="1">1</a>
            </li>
        `);
            if (startPage > 2) {
                paginationContainer.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
            }
        }

        // Page number buttons
        for (var i = startPage; i <= endPage; i++) {
            var activeClass = i === currentPage ? 'active' : '';
            paginationContainer.append(`
            <li class="page-item ${activeClass}">
                <a class="page-link" href="#" data-fish-id="${fish_id}" data-page="${i}">${i}</a>
            </li>
        `);
        }

        // Last page button if not in range
        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                paginationContainer.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
            }
            paginationContainer.append(`
                <li class="page-item">
                    <a class="page-link" href="#" data-fish-id="${fish_id}" data-page="${totalPages}">${totalPages}</a>
                </li>
            `);
        }

        // Next button
        var nextDisabled = currentPage === totalPages ? 'disabled' : '';
        paginationContainer.append(`
            <li class="page-item ${nextDisabled}">
                <a class="page-link" href="#" data-fish-id="${fish_id}" data-page="${currentPage + 1}">Next &raquo;</a>
            </li>
        `);

        // Add click event handlers
        $('.page-link[data-page]').off('click').on('click', function (e) {
            e.preventDefault();
            var page = parseInt($(this).data('page'));
            var fishId = $(this).data('fish-id');
            if (page && fishId && !isNaN(page)) {
                displayFishTransactionsPage(fishId, page);
            }
        });
    }

    function openFishModal(action, row) {

        console.log(action);
        console.log(row);

        currentAction = action;

        if (row) {
            currentId = row.id;
        }
        console.log(currentId);

        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = action.startsWith('add') ?
            '<i class="fas fa-plus me-1"></i> Add' :
            '<i class="fas fa-edit me-1"></i> Update';

        if (action === 'editItem' && row) {
            $('#fish_name').val(row.item_name);
            $('#amount_per_kg').val(row.item_amt);
            $('#interest').val(row.item_interest);
            $('#date_added').val(row.date_added);
        }

        $('#fishModal').modal('show');
    }

    function handleFormSubmit(action, id) {
        const formData = {
            fish_name: $('#fish_name').val() || "",
            amount_per_kg: parseFloat($('#amount_per_kg').val()) || 0,
            date_added: $('#date_added').val().trim()
        };

        let url, method;
        switch (action) {
            case 'addItem':
                url = '<?php echo base_url("Masterfile_cont/add_item"); ?>';
                method = 'POST';
                break;

            case 'editItem':
                url = '<?php echo base_url("Masterfile_cont/update_item/"); ?>' + id;
                method = 'POST';
                break;

            default:
                Swal.fire({ icon: 'error', title: 'Oops...', text: 'Unknown action' });
                return;
        }

        if (formData.fish_name.trim() === "") {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please enter item name' });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: action === 'addItem' ? 'You are about to add this item.' : 'You are about to update this item.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed!',
            cancelButtonText: 'Cancel',
            allowEnterKey: false
        }).then((result) => {
            if (result.isConfirmed) {

                Swal.fire({
                    title: 'Processing...',
                    html: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        Swal.close();
                        Swal.fire({
                            title: 'Success',
                            text: res.message,
                            icon: 'success',
                            timer: 800,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(() => {
                            document.getElementById('item_masterfile_form').reset();
                            fish_table.ajax.reload();
                            $('#fishModal').modal('hide');
                        });
                    },
                    error: function (err) {
                        Swal.close();
                        console.log(err);
                        Swal.fire({ icon: 'error', title: 'Server Error', text: 'Check console for details' });
                    }
                });
            }
        });
    }

    function deleteBtn(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action will move data to history!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            allowEnterKey: false
        }).then((result) => {
            if (result.isConfirmed) {

                Swal.fire({
                    title: 'Deleting pullout...',
                    html: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });

                $.ajax({
                    url: "<?php echo base_url('Masterfile_cont/delete_id'); ?>",
                    type: 'POST',
                    data: { id: id },
                    dataType: 'json',
                    success: function (res) {
                        Swal.close();
                        Swal.fire({
                            title: 'Deleted!',
                            text: res.message,
                            icon: 'success',
                            timer: 800,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(() => {
                            pull_out_table.ajax.reload();
                        });
                    },
                    error: function (err) {
                        Swal.close();
                        console.log(err);
                        Swal.fire('Error', 'Server error. Check console.', 'error');
                    }
                });
            }
        });
    }

    function addBtn(button) {
        const itemId = button.dataset.fishId;
        const fishType = button.dataset.fishType || 'Fish';

        function gramsToKg(value) {
            const grams = parseFloat(value) || 0;
            return Math.round((grams / 1000) * 1000) / 1000;
        }

        Swal.fire({
            title: `<i class="fas fa-weight-hanging me-2 text-primary"></i> Add Stock — ${fishType}`,
            html: `
            <div class="text-start">
                <div class="mb-3">
                    <label class="form-label fw-bold">Fish Type:</label>
                    <input type="text" class="form-control" value="${fishType}" readonly>
                </div>
                
                <label class="form-label fw-bold text-primary mb-2">
                    <i class="fas fa-weight-hanging me-1"></i> Enter Weight:
                </label>
                
                <div class="row g-1">
                    <!-- Kilograms -->
                    <div class="col-12">
                        <div class="input-group mb-2">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-box"></i>
                            </span>
                            <input type="number" id="kg_input" class="form-control" 
                                   step="1" min="0" placeholder="0" value="0">
                            <span class="input-group-text bg-light">
                                kg
                            </span>
                        </div>
                    </div>
                    
                    <!-- Fraction (½, ¼, ¾, etc.) -->
                    <div class="col-12">
                        <label class="small text-muted">Optional: Add Fraction</label>
                        <div class="d-flex gap-2 mb-2 flex-wrap">
                            <button type="button" class="btn btn-outline-primary btn-sm fraction-btn" data-value="0.125">⅛ kg (125g)</button>
                            <button type="button" class="btn btn-outline-primary btn-sm fraction-btn" data-value="0.250">¼ kg (250g)</button>
                            <button type="button" class="btn btn-outline-primary btn-sm fraction-btn" data-value="0.333">⅓ kg (333g)</button>
                            <button type="button" class="btn btn-outline-primary btn-sm fraction-btn" data-value="0.500">½ kg (500g)</button>
                            <button type="button" class="btn btn-outline-primary btn-sm fraction-btn" data-value="0.667">⅔ kg (667g)</button>
                            <button type="button" class="btn btn-outline-primary btn-sm fraction-btn" data-value="0.750">¾ kg (750g)</button>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="fas fa-chart-pie"></i>
                            </span>
                            <input type="text" id="fraction_input" class="form-control" 
                                   placeholder="Or type fraction (e.g., 1/2, 3/4, 2/3)">
                            <span class="input-group-text bg-light">
                                fraction
                            </span>
                        </div>
                    </div>
                    
                    <!-- Grams -->
                    <div class="col-12">
                        <label class="small text-muted">Optional: Add Grams</label>
                        <div class="input-group">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-weight-hanging"></i>
                            </span>
                            <input type="number" id="grams_input" class="form-control" 
                                   step="1" min="0" max="999" placeholder="0" value="0">
                            <span class="input-group-text bg-light">
                                grams
                            </span>
                        </div>
                    </div>
                </div>

                <div class="result-box text-center p-3 bg-light rounded mt-3">
                    <strong>Total Weight:</strong> 
                    <span id="total_preview" class="fw-bold text-primary fs-4">0.000 kg</span>
                </div>

                <div class="alert alert-info mt-3 py-2">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Examples:</strong><br>
                    • 1kg + ¾ + 2g = <strong>1.752 kg</strong><br>
                    • 2kg + ½ + 250g = <strong>2.750 kg</strong><br>
                    • 5kg + ⅓ = <strong>5.333 kg</strong>
                </div>
            </div>
        `,
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save me-2"></i> Add Stock',
            cancelButtonText: '<i class="fas fa-times me-2"></i> Cancel',
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#6c757d',
            didOpen: () => {
                const kgInput = document.getElementById('kg_input');
                const fractionInput = document.getElementById('fraction_input');
                const gramsInput = document.getElementById('grams_input');
                const preview = document.getElementById('total_preview');

                // Function to convert fraction string to decimal
                function fractionToDecimal(fraction) {
                    if (!fraction) return 0;

                    // Remove spaces
                    fraction = fraction.toString().trim();

                    // Check for common fraction symbols
                    const fractions = {
                        '½': 0.5,
                        '¼': 0.25,
                        '¾': 0.75,
                        '⅓': 0.333,
                        '⅔': 0.667,
                        '⅛': 0.125,
                        '⅜': 0.375,
                        '⅝': 0.625,
                        '⅞': 0.875
                    };

                    if (fractions[fraction]) {
                        return fractions[fraction];
                    }

                    // Check for fraction like "1/2", "3/4"
                    const fractionMatch = fraction.match(/^(\d+)\/(\d+)$/);
                    if (fractionMatch) {
                        const numerator = parseFloat(fractionMatch[1]);
                        const denominator = parseFloat(fractionMatch[2]);
                        if (denominator !== 0) {
                            return numerator / denominator;
                        }
                    }

                    // Check for decimal
                    const decimal = parseFloat(fraction);
                    if (!isNaN(decimal)) {
                        return decimal;
                    }

                    return 0;
                }

                // Update total preview
                function updatePreview() {
                    let kg = parseFloat(kgInput.value) || 0;
                    let fraction = fractionToDecimal(fractionInput.value);
                    let grams = parseFloat(gramsInput.value) || 0;

                    let totalKg = kg + fraction + (grams / 1000);
                    totalKg = Math.round(totalKg * 1000) / 1000;

                    preview.textContent = totalKg.toFixed(3) + ' kg';
                }

                // Add event listeners
                kgInput.addEventListener('input', updatePreview);
                fractionInput.addEventListener('input', updatePreview);
                gramsInput.addEventListener('input', updatePreview);

                // Add fraction button handlers
                document.querySelectorAll('.fraction-btn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const value = btn.getAttribute('data-value');
                        fractionInput.value = value;
                        updatePreview();
                    });
                });

                updatePreview();
            },
            preConfirm: () => {
                let kg = parseFloat(document.getElementById('kg_input').value) || 0;
                let fractionInput = document.getElementById('fraction_input').value;
                let grams = parseFloat(document.getElementById('grams_input').value) || 0;

                // Convert fraction to decimal
                function fractionToDecimal(fraction) {
                    if (!fraction) return 0;
                    fraction = fraction.toString().trim();

                    const fractions = {
                        '½': 0.5, '¼': 0.25, '¾': 0.75,
                        '⅓': 0.333, '⅔': 0.667,
                        '⅛': 0.125, '⅜': 0.375, '⅝': 0.625, '⅞': 0.875
                    };

                    if (fractions[fraction]) return fractions[fraction];

                    const fractionMatch = fraction.match(/^(\d+)\/(\d+)$/);
                    if (fractionMatch) {
                        const numerator = parseFloat(fractionMatch[1]);
                        const denominator = parseFloat(fractionMatch[2]);
                        if (denominator !== 0) return numerator / denominator;
                    }

                    const decimal = parseFloat(fraction);
                    return isNaN(decimal) ? 0 : decimal;
                }

                let fraction = fractionToDecimal(fractionInput);

                // Validate grams
                if (grams < 0 || grams > 999) {
                    Swal.showValidationMessage('Grams must be between 0 and 999');
                    return false;
                }

                // Calculate total
                let totalKg = kg + fraction + gramsToKg(grams);

                if (totalKg <= 0) {
                    Swal.showValidationMessage('Please enter a valid weight greater than 0');
                    return false;
                }

                // Round to 3 decimal places
                totalKg = Math.round(totalKg * 1000) / 1000;

                // Build display text
                let displayParts = [];
                if (kg > 0) displayParts.push(kg + 'kg');
                if (fraction > 0) {
                    // Find fraction symbol
                    const fractionMap = {
                        0.5: '½', 0.25: '¼', 0.75: '¾',
                        0.333: '⅓', 0.667: '⅔',
                        0.125: '⅛', 0.375: '⅜', 0.625: '⅝', 0.875: '⅞'
                    };
                    let fractionSymbol = fractionMap[Math.round(fraction * 1000) / 1000];
                    if (fractionSymbol) {
                        displayParts.push(fractionSymbol);
                    } else {
                        displayParts.push(fraction.toFixed(3) + 'kg');
                    }
                }
                if (grams > 0) displayParts.push(grams + 'g');

                const displayText = displayParts.join(' + ') + ' = ' + totalKg.toFixed(3) + 'kg';

                return {
                    quantity: totalKg,
                    display: displayText
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                addStockQuantity(itemId, result.value.quantity, result.value.display, fishType);
            }
        });
    }

    function addStockQuantity(itemId, quantity, displayText, itemLabel) {
        Swal.fire({
            title: '<i class="fas fa-spinner fa-pulse me-2"></i> Processing',
            html: 'Adding stock to inventory...',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: '<?php echo base_url("Masterfile_cont/add_stock"); ?>',
            type: 'POST',
            data: {
                item_id: itemId,
                added_qty: quantity
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: '<i class="fas fa-check-circle text-success me-2"></i> Success!',
                        html: `
                        <div class="text-center">
                            <div class="mb-3">
                                <i class="fas fa-check-circle text-success fa-4x"></i>
                            </div>
                            <p class="fw-bold">${response.message}</p>
                            <p class="mb-2"><strong>${itemLabel || 'Item'}</strong></p>
                            <div class="alert alert-success d-inline-block">
                                <i class="fas fa-weight-hanging me-2"></i>
                                Added: <strong>${displayText || quantity.toFixed(3) + ' kg'}</strong>
                            </div>
                        </div>
                    `,
                        showConfirmButton: true,
                        confirmButtonText: '<i class="fas fa-check me-2"></i> Done',
                        confirmButtonColor: '#007bff'
                    }).then(() => {
                        fish_table.ajax.reload();
                    });
                } else {
                    Swal.fire({
                        title: '<i class="fas fa-times-circle text-danger me-2"></i> Failed',
                        html: response.message,
                        icon: 'error',
                        confirmButtonText: '<i class="fas fa-check me-2"></i> Try Again',
                        confirmButtonColor: '#007bff'
                    });
                }
            },
            error: function () {
                Swal.fire({
                    title: '<i class="fas fa-times-circle text-danger me-2"></i> Error',
                    html: 'Connection error. Please try again.',
                    icon: 'error',
                    confirmButtonText: '<i class="fas fa-check me-2"></i> OK',
                    confirmButtonColor: '#007bff'
                });
            }
        });
    }

    // -------------------------------------------RICE TAB--------------------------------------------------------------------
    // -------------------------------------------RICE TAB--------------------------------------------------------------------
    // -------------------------------------------RICE TAB--------------------------------------------------------------------

    var rice_table = $("#rice_table").DataTable({
        columnDefs: [
            { targets: 0, orderable: false, className: 'dt-control' },
            { targets: '_all', orderable: false }
        ],
        lengthMenu: [10, 25, 50, 100],
        processing: true,
        serverSide: true,
        searching: false,
        ordering: false,
        info: false,
        paging: false,
        ajax: {
            url: '<?php echo site_url('Masterfile_cont/get_rice_inventory'); ?>',
            type: 'POST',
            data: function (d) {
                d.start = d.start || 0;
                d.length = d.length || 10;
            },
            dataSrc: function (json) {
                // Update summary cards with data from response
                updateSummaryCards(json.summary);
                return json.data;
            },
            error: function (xhr, status, error) {
                console.error("AJAX request failed: " + error);
            }
        },
        columns: [
            {
                data: null,
                defaultContent: '',
                className: 'dt-control',
                orderable: false,
                render: function () {
                    return '<i class="fas fa-plus-circle text-primary"></i>';
                }
            },
            {
                data: null,
                class: 'text-center',
                render: function (data, type, row, meta) {
                    return meta.row + 1 + (rice_table.page() * rice_table.page.len());
                }
            },
            {
                data: 'rice_type',
                render: function (data) {
                    return data ? data.toUpperCase() : '';
                }
            },
            {
                data: 'sacks_25kg',  // Changed: use sacks_25kg directly
                className: 'text-center',
                render: function (data, type, row) {
                    if (data && data > 0) {
                        let kg = data * 25;
                        return `<span class="badge bg-primary">${data} pcs</span><br><small>${kg} KG</small>`;
                    } else {
                        return '<span class="text-muted">0 pcs</span>';
                    }
                }
            },
            {
                data: 'sacks_50kg',  // Changed: use sacks_50kg directly
                className: 'text-center',
                render: function (data, type, row) {
                    if (data && data > 0) {
                        let kg = data * 50;
                        return `<span class="badge bg-primary">${data} pcs</span><br><small>${kg} KG</small>`;
                    } else {
                        return '<span class="text-muted">0 pcs</span>';
                    }
                }
            },
            {
                data: 'total_kg',
                className: 'text-center',
                render: function (data) {
                    return `<strong>${data || 0} KG</strong>`;
                }
            },
            {
                data: 'price_per_kg',
                className: 'text-center',
                render: function (data) {
                    return `<strong>₱ ${data || 0}</strong>`;
                }
            },
            {
                data: 'status',
                className: 'text-center',
                render: function (data, type, row) {
                    let badgeClass = 'bg-success';
                    if (row.total_kg <= 0) badgeClass = 'bg-danger';
                    else if (row.total_kg < 200) badgeClass = 'bg-warning text-dark';
                    return `<span class="badge ${badgeClass}">${data || 'In Stock'}</span>`;
                }
            },
            {
                data: 'id',
                orderable: false,
                className: 'text-center',
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-primary" onclick="addStock('${row.rice_type}')" title="Add Stock">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button class="btn btn-sm btn-success" onclick='editRice(${JSON.stringify(row)})' title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteRice(${data})" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                `;
                }
            }
        ],
        // Add expand/collapse functionality
        initComplete: function () {
            // Add event listener for expand/collapse
            $('#rice_table tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = rice_table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                    $(this).html('<i class="fas fa-plus-circle text-primary"></i>');
                } else {
                    // Open this row
                    var rowData = row.data();
                    var detailHtml = getDetailHtml(rowData);
                    row.child(detailHtml).show();
                    tr.addClass('shown');
                    $(this).html('<i class="fas fa-minus-circle text-primary"></i>');

                    loadTransactionHistory(rowData.rice_type);
                }
            });
        }
    });

    // Function to add stock for rice
    function addStock(riceType) {
        Swal.fire({
            title: '<i class="fas fa-seedling me-2 text-success"></i> Add Rice Stock',
            html: `
                <div class="text-start">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Rice Type:</label>
                        <input type="text" class="form-control" value="${riceType}" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">25kg Sacks:</label>
                            <input type="number" id="qty_25kg" class="form-control" min="0" value="0" placeholder="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">50kg Sacks:</label>
                            <input type="number" id="qty_50kg" class="form-control" min="0" value="0" placeholder="0">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label fw-bold">Transaction Date:</label>
                        <input type="date" id="trans_date" class="form-control" value="${new Date().toISOString().split('T')[0]}">
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save me-2"></i> Add Stock',
            cancelButtonText: '<i class="fas fa-times me-2"></i> Cancel',
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            preConfirm: () => {
                const qty25 = parseInt(document.getElementById('qty_25kg').value) || 0;
                const qty50 = parseInt(document.getElementById('qty_50kg').value) || 0;
                const transDate = document.getElementById('trans_date').value;

                if (qty25 === 0 && qty50 === 0) {
                    Swal.showValidationMessage('Please enter quantity for at least one sack type');
                    return false;
                }

                if (!transDate) {
                    Swal.showValidationMessage('Please select transaction date');
                    return false;
                }

                return { qty25, qty50, transDate };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const { qty25, qty50, transDate } = result.value;
                let promises = [];

                if (qty25 > 0) {
                    promises.push(addRiceStock({
                        rice_type: riceType,
                        sack_type: '25kg',
                        quantity: qty25,
                        trans_date: transDate
                    }));
                }

                if (qty50 > 0) {
                    promises.push(addRiceStock({
                        rice_type: riceType,
                        sack_type: '50kg',
                        quantity: qty50,
                        trans_date: transDate
                    }));
                }

                Promise.all(promises).then(() => {
                    rice_table.ajax.reload();
                });
            }
        });
    }

    // Function to handle AJAX for adding rice stock
    function addRiceStock(data) {
        return new Promise((resolve, reject) => {
            Swal.fire({
                title: '<i class="fas fa-spinner fa-pulse me-2"></i> Processing',
                html: 'Adding rice stock...',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '<?php echo base_url("Masterfile_cont/add_rice_stock"); ?>',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function (response) {
                    Swal.close();
                    if (response.status === 'success') {
                        Swal.fire({
                            title: '<i class="fas fa-check-circle text-success me-2"></i> Success!',
                            html: response.message,
                            icon: 'success',
                            confirmButtonText: '<i class="fas fa-check me-2"></i> Done',
                            confirmButtonColor: '#28a745'
                        });
                        resolve();
                    } else {
                        Swal.fire({
                            title: '<i class="fas fa-times-circle text-danger me-2"></i> Failed',
                            html: response.message,
                            icon: 'error',
                            confirmButtonText: '<i class="fas fa-check me-2"></i> Try Again',
                            confirmButtonColor: '#28a745'
                        });
                        reject();
                    }
                },
                error: function () {
                    Swal.close();
                    Swal.fire({
                        title: '<i class="fas fa-times-circle text-danger me-2"></i> Error',
                        html: 'Connection error. Please try again.',
                        icon: 'error',
                        confirmButtonText: '<i class="fas fa-check me-2"></i> OK',
                        confirmButtonColor: '#28a745'
                    });
                    reject();
                }
            });
        });
    }

    // Function to save rice
    $('#saveRice').on('click', function () {
        const formData = {
            rice_type: $('#rice_type').val().trim(),
            rice_amount_per_kg: parseFloat($('#rice_amount_per_kg').val()) || 0,
            rice_date_added: $('#rice_date_added').val().trim()
        };

        // Validation
        if (formData.rice_type === "") {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please enter rice type' });
            return;
        }

        if (formData.rice_amount_per_kg <= 0) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please enter a valid price per kg' });
            return;
        }

        if (formData.rice_date_added === "") {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please select date added' });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to add this rice type with both 25kg and 50kg sack variants.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'Cancel',
            allowEnterKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Processing...',
                    html: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '<?php echo base_url("Masterfile_cont/add_rice"); ?>',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        Swal.close();
                        Swal.fire({
                            title: 'Success',
                            text: res.message,
                            icon: 'success',
                            timer: 800,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(() => {
                            // Reset form
                            $('#rice_type').val('');
                            $('#rice_amount_per_kg').val('');
                            $('#rice_date_added').val('<?= date('Y-m-d') ?>');
                            rice_table.ajax.reload();
                            $('#riceModal').modal('hide');
                        });
                    },
                    error: function (err) {
                        Swal.close();
                        console.log(err);
                        Swal.fire({ icon: 'error', title: 'Server Error', text: 'Check console for details' });
                    }
                });
            }
        });
    });

    // Function to edit rice
    function editRice(row) {

        console.log(row);
        // Pre-fill the edit modal with current data
        $('#edit_rice_type').val(row.rice_type);
        $('#edit_rice_amount_per_kg').val(row.price_per_kg);
        $('#edit_rice_date_added').val(row.date_added);
        $('#edit_trans_date').val('<?= date('Y-m-d') ?>');
        $('#edit_qty_25kg').val(0);
        $('#edit_qty_50kg').val(0);

        // Display current stock levels
        $('#current_25kg').text(row.sacks_25kg || 0);
        $('#current_50kg').text(row.sacks_50kg || 0);

        // Store original rice type for update
        $('#edit_rice_type').data('original', row.rice_type);

        $('#editRiceModal').modal('show');
    }

    // Function to save edited rice
    $('#saveEditRice').on('click', function () {
        const current25kg = parseInt($('#current_25kg').text()) || 0;
        const current50kg = parseInt($('#current_50kg').text()) || 0;

        const formData = {
            original_rice_type: $('#edit_rice_type').data('original'),
            rice_type: $('#edit_rice_type').val().trim(),
            price_per_kg: parseFloat($('#edit_rice_amount_per_kg').val()) || 0,
            date_added: $('#edit_rice_date_added').val().trim(),
            trans_type: 'remove', // Always remove stock
            trans_date: $('#edit_trans_date').val().trim(),
            qty_25kg: parseInt($('#edit_qty_25kg').val()) || 0,
            qty_50kg: parseInt($('#edit_qty_50kg').val()) || 0
        };

        // Validation
        if (formData.rice_type === "") {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please enter rice type' });
            return;
        }

        if (formData.price_per_kg <= 0) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please enter a valid price per kg' });
            return;
        }

        if (formData.date_added === "") {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please select date added' });
            return;
        }

        if (formData.trans_date === "") {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please select transaction date' });
            return;
        }

        // Check if trying to remove more than available
        if (formData.qty_25kg > current25kg) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: `Cannot remove ${formData.qty_25kg} sacks. Only ${current25kg} available.` });
            return;
        }

        if (formData.qty_50kg > current50kg) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: `Cannot remove ${formData.qty_50kg} sacks. Only ${current50kg} available.` });
            return;
        }

        if (formData.qty_25kg === 0 && formData.qty_50kg === 0) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please enter quantity to remove for at least one sack type' });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to update this rice type and remove the specified stock.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, remove stock!',
            cancelButtonText: 'Cancel',
            allowEnterKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Processing...',
                    html: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '<?php echo base_url("Masterfile_cont/update_rice"); ?>',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        Swal.close();
                        Swal.fire({
                            title: 'Success',
                            text: res.message,
                            icon: 'success',
                            timer: 800,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(() => {
                            rice_table.ajax.reload();
                            $('#editRiceModal').modal('hide');
                        });
                    },
                    error: function (err) {
                        Swal.close();
                        console.log(err);
                        Swal.fire({ icon: 'error', title: 'Server Error', text: 'Check console for details' });
                    }
                });
            }
        });
    });

    // Function to edit rice
    // function editRice(row) {
    //     // Pre-fill the edit modal with current data
    //     $('#edit_rice_type').val(row.rice_type);
    //     $('#edit_rice_amount_per_kg').val(row.price_per_kg);
    //     $('#edit_rice_date_added').val(row.date_added);
    //     $('#edit_trans_type').val('add'); // Default to add
    //     $('#edit_trans_date').val('<?= date('Y-m-d') ?>');
    //     $('#edit_qty_25kg').val(0);
    //     $('#edit_qty_50kg').val(0);

    //     $('#editRiceModal').modal('show');
    // }

    // Function to save edited rice
    $('#saveEditRice').on('click', function () {
        const formData = {
            original_rice_type: '', // We'll set this in the function
            rice_type: $('#edit_rice_type').val().trim(),
            price_per_kg: parseFloat($('#edit_rice_amount_per_kg').val()) || 0,
            date_added: $('#edit_rice_date_added').val().trim(),
            trans_type: $('#edit_trans_type').val(),
            trans_date: $('#edit_trans_date').val().trim(),
            qty_25kg: parseInt($('#edit_qty_25kg').val()) || 0,
            qty_50kg: parseInt($('#edit_qty_50kg').val()) || 0
        };

        // Validation
        if (formData.rice_type === "") {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please enter rice type' });
            return;
        }

        if (formData.price_per_kg <= 0) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please enter a valid price per kg' });
            return;
        }

        if (formData.date_added === "") {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please select date added' });
            return;
        }

        if (formData.trans_date === "") {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please select transaction date' });
            return;
        }

        if (formData.qty_25kg === 0 && formData.qty_50kg === 0) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'Please enter quantity for at least one sack type' });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to update this rice type and process the stock transaction.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f39c12',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel',
            allowEnterKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Processing...',
                    html: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '<?php echo base_url("Masterfile_cont/update_rice"); ?>',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        Swal.close();
                        Swal.fire({
                            title: 'Success',
                            text: res.message,
                            icon: 'success',
                            timer: 800,
                            timerProgressBar: true,
                            showConfirmButton: false
                        }).then(() => {
                            rice_table.ajax.reload();
                            $('#editRiceModal').modal('hide');
                        });
                    },
                    error: function (err) {
                        Swal.close();
                        console.log(err);
                        Swal.fire({ icon: 'error', title: 'Server Error', text: 'Check console for details' });
                    }
                });
            }
        });
    });

    // Function to generate detail HTML
    function getDetailHtml(data) {

        var total_in_25kg = parseInt(data.total_in_25kg) || 0;
        var total_in_50kg = parseInt(data.total_in_50kg) || 0;
        var total_out_25kg = parseInt(data.total_out_25kg) || 0;
        var total_out_50kg = parseInt(data.total_out_50kg) || 0;
        var sacks_25kg = parseInt(data.sacks_25kg) || 0;
        var sacks_50kg = parseInt(data.sacks_50kg) || 0;

        // Calculate total sacks in/out (now it will add, not concatenate)
        var totalSacksIn = total_in_25kg + total_in_50kg;
        var totalSacksOut = total_out_25kg + total_out_50kg;

        // Calculate total KG in/out
        var totalKgIn = (total_in_25kg * 25) + (total_in_50kg * 50);
        var totalKgOut = (total_out_25kg * 25) + (total_out_50kg * 50);

        // Current stock
        var currentSacks = sacks_25kg + sacks_50kg;
        var currentKg = (sacks_25kg * 25) + (sacks_50kg * 50);

        var safeId = data.rice_type.replace(/\s/g, '');

        return `
        <div class="card m-2">
            <div class="card-header bg-dark text-white">
                <strong>Stock History - ${data.rice_type}</strong>
            </div>
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col-md-4">
                        <div class="alert alert-info">
                            <small>Total Stock In (All Time)</small>
                            <h5>${totalSacksIn} sacks</h5>
                            <small>${totalKgIn} KG</small>
                            <div class="mt-1">
                                <small class="text-muted">🌾 25kg: ${data.total_in_25kg || 0} sacks</small><br>
                                <small class="text-muted">🌾 50kg: ${data.total_in_50kg || 0} sacks</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-warning">
                            <small>Total Stock Out (All Time)</small>
                            <h5>${totalSacksOut} sacks</h5>
                            <small>${totalKgOut} KG</small>
                            <div class="mt-1">
                                <small class="text-muted">🌾 25kg: ${data.total_out_25kg || 0} sacks</small><br>
                                <small class="text-muted">🌾 50kg: ${data.total_out_50kg || 0} sacks</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="alert alert-success">
                            <small>Current Stock</small>
                            <h5>${currentSacks} sacks</h5>
                            <small>${currentKg} KG</small>
                            <div class="mt-1">
                                <small class="text-muted">✅ 25kg: ${data.sacks_25kg || 0} sacks (${(data.sacks_25kg || 0) * 25} KG)</small><br>
                                <small class="text-muted">✅ 50kg: ${data.sacks_50kg || 0} sacks (${(data.sacks_50kg || 0) * 50} KG)</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h6>Recent Transactions</h6>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20%;">Date</th>
                                <th style="width: 20%;">Transaction Type</th>
                                <th style="width: 20%;">Quantity (Sacks)</th>
                                <th style="width: 20%;">Sack Size</th>
                                <th style="width: 20%;">Total KG</th>
                            </tr>
                        </thead>
                        <tbody id="transaction-history-${safeId}">
                            <tr><td colspan="6" class="text-center">Loading...</td></tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination controls -->
                <div id="pagination-${safeId}" class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <span id="page-info-${safeId}" class="text-muted"></span>
                    </div>
                <div>
                    <nav>
                        <ul class="pagination pagination-sm mb-0" id="pagination-buttons-${safeId}">
                        </ul>
                    </nav>
                </div>
            </div>
            </div>
        </div>
    `;
    }

    var transactionsCache = {};

    function loadTransactionHistory(riceType) {
        var safeId = riceType.replace(/\s/g, '');
        console.log("Loading transactions for: " + riceType);
        console.log("Looking for tbody id: transaction-history-" + safeId);

        // Check if element exists
        if ($('#transaction-history-' + safeId).length === 0) {
            console.log("Element not found! Creating it...");
            return;
        }

        $.ajax({
            url: '<?php echo site_url('Masterfile_cont/get_rice_transactions'); ?>',
            type: 'POST',
            data: { rice_type: riceType },
            dataType: 'json',
            success: function (response) {
                console.log("Response received:", response);

                if (response.data && response.data.length > 0) {
                    console.log("Found " + response.data.length + " transactions");
                    // Store transactions in cache
                    transactionsCache[safeId] = response.data;
                    // Display first page
                    displayTransactionsPage(riceType, 1);
                } else {
                    console.log("No transactions found");
                    $('#transaction-history-' + safeId).html('<tr><td colspan="5" class="text-center">No transactions found</td></tr>');
                    $('#pagination-' + safeId).hide();
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + error);
                console.log("Response Text: " + xhr.responseText);
                $('#transaction-history-' + safeId).html('<tr><td colspan="5" class="text-center">Error loading transactions</td></tr>');
                $('#pagination-' + safeId).hide();
            }
        });
    }

    function displayTransactionsPage(riceType, page) {
        var safeId = riceType.replace(/\s/g, '');
        var transactions = transactionsCache[safeId];

        if (!transactions || transactions.length === 0) {
            return;
        }

        var itemsPerPage = 5;
        var totalItems = transactions.length;
        var totalPages = Math.ceil(totalItems / itemsPerPage);

        // Ensure page is within bounds
        if (page < 1) page = 1;
        if (page > totalPages) page = totalPages;

        // Calculate start and end indices
        var start = (page - 1) * itemsPerPage;
        var end = start + itemsPerPage;
        var pageTransactions = transactions.slice(start, end);

        // Display transactions
        var tbody = $('#transaction-history-' + safeId);
        tbody.empty();

        $.each(pageTransactions, function (i, trans) {
            // Set badge class and text based on trans_type
            var badgeClass = '';
            var transText = '';

            if (trans.trans_type === 'in') {
                badgeClass = 'bg-success';
                transText = 'STOCK IN';
            } else if (trans.trans_type === 'out') {
                badgeClass = 'bg-danger';
                transText = 'SOLD';
            } else if (trans.trans_type === 'remove') {
                badgeClass = 'bg-warning text-dark';
                transText = 'REMOVED';
            }

            tbody.append(`
                <tr>
                    <td>${new Date(trans.trans_date).toLocaleDateString()}</td>
                    <td><span class="badge ${badgeClass}">${transText}</span></td>
                    <td>${trans.qty}</td>
                    <td>${trans.sack_size}</td>
                    <td>${trans.total_kg} KG</td>
                </tr>
            `);
        });

        // Update page info
        var startNum = start + 1;
        var endNum = Math.min(end, totalItems);
        $('#page-info-' + safeId).text(`Showing ${startNum} to ${endNum} of ${totalItems} transactions`);

        // Generate pagination buttons
        generatePaginationButtons(riceType, page, totalPages);
    }

    function generatePaginationButtons(riceType, currentPage, totalPages) {
        var safeId = riceType.replace(/\s/g, '');
        var paginationContainer = $('#pagination-buttons-' + safeId);
        paginationContainer.empty();

        if (totalPages <= 1) {
            $('#pagination-' + safeId).hide();
            return;
        }

        $('#pagination-' + safeId).show();

        // Previous button
        var prevDisabled = currentPage === 1 ? 'disabled' : '';
        paginationContainer.append(`
            <li class="page-item ${prevDisabled}">
                <a class="page-link" href="#" data-page="${currentPage - 1}" data-rice="${riceType}">&laquo; Previous</a>
            </li>
        `);

        // Calculate page range to show (max 5 pages)
        var startPage = Math.max(1, currentPage - 2);
        var endPage = Math.min(totalPages, startPage + 4);

        if (endPage - startPage < 4 && startPage > 1) {
            startPage = Math.max(1, endPage - 4);
        }

        // First page button if not in range
        if (startPage > 1) {
            paginationContainer.append(`
                <li class="page-item">
                    <a class="page-link" href="#" data-page="1" data-rice="${riceType}">1</a>
                </li>
            `);
            if (startPage > 2) {
                paginationContainer.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
            }
        }

        // Page number buttons
        for (var i = startPage; i <= endPage; i++) {
            var activeClass = i === currentPage ? 'active' : '';
            paginationContainer.append(`
                <li class="page-item ${activeClass}">
                    <a class="page-link" href="#" data-page="${i}" data-rice="${riceType}">${i}</a>
                </li>
            `);
        }

        // Last page button if not in range
        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                paginationContainer.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
            }
            paginationContainer.append(`
                <li class="page-item">
                    <a class="page-link" href="#" data-page="${totalPages}" data-rice="${riceType}">${totalPages}</a>
                </li>
            `);
        }

        // Next button
        var nextDisabled = currentPage === totalPages ? 'disabled' : '';
        paginationContainer.append(`
            <li class="page-item ${nextDisabled}">
                <a class="page-link" href="#" data-page="${currentPage + 1}" data-rice="${riceType}">Next &raquo;</a>
            </li>
        `);

        // Add click event handlers
        $('.page-link[data-page]').off('click').on('click', function (e) {
            e.preventDefault();
            var page = parseInt($(this).data('page'));
            var rice = $(this).data('rice');
            if (page && rice && !isNaN(page)) {
                displayTransactionsPage(rice, page);
            }
        });
    }

    function updateSummaryCards(summary) {

        console.log(summary);
        if (!summary) return;

        // Update Total Rice Stock Card
        $('#total-rice-stock small').text(summary.total_kg.toLocaleString() + ' KG');
        $('#total-rice-stock .mb-0').text(summary.total_sacks + ' sacks');

        // Update 25kg Sacks Card
        $('#sacks-25kg .mb-0').text(summary.total_sacks_25kg);
        $('#sacks-25kg small').text(summary.total_kg_25kg.toLocaleString() + ' KG');

        // Update 50kg Sacks Card
        $('#sacks-50kg .mb-0').text(summary.total_sacks_50kg);
        $('#sacks-50kg small').text(summary.total_kg_50kg.toLocaleString() + ' KG');

        // Update Low Stock Alert Card
        $('#low-stock .mb-0').text(summary.low_stock_count);
        $('#low-stock small').text('Rice types below 200kg');

        // Optional: Change color if there are low stock items
        if (summary.low_stock_count > 0) {
            $('#low-stock').removeClass('bg-warning').addClass('bg-danger text-white');
        } else {
            $('#low-stock').removeClass('bg-danger').addClass('bg-warning text-dark');
        }
    }

    function updateSummaryCardsFish(summary) {

        console.log(summary);
        if (!summary) return;

        // Update Total Rice Stock Card
        $('#total-fish-stock .mb-0').text(summary.total_kg.toLocaleString() + ' KG');

        if (summary.low_stock_count > 0) {
            $('#low-fish-stock').removeClass('bg-warning').addClass('bg-danger text-white');
        } else {
            $('#low-stock').removeClass('bg-danger').addClass('bg-warning text-dark');
        }
    }


</script>