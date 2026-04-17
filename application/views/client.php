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
                    <!-- Header -->
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-file-invoice me-2 text-primary"></i>
                            Loan Details
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body px-3 pb-0">
                        <div class="container-fluid px-0">
                            <div class="card border-0 shadow-sm rounded-3">
                                <div class="card-body pb-0 pt-0">
                                    <!-- Client Details - 3 Columns with Icons -->
                                    <div class="row mb-0">
                                        <div class="col-4">
                                            <div class="mb-2">
                                                <div class="text-muted small"><i class="fas fa-hashtag me-1"></i>
                                                    Account Number</div>
                                                <span class="fw-bold fs-6" id="header_acc_no"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-2">
                                                <div class="text-muted small"><i class="fas fa-user me-1"></i> Full Name
                                                </div>
                                                <span class="fw-bold fs-6" id="header_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-2">
                                                <div class="text-muted small"><i class="fas fa-map-marker-alt me-1"></i>
                                                    Address</div>
                                                <span class="fw-bold fs-6" id="header_address"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabs -->
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

                                    <!-- DRIED FISH TAB CONTENT -->
                                    <div id="view-fish-tab" class="loan-tab-content active">
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
                                                <!-- Date Filter Dropdown -->
                                                <div class="dropdown" style="width: 167px;">
                                                    <button
                                                        class="btn btn-sm btn-outline-secondary dropdown-toggle w-100 text-start"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                        style="height: 30px;">
                                                        <i class="fas fa-filter me-1"></i> Select Date Range
                                                    </button>
                                                    <ul class="dropdown-menu fish-date-arr"
                                                        style="max-height: 200px; overflow-y: auto; z-index: 9999;">
                                                        <!-- Options will be appended here -->
                                                    </ul>
                                                </div>

                                                <!-- Edit Button -->
                                                <button class="btn btn-sm btn-success edit-loan-btn" data-type="fish">
                                                    <i class="fas fa-edit me-1"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger cancel-edit-btn" data-type="fish"
                                                    style="display: none;">
                                                    <i class="fas fa-times me-1"></i> Cancel
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="my-0">

                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <div class="mb-1">
                                                    <div class="text-muted small"><i
                                                            class="far fa-calendar-alt me-1"></i>
                                                        Start Date</div>
                                                    <span class="fw-bold fish-start-date"></span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-1">
                                                    <div class="text-muted small"><i
                                                            class="far fa-calendar-check me-1"></i>
                                                        Due Date</div>
                                                    <span class="fw-bold fish-due-date"></span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-2">
                                                    <div class="text-muted small"><i
                                                            class="fas fa-file-invoice me-1"></i>
                                                        Total Amount</div>
                                                    <span class="fw-bold text-success">₱ <span
                                                            class="fish-total-amt"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-2">
                                                    <div class="text-muted small"><i class="fas fa-chart-line me-1"></i>
                                                        Running Balance</div>
                                                    <span class="fw-bold text-danger">₱ <span
                                                            class="fish-running-balance"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-2">
                                                    <div class="text-muted small"><i
                                                            class="fas fa-check-circle me-1"></i>
                                                        Status / <i class="far fa-calendar-check me-1"></i> Date
                                                        Completed
                                                    </div>
                                                    <span class="fw-bold text-success">
                                                        <span class="fish-status"></span>
                                                        <span class="fish-date-completed"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Fish Transactions Table -->
                                        <div class="table-responsive mt-1">
                                            <table class="table table-sm table-bordered">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Fish Type</th>
                                                        <th>Quantity (KG)</th>
                                                        <th>Price/KG</th>
                                                        <th>Interest</th>
                                                        <th>Added Amount</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="fish-transactions-body">
                                                    <tr>
                                                        <td colspan="5" class="text-center">No transactions found</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- RICE TAB CONTENT -->
                                    <div id="view-rice-tab" class="loan-tab-content" style="display: none;">
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
                                                <!-- Date Filter Dropdown -->
                                                <div class="dropdown" style="width: 167px;">
                                                    <button
                                                        class="btn btn-sm btn-outline-secondary dropdown-toggle w-100 text-start"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                        style="height: 30px;">
                                                        <i class="fas fa-filter me-1"></i> Select Date Range
                                                    </button>
                                                    <ul class="dropdown-menu rice-date-arr"
                                                        style="max-height: 200px; overflow-y: auto; z-index: 9999;">
                                                        <!-- Options will be appended here -->
                                                    </ul>
                                                </div>

                                                <!-- Edit Button -->
                                                <button class="btn btn-sm btn-success edit-loan-btn" data-type="rice">
                                                    <i class="fas fa-edit me-1"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger cancel-edit-btn" data-type="rice"
                                                    style="display: none;">
                                                    <i class="fas fa-times me-1"></i> Cancel
                                                </button>
                                            </div>
                                        </div>
                                        <hr class="my-0">

                                        <!-- First Row - Dates and Amounts -->
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <div class="mb-1">
                                                    <div class="text-muted small"><i
                                                            class="far fa-calendar-alt me-1"></i>
                                                        Start Date</div>
                                                    <span class="fw-bold rice-start-date"></span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-1">
                                                    <div class="text-muted small"><i
                                                            class="far fa-calendar-check me-1"></i>
                                                        Due Date</div>
                                                    <span class="fw-bold rice-due-date"></span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="mb-2">
                                                    <div class="text-muted small"><i
                                                            class="fas fa-file-invoice me-1"></i>
                                                        Total Amount</div>
                                                    <span class="fw-bold text-success">₱ <span
                                                            class="rice-total-amt"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-2">
                                                    <div class="text-muted small"><i class="fas fa-chart-line me-1"></i>
                                                        Running Balance</div>
                                                    <span class="fw-bold text-danger">₱ <span
                                                            class="rice-running-balance"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-2">
                                                    <div class="text-muted small"><i
                                                            class="fas fa-check-circle me-1"></i>
                                                        Status / <i class="far fa-calendar-check me-1"></i> Date
                                                        Completed
                                                    </div>
                                                    <span class="fw-bold text-success">
                                                        <span class="rice-status"></span>
                                                        <span class="rice-date-completed"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Rice Transactions Table -->
                                        <div class="table-responsive mt-1">
                                            <table class="table table-sm table-bordered">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>Rice Type</th>
                                                        <th>Sack Size</th>
                                                        <th>Quantity (Sacks)</th>
                                                        <th>Price/KG</th>
                                                        <th>Interest</th>
                                                        <th>Added Amount</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="rice-transactions-body">
                                                    <tr>
                                                        <td colspan="7" class="text-center">No transactions found</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Table Section (Common for both tabs) -->
                    <div class="px-3 pb-3">
                        <div class="table-responsive"
                            style="max-height: 365px; overflow-y: auto; border: 1px solid #dee2e6; border-radius: 8px;">
                            <table id="payment_table" class="table table-sm table-hover mb-0">
                                <thead class="table-light sticky-top"
                                    style="background-color:var(--light-grey); font-size:13px; color:var(--dark); height:40px; vertical-align: middle;">
                                    <tr>
                                        <th class="text-center"
                                            style="width:10%; background-color:var(--dark); color:var(--light); font-weight: bold;">
                                            #
                                        </th>
                                        <th class="text-center"
                                            style="width:30%; background-color:var(--dark); color:var(--light); font-weight: bold;">
                                            DATE
                                        </th>
                                        <th class="text-center"
                                            style="width:30%; background-color:var(--dark); color:var(--light); font-weight: bold;">
                                            PAYMENT
                                        </th>
                                        <th class="text-center"
                                            style="width:30%; background-color:var(--dark); color:var(--light); font-weight: bold;">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="paymentTableBody">
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">
                                            <i class="fas fa-inbox fa-2x mb-2"></i><br>
                                            No payment records found
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center w-100 pt-3">
                            <div style="width: 50px;"></div>

                            <div class="text-center">
                                <span class="text-muted me-2">Total Payments:</span>
                                <span class="fw-bold text-primary fs-5">₱ <span id="total_payment">0.00</span></span>
                            </div>

                            <div>
                                <button type="button" id="addNewLoan" class="btn btn-primary me-2"
                                    onclick="openAddNewLoanModal()">
                                    <i class="fas fa-plus me-1"></i> New Credit
                                </button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-1"></i> Close
                                </button>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="header_id">
                    <input type="hidden" id="header_loan_id">
                    <input type="hidden" id="current_loan_type" value="fish">
                </div>
            </div>
        </div>
        <!-- VIEW MODAL -->

        <!-- OVERDUE -->
        <div class="modal fade" id="overdueModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog" style="max-width:600px; margin-top:10px">
                <div class="modal-content">
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-exclamation-triangle me-2 text-danger"></i>
                            Overdue Loan Processing
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body pb-0">
                        <div class="container p-0">
                            <!-- Overdue Details Card -->
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-header bg-white border-0">
                                    <h6 class="fw-bold mb-0">
                                        <i class="fas fa-calculator me-2 text-danger"></i>
                                        Overdue Loan Details
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Capital Amount -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-muted small mb-2">
                                                <i class="fas fa-coins me-1"></i> CAPITAL AMOUNT
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                <input id="new_capital_amt" type="number"
                                                    class="form-control form-control-lg" placeholder="0.00" min="0"
                                                    step="0.01" />
                                            </div>
                                        </div>

                                        <!-- Interest Rate -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-muted small mb-2">
                                                <i class="fas fa-percent me-1"></i> INTEREST RATE
                                            </label>
                                            <div class="input-group">
                                                <input id="new_interest" type="number"
                                                    class="form-control form-control-lg" value="15" min="0"
                                                    step="0.1" />
                                                <span class="input-group-text bg-light border-0">%</span>
                                            </div>
                                        </div>

                                        <!-- Added Amount -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-muted small mb-2">
                                                <i class="fas fa-plus-circle me-1"></i> ADDED AMOUNT
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                <input id="new_added_amt" type="number"
                                                    class="form-control form-control-lg" placeholder="0.00" min="0"
                                                    step="0.01" />
                                            </div>
                                        </div>

                                        <!-- Total Amount -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-muted small mb-2">
                                                <i class="fas fa-calculator me-1"></i> TOTAL AMOUNT
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                <input id="new_total_amt" type="text"
                                                    class="form-control form-control-lg fw-bold text-success" readonly
                                                    style="background-color: #f8f9fa;" />
                                            </div>
                                            <small class="text-muted">Capital + Interest + Added Amount</small>
                                        </div>

                                        <!-- New Start Date -->
                                        <div class="col-md-12">
                                            <label class="form-label fw-bold text-muted small mb-2">
                                                <i class="fas fa-calendar-alt me-1"></i> NEW START DATE
                                            </label>
                                            <input id="new_start_date" type="date"
                                                class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-danger" id="modalContinueBtn">
                            <i class="fas fa-check-circle me-1"></i> Continue
                        </button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- OVERDUE -->

        <!-- ADD LOAN SAME CLIENT -->
        <div class="modal fade" id="addLoanSameClient" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog" style="max-width:900px; margin-top:10px">
                <div class="modal-content">
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-hand-holding-usd me-2 text-success"></i>
                            New Credit for Existing Client
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body pb-0">
                        <div class="container p-0">
                            <!-- Loan Details Card -->
                            <div class="card border-0 shadow-sm rounded-4">

                                <div class="head-title mt-0 mb-2">
                                    <ul class="breadcrumb nav-tabs-custom row">
                                        <li>
                                            <a class="col-6 tab-link active"
                                                style="border-radius: 5px 0 0 5px; cursor: pointer;"
                                                data-tab="fish">DRIED FISH</a>
                                        </li>
                                        <li>
                                            <a class="col-6 tab-link"
                                                style="border-radius: 0 5px 5px 0; cursor: pointer;"
                                                data-tab="rice">RICE</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- DRIED FISH TAB CONTENT -->
                                <div id="fish-tab" class="tab-content active">
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
                                                    <select class="form-select fish-type" id="fish_type_select"
                                                        data-price-field="fish_price">
                                                        <option value="">Select Fish Type...</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label fw-bold text-muted small mb-2">
                                                        <i class="fas fa-weight-hanging me-1"></i> QTY (KG)
                                                    </label>
                                                    <input type="number" class="form-control fish-qty"
                                                        placeholder="0.00" min="0" step="0.01" value="0" />
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label fw-bold text-muted small mb-2">
                                                        <i class="fas fa-tag me-1"></i> PRICE/KG
                                                    </label>
                                                    <div class="input-group">
                                                        <span
                                                            class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                        <input type="number" class="form-control fish-price"
                                                            placeholder="0.00" min="0" step="0.01" value="0" />
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label fw-bold text-muted small mb-2">
                                                        <i class="fas fa-percentage  me-1"></i> INTEREST
                                                    </label>
                                                    <div class="input-group">
                                                        <span
                                                            class="input-group-text bg-light border-0 fw-bold">%</span>
                                                        <input type="number" class="form-control fish-interest"
                                                            placeholder="0.00" min="0" step="0.01" value="30" />
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label fw-bold text-muted small mb-2">
                                                        <i class="fas fa-plus-circle me-1"></i> ADDED AMOUNT
                                                    </label>
                                                    <div class="input-group">
                                                        <span
                                                            class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                        <input type="number" class="form-control fish-added-amt"
                                                            placeholder="0.00" min="0" step="0.01" value="0" />
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label fw-bold text-muted small mb-2">
                                                        <i class="fas fa-calculator me-1"></i> SUBTOTAL
                                                    </label>
                                                    <div class="input-group">
                                                        <span
                                                            class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                        <input type="text"
                                                            class="form-control fish-subtotal fw-bold text-success"
                                                            readonly style="background-color: #f8f9fa;" value="0.00" />
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
                                        <div class="row mt-0">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-calendar-alt me-1"></i> TRANSACTION DATE
                                                </label>
                                                <input id="fish_trans_date" type="date"
                                                    class="form-control form-control-lg" value="<?= date('Y-m-d') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- RICE TAB CONTENT (Keep as is or modify similarly) -->
                                <div id="rice-tab" class="tab-content" style="display:none;">
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
                                                    <select class="form-select rice-type" id="rice_type_select">
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
                                                        <i class="fas fa-box me-1"></i> QTY(SACK)
                                                    </label>
                                                    <input type="number" class="form-control rice-qty" placeholder="0"
                                                        min="0" step="1" value="0" />
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label fw-bold text-muted small mb-2">
                                                        <i class="fas fa-tag me-1"></i> PRICE/KG
                                                    </label>
                                                    <div class="input-group">
                                                        <span
                                                            class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                        <input type="number" class="form-control rice-price"
                                                            placeholder="0.00" min="0" step="0.01" value="0" />
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label fw-bold text-muted small mb-2">
                                                        <i class="fas fa-percentage  me-1"></i> INTEREST
                                                    </label>
                                                    <div class="input-group">
                                                        <span
                                                            class="input-group-text bg-light border-0 fw-bold">%</span>
                                                        <input type="number" class="form-control rice-interest"
                                                            placeholder="0.00" min="0" step="0.01" value="20" />
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label fw-bold text-muted small mb-2">
                                                        <i class="fas fa-plus-circle me-1"></i> ADDED AMOUNT
                                                    </label>
                                                    <div class="input-group">
                                                        <span
                                                            class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                        <input type="number" class="form-control rice-added-amt"
                                                            placeholder="0.00" min="0" step="0.01" value="0" />
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label fw-bold text-muted small mb-2">
                                                        <i class="fas fa-calculator me-1"></i> SUBTOTAL
                                                    </label>
                                                    <div class="input-group">
                                                        <span
                                                            class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                        <input type="text"
                                                            class="form-control rice-subtotal fw-bold text-success"
                                                            readonly style="background-color: #f8f9fa;" value="0.00" />
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

                                        <div class="row mt-0">
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold text-muted small mb-2">
                                                    <i class="fas fa-calendar-alt me-1"></i> TRANSACTION DATE
                                                </label>
                                                <input id="rice_trans_date" type="date"
                                                    class="form-control form-control-lg" value="<?= date('Y-m-d') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Hidden Fields -->
                                <input id="new_type" type="hidden" value="dried_fish" />
                                <input id="client_id" type="hidden" />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-success" id="addLoanBtn">
                            <i class="fas fa-check-circle me-1"></i> Process Credit
                        </button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ADD LOAN SAME CLIENT -->

        <!-- BULK PAYMENT -->
        <div class="modal fade" id="bulk_payment_modal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 6  00px; margin-top: 10px;">
                <div class="modal-content">
                    <!-- Header -->
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-money-bill-wave me-2 text-success"></i>
                            Bulk Payment For: <span id="bulk_date" class="text-success ms-1"></span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body p-3">
                        <!-- Summary Card -->
                        <div class="card border-0 shadow-sm rounded-3 mb-3">
                            <div class="card-body p-3 pt-0">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="text-center p-2 bg-light rounded-3">
                                            <small class="text-muted d-block">Total Clients</small>
                                            <span class="fw-bold fs-5" id="total_clients_count">0</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center p-2 bg-light rounded-3">
                                            <small class="text-muted d-block">Total Payments</small>
                                            <span class="fw-bold fs-5 text-success" id="total_payments_sum">₱0.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Table -->
                        <div class="card border-0 shadow-sm rounded-3">
                            <div class="card-header bg-white border-0 pt-3 px-3">
                                <h6 class="fw-bold mb-0">
                                    <i class="fas fa-list me-2 text-success"></i>
                                    Payment Entries
                                </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive" style="max-height: 444px; overflow-y: auto;">
                                    <table id="bulk_payment_table" class="table table-sm table-hover mb-0">
                                        <thead class="table-light sticky-top" style="background-color: #f8f9fa;">
                                            <!-- Headers will be dynamically generated -->
                                        </thead>
                                        <tbody id="bulk_payment_body">
                                            <!-- Rows will be dynamically generated -->
                                        </tbody>
                                        <tfoot class="table-light">
                                            <!-- Footer row for totals will be dynamically generated -->
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <button type="button" id="save_bulk_payments" class="btn btn-success me-2">
                                    <i class="fas fa-save me-1"></i> Save Payments
                                </button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-1"></i> Close
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <!-- <div class="modal-footer border-0 pt-0">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div>
                                <button type="button" id="save_bulk_payments" class="btn btn-success px-4">
                                    <i class="fas fa-save me-1"></i> Save Payments
                                </button>
                                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-1"></i> Close
                                </button>
                            </div>
                        </div>
                    </div> -->


                </div>
            </div>
        </div>
        <!-- BULK PAYMENT -->

        <!-- VARIANCE MODAL -->
        <div class="modal fade" id="variance_modal" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 600px; margin-top: 10px;">
                <div class="modal-content">
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-balance-scale me-2 text-danger"></i>
                            Variance Tracking
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body p-3">
                        <!-- Add New Button -->
                        <div class="mb-3 text-start">
                            <button class="btn btn-primary" onclick="openAddVariance()">
                                <i class="fas fa-plus-circle me-1"></i> Add New
                            </button>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="variance_table" class="table table-hover mb-0 pb-0" style="width:100%">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>DATE</th>
                                            <th>OVER</th>
                                            <th>SHORT</th>
                                            <th style="width:150px">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot class="table-light">
                                        <tr style="font-weight: bold;">
                                            <td class="text-end"><strong>TOTAL:</strong></td>
                                            <td id="total_over" class="text-danger">
                                                <strong>₱0.00</strong>
                                            </td>
                                            <td id="total_short" class="text-danger">
                                                <strong>₱0.00</strong>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <!-- Close Button -->
                        <div class="row mt-3">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                    <i class="fas fa-times me-1"></i> Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- VIEW VARIANCE MODAL -->

        <!-- ADD VARIANCE MODAL -->
        <div class="modal fade" id="addVarianceModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static"
            data-bs-keyboard="false">
            <div class="modal-dialog" style="max-width:600px; margin-top:10px">
                <div class="modal-content">
                    <div class="modal-header bg-light border-bottom">
                        <h5 class="modal-title fw-bold">
                            <i class="fas fa-hand-holding-usd me-2 text-danger"></i>
                            New Variance Data
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body pb-0">
                        <div class="container p-0">
                            <!-- Loan Details Card -->
                            <div class="card border-0 shadow-sm rounded-4">
                                <div class="card-header bg-white border-0">
                                    <h6 class="fw-bold mb-0">
                                        <i class="fas fa-calculator me-2 text-danger"></i>
                                        Variance Details
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Capital Amount -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-muted small mb-2">
                                                <i class="fas fa-coins me-1"></i> OVER
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                <input id="variance_over" type="number"
                                                    class="form-control form-control-lg" placeholder="0.00" min="0"
                                                    step="0.01" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-muted small mb-2">
                                                <i class="fas fa-coins me-1"></i> SHORT
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-0 fw-bold">₱</span>
                                                <input id="variance_short" type="number"
                                                    class="form-control form-control-lg" placeholder="0.00" min="0"
                                                    step="0.01" />
                                            </div>
                                        </div>

                                        <!-- Start Date -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold text-muted small mb-2">
                                                <i class="fas fa-calendar-alt me-1"></i> DATE
                                            </label>
                                            <input id="variance_date" type="date" class="form-control form-control-lg"
                                                value="<?= date('Y-m-d') ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-primary" id="addVariance">
                            <i class="fas fa-check-circle me-1"></i> Add
                        </button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ADD VARIANCE MODAL -->

    </main>
