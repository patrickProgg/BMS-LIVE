<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rice Inventory Monitoring</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .progress-bar-custom {
            transition: width 0.5s ease;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
            cursor: pointer;
        }

        .status-badge {
            font-size: 0.8rem;
            padding: 5px 10px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container-fluid py-4">

        <!-- Summary Cards -->
        <div class="row g-4 mb-4">
            <!-- Total Rice Stock Card -->
            <div class="col-md-3">
                <div class="card bg-primary text-white card-hover">
                    <div class="card-body">
                        <h6 class="card-title"><i class="fas fa-warehouse"></i> Total Rice Stock</h6>
                        <h2 class="mb-0">11,250 KG</h2>
                        <small>245 total sacks</small>
                    </div>
                </div>
            </div>

            <!-- 25kg Sacks Card -->
            <div class="col-md-3">
                <div class="card bg-success text-white card-hover">
                    <div class="card-body">
                        <h6 class="card-title"><i class="fas fa-box"></i> 25kg Sacks</h6>
                        <h2 class="mb-0">150</h2>
                        <small>3,750 KG</small>
                    </div>
                </div>
            </div>

            <!-- 50kg Sacks Card -->
            <div class="col-md-3">
                <div class="card bg-info text-white card-hover">
                    <div class="card-body">
                        <h6 class="card-title"><i class="fas fa-cubes"></i> 50kg Sacks</h6>
                        <h2 class="mb-0">95</h2>
                        <small>4,750 KG</small>
                    </div>
                </div>
            </div>

            <!-- Low Stock Alert Card -->
            <div class="col-md-3">
                <div class="card bg-warning text-dark card-hover">
                    <div class="card-body">
                        <h6 class="card-title"><i class="fas fa-exclamation-triangle"></i> Low Stock Alert</h6>
                        <h2 class="mb-0">3</h2>
                        <small>Rice types below 100kg</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Table -->
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0"><i class="fas fa-list"></i> Rice Inventory Details</h5>
            </div>
            <div class="card-body">
                <!-- Search and Filter -->
                <div class="row mb-3">
                    <div class="col-md-4">
                        <input type="text" id="searchRice" class="form-control" placeholder="🔍 Search rice type...">
                    </div>
                    <div class="col-md-3">
                        <select id="filterStock" class="form-select">
                            <option value="all">All Stock</option>
                            <option value="low">Low Stock (< 100kg)</option>
                            <option value="normal">Normal Stock</option>
                            <option value="out">Out of Stock</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100" onclick="exportReport()">
                            <i class="fas fa-download"></i> Export
                        </button>
                    </div>
                </div>

                <table id="rice_table" class="table table-hover table-bordered" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%"></th>
                            <th style="width: 5%">NO</th>
                            <th>RICE TYPE</th>
                            <th>25KG SACKS</th>
                            <th>50KG SACKS</th>
                            <th>TOTAL KG</th>
                            <th>STATUS</th>
                            <th>LAST UPDATE</th>
                            <th style="width: 15%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rice Type 1 - Jasmine Rice -->
                        <tr class="parent-row" data-id="1">
                            <td>
                                <button class="btn btn-sm btn-link toggle-details" data-id="1">
                                    <i class="fas fa-plus-circle text-primary"></i>
                                </button>
                            </td>
                            <td>1</td>
                            <td>
                                <strong>Jasmine Rice</strong><br>
                                <small class="text-muted">Premium Grade</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-primary">45 pcs</span><br>
                                <small>1,125 KG</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success">30 pcs</span><br>
                                <small>1,500 KG</small>
                            </td>
                            <td class="text-center">
                                <strong class="text-success">2,625 KG</strong>
                            </td>
                            <td>
                                <span class="badge bg-success status-badge">In Stock</span>
                            </td>
                            <td>2024-01-15</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="viewStock(1)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="sellRice(1)">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="detail-row-1" style="display: none;">
                            <td colspan="9">
                                <div class="card m-2">
                                    <div class="card-body">
                                        <h6>📊 Transaction History - Jasmine Rice</h6>
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Transaction Type</th>
                                                    <th>Quantity (KG)</th>
                                                    <th>Type of Sack</th>
                                                    <th>Reference</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2024-01-15</td>
                                                    <td>Stock In</td>
                                                    <td>1,000 KG</td>
                                                    <td>25kg & 50kg</td>
                                                    <td>PO-001</td>
                                                </tr>
                                                <tr>
                                                    <td>2024-01-10</td>
                                                    <td>Sold</td>
                                                    <td>250 KG</td>
                                                    <td>25kg (10 sacks)</td>
                                                    <td>INV-101</td>
                                                </tr>
                                                <tr>
                                                    <td>2024-01-05</td>
                                                    <td>Sold</td>
                                                    <td>200 KG</td>
                                                    <td>50kg (4 sacks)</td>
                                                    <td>INV-098</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Rice Type 2 - White Rice -->
                        <tr class="parent-row" data-id="2">
                            <td>
                                <button class="btn btn-sm btn-link toggle-details" data-id="2">
                                    <i class="fas fa-plus-circle text-primary"></i>
                                </button>
                            </td>
                            <td>2</td>
                            <td>
                                <strong>White Rice</strong><br>
                                <small class="text-muted">Regular Grade</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-primary">60 pcs</span><br>
                                <small>1,500 KG</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success">40 pcs</span><br>
                                <small>2,000 KG</small>
                            </td>
                            <td class="text-center">
                                <strong class="text-success">3,500 KG</strong>
                            </td>
                            <td>
                                <span class="badge bg-success status-badge">In Stock</span>
                            </td>
                            <td>2024-01-14</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="viewStock(2)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="sellRice(2)">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="detail-row-2" style="display: none;">
                            <td colspan="9">
                                <div class="card m-2">
                                    <div class="card-body">
                                        <h6>📊 Transaction History - White Rice</h6>
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Transaction Type</th>
                                                    <th>Quantity</th>
                                                    <th>Type of Sack</th>
                                                    <th>Reference</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2024-01-14</td>
                                                    <td>Stock In</td>
                                                    <td>1,500 KG</td>
                                                    <td>25kg & 50kg</td>
                                                    <td>PO-002</td>
                                                </tr>
                                                <tr>
                                                    <td>2024-01-12</td>
                                                    <td>Sold</td>
                                                    <td>500 KG</td>
                                                    <td>50kg (10 sacks)</td>
                                                    <td>INV-105</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Rice Type 3 - Brown Rice (Low Stock) -->
                        <tr class="parent-row" data-id="3">
                            <td>
                                <button class="btn btn-sm btn-link toggle-details" data-id="3">
                                    <i class="fas fa-plus-circle text-primary"></i>
                                </button>
                            </td>
                            <td>3</td>
                            <td>
                                <strong>Brown Rice</strong><br>
                                <small class="text-muted">Organic</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-primary">5 pcs</span><br>
                                <small>125 KG</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success">0 pcs</span><br>
                                <small>0 KG</small>
                            </td>
                            <td class="text-center">
                                <strong class="text-warning">125 KG</strong>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark status-badge">Low Stock</span>
                            </td>
                            <td>2024-01-10</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="viewStock(3)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="sellRice(3)">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="detail-row-3" style="display: none;">
                            <td colspan="9">
                                <div class="card m-2 bg-warning bg-opacity-10">
                                    <div class="card-body">
                                        <h6>⚠️ Low Stock Alert - Brown Rice</h6>
                                        <p>Only 125kg remaining! Consider reordering soon.</p>
                                        <button class="btn btn-sm btn-danger" onclick="reorderStock(3)">Reorder
                                            Now</button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Rice Type 4 - Glutinous Rice (Out of Stock) -->
                        <tr class="parent-row" data-id="4">
                            <td>
                                <button class="btn btn-sm btn-link toggle-details" data-id="4">
                                    <i class="fas fa-plus-circle text-primary"></i>
                                </button>
                            </td>
                            <td>4</td>
                            <td>
                                <strong>Glutinous Rice</strong><br>
                                <small class="text-muted">Sticky Rice</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-primary">0 pcs</span><br>
                                <small>0 KG</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success">0 pcs</span><br>
                                <small>0 KG</small>
                            </td>
                            <td class="text-center">
                                <strong class="text-danger">0 KG</strong>
                            </td>
                            <td>
                                <span class="badge bg-danger status-badge">Out of Stock</span>
                            </td>
                            <td>2024-01-05</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="viewStock(4)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="reorderStock(4)">
                                    <i class="fas fa-shopping-cart"></i> Reorder
                                </button>
                            </td>
                        </tr>
                        <tr class="detail-row-4" style="display: none;">
                            <td colspan="9">
                                <div class="card m-2 bg-danger bg-opacity-10">
                                    <div class="card-body">
                                        <h6>❌ Out of Stock - Glutinous Rice</h6>
                                        <p>No stock available. Please reorder immediately.</p>
                                        <button class="btn btn-sm btn-danger" onclick="reorderStock(4)">Reorder
                                            Now</button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Rice Type 5 - Basmati Rice -->
                        <tr class="parent-row" data-id="5">
                            <td>
                                <button class="btn btn-sm btn-link toggle-details" data-id="5">
                                    <i class="fas fa-plus-circle text-primary"></i>
                                </button>
                            </td>
                            <td>5</td>
                            <td>
                                <strong>Basmati Rice</strong><br>
                                <small class="text-muted">Premium Long Grain</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-primary">40 pcs</span><br>
                                <small>1,000 KG</small>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success">25 pcs</span><br>
                                <small>1,250 KG</small>
                            </td>
                            <td class="text-center">
                                <strong class="text-success">2,250 KG</strong>
                            </td>
                            <td>
                                <span class="badge bg-success status-badge">In Stock</span>
                            </td>
                            <td>2024-01-13</td>
                            <td>
                                <button class="btn btn-sm btn-info" onclick="viewStock(5)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-warning" onclick="sellRice(5)">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </td>
                        </tr>
                        <tr class="detail-row-5" style="display: none;">
                            <td colspan="9">
                                <div class="card m-2">
                                    <div class="card-body">
                                        <h6>📊 Transaction History - Basmati Rice</h6>
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Transaction Type</th>
                                                    <th>Quantity</th>
                                                    <th>Reference</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2024-01-13</td>
                                                    <td>Stock In</td>
                                                    <td>1,000 KG</td>
                                                    <td>PO-003</td>
                                                </tr>
                                                <tr>
                                                    <td>2024-01-11</td>
                                                    <td>Sold</td>
                                                    <td>150 KG</td>
                                                    <td>INV-102</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle details rows
        $(document).ready(function () {
            $('.toggle-details').click(function () {
                var id = $(this).data('id');
                $('.detail-row-' + id).toggle();
                var icon = $(this).find('i');
                if (icon.hasClass('fa-plus-circle')) {
                    icon.removeClass('fa-plus-circle').addClass('fa-minus-circle');
                } else {
                    icon.removeClass('fa-minus-circle').addClass('fa-plus-circle');
                }
            });

            // Search functionality
            $('#searchRice').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#rice_table tbody tr.parent-row').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Filter by stock status
            $('#filterStock').on('change', function () {
                var filter = $(this).val();
                $('#rice_table tbody tr.parent-row').each(function () {
                    var status = $(this).find('.status-badge').text().trim();
                    if (filter === 'all') {
                        $(this).show();
                    } else if (filter === 'low' && status === 'Low Stock') {
                        $(this).show();
                    } else if (filter === 'normal' && status === 'In Stock') {
                        $(this).show();
                    } else if (filter === 'out' && status === 'Out of Stock') {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });

        // Dummy functions for actions
        function viewStock(id) {
            alert('Viewing details for Rice ID: ' + id);
        }

        function sellRice(id) {
            alert('Selling process for Rice ID: ' + id);
        }

        function reorderStock(id) {
            alert('Reorder request sent for Rice ID: ' + id);
        }

        function exportReport() {
            alert('Exporting inventory report...');
        }
    </script>

</body>

</html>