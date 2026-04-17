<style>
    .modal-dimmed {
        filter: brightness(0.4);
        pointer-events: none;
        transition: filter 0.2s ease;
    }

    #payment_table thead th {
        position: sticky;
        top: 0;
        background: #f8f9fa;
        z-index: 2;
    }

    label {
        font-weight: normal !important;
    }

    #viewLoaner .modal-body .form-label {
        display: flex;
        justify-content: space-between;
        align-items: left;
        padding: 6px 12px;
        border-radius: 8px;
        /* background: linear-gradient(135deg, var(--light-blue), #ffffff); */
        background: #f8f9fa;
        /* subtle background */
        font-weight: 500;
        font-size: 14px;
        /* margin-bottom: 6px; */
        transition: background 0.3s, box-shadow 0.3s;
    }

    #viewLoaner .modal-body .form-label span {
        font-weight: bold;
        color: #333;
    }

    /* Form control focus effects */
    .form-control:focus,
    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    /* Quick amount buttons hover */
    .quick-capital:hover {
        background-color: #198754;
        border-color: #198754;
        color: white;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .tab-link {
        cursor: pointer;
        transition: all 0.3s ease;
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
                <div class="row align-items-end mb-3">
                    <div class="col-auto me-3 d-flex justify-content-between align-items-center w-100">
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLoaner">
                                <i class="fas fa-user-plus me-1"></i> Add New
                            </button>
                            <button class="btn btn-success" id="generate_daily">
                                <i class="fas fa-download me-1"></i> Daily Report
                            </button>
                            <button class="btn btn-secondary" id="generate_weekly">
                                <i class="fas fa-download me-1"></i> Weekly Report
                            </button>
                            <button class="btn btn-warning" id="generate_monthly">
                                <i class="fas fa-download me-1"></i> Monthly Report
                            </button>
                            <button class="btn btn-info" id="bulk_payment">
                                <i class="fas fa-credit-card me-1"></i> Bulk Payment
                            </button>

                            <input type="date"
                                style="width: 140px; display: inline-block; height: 34px; background-color: white; color: #444242; border-radius: 6px; border:1px solid var(--bs-secondary)"
                                class="form-control" id="selected_date" name="selected_date"
                                value="<?= date('Y-m-d') ?>">
                        </div>

                        <button class="btn btn-danger" id="variance_tracking">
                            <i class="fas fa-balance-scale me-1"></i> Variance Tracking
                        </button>
                    </div>

                    <!-- <div class="col-md-2">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="datefilter" id="datefilter"
                                placeholder="Filter date" autocomplete="off" />
                            <label for="datefilter">Filter Date</label>
                        </div>
                    </div> -->
                </div>
                <table id="client_table" class="table table-hover" style="width:100%">
                    <thead class="table-secondary">
                        <tr>
                            <th style="width:100px; text-align:center">ACC NO</th>
                            <th>FULL NAME</th>
                            <th>ADDRESS</th>
                            <th style="width:110px">DATE ADDED</th>
                            <th style="width:150px; text-align:center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ADD MODAL -->
        <div class="modal fade" id="addLoaner" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog" style="max-width:700px; margin-top: 10px;">
                <div class="modal-content">

                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-user-plus me-2 text-primary"></i>
                            Client Details
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="container p-0">
                            <!-- Client Information Card -->
                            <form id="client_form">
                                <div class="card border-0 shadow-sm rounded-4 mb-4">
                                    <div class="card-header bg-white border-0">
                                        <h6 class="fw-bold mb-0">
                                            <i class="fas fa-id-card me-2 text-primary"></i>
                                            Client Information
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-hashtag me-1"></i> ACC NO.
                                                </label>
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="Enter Acc No." id="acc_no" name="acc_no"
                                                    autocomplete="off">
                                            </div>
                                            <div class="col-md-9">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-user me-1"></i> FULL NAME
                                                </label>
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="Enter Fullname" id="full_name" name="full_name"
                                                    autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-9">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-map-marker-alt me-1"></i> ADDRESS
                                                </label>
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="Enter Address" id="address" name="address">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-calendar-alt me-1"></i> DATE
                                                </label>
                                                <input type="date" class="form-control form-control-lg" id="date_added"
                                                    name="date_added" value="<?= date('Y-m-d') ?>">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="d-flex justify-content-end">
                                    <button type="button" id="add_client" name="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Save Client
                                    </button>
                                    <button type="button" class="btn btn-light ms-2" data-bs-dismiss="modal"
                                        id="closeModalBtn">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ADD MODAL -->

        <!-- EDIT MODAL -->
        <div class="modal fade" id="editLoaner" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog" style="max-width:700px; margin-top: 10px;">
                <div class="modal-content">

                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-edit me-2 text-primary"></i>
                            Edit Client Details
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="container p-0">
                            <!-- Hidden ID field -->
                            <input type="hidden" id="edit_client_id" name="edit_client_id">

                            <!-- Client Information Card -->
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-header bg-white border-0">
                                    <h6 class="fw-bold mb-0">
                                        <i class="fas fa-id-card me-2 text-primary"></i>
                                        Client Information
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <form id="edit_client_form">
                                        <div class="row mb-4">
                                            <div class="col-md-3">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-hashtag me-1"></i> ACC NO.
                                                </label>
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="Enter Acc No." id="edit_acc_no" name="edit_acc_no"
                                                    autocomplete="off">
                                            </div>
                                            <div class="col-md-9">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-user me-1"></i> FULL NAME
                                                </label>
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="Enter Fullname" id="edit_full_name"
                                                    name="edit_full_name" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-9">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-map-marker-alt me-1"></i> ADDRESS
                                                </label>
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="Enter Address" id="edit_address" name="edit_address">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-calendar-alt me-1"></i> DATE STARTED
                                                </label>
                                                <input type="date" class="form-control form-control-lg"
                                                    id="edit_start_date" name="edit_start_date"
                                                    value="<?= date('Y-m-d') ?>">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="row">
                                <div class="d-flex justify-content-end align-items-center">
                                    <button type="button" id="deleteBtn" class="btn btn-outline-danger me-auto">
                                        <i class="fas fa-trash-alt me-1"></i> Delete
                                    </button>
                                    <button type="button" id="update_client" name="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Update
                                    </button>
                                    <button type="button" class="btn btn-light ms-2" data-bs-dismiss="modal"
                                        id="closeModalBtn">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- EDIT MODAL -->

        <!-- VIEW MODAL -->
        <div class="modal fade" id="viewLoaner" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-xl" style="margin-top: 10px;">
                <div class="modal-content">

                    <!-- HEADER -->
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-file-invoice me-2 text-primary"></i> Loan Details
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- BODY -->
                    <div class="modal-body px-3 pb-2">
                        <div class="container-fluid px-0">
                            <div class="card border-0 shadow-sm rounded-3">
                                <div class="card-body pt-0 pb-2">

                                    <!-- CLIENT INFO -->
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <div class="text-muted small">Account Number</div>
                                            <span class="fw-bold" id="header_acc_no"></span>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-muted small">Full Name</div>
                                            <span class="fw-bold" id="header_name"></span>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-muted small">Address</div>
                                            <span class="fw-bold" id="header_address"></span>
                                        </div>
                                    </div>

                                    <!-- TABS -->
                                    <!-- <div class="mb-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item w-50">
                                                <button class="nav-link active w-100 tab-link" data-tab="view-fish">
                                                    DRIED FISH
                                                </button>
                                            </li>
                                            <li class="nav-item w-50">
                                                <button class="nav-link w-100 tab-link" data-tab="view-rice">
                                                    RICE
                                                </button>
                                            </li>
                                        </ul>
                                    </div> -->

                                    <div class="head-title mt-0 mb-2">
                                        <ul class="breadcrumb nav-tabs-custom row">
                                            <li>
                                                <a class="col-6 tab-link active"
                                                    style="border-radius: 5px 0 0 5px; cursor: pointer;"
                                                    data-tab="view-fish">DRIED FISH</a>
                                            </li>
                                            <li>
                                                <a class="col-6 tab-link"
                                                    style="border-radius: 0 5px 5px 0; cursor: pointer;"
                                                    data-tab="view-rice">RICE</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- ===================== FISH TAB ===================== -->
                                    <div id="view-fish-tab" class="loan-tab-content">
                                        <div
                                            class="d-flex justify-content-between align-items-center mb-2 mt-2 pt-2 border-top">
                                            <div class="d-flex align-items-center gap-2 mb-0">
                                                <h5 class="text-dark fw-bold mb-0">
                                                    <i class="fas fa-history me-2 text-primary"></i>Loan History - Dried
                                                    Fish
                                                </h5>
                                                <button
                                                    class="btn btn-sm btn-danger d-inline-block ms-2 delete-loan-btn"
                                                    data-type="fish">
                                                    <i class="fas fa-trash me-1"></i> Delete
                                                </button>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="dropdown" style="width: 167px;">
                                                    <button
                                                        class="btn btn-sm btn-outline-secondary dropdown-toggle w-100 text-start fish-btn"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                        style="height: 30px;">Select Date Range
                                                    </button>
                                                    <ul class="dropdown-menu fish-dropdown"
                                                        style="max-height: 200px; overflow-y: auto; z-index: 9999;">
                                                    </ul>
                                                </div>
                                                <button class="btn btn-sm btn-success edit-loan-btn" data-type="fish">
                                                    <i class="fas fa-edit me-1"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger cancel-edit-btn" data-type="fish"
                                                    style="display: none;">
                                                    <i class="fas fa-times me-1"></i> Cancel
                                                </button>
                                            </div>
                                        </div>

                                        <!-- INFO -->
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <small>Start Date</small><br>
                                                <b class="fish-start-date"></b>
                                            </div>
                                            <div class="col-2">
                                                <small>Due Date</small><br>
                                                <b class="fish-due-date"></b>
                                            </div>
                                            <div class="col-2">
                                                <small>Total</small><br>
                                                <b>₱ <span class="fish-total-amt"></span></b>
                                            </div>
                                            <div class="col-3">
                                                <small>Balance</small><br>
                                                <b>₱ <span class="fish-running-balance"></span></b>
                                            </div>
                                            <div class="col-3">
                                                <small>Status</small><br>
                                                <b class="fish-status"></b>
                                            </div>
                                        </div>

                                        <!-- TRANSACTIONS -->
                                        <div class="table-responsive mt-2">
                                            <table class="table table-sm table-bordered">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Fish Type</th>
                                                        <th>KG</th>
                                                        <th>Price</th>
                                                        <th>Interest</th>
                                                        <th>Added</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fish-transactions-body"></tbody>
                                            </table>
                                        </div>

                                        <!-- PAYMENT TABLE -->
                                        <div class="mt-2">
                                            <div class="table-responsive" style="max-height:260px; overflow:auto;">
                                                <table class="table table-sm table-hover">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Date</th>
                                                            <th class="text-center">Payment Fish</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="fishPaymentTableBody"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
                                            <div></div>
                                            <div>
                                                Total: ₱ <b id="fish_total_payment">0.00</b>
                                            </div>
                                            <div>
                                                <button type="button" id="addNewLoan" class="btn btn-primary me-2"
                                                    onclick="openAddNewLoanModalFish()">
                                                    <i class="fas fa-plus me-1"></i> New Credit
                                                </button>
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                    <i class="fas fa-times me-1"></i> Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ===================== RICE TAB ===================== -->
                                    <div id="view-rice-tab" class="loan-tab-content" style="display:none;">
                                        <div
                                            class="d-flex justify-content-between align-items-center mb-2 mt-2 pt-2 border-top">
                                            <div class="d-flex align-items-center gap-2 mb-0">
                                                <h5 class="text-dark fw-bold mb-0">
                                                    <i class="fas fa-history me-2 text-primary"></i>Loan History - Rice
                                                </h5>
                                                <button
                                                    class="btn btn-sm btn-danger d-inline-block ms-2 delete-loan-btn"
                                                    data-type="rice">
                                                    <i class="fas fa-trash me-1"></i> Delete
                                                </button>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="dropdown" style="width: 167px;">
                                                    <button
                                                        class="btn btn-sm btn-outline-secondary dropdown-toggle w-100 text-start rice-btn"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                        style="height: 30px;">Select Date Range
                                                    </button>
                                                    <ul class="dropdown-menu rice-dropdown"
                                                        style="max-height: 200px; overflow-y: auto; z-index: 9999;">
                                                    </ul>
                                                </div>
                                                <button class="btn btn-sm btn-success edit-loan-btn" data-type="rice">
                                                    <i class="fas fa-edit me-1"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger cancel-edit-btn" data-type="rice"
                                                    style="display: none;">
                                                    <i class="fas fa-times me-1"></i> Cancel
                                                </button>
                                            </div>
                                        </div>

                                        <!-- INFO -->
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <small>Start Date</small><br>
                                                <b class="rice-start-date"></b>
                                            </div>
                                            <div class="col-2">
                                                <small>Due Date</small><br>
                                                <b class="rice-due-date"></b>
                                            </div>
                                            <div class="col-2">
                                                <small>Total</small><br>
                                                <b>₱ <span class="rice-total-amt"></span></b>
                                            </div>
                                            <div class="col-3">
                                                <small>Balance</small><br>
                                                <b>₱ <span class="rice-running-balance"></span></b>
                                            </div>
                                            <div class="col-3">
                                                <small>Status</small><br>
                                                <b class="rice-status"></b>
                                            </div>
                                        </div>

                                        <!-- TRANSACTIONS -->
                                        <div class="table-responsive mt-2">
                                            <table class="table table-sm table-bordered">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Rice Type</th>
                                                        <th>Sack</th>
                                                        <th>Qty</th>
                                                        <th>Price</th>
                                                        <th>Interest</th>
                                                        <th>Added</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="rice-transactions-body"></tbody>
                                            </table>
                                        </div>

                                        <!-- PAYMENT TABLE -->
                                        <div class="mt-2">
                                            <div class="table-responsive" style="max-height:260px; overflow:auto;">
                                                <table class="table table-sm table-hover">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th class="text-center">Date</th>
                                                            <th class="text-center">Payment Rice</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="ricePaymentTableBody"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
                                            <div></div>
                                            <div>
                                                Total: ₱ <b id="rice_total_payment">0.00</b>
                                            </div>
                                            <div>
                                                <button type="button" id="addNewLoan"
                                                    onclick="openAddNewLoanModalRice()" class="btn btn-primary me-2">
                                                    <i class="fas fa-plus me-1"></i> New Credit
                                                </button>
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                    <i class="fas fa-times me-1"></i> Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- HIDDEN -->
                    <input type="hidden" id="header_id">
                    <input type="hidden" id="header_loan_id">
                    <input type="hidden" id="current_loan_type" value="fish">

                </div>
            </div>
        </div>
        <!-- VIEW MODAL -->

        <!-- DRIED FISH MODAL -->
        <div class="modal fade" id="addLoanSameClientFish" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog" style="max-width:900px; margin-top:10px">
                <div class="modal-content">
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-fish me-2 text-success"></i>
                            New Dried Fish Credit for Existing Client
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body pb-0">
                        <div class="container p-0">
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-header bg-white border-0">
                                    <h6 class="fw-bold mb-0">
                                        <i class="fas fa-fish me-2 text-success"></i>
                                        Dried Fish Details
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <!-- Multiple Fish Items Container -->
                                    <div id="fish-items-container">
                                        <div class="fish-item row g-3 mb-3 p-3 pt-0 border rounded">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-tag me-1"></i> FISH TYPE
                                                </label>
                                                <select class="form-select fish-type" data-price-field="fish_price">
                                                    <option value="">Select Fish Type...</option>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-weight-hanging me-1"></i> QTY (KG)
                                                </label>
                                                <input type="number" class="form-control fish-qty" placeholder="0.00"
                                                    min="0" step="0.01" value="0" />
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-tag me-1"></i> PRICE/KG
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                    <input type="number" class="form-control fish-price"
                                                        placeholder="0.00" min="0" step="0.01" value="0" />
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-percentage me-1"></i> INTEREST
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 fw-bold">%</span>
                                                    <input type="number" class="form-control fish-interest"
                                                        placeholder="0.00" min="0" step="0.01" value="30" />
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-plus-circle me-1"></i> ADDED AMOUNT
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                    <input type="number" class="form-control fish-added-amt"
                                                        placeholder="0.00" min="0" step="0.01" value="0" />
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-calculator me-1"></i> SUBTOTAL
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                    <input type="text"
                                                        class="form-control fish-subtotal fw-bold text-success" readonly
                                                        style="background-color: #f8f9fa;" value="0.00" />
                                                </div>
                                            </div>

                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger remove-fish-item">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3 align-items-center">
                                        <div class="col-md-5">
                                            <button type="button" class="btn btn-primary btn-sm" id="addFishItem">
                                                <i class="fas fa-plus-circle"></i> Add Another Fish Type
                                            </button>
                                        </div>
                                        <div class="col-md-7">
                                            <div
                                                class="alert alert-success mb-0 d-flex justify-content-between align-items-center">
                                                <strong>GRAND TOTAL:</strong>
                                                <h4 class="mb-0">₱ <span id="fishGrandTotal">0.00</span></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Transaction Date -->
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-muted small mb-2">
                                                <i class="fas fa-calendar-alt me-1"></i> TRANSACTION DATE
                                            </label>
                                            <input id="fish_trans_date" type="date" class="form-control form-control-lg"
                                                value="<?= date('Y-m-d') ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-success" id="addDriedFishLoanBtn">
                            <i class="fas fa-check-circle me-1"></i> Process Dried Fish Credit
                        </button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- RICE MODAL -->
        <div class="modal fade" id="addLoanSameClientRice" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog" style="max-width:900px; margin-top:10px">
                <div class="modal-content">
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-box-open me-2 text-success"></i>
                            New Rice Credit for Existing Client
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body pb-0">
                        <div class="container p-0">
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-header bg-white border-0">
                                    <h6 class="fw-bold mb-0">
                                        <i class="fas fa-box-open me-2 text-success"></i>
                                        Rice Details
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <!-- Multiple Rice Items Container -->
                                    <div id="rice-items-container">
                                        <div class="rice-item row g-3 mb-3 p-3 pt-0 border rounded">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-tag me-1"></i> RICE TYPE
                                                </label>
                                                <select class="form-select rice-type">
                                                    <option value="">Select Rice Type...</option>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-cubes me-1"></i> SACK SIZE
                                                </label>
                                                <select class="form-select rice-sack-size">
                                                    <option value="25">25 KG</option>
                                                    <option value="50">50 KG</option>
                                                </select>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-box me-1"></i> QTY (SACK)
                                                </label>
                                                <input type="number" class="form-control rice-qty" placeholder="0"
                                                    min="0" step="1" value="0" />
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-tag me-1"></i> PRICE/KG
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                    <input type="number" class="form-control rice-price"
                                                        placeholder="0.00" min="0" step="0.01" value="0" />
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-percentage me-1"></i> INTEREST
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 fw-bold">%</span>
                                                    <input type="number" class="form-control rice-interest"
                                                        placeholder="0.00" min="0" step="0.01" value="20" />
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-plus-circle me-1"></i> ADDED AMOUNT
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                    <input type="number" class="form-control rice-added-amt"
                                                        placeholder="0.00" min="0" step="0.01" value="0" />
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-calculator me-1"></i> SUBTOTAL
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                    <input type="text"
                                                        class="form-control rice-subtotal fw-bold text-success" readonly
                                                        style="background-color: #f8f9fa;" value="0.00" />
                                                </div>
                                            </div>

                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger remove-rice-item">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3 align-items-center">
                                        <div class="col-md-5">
                                            <button type="button" class="btn btn-primary btn-sm" id="addRiceItem">
                                                <i class="fas fa-plus-circle"></i> Add Another Rice Type
                                            </button>
                                        </div>
                                        <div class="col-md-7">
                                            <div
                                                class="alert alert-success mb-0 d-flex justify-content-between align-items-center">
                                                <strong>GRAND TOTAL:</strong>
                                                <h4 class="mb-0">₱ <span id="riceGrandTotal">0.00</span></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Transaction Date -->
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-muted small mb-2">
                                                <i class="fas fa-calendar-alt me-1"></i> TRANSACTION DATE
                                            </label>
                                            <input id="rice_trans_date" type="date" class="form-control form-control-lg"
                                                value="<?= date('Y-m-d') ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-success" id="addRiceLoanBtn">
                            <i class="fas fa-check-circle me-1"></i> Process Rice Credit
                        </button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </main>
</section>

<script>

    let globalClientId = 0;
    let globalEditBtn = false;

    const viewLoanerEl = document.getElementById('viewLoaner');
    const addNewModalElFish = document.getElementById('addLoanSameClientFish');
    const addNewModalElRice = document.getElementById('addLoanSameClientRice');
    const varianceModal = document.getElementById('variance_modal');

    viewLoanerEl.addEventListener('hidden.bs.modal', () => {
        $('#dateDropdownBtn').prop('disabled', false);

        $('#cancelEdit').hide();
        const btn = $('#editLoanDetails');

        btn.data('mode', 'edit');
        btn.prop('disabled', false);
        btn.html('<i class="fas fa-edit"></i> Edit');
    });

    addNewModalElFish.addEventListener('show.bs.modal', () => {
        viewLoanerEl.classList.add('modal-dimmed');
    });

    addNewModalElFish.addEventListener('hidden.bs.modal', () => {
        viewLoanerEl.classList.remove('modal-dimmed');
    });

    addNewModalElRice.addEventListener('show.bs.modal', () => {
        viewLoanerEl.classList.add('modal-dimmed');
    });

    addNewModalElRice.addEventListener('hidden.bs.modal', () => {
        viewLoanerEl.classList.remove('modal-dimmed');
    });



    $(document).ready(function () {

        $('.tab-link').click(function () {
            let tab = $(this).data('tab');

            $('.tab-link').removeClass('active');
            $(this).addClass('active');

            $('.loan-tab-content').hide();
            $('#' + tab + '-tab').show();

            $('#current_loan_type').val(tab === 'view-fish' ? 'fish' : 'rice');
        });
    });


    var client_table = $("#client_table").DataTable({
        columnDefs: [{ targets: '_all', orderable: true }],
        lengthMenu: [10, 25, 50, 100],
        processing: true,
        serverSide: true,
        searching: true,
        ordering: true,
        ajax: {
            url: '<?php echo site_url('Monitoring_cont/get_client'); ?>',
            type: 'POST',
            data: function (d) {
                d.start = d.start || 0;
                d.length = d.length || 10;
            },
            dataType: 'json',
            error: function (xhr, status, error) {
                console.error("AJAX request failed: " + error);
            }
        },
        columns: [
            {
                data: 'id',
                class: 'text-center'
            },
            {
                data: 'full_name',
                render: function (data) {
                    if (!data) return '';
                    return data.replace(/\b\w/g, char => char.toUpperCase());
                }
            },
            {
                data: 'address',
                render: function (data) {
                    if (!data) return '';
                    return data.replace(/\b\w/g, char => char.toUpperCase());
                }
            },
            { data: 'date_added', class: 'text-center' },
            {
                data: 'id',
                orderable: false,
                className: 'text-center',
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-success me-1" onclick="openEditModal('${data}', '${row.acc_no}', '${row.full_name}', '${row.address}', '${row.date_added}')">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-primary" onclick="openViewModal('${data}', '${row.full_name}', '${row.address}', '${row.acc_no}')">
                            <i class="fas fa-eye"></i> View
                        </button>
                    `;
                }
            }

        ]
    });

    $("#add_client").on('click', function (e) {
        e.preventDefault();

        var name = $("#full_name").val()

        if (!name) {
            Swal.fire({ icon: 'error', title: 'Oops...', text: 'All fields are required' });
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: "Do you want to add this client?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, add it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {

                Swal.fire({
                    title: 'Adding client...',
                    html: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('Monitoring_cont/add_client'); ?>",
                    data: $('#client_form').serialize(),
                    dataType: 'json',
                    success: function (response) {
                        Swal.close();
                        if (response.status === "success") {
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success',
                                timer: 800,
                                showConfirmButton: false,
                                timerProgressBar: true
                            });
                            document.getElementById('client_form').reset();
                            $('#addLoaner').modal('hide');
                            client_table.ajax.reload();
                        } else if (response.status === "exist") {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error',
                                showConfirmButton: true,
                            });

                            return;
                        }
                    }
                });
            }
        });
    });

    $('#client_form').on('keypress', function (e) {
        if (e.which === 13) {
            e.preventDefault();
            $('#add_client').trigger('click');
        }
    });

    function openViewModal(id, fullname, address, acc_no, selectedLoanId = null, selectedType = null, visibleTab = null) {

        $('#viewLoaner').modal('show');
        console.log(id);

        globalClientId = id;

        $('#header_id').val(id);
        $('#header_acc_no').text(acc_no);
        $('#header_name').text(fullname.replace(/\b\w/g, c => c.toUpperCase()));
        $('#header_address').text(address.replace(/\b\w/g, c => c.toUpperCase()));

        $.ajax({
            url: "<?php echo base_url('Monitoring_cont/get_loan_date_range'); ?>",
            type: "POST",
            dataType: "json",
            data: { client_id: id },
            success: function (response) {
                console.log(response);

                let ongoingFishCount = response.fish ? response.fish.filter(loan => loan.status === 'ongoing').length : 0;
                let ongoingRiceCount = response.rice ? response.rice.filter(loan => loan.status === 'ongoing').length : 0;

                hasOngoingFish = ongoingFishCount > 0;
                hasOngoingRice = ongoingRiceCount > 0;

                if (hasOngoingFish) {
                    console.log('Client has ongoing fish loan(s)');
                }

                if (hasOngoingRice) {
                    console.log('Client has ongoing rice loan(s)');
                }

                function formatDate(dateString) {
                    if (!dateString) return '';
                    var date = new Date(dateString);
                    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    var month = months[date.getMonth()];
                    var day = date.getDate();
                    var year = date.getFullYear();
                    return month + ' ' + day + ' ' + year;
                }

                function onFishSelected(id, dateRange, startDate, dueDate, status, total_amt, balance, date_completed) {

                    globalFishStartDate = startDate;
                    globalFishEndDate = dueDate;

                    $('.fish-btn').html(dateRange);

                    $('.fish-start-date').text(formatDate(startDate));
                    $('.fish-due-date').text(formatDate(dueDate));
                    $('.fish-status').text(status || 'N/A');

                    if (total_amt) {
                        $('.fish-total-amt').text(parseFloat(total_amt).toFixed(2));
                    } else {
                        $('.fish-total-amt').text('0.00');
                    }

                    if (balance) {
                        $('.fish-running-balance').text(parseFloat(balance).toFixed(2));
                    } else {
                        $('.fish-running-balance').text('0.00');
                    }

                    if (status) {
                        var statusLower = status.toLowerCase();
                        $('.fish-status').removeClass('text-success text-danger text-warning');
                        if (statusLower === 'ongoing') {
                            $('.fish-status').addClass('text-warning');
                        } else if (statusLower === 'completed') {
                            $('.fish-status').addClass('text-success');
                        } else if (statusLower === 'overdue') {
                            $('.fish-status').addClass('text-danger');
                        }
                    }

                    $('#selected_fish_id').val(id);
                    $('#selected_fish_start').val(startDate);
                    $('#selected_fish_due').val(dueDate);
                    $('#selected_fish_total').val(total_amt);
                    $('#selected_fish_balance').val(balance);

                    $.ajax({
                        url: '<?php echo site_url('Monitoring_cont/get_fish_loan_details'); ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: { loan_id: id },
                        success: function (response) {
                            console.log(response);

                            $('.fish-transactions-body').empty();

                            if (response && response.length > 0) {

                                $.each(response, function (index, item) {
                                    var kg = (parseFloat(item.qty) / 1000).toFixed(2);
                                    var price = parseFloat(item.price_per_kg).toFixed(2);
                                    var interest = parseFloat(item.interest).toFixed(2);
                                    var added = parseFloat(item.added_amt).toFixed(2);
                                    var subtotal = parseFloat(item.sub_total).toFixed(2);

                                    var row = '<tr>' +
                                        '<td>' + (item.fish_type || 'N/A') + '</td>' +
                                        '<td class="text-end">' + kg + '</td>' +
                                        '<td class="text-end">₱ ' + price + '</td>' +
                                        '<td class="text-end">' + interest + '%</td>' +
                                        '<td class="text-end">₱ ' + added + '</td>' +
                                        '<td class="text-end">₱ ' + subtotal + '</td>' +
                                        '</tr>';

                                    $('.fish-transactions-body').append(row);
                                });

                            } else if (response && response.error) {
                                var errorRow = '<tr><td colspan="6" class="text-center text-danger">' + response.error + '</td></tr>';
                                $('.fish-transactions-body').append(errorRow);
                            } else {
                                var noDataRow = '<tr><td colspan="6" class="text-center">No fish transactions found</td></tr>';
                                $('.fish-transactions-body').append(noDataRow);
                            }

                            getPaymentHistoryFish(id, startDate, dueDate);
                        },
                        error: function (xhr, status, error) {
                            console.error("Error loading fish details: " + error);
                            var errorRow = '<tr><td colspan="6" class="text-center text-danger">Error loading data</td></tr>';
                            $('.fish-transactions-body').append(errorRow);
                        }
                    });
                }

                // function getPaymentHistoryFish(id, startDate, dueDate) {
                //     let start = new Date(startDate);
                //     let end = new Date(dueDate);

                //     $.ajax({
                //         url: '<?php echo site_url('Monitoring_cont/get_payment_history_fish'); ?>',
                //         type: 'POST',
                //         dataType: 'json',
                //         data: { loan_id: id },
                //         success: function (response) {
                //             // Create a map of payment dates to amounts
                //             let paymentMap = {};
                //             let totalPaid = 0;

                //             if (response && response.length > 0) {
                //                 response.forEach(function (payment) {
                //                     paymentMap[payment.payment_for] = payment.amt;
                //                     totalPaid += parseFloat(payment.amt);
                //                 });
                //             }

                //             // Get total loan amount
                //             let totalLoanAmount = parseFloat($('.fish-total-amt').text()) || 0;

                //             // Calculate running balance
                //             let runningBalance = totalLoanAmount - totalPaid;

                //             $('.fish-running-balance').text(formatMoney(runningBalance));

                //             $('#fish_total_payment').text(formatMoney(totalPaid));

                //             // Build the table with payment data
                //             let tableBody = '';
                //             let rowIndex = 1;
                //             let current = new Date(start);
                //             current.setDate(current.getDate() + 1);

                //             while (current <= end) {
                //                 let dateStr = current.toISOString().split('T')[0];

                //                 // Check if there's a payment for this date
                //                 let paymentAmt = paymentMap[dateStr] || null;
                //                 let formattedAmt = paymentAmt || '';
                //                 let hasPayment = paymentAmt !== null;

                //                 tableBody += `
                //                     <table>
                //                         <td class="text-center">${rowIndex}</td>
                //                        <td class="text-center">${current.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</td>
                //                         <td class="text-center">
                //                             <input type="text"
                //                                 class="form-control text-center form-control-sm payment-input w-50 mx-auto ${hasPayment ? 'text-success' : ''}"
                //                                 value="${formattedAmt}"
                //                                 ${hasPayment ? 'readonly' : ''}
                //                                 data-date="${dateStr}"
                //                                 data-loan-id="${id}" />
                //                         </td>
                //                         <td class="text-center">
                //                             <button class="btn btn-sm btn-success edit-btn" 
                //                                 ${!hasPayment ? 'style="display:none;"' : ''}>
                //                                 <i class="fas fa-edit"></i> Edit
                //                             </button>
                //                         </td>
                //                     </tr>
                //                 `;

                //                 rowIndex++;
                //                 current.setDate(current.getDate() + 1);
                //             }

                //             document.getElementById('fishPaymentTableBody').innerHTML = tableBody;
                //         },
                //         error: function (xhr, status, error) {
                //             console.error("Error loading payment history: " + error);
                //         }
                //     });
                // }

                // Helper function to format money
                function formatMoney(amount) {
                    return parseFloat(amount).toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                }

                function onRiceSelected(id, dateRange, startDate, dueDate, status, total_amt, balance, date_completed) {

                    globalRiceStartDate = startDate;
                    globalRiceEndDate = dueDate;

                    $('.rice-btn').html(dateRange);

                    $('.rice-start-date').text(formatDate(startDate));
                    $('.rice-due-date').text(formatDate(dueDate));
                    $('.rice-status').text(status || 'N/A');

                    if (total_amt) {
                        $('.rice-total-amt').text(parseFloat(total_amt).toFixed(2));
                    } else {
                        $('.rice-total-amt').text('0.00');
                    }

                    if (balance) {
                        $('.rice-running-balance').text(parseFloat(balance).toFixed(2));
                    } else {
                        $('.rice-running-balance').text('0.00');
                    }

                    if (status) {
                        var statusLower = status.toLowerCase();
                        $('.rice-status').removeClass('text-success text-danger text-warning');
                        if (statusLower === 'ongoing') {
                            $('.rice-status').addClass('text-warning');
                        } else if (statusLower === 'completed') {
                            $('.rice-status').addClass('text-success');
                        } else if (statusLower === 'overdue') {
                            $('.rice-status').addClass('text-danger');
                        }
                    }

                    $('#selected_rice_id').val(id);
                    $('#selected_rice_start').val(startDate);
                    $('#selected_rice_due').val(dueDate);
                    $('#selected_rice_total').val(total_amt);
                    $('#selected_rice_balance').val(balance);

                    $.ajax({
                        url: '<?php echo site_url('Monitoring_cont/get_rice_loan_details'); ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: { loan_id: id },
                        success: function (response) {
                            console.log(response);

                            $('.rice-transactions-body').empty();

                            if (response && response.length > 0) {

                                $.each(response, function (index, item) {
                                    var kg = item.qty;
                                    var price = parseFloat(item.price_per_kg).toFixed(2);
                                    var interest = parseFloat(item.interest).toFixed(2);
                                    var added = parseFloat(item.added_amt).toFixed(2);
                                    var subtotal = parseFloat(item.sub_total).toFixed(2);

                                    var sackType = item.sack_type ? item.sack_type : 'N/A';

                                    var row = '<tr>' +
                                        '<td>' + (item.rice_type || 'N/A') + '</td>' +
                                        '<td>' + sackType + '</td>' +
                                        '<td class="text-end">' + kg + '</td>' +
                                        '<td class="text-end">₱ ' + price + '</td>' +
                                        '<td class="text-end">' + interest + '%' + '</td>' +
                                        '<td class="text-end">₱ ' + added + '</td>' +
                                        '<td class="text-end">₱ ' + subtotal + '</td>' +
                                        '</tr>';

                                    $('.rice-transactions-body').append(row);
                                });

                            } else if (response && response.error) {
                                var errorRow = '<tr><td colspan="7" class="text-center text-danger">' + response.error + '</td></tr>';
                                $('.rice-transactions-body').append(errorRow);
                            } else {
                                var noDataRow = '<tr><td colspan="7" class="text-center">No rice transactions found</td></tr>';
                                $('.rice-transactions-body').append(noDataRow);
                            }

                            getPaymentHistoryRice(id, startDate, dueDate);

                        },
                        error: function (xhr, status, error) {
                            console.error("Error loading rice details: " + error);
                            var errorRow = '<tr><td colspan="7" class="text-center text-danger">Error loading data</td></tr>';
                            $('.rice-transactions-body').append(errorRow);
                        }
                    });

                }

                // function getPaymentHistoryRice(id, startDate, dueDate) {
                //     let start = new Date(startDate);
                //     let end = new Date(dueDate);

                //     $.ajax({
                //         url: '<?php echo site_url('Monitoring_cont/get_payment_history_rice'); ?>',
                //         type: 'POST',
                //         dataType: 'json',
                //         data: { loan_id: id },
                //         success: function (response) {
                //             // Create a map of payment dates to amounts
                //             let paymentMap = {};
                //             let totalPaid = 0;

                //             if (response && response.length > 0) {
                //                 response.forEach(function (payment) {
                //                     paymentMap[payment.payment_for] = payment.amt;
                //                     totalPaid += parseFloat(payment.amt);
                //                 });
                //             }

                //             // Get total loan amount
                //             let totalLoanAmount = parseFloat($('.rice-total-amt').text()) || 0;

                //             // Calculate running balance
                //             let runningBalance = totalLoanAmount - totalPaid;

                //             $('.rice-running-balance').text(formatMoney(runningBalance));
                //             $('#rice_total_payment').text(formatMoney(totalPaid));

                //             // Build the table with payment data
                //             let tableBody = '';
                //             let rowIndex = 1;
                //             let current = new Date(start);
                //             current.setDate(current.getDate() + 1);

                //             while (current <= end) {
                //                 let dateStr = current.toISOString().split('T')[0];

                //                 let paymentAmt = paymentMap[dateStr] || null;
                //                 let formattedAmt = paymentAmt || '';
                //                 let hasPayment = paymentAmt !== null;

                //                 tableBody += `
                //                     <tr>
                //                         <td class="text-center">${rowIndex}</td>
                //                         <td class="text-center">${current.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</td>
                //                         <td class="text-center">
                //                             <input type="text"
                //                                 class="form-control text-center form-control-sm payment-input w-50 mx-auto ${hasPayment ? 'text-success' : ''}"
                //                                 value="${formattedAmt}"
                //                                 ${hasPayment ? 'readonly' : ''}
                //                                 data-date="${dateStr}"
                //                                 data-loan-id="${id}" />
                //                         </td>
                //                         <td class="text-center">
                //                             <button class="btn btn-sm btn-success edit-btn" 
                //                                 ${!hasPayment ? 'style="display:none;"' : ''}>
                //                                 <i class="fas fa-edit"></i> Edit
                //                             </button>
                //                         </td>
                //                     </tr>
                //                 `;

                //                 rowIndex++;
                //                 current.setDate(current.getDate() + 1);
                //             }

                //             document.getElementById('ricePaymentTableBody').innerHTML = tableBody;

                //         },
                //         error: function (xhr, status, error) {
                //             console.error("Error loading payment history: " + error);
                //         }
                //     });
                // }

                // Clear both dropdowns
                $('.fish-dropdown').empty();
                $('.rice-dropdown').empty();

                // Variables to store ongoing records
                var ongoingFish = null;
                var ongoingRice = null;

                // Populate Fish Dropdown and find ongoing
                if (response.fish && response.fish.length > 0) {
                    $.each(response.fish, function (index, item) {
                        var startFormatted = formatDate(item.date_added);
                        var dueFormatted = formatDate(item.due_date);
                        var dateRange = startFormatted + ' - ' + dueFormatted;

                        var option = '<li><a class="dropdown-item" href="#" ' +
                            'data-id="' + item.id + '" ' +
                            'data-start="' + item.date_added + '" ' +
                            'data-due="' + item.due_date + '" ' +
                            'data-status="' + item.status + '" ' +
                            'data-total_amt="' + (item.total_amt || 0) + '" ' +  // Add this line
                            'data-date_completed="' + (item.date_completed || '') + '">' +  // Add this line
                            dateRange +
                            '</a></li>';

                        $('.fish-dropdown').append(option);

                        // Check if status is ongoing
                        if (item.status && item.status.toLowerCase() === 'ongoing') {
                            ongoingFish = { id: item.id, date_added: item.date_added, due_date: item.due_date, range: dateRange, status: item.status, total_amt: item.total_amt, date_completed: item.date_completed };
                        }
                    });

                    // Auto-select ongoing fish if found
                    if (ongoingFish) {
                        $('.fish-btn').html(ongoingFish.range);
                        // Call onFishSelected for auto-selected ongoing fish
                        onFishSelected(ongoingFish.id, ongoingFish.range, ongoingFish.date_added, ongoingFish.due_date, ongoingFish.status, ongoingFish.total_amt, ongoingFish.date_completed);
                    } else if (response.fish.length > 0) {
                        // If no ongoing, select the first one
                        var firstFish = response.fish[0];
                        var startFormatted = formatDate(firstFish.date_added);
                        var dueFormatted = formatDate(firstFish.due_date);
                        var dateRange = startFormatted + ' - ' + dueFormatted;
                        $('.fish-btn').html(dateRange);
                        // Call onFishSelected for auto-selected first fish
                        onFishSelected(firstFish.id, dateRange, firstFish.date_added, firstFish.due_date, firstFish.status, firstFish.total_amt, firstFish.date_completed);
                    }
                } else {
                    $('.fish-dropdown').append('<li><a class="dropdown-item disabled" href="#">No fish records</a></li>');
                }

                // Populate Rice Dropdown and find ongoing
                if (response.rice && response.rice.length > 0) {
                    $.each(response.rice, function (index, item) {
                        var startFormatted = formatDate(item.date_added);
                        var dueFormatted = formatDate(item.due_date);
                        var dateRange = startFormatted + ' - ' + dueFormatted;

                        var option = '<li><a class="dropdown-item" href="#" ' +
                            'data-id="' + item.id + '" ' +
                            'data-start="' + item.date_added + '" ' +
                            'data-due="' + item.due_date + '" ' +
                            'data-status="' + item.status + '" ' +
                            'data-total_amt="' + (item.total_amt || 0) + '" ' +  // Add this line
                            'data-date_completed="' + (item.date_completed || '') + '">' +  // Add this line
                            dateRange +
                            '</a></li>';

                        $('.rice-dropdown').append(option);

                        // Check if status is ongoing
                        if (item.status && item.status.toLowerCase() === 'ongoing') {
                            ongoingRice = { id: item.id, date_added: item.date_added, due_date: item.due_date, range: dateRange, status: item.status, total_amt: item.total_amt, date_completed: item.date_completed };
                        }
                    });

                    // Auto-select ongoing rice if found
                    if (ongoingRice) {
                        $('.rice-btn').html(ongoingRice.range);
                        // Call onRiceSelected for auto-selected ongoing rice
                        onRiceSelected(ongoingRice.id, ongoingRice.range, ongoingRice.date_added, ongoingRice.due_date, ongoingRice.status, ongoingRice.total_amt, ongoingRice.date_completed);
                    } else if (response.rice.length > 0) {
                        // If no ongoing, select the first one
                        var firstRice = response.rice[0];
                        var startFormatted = formatDate(firstRice.date_added);
                        var dueFormatted = formatDate(firstRice.due_date);
                        var dateRange = startFormatted + ' - ' + dueFormatted;
                        $('.rice-btn').html(dateRange);
                        // Call onRiceSelected for auto-selected first rice
                        onRiceSelected(firstRice.id, dateRange, firstRice.date_added, firstRice.due_date, firstRice.status, firstRice.total_amt, firstRice.date_completed);
                    }
                } else {
                    $('.rice-dropdown').append('<li><a class="dropdown-item disabled" href="#">No rice records</a></li>');
                }

                // Handle fish dropdown click
                $('.fish-dropdown .dropdown-item').on('click', function (e) {
                    e.preventDefault();
                    var dateRange = $(this).text();
                    var id = $(this).data('id');
                    var startDate = $(this).data('start');
                    var dueDate = $(this).data('due');
                    var status = $(this).data('status');
                    var total_amt = $(this).data('total_amt');
                    var date_completed = $(this).data('date_completed');

                    onFishSelected(id, dateRange, startDate, dueDate, status, total_amt, date_completed);
                });

                // Handle rice dropdown click
                $('.rice-dropdown .dropdown-item').on('click', function (e) {
                    e.preventDefault();
                    var dateRange = $(this).text();
                    var id = $(this).data('id');
                    var startDate = $(this).data('start');
                    var dueDate = $(this).data('due');
                    var status = $(this).data('status');
                    var total_amt = $(this).data('total_amt');
                    var date_completed = $(this).data('date_completed');

                    onRiceSelected(id, dateRange, startDate, dueDate, status, total_amt, date_completed);
                });
            },
            error: function () {
                Swal.fire('Error', 'Something went wrong.', 'error');
            }
        });

    }


    function getPaymentHistoryFish(id, startDate, dueDate) {

        let start = new Date(startDate);
        let end = new Date(dueDate);

        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/get_payment_history_fish'); ?>',
            type: 'POST',
            dataType: 'json',
            data: { loan_id: id },
            success: function (response) {
                // Create a map of payment dates to amounts
                let paymentMap = {};
                let totalPaid = 0;

                if (response && response.length > 0) {
                    response.forEach(function (payment) {
                        paymentMap[payment.payment_for] = payment.amt;
                        totalPaid += parseFloat(payment.amt);
                    });
                }

                // Get total loan amount
                let totalLoanAmount = parseFloat($('.fish-total-amt').text()) || 0;

                // Calculate running balance
                let runningBalance = totalLoanAmount - totalPaid;

                $('.fish-running-balance').text(formatMoney(runningBalance));

                $('#fish_total_payment').text(formatMoney(totalPaid));

                // Build the table with payment data
                let tableBody = '';
                let rowIndex = 1;
                let current = new Date(start);
                current.setDate(current.getDate() + 1);

                while (current <= end) {
                    let dateStr = current.toISOString().split('T')[0];

                    // Check if there's a payment for this date
                    let paymentAmt = paymentMap[dateStr] || null;
                    let hasPayment = paymentAmt !== null && parseFloat(paymentAmt) !== 0;

                    // Format the amount safely
                    let formattedAmt = '';
                    if (hasPayment) {
                        formattedAmt = parseFloat(paymentAmt).toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                    }

                    tableBody += `
                        <tr>
                            <td class="text-center">${rowIndex}</td>
                            <td class="text-center">${current.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</td>
                            <td class="text-center">
                                <input type="text"
                                    class="form-control text-center form-control-sm payment-input w-50 mx-auto ${hasPayment ? 'text-success' : ''}"
                                    value="${formattedAmt}"
                                    ${hasPayment ? 'readonly' : ''}
                                    data-date="${dateStr}"
                                    data-loan-id="${id}" />
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-success edit-btn" 
                                    ${!hasPayment ? 'style="display:none;"' : ''}>
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </td>
                        </tr>
                    `;

                    rowIndex++;
                    current.setDate(current.getDate() + 1);
                }

                document.getElementById('fishPaymentTableBody').innerHTML = tableBody;
            },
            error: function (xhr, status, error) {
                console.error("Error loading payment history: " + error);
            }
        });
    }

    function getPaymentHistoryRice(id, startDate, dueDate) {
        let start = new Date(startDate);
        let end = new Date(dueDate);

        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/get_payment_history_rice'); ?>',
            type: 'POST',
            dataType: 'json',
            data: { loan_id: id },
            success: function (response) {
                // Create a map of payment dates to amounts
                let paymentMap = {};
                let totalPaid = 0;

                if (response && response.length > 0) {
                    response.forEach(function (payment) {
                        paymentMap[payment.payment_for] = payment.amt;
                        totalPaid += parseFloat(payment.amt);
                    });
                }

                // Get total loan amount
                let totalLoanAmount = parseFloat($('.rice-total-amt').text()) || 0;

                // Calculate running balance
                let runningBalance = totalLoanAmount - totalPaid;

                $('.rice-running-balance').text(formatMoney(runningBalance));
                $('#rice_total_payment').text(formatMoney(totalPaid));

                // Build the table with payment data
                let tableBody = '';
                let rowIndex = 1;
                let current = new Date(start);
                current.setDate(current.getDate() + 1);

                while (current <= end) {
                    let dateStr = current.toISOString().split('T')[0];

                    let paymentAmt = paymentMap[dateStr] || null;
                    let hasPayment = paymentAmt !== null && parseFloat(paymentAmt) !== 0;
                    let formattedAmt = '';

                    if (hasPayment) {
                        formattedAmt = parseFloat(paymentAmt).toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                    }

                    tableBody += `
                        <tr>
                            <td class="text-center">${rowIndex}</td>
                            <td class="text-center">${current.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</td>
                            <td class="text-center">
                                <input type="text"
                                    class="form-control text-center form-control-sm payment-input w-50 mx-auto ${hasPayment ? 'text-success' : ''}"
                                    value="${formattedAmt}"
                                    ${hasPayment ? 'readonly' : ''}
                                    data-date="${dateStr}"
                                    data-loan-id="${id}" />
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-success edit-btn" 
                                    ${!hasPayment ? 'style="display:none;"' : ''}>
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </td>
                        </tr>
                    `;

                    rowIndex++;
                    current.setDate(current.getDate() + 1);
                }

                document.getElementById('ricePaymentTableBody').innerHTML = tableBody;

            },
            error: function (xhr, status, error) {
                console.error("Error loading payment history: " + error);
            }
        });
    }

    var fishDatabase = {};
    var riceDatabase = {};

    function openAddNewLoanModalFish() {
        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/get_fish_types'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response && response.length > 0) {
                    $.each(response, function (i, fish) {
                        fishDatabase[fish.id] = {
                            id: fish.id,
                            name: fish.fish_type,
                            price: fish.price_per_kg || 0,
                            qty: fish.rem_qty || 0
                        };
                    });
                    populateFishDropdowns();
                }
            },
            error: function (xhr, status, error) {
                console.error("Error loading fish types: " + error);
            }
        });

        $('#addLoanSameClientFish').modal('show');
    }

    function populateFishDropdowns() {
        $('.fish-type').each(function () {
            var select = $(this);
            var currentValue = select.val();
            select.empty();
            select.append('<option value="">Select Fish Type...</option>');

            $.each(fishDatabase, function (id, fish) {
                select.append('<option value="' + id + '">' + fish.name + ' (Available: ' + fish.qty + ')</option>');
            });

            if (currentValue) select.val(currentValue);
        });
    }

    function openAddNewLoanModalRice() {
        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/get_rice_types'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response && response.length > 0) {
                    // Store all rice types with their sack sizes
                    riceDatabase = {};

                    $.each(response, function (i, rice) {
                        // Create unique key with rice_type and sack_type
                        var uniqueKey = rice.rice_type + '_' + rice.sack_type;

                        riceDatabase[rice.id] = {
                            id: rice.id,
                            name: rice.rice_type,
                            sack_type: rice.sack_type,
                            display_name: rice.rice_type + ' (' + rice.sack_type + 'kg)',
                            price: rice.price_per_kg || 0,
                            qty: rice.rem_qty || 0
                        };
                    });

                    populateRiceDropdowns();
                }
            },
            error: function (xhr, status, error) {
                console.error("Error loading rice types: " + error);
            }
        });
        $('#addLoanSameClientRice').modal('show');
    }

    function populateRiceDropdowns() {
        $('.rice-type').each(function () {
            var select = $(this);
            var currentValue = select.val();
            select.empty();
            select.append('<option value="">Select Rice Type...</option>');

            var groupedRice = {};

            $.each(riceDatabase, function (id, rice) {
                if (!groupedRice[rice.name]) {
                    groupedRice[rice.name] = [];
                }
                groupedRice[rice.name].push({
                    id: id,
                    sack_type: rice.sack_type,
                    display_name: rice.display_name,
                    qty: rice.qty,
                    price: rice.price,
                    name: rice.name
                });
            });

            $.each(groupedRice, function (riceType, variants) {
                var optgroup = $('<optgroup>').attr('label', riceType);

                $.each(variants, function (i, variant) {
                    var option = $('<option>')
                        .val(variant.name)  // Use name as value
                        .text(variant.display_name + ' - ' + variant.sack_type + 'kg - Stock: ' + variant.qty)
                        .attr('data-price', variant.price)
                        .attr('data-sack-size', variant.sack_type)
                        .attr('data-rice-id', variant.id);

                    if (variant.qty <= 0) {
                        option.prop('disabled', true);
                        option.text(variant.display_name + ' - OUT OF STOCK');
                    }

                    optgroup.append(option);
                });

                select.append(optgroup);
            });

            if (currentValue) select.val(currentValue);
        });
    }

    $('#addFishItem').click(function () {

        var newItem = $('.fish-item:first').clone();
        newItem.find('input').val('');
        newItem.find('.fish-type').val('');
        newItem.find('.fish-qty').val('0');
        newItem.find('.fish-price').val('');
        newItem.find('.fish-interest').val('30');
        newItem.find('.fish-added-amt').val('0');
        newItem.find('.fish-subtotal').val('0.00');
        $('#fish-items-container').append(newItem);

        populateFishDropdowns();
    });

    $('#addRiceItem').click(function () {

        var newItem = $('.rice-item:first').clone();
        newItem.find('input').val('');
        newItem.find('.rice-type').val('');
        newItem.find('.rice-sack-size').val('25');
        newItem.find('.rice-qty').val('0');
        newItem.find('.rice-price').val('');
        newItem.find('.rice-interest').val('20');
        newItem.find('.rice-added-amt').val('0');
        newItem.find('.rice-subtotal').val('0.00');
        $('#rice-items-container').append(newItem);

        populateRiceDropdowns();
    });

    $(document).on('click', '.remove-fish-item', function () {
        if ($('.fish-item').length > 1) {
            $(this).closest('.fish-item').remove();
            calculateFishGrandTotal();
        } else {
            alert('At least one item is required');
        }
    });

    $(document).on('click', '.remove-rice-item', function () {
        if ($('.rice-item').length > 1) {
            $(this).closest('.rice-item').remove();
            calculateRiceGrandTotal();
        } else {
            alert('At least one item is required');
        }
    });

    $(document).on('input', '.fish-qty, .fish-price, .fish-interest, .fish-added-amt', function () {
        var item = $(this).closest('.fish-item');
        calculateFishSubtotal(item);
        calculateFishGrandTotal();
    });

    $(document).on('input', '.rice-qty, .rice-price, .rice-interest, .rice-added-amt', function () {
        var item = $(this).closest('.rice-item');
        calculateRiceSubtotal(item);
        calculateRiceGrandTotal();
    });

    $(document).on('change', '.fish-type', function () {
        var select = $(this);
        var fishId = select.val();
        var item = select.closest('.fish-item');
        var priceField = item.find('.fish-price');

        if (fishId && fishDatabase[fishId]) {
            priceField.val(fishDatabase[fishId].price);
            priceField.trigger('input');
        }
    });

    $(document).on('change', '.rice-type', function () {
        var option = $(this).find('option:selected');
        var item = $(this).closest('.rice-item');

        item.find('.rice-price').val(option.data('price') || '');
        item.find('.rice-id-hidden').val(option.data('rice-id') || '');

        item.find('.rice-price').trigger('input');
    });

    $(document).on('change', '.rice-sack-size', function () {
        var item = $(this).closest('.rice-item');
        calculateRiceSubtotal(item);
        calculateRiceGrandTotal();
    });

    function calculateFishSubtotal(item) {
        var qty = parseFloat(item.find('.fish-qty').val()) || 0;
        var price = parseFloat(item.find('.fish-price').val()) || 0;
        var interestRate = parseFloat(item.find('.fish-interest').val()) || 0;
        var addedAmt = parseFloat(item.find('.fish-added-amt').val()) || 0;

        var subtotalWithoutInterest = qty * price;
        var interestAmount = subtotalWithoutInterest * (interestRate / 100);
        var subtotal = subtotalWithoutInterest + interestAmount + addedAmt;

        item.find('.fish-subtotal').val(subtotal.toFixed(2));
    }

    function calculateFishGrandTotal() {
        var grandTotal = 0;
        $('.fish-subtotal').each(function () {
            grandTotal += parseFloat($(this).val()) || 0;
        });
        $('#fishGrandTotal').text(grandTotal.toFixed(2));
    }

    function calculateRiceSubtotal(item) {
        var qty = parseFloat(item.find('.rice-qty').val()) || 0;
        var sackSize = parseFloat(item.find('.rice-sack-size').val()) || 0;
        var pricePerKg = parseFloat(item.find('.rice-price').val()) || 0;
        var interestRate = parseFloat(item.find('.rice-interest').val()) || 0;
        var addedAmt = parseFloat(item.find('.rice-added-amt').val()) || 0;

        var totalKg = qty * sackSize;
        var baseAmount = totalKg * pricePerKg;

        var subtotal = baseAmount + (baseAmount * (interestRate / 100)) + addedAmt;

        item.find('.rice-subtotal').val(subtotal.toFixed(2));
    }

    function calculateRiceGrandTotal() {
        var grandTotal = 0;
        $('.rice-subtotal').each(function () {
            grandTotal += parseFloat($(this).val()) || 0;
        });
        $('#riceGrandTotal').text(grandTotal.toFixed(2));
    }

    $('#addDriedFishLoanBtn').click(function () {

        let clientId = globalClientId

        if (!clientId) {
            Swal.fire({
                icon: 'error',
                title: 'Missing Information',
                text: 'Client information is missing. Please select a client first.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        let transactionDate = document.getElementById('fish_trans_date').value;

        if (!transactionDate) {
            Swal.fire({
                icon: 'error',
                title: 'Missing Date',
                text: 'Please select transaction date.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        // Collect all fish items
        let fishItems = [];
        let fishItemRows = document.querySelectorAll('#fish-items-container .fish-item');

        if (fishItemRows.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'No Items',
                text: 'Please add at least one fish item.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        // Loop through each fish item
        let isValid = true;
        fishItemRows.forEach(function (row, index) {
            let fishType = row.querySelector('.fish-type').value;
            let qty = row.querySelector('.fish-qty').value;
            let price = row.querySelector('.fish-price').value;
            let interest = row.querySelector('.fish-interest').value;
            let addedAmt = row.querySelector('.fish-added-amt').value;
            let subtotal = row.querySelector('.fish-subtotal').value;

            // Validate required fields
            if (!fishType) {
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Fish Type',
                    text: `Please select fish type for item ${index + 1}.`,
                    confirmButtonColor: '#3085d6'
                });
                isValid = false;
                return;
            }

            if (parseFloat(qty) <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Quantity',
                    text: `Please enter valid quantity for item ${index + 1}.`,
                    confirmButtonColor: '#3085d6'
                });
                isValid = false;
                return;
            }

            fishItems.push({
                fish_type: fishType,
                quantity: qty,
                price_per_kg: price,
                interest_rate: interest,
                added_amount: addedAmt,
                subtotal: subtotal
            });
        });

        if (!isValid) {
            return;
        }

        // Get grand total
        let grandTotal = document.getElementById('fishGrandTotal').innerText;

        // Prepare data for submission
        let formData = {
            client_id: clientId,
            transaction_date: transactionDate,
            loan_type: 'dried_fish',
            items: fishItems,
            grand_total: grandTotal,
            status: 'active'
        };

        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/save_dried_fish_loan'); ?>',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Dried fish loan has been saved successfully.',
                        confirmButtonColor: '#3085d6'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#addLoanSameClientFish').modal('hide');

                            resetDriedFishForm();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response.message || 'Failed to save loan. Please try again.',
                        confirmButtonColor: '#3085d6'
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error saving loan:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An error occurred while saving. Please try again.',
                    confirmButtonColor: '#3085d6'
                });
            }
        });
    });

    function resetDriedFishForm() {
        let container = document.getElementById('fish-items-container');
        let fishItems = container.querySelectorAll('.fish-item');

        for (let i = fishItems.length - 1; i > 0; i--) {
            fishItems[i].remove();
        }

        let firstItem = container.querySelector('.fish-item');
        if (firstItem) {
            firstItem.querySelector('.fish-type').value = '';
            firstItem.querySelector('.fish-qty').value = '0';
            firstItem.querySelector('.fish-price').value = '0';
            firstItem.querySelector('.fish-interest').value = '30';
            firstItem.querySelector('.fish-added-amt').value = '0';
            firstItem.querySelector('.fish-subtotal').value = '0.00';
        }

        document.getElementById('fishGrandTotal').innerText = '0.00';

        let today = new Date().toISOString().split('T')[0];
        document.getElementById('fish_trans_date').value = today;

    }

    $('#addRiceLoanBtn').click(function () {
        let clientId = globalClientId;

        if (!clientId) {
            Swal.fire({
                icon: 'error',
                title: 'Missing Information',
                text: 'Client information is missing. Please select a client first.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        let transactionDate = document.getElementById('rice_trans_date').value;

        if (!transactionDate) {
            Swal.fire({
                icon: 'error',
                title: 'Missing Date',
                text: 'Please select transaction date.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        // Collect all rice items
        let riceItems = [];
        let riceItemRows = document.querySelectorAll('#rice-items-container .rice-item');

        if (riceItemRows.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'No Items',
                text: 'Please add at least one rice item.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        // Loop through each rice item
        let isValid = true;
        riceItemRows.forEach(function (row, index) {
            let riceType = row.querySelector('.rice-type').value;
            let sackSize = row.querySelector('.rice-sack-size').value;
            let qtySacks = row.querySelector('.rice-qty').value;
            let pricePerKg = row.querySelector('.rice-price').value;
            let interest = row.querySelector('.rice-interest').value;
            let addedAmt = row.querySelector('.rice-added-amt').value;
            let subtotal = row.querySelector('.rice-subtotal').value;

            // Validate required fields
            if (!riceType) {
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Rice Type',
                    text: `Please select rice type for item ${index + 1}.`,
                    confirmButtonColor: '#3085d6'
                });
                isValid = false;
                return;
            }

            if (parseFloat(qtySacks) <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Quantity',
                    text: `Please enter valid quantity (sacks) for item ${index + 1}.`,
                    confirmButtonColor: '#3085d6'
                });
                isValid = false;
                return;
            }

            if (parseFloat(pricePerKg) <= 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Price',
                    text: `Please enter valid price per KG for item ${index + 1}.`,
                    confirmButtonColor: '#3085d6'
                });
                isValid = false;
                return;
            }

            // Calculate total KG (sack size * quantity of sacks)
            let totalKg = parseFloat(sackSize) * parseFloat(qtySacks);

            riceItems.push({
                rice_type: riceType,
                sack_size: sackSize,
                quantity_sacks: qtySacks,
                total_kg: totalKg,
                price_per_kg: pricePerKg,
                interest_rate: interest,
                added_amount: addedAmt,
                subtotal: subtotal
            });
        });

        if (!isValid) {
            return;
        }

        // Get grand total
        let grandTotal = document.getElementById('riceGrandTotal').innerText;

        // Show loading indicator
        Swal.fire({
            title: 'Processing...',
            text: 'Please wait while we save the loan information.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Prepare data for submission
        let formData = {
            client_id: clientId,
            transaction_date: transactionDate,
            items: riceItems,
            grand_total: grandTotal,
        };

        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/save_rice_loan'); ?>',
            type: 'POST',
            dataType: 'json',
            data: formData,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Rice loan has been saved successfully.',
                        confirmButtonColor: '#3085d6'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#addLoanSameClientRice').modal('hide');
                            resetRiceForm();
                            // Reload page or refresh table
                            location.reload();
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response.message || 'Failed to save loan. Please try again.',
                        confirmButtonColor: '#3085d6'
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error saving loan:', error);
                let errorMessage = 'An error occurred while saving. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: errorMessage,
                    confirmButtonColor: '#3085d6'
                });
            }
        });
    });

    // Reset Rice Form function
    function resetRiceForm() {
        // Clear all rice items except the first one
        let container = document.getElementById('rice-items-container');
        let riceItems = container.querySelectorAll('.rice-item');

        // Keep only the first item and remove others
        for (let i = riceItems.length - 1; i > 0; i--) {
            riceItems[i].remove();
        }

        // Reset first item values
        let firstItem = container.querySelector('.rice-item');
        if (firstItem) {
            firstItem.querySelector('.rice-type').value = '';
            firstItem.querySelector('.rice-sack-size').value = '25';
            firstItem.querySelector('.rice-qty').value = '0';
            firstItem.querySelector('.rice-price').value = '0';
            firstItem.querySelector('.rice-interest').value = '20';
            firstItem.querySelector('.rice-added-amt').value = '0';
            firstItem.querySelector('.rice-subtotal').value = '0.00';
        }

        // Reset grand total
        document.getElementById('riceGrandTotal').innerText = '0.00';

        // Reset transaction date to today
        let today = new Date().toISOString().split('T')[0];
        document.getElementById('rice_trans_date').value = today;
    }


    $(document).on('keypress', '.payment-input', function (e) {
        if (e.which === 13) {
            e.preventDefault();

            const cl_id = $('#header_id').val();
            const acc_no = $('#header_acc_no').text();
            const fullname = $('#header_name').text();
            const address = $('#header_address').text();

            const fish_running_bal = $('.fish-running-balance').text();
            const rice_running_bal = $('.rice-running-balance').text();

            let status = "";

            let input = $(this);
            let payment = input.val().trim();

            let loan_id = input.data('loan-id');
            const paymentType = $('#current_loan_type').val();

            let paymentAmount = parseFloat(payment);
            let balanceAmount = 0;

            if (paymentType === "fish") {
                balanceAmount = parseFloat(fish_running_bal.replace(/,/g, ''));
                status = $('.fish-status').text();
            } else {
                balanceAmount = parseFloat(rice_running_bal.replace(/,/g, ''));
                status = $('.rice-status').text();
            }

            // if (isNaN(paymentAmount) || paymentAmount <= 0) {
            //     Swal.fire('Error', 'Please enter a valid payment amount', 'error');
            //     return;
            // }

            // if (paymentAmount > balanceAmount) {
            //     Swal.fire('Error', 'Payment cannot exceed running balance of ₱ ' + formatMoney(balanceAmount), 'error');
            //     return;
            // }

            // Get date from the row
            let row = input.closest('tr');
            let textDate = row.find('td:eq(1)').text().trim();

            // Parse date properly
            let parsed = new Date(textDate);
            if (isNaN(parsed.getTime())) {
                // If parsing fails, try alternative format
                parsed = new Date(textDate.replace(/(\w+)\s(\d+),\s(\d+)/, '$1 $2 $3'));
            }

            let yyyy = parsed.getFullYear();
            let mm = String(parsed.getMonth() + 1).padStart(2, '0');
            let dd = String(parsed.getDate()).padStart(2, '0');
            let payment_for = `${yyyy}-${mm}-${dd}`;

            Swal.fire({
                title: 'Confirm Payment',
                html: `
                <div class="text-center">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Payment Date</label>
                        <input type="date"
                            id="swal_payment_date"
                            class="form-control w-75 mx-auto text-center"
                            value="${new Date().toISOString().split('T')[0]}">
                    </div>
                    <div class="mb-2">
                        <strong>Payment For:</strong> ${textDate}
                    </div>
                    <div class="mb-2">
                        <strong>Amount:</strong> ₱ ${formatMoney(paymentAmount)}
                    </div>
                    <div class="mb-2">
                        <strong>Running Balance:</strong> ₱ ${formatMoney(balanceAmount - paymentAmount)}
                    </div>
                </div>
            `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Confirm Payment',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#3085d6',
                preConfirm: () => {
                    const selectedDate = document.getElementById('swal_payment_date').value;
                    if (!selectedDate) {
                        Swal.showValidationMessage('Please select payment date');
                        return false;
                    }
                    if (new Date(selectedDate) > new Date()) {
                        Swal.showValidationMessage('Payment date cannot be in the future');
                        return false;
                    }
                    return selectedDate;
                }
            }).then((result) => {
                if (!result.isConfirmed) return;

                // Show loading
                Swal.fire({
                    title: 'Processing...',
                    text: 'Saving payment',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "<?php echo base_url('Monitoring_cont/save_payment'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        trans_id: loan_id,
                        payment_for: payment_for,
                        payment_date: result.value,
                        amount: paymentAmount,
                        type: paymentType
                    },
                    success: function (res) {
                        if (res.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Payment Saved',
                                text: 'Payment has been recorded successfully',
                                confirmButtonColor: '#3085d6'
                            }).then(() => {
                                // Make input readonly
                                input.prop('readonly', true);
                                input.addClass('text-success');

                                // Refresh the view
                                refreshLoanViewAfterPayment(loan_id, paymentType);

                                updateTotalPaidDisplay(paymentAmount, paymentType, loan_id, payment_for, status);
                            });
                        } else {
                            Swal.fire('Error', res.message || 'Failed to save payment', 'error');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        Swal.fire('Error', 'An error occurred while saving payment', 'error');
                    }
                });
            });
        }
    });

    // Helper function to format money
    function formatMoney(amount) {
        return parseFloat(amount).toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    // Function to refresh loan view after payment
    function refreshLoanViewAfterPayment(loan_id, paymentType) {
        if (paymentType === 'fish') {
            // Refresh fish loan details
            getFishLoanDetails(loan_id);
        } else {
            // Refresh rice loan details
            getRiceLoanDetails(loan_id);
        }
    }

    let globalFishStartDate = "";
    let globalFishEndDate = "";
    let globalRiceStartDate = "";
    let globalRiceEndDate = "";

    // Example functions to refresh loan details
    function getFishLoanDetails(loan_id) {
        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/get_fish_loan_details'); ?>',
            type: 'POST',
            dataType: 'json',
            data: { loan_id: loan_id },
            success: function (response) {
                if (response.success) {
                    console.log('response', response);

                    // Refresh payment history table
                    getPaymentHistoryFish(loan_id, response.date_added, response.due_date);
                }
            }
        });
    }

    function getRiceLoanDetails(loan_id) {
        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/get_rice_loan_details'); ?>',
            type: 'POST',
            dataType: 'json',
            data: { loan_id: loan_id },
            success: function (response) {
                if (response.success) {
                    console.log('response', response);
                    // Update UI with new balance
                    $('#riceGrandTotal').text(response.balance);

                    // Store rice dates globally
                    globalRiceStartDate = response.date_added;
                    globalRiceEndDate = response.due_date;

                    // Refresh payment history table
                    getPaymentHistoryRice(loan_id, response.date_added, response.due_date);
                }
            }
        });
    }

    function updateTotalPaidDisplay(amount, type, loan_id, payment_for, status) {
        const isFish = type === 'fish';
        const totalPaidSelector = isFish ? '#fish_total_payment' : '#rice_total_payment';
        const balanceSelector = isFish ? '.fish-running-balance' : '.rice-running-balance';

        let currentTotalPaid = parseFloat($(totalPaidSelector).text().replace(/,/g, '')) || 0;
        let currentBalance = parseFloat($(balanceSelector).text().replace(/,/g, '')) || 0;

        // Just add the new payment amount
        let totalPaid = currentTotalPaid + parseFloat(amount);
        let updatedBalance = currentBalance - parseFloat(amount);

        $(totalPaidSelector).text(formatMoney(totalPaid));
        $(balanceSelector).text(formatMoney(updatedBalance));

        console.log(globalFishStartDate);
        console.log(globalFishEndDate);
        console.log(globalRiceStartDate);
        console.log(globalRiceEndDate);

        if (isFish) {
            if (globalFishStartDate && globalFishEndDate) {
                getPaymentHistoryFish(loan_id, globalFishStartDate, globalFishEndDate);
            } else {
                getFishLoanDetails(loan_id);
            }
        } else {
            if (globalRiceStartDate && globalRiceEndDate) {
                getPaymentHistoryRice(loan_id, globalRiceStartDate, globalRiceEndDate);
            } else {
                getRiceLoanDetails(loan_id);
            }
        }

        // Auto-complete logic
        if (updatedBalance <= 0 && status !== 'completed') {
            autoCompleteLoan(loan_id, type, payment_for, "completed");
        } else if (updatedBalance > 0 && status === 'completed') {
            autoCompleteLoan(loan_id, type, payment_for, "ongoing");
        }
    }

    function autoCompleteLoan(loan_id, type, payment_for, status) {

        $.ajax({
            url: "<?php echo base_url('Monitoring_cont/auto_complete_payment'); ?>",
            type: "POST",
            dataType: "json",
            data: {
                loan_id: loan_id,
                type: type,
                payment_for: payment_for,
                status: status
            },
            success: function (res) {
                if (res.success) {
                    let status = res.status; // Get status from response
                    let statusUpper = status.toUpperCase();

                    if (type === "fish") {
                        $('.fish-status').removeClass('text-success text-danger text-warning');

                        if (statusUpper === 'COMPLETED') {
                            $('.fish-status').addClass('text-success');
                        } else if (statusUpper === 'ONGOING') {
                            $('.fish-status').addClass('text-warning');
                        } else if (statusUpper === 'OVERDUE') {
                            $('.fish-status').addClass('text-danger');
                        }

                        $('.fish-status').text(statusUpper);
                    } else {
                        $('.rice-status').removeClass('text-success text-danger text-warning');

                        if (statusUpper === 'COMPLETED') {
                            $('.rice-status').addClass('text-success');
                        } else if (statusUpper === 'ONGOING') {
                            $('.rice-status').addClass('text-warning');
                        } else if (statusUpper === 'OVERDUE') {
                            $('.rice-status').addClass('text-danger');
                        }

                        $('.rice-status').text(statusUpper);
                    }
                }
            }
        });
    }

    $(document).on('click', '.edit-btn', function () {
        globalEditBtn = true;

        let btn = $(this);
        let row = btn.closest('tr');
        let input = row.find('.payment-input');

        if (btn.text().trim() === 'Edit') {
            input.prop('readonly', false);
            input.removeClass('text-success');
            input.focus();

            btn.removeClass('btn-success').addClass('btn-danger');
            btn.html('<i class="fas fa-times"></i> Cancel');
        } else {
            input.prop('readonly', true);
            if (input.val()) input.addClass('text-success');

            btn.removeClass('btn-danger').addClass('btn-success');
            btn.html('<i class="fas fa-edit"></i> Edit');
        }
    });

</script>