</section>

<script>

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

    // Store fish data globally
    var fishDatabase = {};
    var riceDatabase = {};
    const emptyLoanTransactionsRow = '<tr><td colspan="6" class="text-center">No transaction details found</td></tr>';
    const emptyRiceTransactionsRow = '<tr><td colspan="7" class="text-center">No transactions found</td></tr>';
    const emptyPaymentRows = '<tr><td colspan="4" class="text-center py-4 text-muted"><i class="fas fa-inbox fa-2x mb-2"></i><br>No payment records found</td></tr>';

    $(document).ready(function () {
        loadFishTypes();
        loadRiceTypes();

        $('#viewLoaner').on('hidden.bs.modal', function () {
            resetViewLoanerModal();
        });


        // Tab switching - scoped to closest nav-tabs-custom parent
        $('.tab-link').click(function (e) {
            e.preventDefault();
            var tab = $(this).data('tab');
            var navContainer = $(this).closest('.nav-tabs-custom');
            var modal = $(this).closest('.modal-content');

            // Remove active only from tabs in the same container
            navContainer.find('.tab-link').removeClass('active');
            $(this).addClass('active');

            if (tab === 'fish' || tab === 'view-fish') {
                modal.find('#fish-tab').show();
                modal.find('#rice-tab').hide();
                modal.find('#view-fish-tab').show();
                modal.find('#view-rice-tab').hide();
                $('#new_type').val('dried_fish');

                // Keep the current fish selection in sync without refetching the same loan
                if (modal.closest('#viewLoaner').length) {
                    setTimeout(function () {
                        syncViewModalTabSelection('fish');
                    }, 100);
                }
            } else if (tab === 'rice' || tab === 'view-rice') {
                modal.find('#fish-tab').hide();
                modal.find('#rice-tab').show();
                modal.find('#view-fish-tab').hide();
                modal.find('#view-rice-tab').show();
                $('#new_type').val('rice');

                // Keep the current rice selection in sync without refetching the same loan
                if (modal.closest('#viewLoaner').length) {
                    setTimeout(function () {
                        syncViewModalTabSelection('rice');
                    }, 100);
                }
            }
        });

        // Add new fish item
        $('#addFishItem').click(function () {
            addFishItem();
        });

        // Add new rice item
        $('#addRiceItem').click(function () {
            addRiceItem();
        });

        // Remove fish item (delegated)
        $(document).on('click', '.remove-fish-item', function () {
            if ($('.fish-item').length > 1) {
                $(this).closest('.fish-item').remove();
                calculateFishGrandTotal();
            } else {
                alert('At least one item is required');
            }
        });

        // Remove rice item (delegated)
        $(document).on('click', '.remove-rice-item', function () {
            if ($('.rice-item').length > 1) {
                $(this).closest('.rice-item').remove();
                calculateRiceGrandTotal();
            } else {
                alert('At least one item is required');
            }
        });

        // Calculate fish subtotal (delegated)
        $(document).on('input', '.fish-qty, .fish-price, .fish-interest, .fish-added-amt', function () {
            var item = $(this).closest('.fish-item');
            calculateFishSubtotal(item);
            calculateFishGrandTotal();
        });

        // Calculate rice subtotal (delegated)
        $(document).on('input', '.rice-qty, .rice-price, .rice-interest, .rice-added-amt', function () {
            var item = $(this).closest('.rice-item');
            calculateRiceSubtotal(item);
            calculateRiceGrandTotal();
        });

        // Auto-fill fish price when type is selected
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

        // Auto-fill rice price when type is selected
        $(document).on('change', '.rice-type', function () {
            var select = $(this);
            var riceId = select.val();
            var item = select.closest('.rice-item');
            var priceField = item.find('.rice-price');

            if (riceId && riceDatabase[riceId]) {
                priceField.val(riceDatabase[riceId].price);
                priceField.trigger('input');
            }
        });

        $(document).on('change', '.rice-sack-size', function () {
            var item = $(this).closest('.rice-item');
            calculateRiceSubtotal(item);
            calculateRiceGrandTotal();
        });
    });

    function loadFishTypes() {
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
    }

    function loadRiceTypes() {
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

    function populateRiceDropdowns() {
        $('.rice-type').each(function () {
            var select = $(this);
            var currentValue = select.val();
            select.empty();
            select.append('<option value="">Select Rice Type...</option>');

            // Group by rice type
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
                    name: rice.name // Store the actual rice name
                });
            });

            // Create optgroups for each rice type
            $.each(groupedRice, function (riceType, variants) {
                var optgroup = $('<optgroup>').attr('label', riceType);

                $.each(variants, function (i, variant) {
                    var option = $('<option>')
                        .val(variant.id)
                        .text(variant.display_name + ' - Available: ' + variant.qty + ' sacks')
                        .attr('data-price', variant.price)
                        .attr('data-sack-size', variant.sack_type)
                        .attr('data-qty', variant.qty)
                        .attr('data-rice-name', variant.name); // Make sure this is set

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

    function addFishItem() {
        var newItem = $('.fish-item:first').clone();
        newItem.find('input').val('');
        newItem.find('.fish-type').val('');
        newItem.find('.fish-qty').val('0');
        newItem.find('.fish-price').val('');
        newItem.find('.fish-subtotal').val('0.00');
        $('#fish-items-container').append(newItem);
        populateFishDropdowns();
    }

    function addRiceItem() {
        var newItem = $('.rice-item:first').clone();
        newItem.find('input').val('');
        newItem.find('.rice-type').val('');
        newItem.find('.rice-sack-size').val('25');
        newItem.find('.rice-qty').val('0');
        newItem.find('.rice-price').val('');
        newItem.find('.rice-subtotal').val('0.00');
        $('#rice-items-container').append(newItem);
        populateRiceDropdowns();
    }

    function calculateFishSubtotal(item) {
        var qty = parseFloat(item.find('.fish-qty').val()) || 0;
        var price = parseFloat(item.find('.fish-price').val()) || 0;
        var interestRate = parseFloat(item.find('.fish-interest').val()) || 0;
        var addedAmt = parseFloat(item.find('.fish-added-amt').val()) || 0;

        // Calculate subtotal: (quantity × price) + interest
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
        var qty = parseFloat(item.find('.rice-qty').val()) || 0; // number of sacks
        var sackSize = parseFloat(item.find('.rice-sack-size').val()) || 0; // 25 or 50 kg per sack
        var pricePerKg = parseFloat(item.find('.rice-price').val()) || 0; // price per kg
        var interestRate = parseFloat(item.find('.rice-interest').val()) || 0;
        var addedAmt = parseFloat(item.find('.rice-added-amt').val()) || 0;

        // Calculate base amount: (number of sacks * kg per sack) * price per kg
        var totalKg = qty * sackSize;
        var baseAmount = totalKg * pricePerKg;

        // Calculate total with interest
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

    // Process loan button
    $('#addLoanBtn').click(function () {
        var clientId = $('#header_id').val();

        if (!clientId) {
            alert('Client ID is missing');
            return;
        }

        var fishItems = [];
        var riceItems = [];

        var fish_trans_date = $('#fish_trans_date').val();

        // Get fish items
        $('.fish-item').each(function () {
            var fishType = $(this).find('.fish-type').val();
            var qty = $(this).find('.fish-qty').val();
            var price = $(this).find('.fish-price').val();
            var interest = $(this).find('.fish-interest').val() || 0;
            var addedAmt = $(this).find('.fish-added-amt').val() || 0;
            var subtotal = $(this).find('.fish-subtotal').val();

            if (fishType && parseFloat(qty) > 0) {
                fishItems.push({
                    type: 'dried_fish',
                    product_id: fishType,
                    product_name: $(this).find('.fish-type option:selected').text(),
                    quantity: qty,
                    price_per_unit: price,
                    interest_rate: interest,
                    added_amount: addedAmt,
                    trans_date: fish_trans_date,
                    subtotal: subtotal
                });
            }
        });

        var rice_trans_date = $('#rice_trans_date').val();

        // Get rice items
        $('.rice-item').each(function () {
            var riceType = $(this).find('.rice-type').val();
            var sackSize = $(this).find('.rice-sack-size').val();
            var qty = $(this).find('.rice-qty').val();
            var price = $(this).find('.rice-price').val();
            var interest = $(this).find('.rice-interest').val() || 0;
            var addedAmt = $(this).find('.rice-added-amt').val() || 0;
            var subtotal = $(this).find('.rice-subtotal').val();

            if (riceType && parseFloat(qty) > 0) {
                var selectedOption = $(this).find('.rice-type option:selected');
                var riceName = selectedOption.data('rice-name'); // Get the actual rice type name

                riceItems.push({
                    type: 'rice',
                    product_id: riceType,
                    product_name: riceName, // This will be "Camia" instead of "Camia (25kg) - Available: 10 sacks"
                    sack_size: sackSize,
                    quantity: qty,
                    price_per_unit: price,
                    interest_rate: interest,
                    added_amount: addedAmt,
                    trans_date: rice_trans_date,
                    subtotal: subtotal
                });
            }
        });

        // Check if at least one item exists
        if (fishItems.length === 0 && riceItems.length === 0) {
            alert('Please add at least one item (fish or rice) with valid quantity');
            return;
        }

        // Combine all items
        var allItems = [...fishItems, ...riceItems];

        // Calculate grand total from all items
        var grandTotal = 0;
        $('.fish-subtotal, .rice-subtotal').each(function () {
            grandTotal += parseFloat($(this).val()) || 0;
        });

        var loanData = {
            client_id: clientId,
            items: allItems,
            grand_total: grandTotal.toFixed(2)
            // trans_date: $('#fish_trans_date').val() || $('#rice_trans_date').val()
        };

        submitLoan(loanData);
    });

    function submitLoan(loanData) {

        console.log("Submitting loan with data:", loanData);

        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/save_multiple_credits'); ?>',
            type: 'POST',
            data: loanData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert('Loan saved successfully!');
                    $('#addLoanSameClient').modal('hide');
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.error("Error saving loan: " + error);
                alert('Error saving loan. Please try again.');
            }
        });
    }

    function calculateTotal() {
        let capital = parseFloat($('#capital_amt').val()) || 0;
        let interestRaw = $('#interest').val().replace('%', '');
        let interest = parseFloat(interestRaw) || 0;
        let added = parseFloat($('#added_amt').val()) || 0;

        let total = (capital * (interest / 100)) + added + capital;

        $('#total_amt').val(total.toFixed(2));
    }

    $('#capital_amt, #interest, #added_amt').on('input', calculateTotal);

    function openEditModal(id, acc_no, fullname, address, date_added) {
        $('#editLoaner').modal('show');
        $('#edit_acc_no').val(acc_no);
        $('#edit_full_name').val(fullname);
        $('#edit_address').val(address);
        $('#edit_start_date').val(date_added);

        $('#edit_client_form').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                $('#update_client').trigger('click');
            }
        });

        $("#update_client").on('click', function (e) {
            e.preventDefault();

            var name = $("#edit_full_name").val();

            if (!name) {
                Swal.fire({ icon: 'error', title: 'Oops...', text: "Can't leave full name empty" });
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to update this client?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'Cancel',
                allowEnterKey: false
            }).then((result) => {
                if (result.isConfirmed) {

                    Swal.fire({
                        title: 'Updating client...',
                        html: 'Please wait',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('Monitoring_cont/update_client'); ?>",
                        data: $('#edit_client_form').serialize() + '&id=' + id,
                        dataType: 'json',
                        success: function (response) {
                            Swal.close();
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success',
                                timer: 800,
                                showConfirmButton: false,
                                timerProgressBar: true
                            });
                            $('#editLoaner').modal('hide');
                            client_table.ajax.reload();
                        }
                    });
                }
            });
        });

        $("#deleteBtn").on('click', function (e) {
            e.preventDefault();

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
                        title: 'Deleting client...',
                        html: 'Please wait',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });

                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('Monitoring_cont/delete_id'); ?>",
                        data: { id: id },
                        dataType: 'json',
                        success: function (response) {
                            Swal.close();
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success',
                                timer: 800,
                                showConfirmButton: false,
                                timerProgressBar: true
                            });
                            $('#editLoaner').modal('hide');
                            client_table.ajax.reload();
                        }
                    });
                }
            });
        });

    }

    let loanDetailsRequest = null;
    let activeLoanDetailsKey = null;

    function getCurrentViewLoanerTab() {
        return $('#viewLoaner .tab-link[data-tab="view-rice"]').hasClass('active') ? 'rice' : 'fish';
    }

    function setViewLoanerActiveTab(tabType = 'fish') {
        const isRice = tabType === 'rice';
        $('#viewLoaner .tab-link[data-tab="view-fish"]').toggleClass('active', !isRice);
        $('#viewLoaner .tab-link[data-tab="view-rice"]').toggleClass('active', isRice);
        $('#viewLoaner #view-fish-tab').toggle(!isRice);
        $('#viewLoaner #view-rice-tab').toggle(isRice);
    }

    function resetViewLoanerModal() {
        if (loanDetailsRequest && typeof loanDetailsRequest.abort === 'function') {
            loanDetailsRequest.abort();
        }

        hasFishCredit = false;
        hasRiceCredit = false;
        loanDetailsRequest = null;
        activeLoanDetailsKey = null;

        $('#header_id').val('');
        $('#header_loan_id').val('');
        $('#current_loan_type').val('fish');
        $('#selected_date_id').val('');

        $('#header_acc_no').text('');
        $('#header_name').text('');
        $('#header_address').text('');
        $('#header_loan_date').text('');
        $('#header_due_date').text('');
        $('#header_capital_amt').text('0.00');
        $('#header_added_amt').text('0.00');
        $('#rice-date-completed').html('');
        $('#fish-date-completed').html('');
        $('#header_status').text('').removeClass('text-success text-primary text-danger');

        $('#dateDropdownBtn').text('Select Date Range');
        $('.fish-date-arr, .rice-date-arr, #header_date_arr').empty();

        $('.fish-start-date, .fish-due-date, .fish-total-amt, .fish-running-balance, .fish-status, .fish-date-completed').text('');
        $('.rice-start-date, .rice-due-date, .rice-total-amt, .rice-running-balance, .rice-status, .rice-date-completed').text('');

        $('.fish-transactions-body').html(emptyLoanTransactionsRow);
        $('.rice-transactions-body').html(emptyRiceTransactionsRow);
        $('#paymentTableBody').html(emptyPaymentRows);
        $('#total_payment').text('0.00');

        // $('#addNewLoan').hide();
        $('#deleteLoanDetails').addClass('d-none');

        $('.fish-date-arr').prev().find('.dropdown-toggle').html('<i class="fas fa-filter me-1"></i> Select Date Range');
        $('.rice-date-arr').prev().find('.dropdown-toggle').html('<i class="fas fa-filter me-1"></i> Select Date Range');

        setViewLoanerActiveTab('fish');
    }

    function syncAddNewLoanButtonFromLoanLists(fishLoans = [], riceLoans = []) {
        const hasActiveFishLoan = fishLoans.some(loan => String(loan.status || '').toLowerCase() !== 'completed');
        const hasActiveRiceLoan = riceLoans.some(loan => String(loan.status || '').toLowerCase() !== 'completed');
        const canAddNewLoan = !hasActiveFishLoan || !hasActiveRiceLoan;

        // $('#addNewLoan').toggle(canAddNewLoan);
    }

    function refreshAddNewLoanButton(clientId) {
        if (!clientId) {
            return;
        }

        $.ajax({
            url: "<?php echo base_url('Monitoring_cont/get_all_loans_for_client'); ?>",
            type: "POST",
            dataType: "json",
            data: { client_id: clientId },
            success: function (response) {
                syncAddNewLoanButtonFromLoanLists(response.fish_loans || [], response.rice_loans || []);
            }
        });
    }

    function refreshLoanViewAfterPayment(loanId, type) {
        const activeTab = getCurrentViewLoanerTab();

        $.ajax({
            url: "<?php echo base_url('Monitoring_cont/get_loan_details'); ?>",
            type: "POST",
            dataType: "json",
            data: { id: loanId, type: type },
            success: function (response) {
                if (!response || !response.data) {
                    return;
                }

                const loanData = response.data;
                const payments = response.payments || [];
                const paymentMap = {};
                let totalPayment = 0;

                payments.forEach(item => {
                    if (item.payment_for) {
                        const amount = parseFloat(item.amt) || 0;
                        paymentMap[item.payment_for] = amount;
                        totalPayment += amount;
                    }
                });

                const startDate = new Date(loanData.start_date);
                let endDate = new Date(loanData.due_date);
                const status = loanData.status;

                if ((status === 'completed' || status === 'overdue') && loanData.complete_date) {
                    endDate = new Date(loanData.complete_date);
                }

                startDate.setDate(startDate.getDate() + 1);

                let tableBody = '';
                let rowIndex = 0;
                let current = new Date(startDate);

                while (current <= endDate) {
                    const dateStr = current.toISOString().split('T')[0];
                    const paymentAmt = paymentMap[dateStr] || 0;
                    const formattedAmt = paymentAmt ? paymentAmt.toLocaleString('en-US') : '';

                    rowIndex++;

                    tableBody += `
                            <tr>
                                <td class="text-center">${rowIndex}</td>
                                <td class="text-center">${current.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</td>
                                <td class="text-center">
                                    <input type="text"
                                        class="form-control text-center form-control-sm payment-input w-50 mx-auto ${paymentAmt ? 'text-success' : ''}"
                                        value="${formattedAmt}"
                                        ${paymentAmt ? 'readonly' : ''}
                                        data-date="${dateStr}" />
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success edit-btn"
                                        style="${paymentAmt ? '' : 'display:none;'}">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </td>
                            </tr>
                        `;

                    current.setDate(current.getDate() + 1);
                }

                if (rowIndex === 0) {
                    tableBody = '<tr><td colspan="4" class="text-center py-4 text-muted">No payment schedule available</td></tr>';
                }

                const runningBalance = Math.max(0, (parseFloat(loanData.total_amt) || 0) - totalPayment);

                $('#paymentTableBody').html(tableBody);
                $('#total_payment').text(totalPayment.toLocaleString('en-PH', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }));

                if (type === 'fish') {
                    $('.fish-running-balance').text(runningBalance.toLocaleString('en-PH', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));
                } else {
                    $('.rice-running-balance').text(runningBalance.toLocaleString('en-PH', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));
                }

                updateTotals(loanData, payments, loanId, totalPayment, null, type, loanData.cl_id);
                setViewLoanerActiveTab(activeTab);
                refreshAddNewLoanButton($('#header_id').val());
            }
        });
    }

    function syncViewModalTabSelection(targetType) {
        const currentLoanId = $('#header_loan_id').val();
        const currentType = $('#current_loan_type').val();
        const menuSelector = targetType === 'fish' ? '.fish-date-arr' : '.rice-date-arr';
        const $menu = $(menuSelector);

        if (!$menu.length) {
            return;
        }

        let $targetItem = $();

        if (currentType === targetType && currentLoanId) {
            $targetItem = $menu.find('.dropdown-item').filter(function () {
                return String($(this).data('id')) === String(currentLoanId);
            }).first();
        }

        if (!$targetItem.length) {
            $targetItem = $menu.find('.dropdown-item:not(.disabled)').first();
        }

        if (!$targetItem.length) {
            return;
        }

        $menu.prev().find('.dropdown-toggle').text($targetItem.data('formatted'));

        if (currentType === targetType && String($targetItem.data('id')) === String(currentLoanId)) {
            return;
        }

        $targetItem.trigger('click');
    }

    let hasFishCredit = false;
    let hasRiceCredit = false;

    function openViewModal(id, fullname, address, acc_no, selectedLoanId = null, selectedType = null, visibleTab = null) {
        resetViewLoanerModal();
        $('#viewLoaner').modal('show');
        setViewLoanerActiveTab(visibleTab || 'fish');

        $('#header_id').val(id);
        $('#header_acc_no').text(acc_no);
        $('#header_name').text(fullname.replace(/\b\w/g, c => c.toUpperCase()));
        $('#header_address').text(address.replace(/\b\w/g, c => c.toUpperCase()));

        // Load all loans for the client
        $.ajax({
            url: "<?php echo base_url('Monitoring_cont/get_all_loans_for_client'); ?>",
            type: "POST",
            dataType: "json",
            data: { client_id: id },
            success: function (response) {

                console.log('test', response);

                let ongoingFishLoan = null;
                let ongoingRiceLoan = null;

                if (response.fish_loans && response.fish_loans.length > 0) {
                    hasFishCredit = response.fish_loans.some(loan => loan.status === 'ongoing');
                    ongoingFishLoan = response.fish_loans.find(loan => loan.status === 'ongoing');
                }

                // Check rice loans for 'ongoing' status
                if (response.rice_loans && response.rice_loans.length > 0) {
                    hasRiceCredit = response.rice_loans.some(loan => loan.status === 'ongoing');
                    ongoingRiceLoan = response.rice_loans.find(loan => loan.status === 'ongoing');
                }

                syncAddNewLoanButtonFromLoanLists(response.fish_loans || [], response.rice_loans || []);
                populateDropdown(response.fish_loans, response.rice_loans, ongoingFishLoan, ongoingRiceLoan);
                populateTabDateRanges(response.fish_loans, response.rice_loans);
            },
            error: function () {
                Swal.fire('Error', 'Something went wrong.', 'error');
            }
        });

        function populateTabDateRanges(fishLoans, riceLoans) {
            // Populate fish date range dropdown
            $('.fish-date-arr').empty();
            if (fishLoans.length > 0) {
                fishLoans.forEach((loan, index) => {
                    const startDate = new Date(loan.start_date).toLocaleDateString('en-US', {
                        month: 'short', day: 'numeric', year: 'numeric'
                    });
                    const dueDate = new Date(loan.due_date).toLocaleDateString('en-US', {
                        month: 'short', day: 'numeric', year: 'numeric'
                    });
                    const formattedDate = `${startDate} - ${dueDate}`;

                    $('.fish-date-arr').append(
                        `<li>
                                <a class="dropdown-item" href="#" 
                                data-id="${loan.trans_id}" 
                                data-type="fish"
                                data-formatted="${formattedDate}">
                                    ${formattedDate}
                                </a>
                            </li>`
                    );

                    if (index === 0) {
                        $('.fish-date-arr').parent().find('.dropdown-toggle').text(formattedDate);
                    }
                });
            } else {
                $('.fish-date-arr').append('<li><a class="dropdown-item disabled">No fish loans</a></li>');
            }

            // Populate rice date range dropdown
            $('.rice-date-arr').empty();
            if (riceLoans.length > 0) {
                riceLoans.forEach((loan, index) => {
                    const startDate = new Date(loan.start_date).toLocaleDateString('en-US', {
                        month: 'short', day: 'numeric', year: 'numeric'
                    });
                    const dueDate = new Date(loan.due_date).toLocaleDateString('en-US', {
                        month: 'short', day: 'numeric', year: 'numeric'
                    });
                    const formattedDate = `${startDate} - ${dueDate}`;

                    $('.rice-date-arr').append(
                        `<li>
                                <a class="dropdown-item" href="#" 
                                data-id="${loan.trans_id}" 
                                data-type="rice"
                                data-formatted="${formattedDate}">
                                    ${formattedDate}
                                </a>
                            </li>`
                    );

                    if (index === 0) {
                        $('.rice-date-arr').parent().find('.dropdown-toggle').text(formattedDate);
                    }
                });
            } else {
                $('.rice-date-arr').append('<li><a class="dropdown-item disabled">No rice loans</a></li>');
            }
        }

        function populateDropdown(fishLoans, riceLoans, ongoingFishLoan, ongoingRiceLoan) {
            $('#header_date_arr').empty();

            let allLoans = [...fishLoans, ...riceLoans];

            // Prioritize ongoing loans first
            let ongoingLoans = allLoans.filter(loan => loan.status === 'ongoing');
            let otherLoans = allLoans.filter(loan => loan.status !== 'ongoing');
            allLoans = [...ongoingLoans, ...otherLoans];

            allLoans.sort((a, b) => new Date(b.start_date) - new Date(a.start_date)); // Sort by date descending

            if (allLoans.length === 0) {
                $('#dateDropdownBtn').text('No Loans Available');
                $('#selected_date_id').val('');
                $('#header_loan_id').val('');
                return;
            }

            let firstItemId = null;
            let firstType = null;
            let firstFormattedDate = null;
            let selectedFormattedDate = null;

            allLoans.forEach((loan, index) => {
                const startDate = new Date(loan.start_date).toLocaleDateString('en-US', {
                    month: 'short', day: 'numeric', year: 'numeric'
                });
                const dueDate = new Date(loan.due_date).toLocaleDateString('en-US', {
                    month: 'short', day: 'numeric', year: 'numeric'
                });
                const formattedDate = `${startDate} - ${dueDate}`;

                if (index === 0) {
                    firstItemId = loan.trans_id;
                    firstType = loan.type;
                    firstFormattedDate = formattedDate;
                }

                if (selectedLoanId && selectedType && String(loan.trans_id) === String(selectedLoanId) && loan.type === selectedType) {
                    selectedFormattedDate = formattedDate;
                }

                $('#header_date_arr').append(
                    `<li>
                            <a class="dropdown-item" href="#" 
                            data-id="${loan.trans_id}" 
                            data-type="${loan.type}"
                            data-formatted="${formattedDate}">
                                ${formattedDate} (${loan.type.toUpperCase()})
                            </a>
                        </li>`
                );
            });

            const preferredInitialType = visibleTab || selectedType;
            const initialLoanId = selectedFormattedDate ? selectedLoanId : firstItemId;
            const initialType = selectedFormattedDate ? selectedType : (preferredInitialType || firstType);
            const initialFormattedDate = selectedFormattedDate || firstFormattedDate;

            if (initialLoanId) {
                setViewLoanerActiveTab(visibleTab || initialType);
                $('#dateDropdownBtn').text(initialFormattedDate);
                $('#selected_date_id').val(initialLoanId);
                $('#header_loan_id').val(initialLoanId);
                $('#current_loan_type').val(initialType);

                triggerLoanDetails(initialLoanId, initialType, ongoingFishLoan, ongoingRiceLoan);
                // Swal.fire({
                //     title: 'Loading Data...',
                //     html: 'Please wait',
                //     allowOutsideClick: false,
                //     didOpen: () => {
                //         Swal.showLoading();
                //     }
                // });
            }
        }

        // Handle dropdown item selection
        $(document).off('click', '#header_date_arr .dropdown-item').on('click', '#header_date_arr .dropdown-item', function (e) {
            e.preventDefault();

            let loanId = $(this).data('id');
            let type = $(this).data('type');
            let formattedDate = $(this).data('formatted');

            // Update button text
            $('#dateDropdownBtn').text(formattedDate);

            // Store selected values
            $('#selected_date_id').val(loanId);
            $('#header_loan_id').val(loanId);
            $('#current_loan_type').val(type);

            // Switch to appropriate tab
            if (type === 'fish') {
                $('.tab-link[data-tab="view-fish"]').click();
            } else if (type === 'rice') {
                $('.tab-link[data-tab="view-rice"]').click();
            }

            // Trigger loan details load
            triggerLoanDetails(loanId, type, null, null);
        });

        // Handle fish date range dropdown selection
        $(document).off('click', '.fish-date-arr .dropdown-item:not(.disabled)').on('click', '.fish-date-arr .dropdown-item:not(.disabled)', function (e) {
            e.preventDefault();

            let loanId = $(this).data('id');
            let type = $(this).data('type');
            let formattedDate = $(this).data('formatted');

            // Update button text for fish dropdown
            $('.fish-date-arr').prev().find('.dropdown-toggle').text(formattedDate);

            // Store selected values
            $('#selected_date_id').val(loanId);
            $('#header_loan_id').val(loanId);
            $('#current_loan_type').val(type);

            // Trigger loan details load
            triggerLoanDetails(loanId, type, null, null);
        });

        // Handle rice date range dropdown selection
        $(document).off('click', '.rice-date-arr .dropdown-item:not(.disabled)').on('click', '.rice-date-arr .dropdown-item:not(.disabled)', function (e) {
            e.preventDefault();

            let loanId = $(this).data('id');
            let type = $(this).data('type');
            let formattedDate = $(this).data('formatted');

            // Update button text for rice dropdown
            $('.rice-date-arr').prev().find('.dropdown-toggle').text(formattedDate);

            // Store selected values
            $('#selected_date_id').val(loanId);
            $('#header_loan_id').val(loanId);
            $('#current_loan_type').val(type);

            // Trigger loan details load
            triggerLoanDetails(loanId, type, null, null);
        });

        // $('#header_date_arr').off('change').on('change', function () {
        function triggerLoanDetails(loanId, type, ongoingFishLoan, ongoingRiceLoan) {
            const requestKey = `${type}-${loanId}`;

            if (loanDetailsRequest && activeLoanDetailsKey === requestKey) {
                return;
            }

            if (loanDetailsRequest && typeof loanDetailsRequest.abort === 'function') {
                loanDetailsRequest.abort();
            }

            activeLoanDetailsKey = requestKey;
            $('#header_loan_id').val(loanId)

            loanDetailsRequest = $.ajax({
                url: "<?php echo base_url('Monitoring_cont/get_loan_details'); ?>",
                type: "POST",
                dataType: "json",
                data: { id: loanId, type: type },
                success: function (response) {


                    console.log(response);

                    if (!response || !response.data) {
                        Swal.fire('Error', 'No loan data found.', 'error');
                        return;
                    }

                    // Swal.close();

                    const loanData = response.data;
                    const payments = response.payments || [];

                    const format = d => new Date(d).toLocaleDateString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    });

                    $('#header_loan_date').text(format(loanData.start_date));
                    $('#header_due_date').text(format(loanData.due_date));
                    $('#header_capital_amt').text(Number(loanData.capital_amt || loanData.total_amt).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    $('#header_added_amt').text(Number(loanData.added_amt || 0).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                    // let dateDisplay = loanData.date_completed ? format(loanData.date_completed) : '';

                    // console.log(dateDisplay);

                    // if (dateDisplay) {
                    //     // If date exists, show dash, date, and checkmark
                    //     $('#rice-date-completed').html(`
                    //             <span class="mx-1">—</span>
                    //             ${dateDisplay}
                    //             <i class="fas fa-check-circle ms-1" style="color: #28a745; font-size: 0.9rem;"></i>
                    //         `);
                    // } else {
                    //     // If no date, show nothing (empty)
                    //     $('#rice-date-completed').html('');
                    // }

                    // Update tab-specific headers based on type
                    if (type === 'fish') {
                        $('.fish-start-date').text(format(loanData.start_date));
                        $('.fish-due-date').text(format(loanData.due_date));
                        $('.fish-total-amt').text(Number(loanData.total_amt).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        $('.fish-status').text(loanData.status.toUpperCase());
                        $('.fish-date-completed').text(loanData.date_completed ? '- ' + format(loanData.date_completed) : '');

                        // Populate fish transactions table from details array
                        let fishTableBody = '';
                        if (response.details && response.details.length > 0) {
                            response.details.forEach(detail => {
                                fishTableBody += `
                                        <tr>
                                            <td>${detail.fish_type}</td>
                                            <td>${(detail.qty / 1000).toLocaleString()} kg</td>
                                            <td>${detail.price_per_kg}</td>
                                            <td>${detail.interest}%</td>
                                            <td>₱ ${parseFloat(detail.added_amt).toLocaleString()}</td>
                                            <td>₱ ${parseFloat(detail.sub_total).toLocaleString()}</td>
                                        </tr>
                                    `;
                            });
                        }
                        $('.fish-transactions-body').html(fishTableBody || '<tr><td colspan="6" class="text-center">No transaction details found</td></tr>');
                    } else if (type === 'rice') {
                        $('.rice-start-date').text(format(loanData.start_date));
                        $('.rice-due-date').text(format(loanData.due_date));
                        $('.rice-total-amt').text(Number(loanData.total_amt).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
                        $('.rice-status').text(loanData.status.toUpperCase());
                        $('.rice-date-completed').text(loanData.date_completed ? '- ' + format(loanData.date_completed) : '');

                        // Populate rice transactions table from details array
                        let riceTableBody = '';
                        if (response.details && response.details.length > 0) {
                            response.details.forEach(detail => {
                                riceTableBody += `
                                        <tr>
                                            <td>${detail.rice_type || 'N/A'}</td>
                                            <td>${detail.sack_type || 'N/A'}</td>
                                            <td>${parseFloat(detail.qty || 0).toLocaleString()}</td>
                                            <td>₱ ${parseFloat(detail.price_per_kg || 0).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                                            <td>${detail.interest || 0}%</td>
                                            <td>₱ ${parseFloat(detail.added_amt || 0).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                                            <td>₱ ${parseFloat(detail.sub_total || 0).toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}</td>
                                        </tr>
                                    `;
                            });
                        } else {
                            riceTableBody = '<tr><td colspan="7" class="text-center">No transaction details found</td></tr>';
                        }
                        $('.rice-transactions-body').html(riceTableBody);
                    }

                    const hasPayments = payments && payments.length > 0;

                    // Build payment map from payments array
                    let paymentMap = {};
                    payments.forEach(item => {
                        if (item.payment_for) {
                            paymentMap[item.payment_for] = item.amt;
                        }
                    });

                    // Get start and due dates
                    const startDate = new Date(loanData.start_date);
                    let endDate = new Date(loanData.due_date);
                    const status = loanData.status;

                    // For completed loans, use completion date as end date
                    if (status === "completed" && loanData.complete_date) {
                        endDate = new Date(loanData.complete_date);
                    } else if (status === "overdue" && loanData.complete_date) {
                        endDate = new Date(loanData.complete_date);
                    }

                    // Start from date_added + 1 day
                    startDate.setDate(startDate.getDate() + 1);

                    // Generate daily payment rows from start date through due date
                    let tableBody = '';
                    let totalPayment = 0;
                    let rowIndex = 0;
                    let current = new Date(startDate);

                    while (current <= endDate) {
                        let dateStr = current.toISOString().split('T')[0];
                        let paymentAmt = parseFloat(paymentMap[dateStr]) || 0;
                        let formattedAmt = paymentAmt !== 0 ? paymentAmt.toLocaleString('en-US') : '';

                        totalPayment += paymentAmt;
                        rowIndex++;

                        tableBody += `
                                <tr>
                                    <td class="text-center">${rowIndex}</td>
                                    <td class="text-center">${current.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' })}</td>
                                    <td class="text-center">
                                        <input type="text"
                                            class="form-control text-center form-control-sm payment-input w-50 mx-auto ${paymentAmt ? 'text-success' : ''}"
                                            value="${formattedAmt !== 0 ? formattedAmt : ''}"
                                            ${paymentAmt !== 0 ? 'readonly' : ''} 
                                            data-date="${dateStr}" />
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-success edit-btn" 
                                            style="${!paymentAmt ? 'display:none;' : ''}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                    </td>
                                </tr>
                            `;

                        current.setDate(current.getDate() + 1);
                    }

                    // If no rows were generated, show message
                    if (rowIndex === 0) {
                        tableBody = '<tr><td colspan="4" class="text-center py-4 text-muted">No payment schedule available</td></tr>';
                    }
                    if (ongoingFishLoan) {
                        $('#addNewLoan').hide();
                    } else if (ongoingRiceLoan) {
                        $('#addNewLoan').hide();
                    } else {
                        $('#addNewLoan').show();
                    }

                    updateTotals(loanData, payments, loanId, totalPayment, null, type, loanData.cl_id);

                    // Populate the payment table
                    $('#paymentTableBody').html(tableBody);

                },
                error: function (xhr, status, error) {
                    if (status === 'abort') {
                        return;
                    }
                    console.error('Error loading loan details:', error);
                    Swal.fire('Error', 'Failed to load loan details. Please try again.', 'error');
                },
                complete: function () {
                    loanDetailsRequest = null;
                    activeLoanDetailsKey = null;
                }
            });
        };
    }

    function parseMoney(value) {
        return parseFloat(String(value).replace(/,/g, '')) || 0;
    }

    function formatMoney(amount) {
        return parseFloat(amount).toLocaleString('en-PH', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
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

            let input = $(this);
            let payment = input.val().trim();
            let loan_id = $('#header_loan_id').val();
            const paymentType = $('#current_loan_type').val();

            if (paymentType === "fish") {
                var paymentAmount = parseMoney(payment);
                var balanceAmount = parseMoney(fish_running_bal);

                if (paymentAmount > balanceAmount) {
                    Swal.fire('Error', 'Payment cannot exceed running balance of ₱ ' + formatMoney(balanceAmount), 'error');
                    return;
                }

            } else {
                var paymentAmount = parseMoney(payment);
                var balanceAmount = parseMoney(rice_running_bal);

                if (paymentAmount > balanceAmount) {
                    Swal.fire('Error', 'Payment cannot exceed running balance of ₱ ' + formatMoney(balanceAmount), 'error');
                    return;
                }
            }

            let row = input.closest('tr');
            let textDate = row.find('td:eq(1)').text().trim();
            let parsed = new Date(textDate + ' UTC');

            let yyyy = parsed.getFullYear();
            let mm = String(parsed.getMonth() + 1).padStart(2, '0');
            let dd = String(parsed.getDate()).padStart(2, '0');

            let date = `${yyyy}-${mm}-${dd}`;

            Swal.fire({
                title: 'Confirm Payment',
                html: `
                            <div class="text-start text-center">
                                <label class="form-label d-block">Payment Date :</label>
                                <input type="date"
                                    id="swal_payment_date"
                                    class="form-control w-50 mx-auto text-center"
                                    value="${date}">
                            </div>

                            <div class="mt-2">
                                Amount: <b>₱ ${payment}</b>
                            </div>
                        `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Save',
                cancelButtonText: 'Cancel',
                didOpen: () => {
                    document.addEventListener('keydown', function (e) {
                        if (e.key === 'Enter') {
                            e.preventDefault();
                            Swal.clickConfirm();
                        }
                    }, { once: true });
                },

                preConfirm: () => {
                    const selectedDate = document.getElementById('swal_payment_date').value;
                    if (!selectedDate) {
                        Swal.showValidationMessage('Please select a date');
                    }
                    return selectedDate;
                }
            }).then((result) => {
                if (!result.isConfirmed) return;

                $.ajax({
                    url: "<?php echo base_url('Monitoring_cont/save_payment'); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        trans_id: loan_id,
                        payment_for: date,
                        payment_date: result.value,
                        amount: payment,
                        type: paymentType
                    },
                    success: function (res) {
                        if (res.status === 'success') {
                            input.prop('readonly', true);
                            refreshLoanViewAfterPayment(loan_id, paymentType);
                        }
                    }
                });
            });
        }
    });

    function updateTotals(loanData, payments, loanId, totalPayment, firstStatus, type, cl_id) {

        const lastPaymentFor = payments.length > 0 ? payments[payments.length - 1].payment_for : null;
        const parsedTotalPayment = Number(totalPayment) || 0;
        const loanTotal = parseFloat(loanData.total_amt) || 0;
        const running_bal = Math.max(0, loanTotal - parsedTotalPayment);

        $('#total_payment').text(parsedTotalPayment.toLocaleString('en-PH', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));


        if (type === 'rice') {
            $('.rice-running-balance').text(running_bal.toLocaleString('en-PH', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }));
        } else if (type === 'fish') {
            $('.fish-running-balance').text(running_bal.toLocaleString('en-PH', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }));
        }

        const status = loanData.status;

        const due_date = loanData.due_date;
        const due_date_obj = new Date(due_date);
        // const today = new Date("2026-04-05");
        const today = new Date();

        const over_due = today - due_date_obj;

        const daysOverdue = Math.floor(over_due / (1000 * 60 * 60 * 24));

        let statusText = "";
        let statusClass = "";

        const capital_amt = parseFloat($('#header_capital_amt').text());

        if (status === 'completed') {
            statusText = "COMPLETED";
            statusClass = "text-success";
            if (capital_amt === 0) {
                $('#deleteLoanDetails').removeClass('d-none');
            }
            else {
                $('#deleteLoanDetails').addClass('d-none');
            }
        } else if (status === 'ongoing') {
            statusText = "ONGOING";
            statusClass = "text-primary";
            if (parsedTotalPayment > 0) {
                $('#deleteLoanDetails').addClass('d-none');
            } else {
                $('#deleteLoanDetails').removeClass('d-none');
            }
        } else if (status === 'overdue') {
            statusText = "OVERDUE";
            statusClass = "text-danger";
            $('#deleteLoanDetails').addClass('d-none');
        }

        // Show add new loan only if there's no pending balance

        console.log(firstStatus);

        // if (running_bal === 0) {
        //     $('#addNewLoan').show();

        // } else {
        //     $('#addNewLoan').hide();
        // }

        $('#header_status')
            .text(statusText)
            .removeClass("text-success text-primary text-danger")
            .addClass(statusClass);

        if (running_bal === 0 && status !== "completed") {
            autoCompleteLoan(loanId, running_bal, due_date, lastPaymentFor, type, cl_id, "completed");
        } else if (running_bal !== 0 && status === "completed") {
            autoCompleteLoan(loanId, running_bal, due_date, lastPaymentFor, type, cl_id, "ongoing");
        } else if (running_bal !== 0 && daysOverdue > 0 && status === "ongoing") {
            autoCompleteLoan(loanId, running_bal, due_date, lastPaymentFor, type, cl_id, "overdue");
        }
    }

    $(document).on('click', '.edit-btn', function () {
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

    function autoCompleteLoan(loanId, running_bal, due_date, lastPaymentFor, type, cl_id, action) {
        const activeTab = getCurrentViewLoanerTab();

        const completeDate = lastPaymentFor;

        if (action === "overdue") {
            openOverdueModal(loanId, running_bal, due_date, action, completeDate, type);
        } else {
            sendAjax();
        }

        cl_id = $('#header_id').val();
        acc_no = $('#header_acc_no').text();
        fullname = $('#header_name').text();
        address = $('#header_address').text();

        function sendAjax(values = {}) {

            if (action === "overdue") {
                var capital_amt = $('#new_capital_amt').val() || $('#running_bal').val();
                console.log(capital_amt);

                if (capital_amt === undefined || capital_amt === null) {
                    Swal.fire('Error', 'Please input capital amount.', 'error');
                    return;
                }

            }

            $.ajax({
                url: "<?php echo base_url('Monitoring_cont/complete_payment'); ?>",
                type: "POST",
                dataType: "json",
                data: {
                    loan_id: loanId,
                    running_bal: values.running_bal ?? $('#new_capital_amt').val() ?? $('#running_bal').val(),
                    interest: values.interest ?? $('#new_interest').val() ?? $('#interest').val(),
                    added_amt: values.added_amt ?? $('#new_added_amt').val() ?? $('#added_amt').val(),
                    total_amt: values.total_amt ?? $('#new_total_amt').val() ?? $('#total_amt').val(),
                    due_date: due_date,
                    new_start_date: $('#new_start_date').val(),
                    action: action,
                    type: type,
                    cl_id: cl_id,
                    complete_date: completeDate
                },
                success: function (res) {
                    if (res.status === 'success') {

                        if (res.data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Loan Added!',
                                text: 'New loan record has been successfully inserted.',
                                timer: 1000,
                                showConfirmButton: false
                            });
                        }
                        openViewModal(cl_id, fullname, address, acc_no, loanId, type, activeTab);

                        $('#overdueModal').modal('hide');

                    }
                }
            });
        }

        function openOverdueModal(loanId, running_bal, due_date, action, completeDate) {
            $('#new_capital_amt').val(running_bal);
            $('#new_interest').val('15');
            $('#new_added_amt').val('');
            $('#new_total_amt').val(running_bal.toFixed(2));
            $('#new_start_date').val(due_date);

            function calculateNewTotal() {
                let capital = parseFloat($('#new_capital_amt').val()) || 0;
                let interest = parseFloat($('#new_interest').val()) || 0;
                let added = parseFloat($('#new_added_amt').val()) || 0;

                let total = capital + (capital * (interest / 100)) + added;
                $('#new_total_amt').val(total.toFixed(2));
            }

            $('#new_capital_amt, #new_interest, #new_added_amt').off('input').on('input', calculateNewTotal);

            calculateNewTotal();

            $('#overdueModal').modal('show');
        }

        $('#modalContinueBtn').off('click').on('click', function () {
            sendAjax();
        });
    }


    function openAddNewLoanModal() {

        console.log(hasFishCredit);
        console.log(hasRiceCredit);

        // Fish section
        var fishSelect = $('#fish_type_select');
        var fishAddBtn = $('#addFishItem');
        var fishPriceFieldId = fishSelect.data('price-field');

        if (typeof hasFishCredit !== 'undefined' && hasFishCredit) {
            fishSelect.prop('disabled', true);
            $('#' + fishPriceFieldId).prop('disabled', true);
            fishAddBtn.hide();
        } else {
            fishSelect.prop('disabled', false);
            $('#' + fishPriceFieldId).prop('disabled', false);
            fishAddBtn.show();
        }

        // Rice section
        var riceSelect = $('#rice_type_select');
        var riceAddBtn = $('#addRiceItem');
        var ricePriceFieldId = riceSelect.data('price-field');

        if (typeof hasRiceCredit !== 'undefined' && hasRiceCredit) {
            riceSelect.prop('disabled', true);
            $('#' + ricePriceFieldId).prop('disabled', true);
            riceAddBtn.hide();
        } else {
            riceSelect.prop('disabled', false);
            $('#' + ricePriceFieldId).prop('disabled', false);
            riceAddBtn.show();
        }

        $('#addLoanSameClient').modal('show');
    }

    function calculateTotalHeader() {
        // Remove commas before parsing
        let capital = parseFloat($('#header_capital_amt input').val().replace(/,/g, '')) || 0;
        let interestRaw = $('#header_interest input').val().replace(/,/g, '').replace('%', '');
        let interest = parseFloat(interestRaw) || 0;
        let added = parseFloat($('#header_added_amt input').val().replace(/,/g, '')) || 0;

        // Calculate total
        let total = capital + (capital * (interest / 100)) + added;

        // Format total with 2 decimals
        let formattedTotal = total.toFixed(2);

        // Update the span or input
        const totalSpan = $('#header_total_amt');
        const totalInput = totalSpan.find('input');
        if (totalInput.length) {
            totalInput.val(formattedTotal);
        } else {
            totalSpan.text(formattedTotal);
        }
    }

    $('#deleteLoanDetails').on('click', function () {
        const loan_id = $('#header_loan_id').val();
        const id = $('#header_id').val();
        const acc_no = $('#header_acc_no').text();
        const full_name = $('#header_name').text();
        const address = $('#header_address').text();

        console.log(id);

        swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleting...',
                    text: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '<?php echo base_url('Monitoring_cont/delete_loan_id'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: { id: loan_id },
                    success: function (res) {
                        if (res.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: res.message,
                                showConfirmButton: false,
                                timer: 500
                            });
                            $('#header_date_arr').val($('#header_date_arr option:first').val()).trigger('change');
                            openViewModal(id, full_name, address, acc_no);
                        } else {
                            Swal.fire('Error!', res.message, 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error!', 'Failed to delete variance record', 'error');
                    }
                });
            }
        });
    });

    $('#editLoanDetails').off('click').on('click', function () {
        const btn = $(this);

        $('#dateDropdownBtn').prop('disabled', true);

        $('#cancelEdit').show();

        if (!btn.data('original')) {
            btn.data('original', {
                header_capital_amt: $('#header_capital_amt').text(),
                header_interest: $('#header_interest').text(),
                header_added_amt: $('#header_added_amt').text(),
                header_total_amt: $('#header_total_amt').text(),
                header_loan_date: $('#header_loan_date').text(),
                header_due_date: $('#header_due_date').text()
            });
        }

        if (!btn.data('mode') || btn.data('mode') === 'edit') {
            btn.data('mode', 'save');
            btn.html('<i class="fas fa-save"></i> Save');

            const numericFields = ['header_capital_amt', 'header_interest', 'header_added_amt'];
            numericFields.forEach(id => {
                const span = document.getElementById(id);
                if (!span.querySelector('input')) {
                    const currentText = span.innerText.trim();
                    const numericValue = currentText.replace(/,/g, ''); // remove commas

                    const input = document.createElement('input');
                    input.type = 'number';
                    input.value = numericValue;
                    input.style.width = '100px';
                    input.classList.add('form-control', 'form-control-sm', 'd-inline');
                    span.innerHTML = ''; // clear old text
                    span.appendChild(input);

                    $(input).on('input', calculateTotalHeader);
                }
            });

            const loanDateSpan = document.getElementById('header_loan_date');
            const dueDateSpan = document.getElementById('header_due_date');

            if (!loanDateSpan.querySelector('input')) {
                const currentText = loanDateSpan.innerText.trim();

                // Add text node so input is beside text
                const textNode = document.createTextNode(currentText + ' ');
                loanDateSpan.innerHTML = '';
                loanDateSpan.appendChild(textNode);

                const input = document.createElement('input');
                input.type = 'date';
                if (currentText) {
                    const date = new Date(currentText);
                    if (!isNaN(date)) {
                        const yyyy = date.getFullYear();
                        const mm = String(date.getMonth() + 1).padStart(2, '0'); // months are 0-based
                        const dd = String(date.getDate()).padStart(2, '0');
                        input.value = `${yyyy}-${mm}-${dd}`; // set input in YYYY-MM-DD format
                    }

                    // Set due date immediately
                    const dueDate = new Date(date);
                    dueDate.setDate(dueDate.getDate() + 58);
                    const dueY = dueDate.getFullYear();
                    const dueM = String(dueDate.getMonth() + 1).padStart(2, '0');
                    const dueD = String(dueDate.getDate()).padStart(2, '0');
                    dueDateSpan.innerText = `${dueY}-${dueM}-${dueD}`;
                }


                input.style.width = '140px';
                input.classList.add('form-control', 'form-control-sm', 'd-inline');
                loanDateSpan.appendChild(input);

                input.addEventListener('input', function () {
                    const loanDate = new Date(this.value);
                    if (!isNaN(loanDate)) {
                        const dueDate = new Date(loanDate);
                        dueDate.setDate(dueDate.getDate() + 58);
                        dueDateSpan.innerText = dueDate.toISOString().split('T')[0];

                        calculateTotalHeader();
                    }
                });
            }

        } else {
            btn.data('mode', 'edit');
            btn.html('<i class="fas fa-edit"></i> Edit');

            const editableFields = [
                'header_capital_amt',
                'header_interest',
                'header_added_amt',
                'header_total_amt',
                'header_loan_date'
            ];

            let data = {};
            editableFields.forEach(id => {
                const span = document.getElementById(id);
                const input = span.querySelector('input');
                if (input) {
                    // remove commas before sending
                    const numericValue = input.value.replace(/,/g, '');
                    data[id] = numericValue;
                    span.innerText = Number(numericValue).toLocaleString(); // format with commas
                } else {
                    data[id] = span.innerText.replace(/,/g, '');
                }
            });

            data['header_due_date'] = document.getElementById('header_due_date').innerText;
            data['loan_id'] = $('#header_loan_id').val();

            const id = $('#header_id').val();
            const acc_no = $('#header_acc_no').text();
            const full_name = $('#header_name').text();
            const address = $('#header_address').text();

            $.ajax({
                url: "<?php echo base_url('Monitoring_cont/update_loan_data'); ?>",
                type: 'POST',
                data: data,
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 800,
                        timerProgressBar: true,
                    });

                    $('#dateDropdownBtn').prop('disabled', false);
                    $('#header_date_arr').val($('#header_date_arr option:first').val()).trigger('change');
                    openViewModal(id, full_name, address, acc_no);
                    $('#cancelEdit').hide();
                },
                error: function (xhr, status, error) {
                    alert('Error saving loan details: ' + error);
                }
            });
        }

        $('#cancelEdit').off('click').on('click', function () {
            const btn = $('#editLoanDetails');
            const original = btn.data('original');
            $('#dateDropdownBtn').prop('disabled', false);

            if (!original) return;

            $('#header_capital_amt').text(original.header_capital_amt);
            $('#header_interest').text(original.header_interest);
            $('#header_added_amt').text(original.header_added_amt);
            $('#header_total_amt').text(original.header_total_amt);
            $('#header_loan_date').text(original.header_loan_date);
            $('#header_due_date').text(original.header_due_date);

            btn.data('mode', 'edit');
            btn.html('<i class="fas fa-edit"></i> Edit');

            btn.removeData('original');
            $('#cancelEdit').hide();
        });
    });

    $(document).on('click', '#generate_daily', function () {
        const selectedDate = $('#selected_date').val();

        if (!selectedDate) {
            Swal.fire('Error', 'Please select a valid date.', 'error');
            return;
        }

        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/get_daily_report'); ?>',
            type: 'POST',
            data: { date: selectedDate },
            xhrFields: {
                responseType: 'blob' // Handle binary response
            },
            success: function (blob, status, xhr) {
                // Get filename from headers
                var filename = 'Daily_Report_' + selectedDate + '.xlsx';
                var disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                }

                // Create download link
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);

                Swal.fire('Success!', 'Report downloaded to your computer.', 'success');
            },
            error: function () {
                Swal.fire('Error', 'Failed to generate report.', 'error');
            }
        });
    });

    $(document).on('click', '#generate_weekly', function () {
        const selectedDate = $('#selected_date').val();

        if (!selectedDate) {
            Swal.fire('Error', 'Please select a valid date.', 'error');
            return;
        }

        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/get_weekly_report'); ?>',
            type: 'POST',
            data: { date: selectedDate },
            xhrFields: {
                responseType: 'blob' // Handle binary response
            },
            success: function (blob, status, xhr) {
                // Get filename from headers
                var filename = 'Daily_Report_' + selectedDate + '.xlsx';
                var disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                }

                // Create download link
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);

                Swal.fire('Success!', 'Report downloaded to your computer.', 'success');
            },
            error: function () {
                Swal.fire('Error', 'Failed to generate report.', 'error');
            }
        });
    });

    $(document).on('click', '#generate_monthly', function () {
        const selectedDate = $('#selected_date').val();

        if (!selectedDate) {
            Swal.fire('Error', 'Please select a valid date.', 'error');
            return;
        }

        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/get_monthly_report'); ?>',
            type: 'POST',
            data: { date: selectedDate },
            xhrFields: {
                responseType: 'blob' // Handle binary response
            },
            success: function (blob, status, xhr) {
                // Get filename from headers
                var filename = 'Daily_Report_' + selectedDate + '.xlsx';
                var disposition = xhr.getResponseHeader('Content-Disposition');
                if (disposition && disposition.indexOf('attachment') !== -1) {
                    var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
                    var matches = filenameRegex.exec(disposition);
                    if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
                }

                // Create download link
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);

                Swal.fire('Success!', 'Report downloaded to your computer.', 'success');
            },
            error: function () {
                Swal.fire('Error', 'Failed to generate report.', 'error');
            }
        });
    });

    let bulkPaymentData = {
        selected_date: null,
        payments: []
    };

    $(document).on('click', '#bulk_payment', function () {
        const date = $('#selected_date').val();
        bulkPaymentData.selected_date = date;

        if (!date) {
            Swal.fire('Error', 'Please select a valid date.', 'error');
            return;
        }

        Swal.fire({
            title: 'Loading...',
            html: 'Please wait while we fetch bulk payments.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        console.log(date);
        $('#bulk_date').text(formatDate(date));

        $.ajax({
            url: '<?php echo site_url('Monitoring_cont/get_bulk_payment'); ?>',
            type: 'POST',
            dataType: 'json',
            data: { date: date },
            success: function (response) {
                Swal.close();
                console.log(response);

                let entryCount = response.data.length;

                let totalAmt = response.data.reduce((sum, item) => sum + (parseFloat(item.amt) || 0), 0);

                populateBulkPaymentTable(response, date);
                $('#total_clients_count').text(entryCount);
                $('#total_payments_sum').text(totalAmt.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }));

                $('#bulk_payment_modal').modal('show');
            },
            error: function () {
                Swal.close();
                Swal.fire('Error', 'Something went wrong.', 'error');
            }
        });
    });

    function populateBulkPaymentTable(response, date) {
        const table = $('#bulk_payment_table');
        const thead = table.find('thead');
        const tbody = table.find('tbody');

        tbody.empty();
        thead.empty();

        const headerRow = $('<tr></tr>');
        headerRow.append('<th style="width:20%; background-color:var(--light-grey); font-size:13px; height:40px; color:var(--dark); font-weight: bold;" class="text-center align-middle">ACC NO</th>');
        headerRow.append('<th style="width:65%; background-color:var(--light-grey); font-size:13px; color:var(--dark); font-weight: bold" class="align-middle">FULL NAME</th>');
        headerRow.append('<th style="width:15%; background-color:var(--light-grey); font-size:13px; color:var(--dark); font-weight: bold" class="text-center align-middle">AMOUNT</th>');
        thead.append(headerRow);

        // Check if we have data
        if (!response.data || response.data.length === 0) {
            const emptyRow = $('<tr></tr>');
            emptyRow.append('<td colspan="3" class="text-center py-4">No clients found for the selected date</td>');
            tbody.append(emptyRow);
            return;
        }

        // Create table rows
        response.data.forEach(client => {
            const row = $('<tr></tr>');

            // Add account number
            const accNoCell = $('<td class="text-center align-middle"></td>').text(client.acc_no || 'N/A');
            row.append(accNoCell);

            // Add client name (proper case)
            const formattedName = client.full_name ?
                client.full_name.toLowerCase().replace(/\b\w/g, char => char.toUpperCase()) : 'N/A';
            const nameCell = $('<td class="align-middle"></td>').text(formattedName);
            row.append(nameCell);

            // Add amount column with input
            const hasPayment = client.amt && parseFloat(client.amt) > 0;
            const inputValue = hasPayment ? client.amt : '';

            const amountCell = $('<td class="text-center align-middle"></td>');
            const input = $(`
            <input type="${hasPayment ? 'text' : 'number'}" 
                class="form-control form-control-sm bulk-payment-input text-center ${hasPayment ? 'bg-light text-success fw-bold' : ''}"   
                value="${inputValue}" 
                data-client-id="${client.client_id}" 
                data-loan-id="${client.loan_id}" 
                data-date="${date}"
                ${hasPayment ? 'readonly' : ''}
                ${hasPayment ? 'title="Payment already recorded"' : ''}
                step="0.01" 
                min="0" 
                style="width: 100px; margin: 0 auto;">
        `);

            amountCell.append(input);
            row.append(amountCell);

            tbody.append(row);
        });

        // Log for debugging
        console.log('Table populated with', response.data.length, 'rows');
    }

    // Helper function for showing no data message
    function showNoDataMessage(tbody, colSpan) {
        const row = $(`<tr><td colspan="${colSpan}" class="text-center">No data found</td></tr>`);
        tbody.append(row);
    }

    $(document).on('click', '#save_bulk_payments', function () {
        const date = bulkPaymentData.selected_date;
        const payments = [];

        // Collect all payment inputs that are NOT readonly
        $('.bulk-payment-input').each(function () {
            const input = $(this);

            // Skip readonly inputs (existing payments)
            if (input.prop('readonly')) {
                return true; // continue to next iteration
            }

            const amount = parseFloat(input.val()) || 0;

            // Only include if amount is greater than 0
            if (amount > 0) {
                payments.push({
                    client_id: input.data('client-id'),
                    loan_id: input.data('loan-id'),
                    payment_date: input.data('date'), // The selected date
                    amount: amount
                });
            }
        });

        if (payments.length === 0) {
            Swal.fire('Warning', 'No payments to save. Please enter amounts.', 'warning');
            return;
        }

        // Calculate total amount
        const totalAmount = payments.reduce((sum, payment) => sum + payment.amount, 0);

        // Show confirmation SweetAlert
        Swal.fire({
            title: 'Confirm Bulk Payment',
            html: `
                <div style="text-align: center;">
                    <p>Are you sure you want to save <strong>${payments.length}</strong> payment(s)?</p>
                    <p><strong>Total Amount:</strong> ₱${totalAmount.toFixed(2)}</p>
                    <p><strong>Payment Date:</strong> ${formatDate(date)}</p>
                    <p>This action cannot be undone.</p>
                </div>
            `,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save payments!',
            cancelButtonText: 'Cancel',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return new Promise((resolve) => {
                    $.ajax({
                        url: '<?php echo site_url('Monitoring_cont/save_bulk_payments'); ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            date: date,
                            payments: payments
                        },
                        success: function (response) {
                            resolve(response);
                        },
                        error: function () {
                            Swal.showValidationMessage('Something went wrong while saving.');
                            resolve(false);
                        }
                    });
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.value.success) {
                Swal.fire({
                    title: 'Success!',
                    html: `
                        <div style="text-align: center;">
                            <p>${result.value.message}</p>
                            <p><strong>Payments saved:</strong> ${payments.length}</p>
                            <p><strong>Total amount:</strong> ₱${totalAmount.toFixed(2)}</p>
                        </div>
                    `,
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    $('#bulk_payment_modal').modal('hide');
                    client_table.ajax.reload();
                });
            } else {
                Swal.fire('Error', result.value.message || 'Failed to save payments', 'error');
            }
        });
    });

    function formatSmartDate(dateString, previousDate = null) {
        const date = new Date(dateString);

        let includeYear = false;
        if (previousDate) {
            const prevDate = new Date(previousDate);
            if (date.getFullYear() !== prevDate.getFullYear()) {
                includeYear = true;
            }
        }

        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const month = monthNames[date.getMonth()];
        const day = date.getDate();

        if (includeYear) {
            const year = date.getFullYear().toString().substr(-2); // Last 2 digits
            return `${month} ${day} '${year}`;
        }

        return `${month} ${day}`;
    }

    function formatMonthDay(dateString) {
        const date = new Date(dateString);

        // Get month abbreviation
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const month = monthNames[date.getMonth()];

        // Get day without leading zero
        const day = date.getDate();

        return `${month} ${day}`;
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric',
            year: 'numeric'
        });
    }

    $(document).on('click', '#variance_tracking', function () {
        $('#variance_modal').modal('show');
    });

    var variance_table = $("#variance_table").DataTable({
        columnDefs: [{ targets: '_all', orderable: true }],
        lengthMenu: [10, 25, 50, 100],
        processing: true,
        serverSide: true,
        searching: true,
        ordering: true,
        autoWidth: false,
        ajax: {
            url: '<?php echo site_url('Monitoring_cont/get_variance_data'); ?>',
            type: 'POST',
            data: function (d) {
                d.start = d.start || 0;
                d.length = d.length || 10;
            },
            dataType: 'json',
            error: function (xhr, status, error) {
                console.error("AJAX request failed: " + error);
            },
            dataSrc: function (response) {
                function formatPeso(num) {
                    if (!num && num !== 0) return '—';
                    return '₱ ' + parseFloat(num).toLocaleString('en-US', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                }

                $('#total_over').text(formatPeso(response.total_over));
                $('#total_short').text(formatPeso(response.total_short));

                return response.data;
            },
        },
        columns: [
            { data: 'date_added', class: 'text-center' },
            {
                data: 'over',
                class: 'text-center',
                render: function (data, type, row) {
                    if (type === 'display') {
                        if (!data && data !== 0) return '—';
                        return '₱ ' + parseFloat(data).toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                    }
                    return data;
                }
            },
            {
                data: 'short',
                class: 'text-center',
                render: function (data, type, row) {
                    if (type === 'display') {
                        if (!data && data !== 0) return '—';
                        return '₱ ' + parseFloat(data).toLocaleString('en-US', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                    }
                    return data;
                }
            },
            {
                data: 'id',
                orderable: false,
                className: 'text-center',
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-success edit-btn" data-id="${data}" data-date="${row.date_added}" data-over="${row.over}" data-short="${row.short}">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="${data}">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                `;
                }
            }
        ]
    });

    function openAddVariance() {
        $('#addVarianceModal').modal('show');

        // Remove previous event handler to avoid duplicate submissions
        $('#addVariance').off('click').on('click', function () {
            const over = $('#variance_over').val();
            const short = $('#variance_short').val();
            const date = $('#variance_date').val();

            // Validation
            if (!over && !short) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Validation Error',
                    text: 'Please enter either Over or Short amount',
                    confirmButtonColor: '#3085d6'
                });
                return;
            }

            if (!date) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Validation Error',
                    text: 'Please select a date',
                    confirmButtonColor: '#3085d6'
                });
                return;
            }

            // Confirmation dialog
            Swal.fire({
                title: 'Confirm Addition',
                text: `Are you sure you want to add this variance record?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading state
                    Swal.fire({
                        title: 'Processing...',
                        text: 'Please wait',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    $.ajax({
                        url: "<?php echo base_url('Monitoring_cont/add_variance'); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            over: over,
                            short: short,
                            date: date,
                        },
                        success: function (res) {
                            if (res.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: res.message,
                                    showConfirmButton: false,
                                    timer: 500,
                                    timerProgressBar: true,
                                });
                                variance_table.ajax.reload();
                                $('#addVarianceModal').modal('hide');
                                resetVarianceForm();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: res.message || 'Failed to add variance record',
                                    confirmButtonColor: '#3085d6'
                                });
                            }
                        },
                        error: function () {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while processing your request',
                                confirmButtonColor: '#3085d6'
                            });
                        }
                    });
                }
            });
        });
    }

    $('#variance_table').on('click', '.edit-btn', function () {
        const $btn = $(this);
        const $row = $btn.closest('tr');
        const id = $btn.data('id');
        const originalDate = $btn.data('date');
        const originalOver = $btn.data('over');
        const originalShort = $btn.data('short');

        // Get the cells to edit (date, over, short columns)
        const $dateCell = $row.find('td:eq(0)');
        const $overCell = $row.find('td:eq(1)');
        const $shortCell = $row.find('td:eq(2)');
        const $actionCell = $row.find('td:eq(3)');

        // Store original values
        $row.data('original-date', originalDate);
        $row.data('original-over', originalOver);
        $row.data('original-short', originalShort);
        $row.data('id', id);

        // Replace text with input fields
        $dateCell.html(`<input type="date" class="form-control form-control-sm edit-date" value="${originalDate}">`);
        $overCell.html(`<input type="number" class="form-control form-control-sm edit-over" value="${originalOver}" step="0.01" min="0">`);
        $shortCell.html(`<input type="number" class="form-control form-control-sm edit-short" value="${originalShort}" step="0.01" min="0">`);

        // Replace buttons with Save and Cancel
        $actionCell.html(`
            <div>
                <button class="btn btn-sm btn-primary save-btn" data-id="${id}">
                    <i class="fas fa-save"></i> Save
                </button>
                <button class="btn btn-sm btn-secondary cancel-btn">
                    <i class="fas fa-times"></i> Cancel
                </button>
            </div>
        `);

        $('.edit-over').on('input', function () {
            if ($(this).val() > 0 && $(this).val() !== '') {
                $('.edit-short').val(0);
            }
        });

        $('.edit-short').on('input', function () {
            if ($(this).val() > 0 && $(this).val() !== '') {
                $('.edit-over').val(0);
            }
        });
    });

    $('#variance_table').on('click', '.save-btn', function () {
        const $btn = $(this);
        const $row = $btn.closest('tr');
        const id = $btn.data('id');
        const date = $row.find('.edit-date').val();
        const over = $row.find('.edit-over').val() || 0;
        const short = $row.find('.edit-short').val() || 0;

        if (!date) {
            Swal.fire('Error', 'Please select a date', 'error');
            return;
        }

        if (over == 0 && short == 0) {
            Swal.fire('Error', 'Please enter either Over or Short amount', 'error');
            return;
        }

        if (over > 0 && short > 0) {
            Swal.fire('Error', 'Please enter only one value (either Over OR Short, not both)', 'error');
            return;
        }

        Swal.fire({
            title: 'Updating...',
            text: 'Please wait',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: '<?php echo base_url('Monitoring_cont/update_variance'); ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                date: date,
                over: over,
                short: short
            },
            success: function (res) {
                if (res.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: res.message,
                        showConfirmButton: false,
                        timer: 500
                    });
                    variance_table.ajax.reload();
                } else {
                    Swal.fire('Error!', res.message, 'error');
                }
            },
            error: function () {
                Swal.fire('Error!', 'Failed to update variance record', 'error');
            }
        });
    });

    // Cancel button click - restore original values
    $('#variance_table').on('click', '.cancel-btn', function () {
        const $btn = $(this);
        const $row = $btn.closest('tr');
        const id = $row.data('id');
        const originalDate = $row.data('original-date');
        const originalOver = $row.data('original-over');
        const originalShort = $row.data('original-short');

        // Restore original values
        $row.find('td:eq(0)').html(originalDate);
        $row.find('td:eq(1)').html(originalOver ? '₱ ' + parseFloat(originalOver).toLocaleString('en-US', { minimumFractionDigits: 2 }) : '—');
        $row.find('td:eq(2)').html(originalShort ? '₱ ' + parseFloat(originalShort).toLocaleString('en-US', { minimumFractionDigits: 2 }) : '—');

        // Restore original buttons
        $row.find('td:eq(3)').html(`
            <div>
                <button class="btn btn-sm btn-success edit-btn" data-id="${id}" data-date="${originalDate}" data-over="${originalOver}" data-short="${originalShort}">
                    <i class="fas fa-edit"></i> Edit
                </button>
                <button class="btn btn-sm btn-danger delete-btn" data-id="${id}">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </div>
        `);
    });

    // Delete button click with confirmation
    $('#variance_table').on('click', '.delete-btn', function () {
        const $btn = $(this);
        const id = $btn.data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleting...',
                    text: 'Please wait',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '<?php echo base_url('Monitoring_cont/delete_variance'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: { id: id },
                    success: function (res) {
                        if (res.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: res.message,
                                showConfirmButton: false,
                                timer: 500
                            });
                            variance_table.ajax.reload();
                        } else {
                            Swal.fire('Error!', res.message, 'error');
                        }
                    },
                    error: function () {
                        Swal.fire('Error!', 'Failed to delete variance record', 'error');
                    }
                });
            }
        });
    });

    function resetVarianceForm() {
        $('#variance_over').val("");
        $('#variance_short').val("");
        $('#variance_date').val('<?= date('Y-m-d') ?>');
    }

    $('#addVarianceModal').on('hidden.bs.modal', function () {
        resetVarianceForm();
    });

    const viewLoanerEl = document.getElementById('viewLoaner');
    const overdueModalEl = document.getElementById('overdueModal');
    const addNewModalEl = document.getElementById('addLoanSameClient');
    const varianceModal = document.getElementById('variance_modal');
    const addVariance = document.getElementById('addVarianceModal');

    viewLoanerEl.addEventListener('hidden.bs.modal', () => {
        $('#dateDropdownBtn').prop('disabled', false);

        $('#cancelEdit').hide();
        const btn = $('#editLoanDetails');

        btn.data('mode', 'edit');
        btn.prop('disabled', false);
        btn.html('<i class="fas fa-edit"></i> Edit');
    });

    overdueModalEl.addEventListener('show.bs.modal', () => {
        viewLoanerEl.classList.add('modal-dimmed');
        addNewModalEl.classList.add('modal-dimmed');
    });

    overdueModalEl.addEventListener('hidden.bs.modal', () => {
        viewLoanerEl.classList.remove('modal-dimmed');
        addNewModalEl.classList.remove('modal-dimmed');
    });

    addNewModalEl.addEventListener('show.bs.modal', () => {
        viewLoanerEl.classList.add('modal-dimmed');
    });

    addNewModalEl.addEventListener('hidden.bs.modal', () => {
        viewLoanerEl.classList.remove('modal-dimmed');
    });

    addVariance.addEventListener('show.bs.modal', () => {
        varianceModal.classList.add('modal-dimmed');
    });

    addVariance.addEventListener('hidden.bs.modal', () => {
        varianceModal.classList.remove('modal-dimmed');
    });

    // function loadFishLoanDetails() {
    //     const firstFishItem = $('#header_date_arr .dropdown-item[data-type="fish"]').first();

    //     console.log(firstFishItem);

    //     if (firstFishItem.length > 0) {
    //         firstFishItem.trigger('click');
    //     } else {
    //         // No fish transactions, clear the display
    //         $('.fish-start-date').text('');
    //         $('.fish-due-date').text('');
    //         $('.fish-total-amt').text('');
    //         $('.fish-status').text('');
    //         $('.fish-date-completed').text('');
    //         $('.fish-transactions-body').html('<tr><td colspan="6" class="text-center">No fish transactions found</td></tr>');
    //         $('.fish-running-balance').text('');
    //         $('#paymentTableBody').html('<tr><td colspan="4" class="text-center py-4 text-muted"><i class="fas fa-inbox fa-2x mb-2"></i><br>No payment records found</td></tr>');
    //         $('#total_payment').text('0.00');
    //     }
    // }

    // function loadRiceLoanDetails() {
    //     const firstRiceItem = $('#header_date_arr .dropdown-item[data-type="rice"]').first();
    //     console.log(firstRiceItem);
    //     if (firstRiceItem.length > 0) {
    //         firstRiceItem.trigger('click');
    //     } else {
    //         // No rice transactions, clear the display
    //         $('.rice-start-date').text('');
    //         $('.rice-due-date').text('');
    //         $('.rice-total-amt').text('');
    //         $('.rice-status').text('');
    //         $('.rice-date-completed').text('');
    //         $('.rice-transactions-body').html('<tr><td colspan="7" class="text-center">No rice transactions found</td></tr>');
    //         $('.rice-running-balance').text('');
    //         $('#paymentTableBody').html('<tr><td colspan="4" class="text-center py-4 text-muted"><i class="fas fa-inbox fa-2x mb-2"></i><br>No payment records found</td></tr>');
    //         $('#total_payment').text('0.00');
    //     }
    // }</script>