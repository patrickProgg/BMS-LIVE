<style>
    /* Professional Dashboard Styles */
    :root {
        --primary-blue: #2563eb;
        --primary-green: #059669;
        --primary-orange: #ea580c;
        --primary-purple: #7c3aed;
        --primary-red: #dc2626;
        --primary-teal: #0d9488;
        --gray-50: #f9fafb;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-800: #1f2937;
        --gray-900: #111827;
    }

    /* Dashboard Container */
    .dashboard-container {
        min-height: 100vh;
        padding: 24px 0;
    }

    /* Section Styles */
    .section-header {
        margin-bottom: 24px;
        padding-bottom: 12px;
        border-bottom: 2px solid var(--gray-200);
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        flex-wrap: wrap;
        gap: 10px;
    }

    .section-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--gray-800);
        letter-spacing: -0.01em;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .section-title i {
        font-size: 22px;
    }

    .section-badge {
        font-size: 12px;
        font-weight: 500;
        padding: 4px 10px;
        border-radius: 20px;
        background: var(--gray-100);
        color: var(--gray-600);
    }

    /* Grid Layout */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
        margin-bottom: 32px;
    }

    /* Professional Cards */
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 20px;
        transition: all 0.2s ease;
        border: 1px solid var(--gray-200);
        position: relative;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        border-color: transparent;
    }

    /* Card Accent Line */
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
    }

    /* Card Variations */
    .card-investment::before {
        background: var(--primary-orange);
    }

    .card-stock::before {
        background: var(--primary-teal);
    }

    .card-payment::before {
        background: var(--primary-purple);
    }

    .card-balance::before {
        background: var(--primary-blue);
    }

    .card-profit::before {
        background: var(--primary-green);
    }

    .card-loss::before {
        background: var(--primary-red);
    }

    /* Card Header Row - Icon next to label */
    .card-header-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 16px;
    }

    /* Card Icon - Small next to label */
    .card-icon-small {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .card-icon-small.investment {
        background: rgba(234, 88, 12, 0.1);
        color: var(--primary-orange);
    }

    .card-icon-small.stock {
        background: rgba(13, 148, 136, 0.1);
        color: var(--primary-teal);
    }

    .card-icon-small.payment {
        background: rgba(124, 58, 237, 0.1);
        color: var(--primary-purple);
    }

    .card-icon-small.balance {
        background: rgba(37, 99, 235, 0.1);
        color: var(--primary-blue);
    }

    .card-icon-small.profit {
        background: rgba(5, 150, 105, 0.1);
        color: var(--primary-green);
    }

    .card-icon-small.loss {
        background: rgba(220, 38, 38, 0.1);
        color: var(--primary-red);
    }

    .card-icon-small.client {
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
    }

    /* Card Content */
    .card-label {
        font-size: 13px;
        font-weight: 600;
        color: var(--gray-600);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 0;
    }

    .card-value {
        font-size: 28px;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 4px;
        line-height: 1.2;
    }

    .card-value span {
        font-size: 14px;
        font-weight: 500;
    }

    .card-subtitle {
        font-size: 12px;
        color: var(--gray-600);
        margin-top: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
        flex-wrap: wrap;
    }

    .trend-indicator {
        font-size: 11px;
        font-weight: 500;
        padding: 2px 8px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .trend-up {
        background: rgba(5, 150, 105, 0.1);
        color: var(--primary-green);
    }

    .trend-down {
        background: rgba(220, 38, 38, 0.1);
        color: var(--primary-red);
    }

    /* Value Colors */
    .value-positive {
        color: var(--primary-green);
    }

    .value-negative {
        color: var(--primary-red);
    }

    /* Client Card */
    .client-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }

    .client-card .card-label,
    .client-card .card-subtitle {
        color: rgba(255, 255, 255, 0.8);
    }

    .client-card .card-value {
        color: white;
    }

    .client-card .card-icon-small {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }

    /* Summary Cards */
    .summary-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 32px;
    }

    .summary-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid var(--gray-200);
        transition: all 0.2s ease;
    }

    .summary-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .summary-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .summary-title {
        font-size: 14px;
        font-weight: 500;
        color: var(--gray-600);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .summary-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .summary-value {
        font-size: 32px;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 8px;
    }

    .summary-value span {
        font-size: 14px;
        font-weight: 500;
    }

    .summary-footer {
        font-size: 12px;
        color: var(--gray-600);
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px solid var(--gray-200);
    }

    /* Responsive Breakpoints */
    @media (max-width: 1400px) {
        .stats-grid {
            gap: 15px;
        }

        .card-value {
            font-size: 24px;
        }

        .summary-value {
            font-size: 28px;
        }
    }

    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .summary-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .summary-grid {
            grid-template-columns: 1fr;
        }

        .card-value {
            font-size: 28px;
        }

        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 480px) {
        .stat-card {
            padding: 16px;
        }

        .card-value {
            font-size: 24px;
        }

        .summary-card {
            padding: 16px;
        }

        .summary-value {
            font-size: 24px;
        }
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card,
    .summary-card {
        animation: fadeInUp 0.4s ease forwards;
    }
</style>

<?php if (!empty($show_greeting)): ?>
    <div id="greeting-toast" class="alert alert-primary" style="transition: opacity 1s;">
        <h4>
            <?= $greeting ?>
        </h4>
    </div>
<?php endif; ?>

<div class="dashboard-container">
    <div class="container-fluid px-4">

        <!-- FISH SECTION -->
        <div class="section-header">
            <div class="section-title">
                <i class='bx bx-fish' style="color: var(--primary-blue);"></i>
                <span>Dried Fish Analytics</span>
            </div>
            <div class="section-badge">
                <i class='bx bx-stats'></i> Real-time metrics
            </div>
        </div>

        <div class="stats-grid">
            <!-- Fish Investment -->
            <div class="stat-card card-investment">
                <div class="card-header-row">
                    <div class="card-icon-small investment">
                        <i class='bx bx-dollar-circle'></i>
                    </div>
                    <div class="card-label">Total Investment</div>
                </div>
                <div class="card-value">₱<?= number_format($fish_total_investment, 2) ?></div>
                <div class="card-subtitle">
                    <i class='bx bx-trending-up'></i>
                    <span>Capital allocated to fish stock</span>
                </div>
            </div>

            <!-- Fish Stock Value -->
            <div class="stat-card card-stock">
                <div class="card-header-row">
                    <div class="card-icon-small stock">
                        <i class='bx bx-package'></i>
                    </div>
                    <div class="card-label">Current Stock Value</div>
                </div>
                <div class="card-value">₱<?= number_format($fish_total_stock_value, 2) ?></div>
                <div class="card-subtitle">
                    <i class='bx bx-store'></i>
                    <span>Inventory at selling price</span>
                </div>
            </div>

            <!-- Fish Payments -->
            <div class="stat-card card-payment">
                <div class="card-header-row">
                    <div class="card-icon-small payment">
                        <i class='bx bx-wallet-alt'></i>
                    </div>
                    <div class="card-label">Total Collections</div>
                </div>
                <div class="card-value">₱<?= number_format($fish_total_payments, 2) ?></div>
                <div class="card-subtitle">
                    <i class='bx bx-check-circle'></i>
                    <span>Cash received from sales</span>
                </div>
            </div>

            <!-- Fish Balance -->
            <div class="stat-card card-balance">
                <div class="card-header-row">
                    <div class="card-icon-small balance">
                        <i class='bx bx-receipt'></i>
                    </div>
                    <div class="card-label">Outstanding Balance</div>
                </div>
                <div class="card-value">₱<?= number_format($fish_total_receivables, 2) ?></div>
                <div class="card-subtitle">
                    <i class='bx bx-time'></i>
                    <span>Pending customer payments</span>
                </div>
            </div>

            <!-- Fish Profit/Loss -->
            <div class="stat-card <?= $fish_actual_profit >= 0 ? 'card-profit' : 'card-loss' ?>">
                <div class="card-header-row">
                    <div class="card-icon-small <?= $fish_actual_profit >= 0 ? 'profit' : 'loss' ?>">
                        <i class='bx bx-trending-up'></i>
                    </div>
                    <div class="card-label">Realized P&L</div>
                </div>
                <div class="card-value <?= $fish_actual_profit >= 0 ? 'value-positive' : 'value-negative' ?>">
                    ₱<?= number_format(abs($fish_actual_profit), 2) ?>
                    <!-- <span><?= $fish_actual_profit >= 0 ? 'Profit' : 'Loss' ?></span> -->
                </div>
                <div class="card-subtitle">
                    <span class="trend-indicator <?= $fish_actual_profit >= 0 ? 'trend-up' : 'trend-down' ?>">
                        <i class='bx bx-bar-chart'></i>
                        <?= $fish_actual_profit >= 0 ? 'Operating Profit' : 'Operating Loss' ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- RICE SECTION -->
        <div class="section-header" style="margin-top: 16px;">
            <div class="section-title">
                <i class='bx bx-seedling' style="color: var(--primary-green);"></i>
                <span>Rice Analytics</span>
            </div>
            <div class="section-badge">
                <i class='bx bx-stats'></i> Real-time metrics
            </div>
        </div>

        <div class="stats-grid">
            <!-- Rice Investment -->
            <div class="stat-card card-investment">
                <div class="card-header-row">
                    <div class="card-icon-small investment">
                        <i class='bx bx-dollar-circle'></i>
                    </div>
                    <div class="card-label">Total Investment</div>
                </div>
                <div class="card-value">₱<?= number_format($rice_total_investment, 2) ?></div>
                <div class="card-subtitle">
                    <i class='bx bx-trending-up'></i>
                    <span>Capital allocated to rice stock</span>
                </div>
            </div>

            <!-- Rice Stock Value -->
            <div class="stat-card card-stock">
                <div class="card-header-row">
                    <div class="card-icon-small stock">
                        <i class='bx bx-package'></i>
                    </div>
                    <div class="card-label">Current Stock Value</div>
                </div>
                <div class="card-value">₱<?= number_format($rice_total_stock_value, 2) ?></div>
                <div class="card-subtitle">
                    <i class='bx bx-store'></i>
                    <span>Inventory at selling price</span>
                </div>
            </div>

            <!-- Rice Payments -->
            <div class="stat-card card-payment">
                <div class="card-header-row">
                    <div class="card-icon-small payment">
                        <i class='bx bx-wallet-alt'></i>
                    </div>
                    <div class="card-label">Total Collections</div>
                </div>
                <div class="card-value">₱<?= number_format($rice_total_payments, 2) ?></div>
                <div class="card-subtitle">
                    <i class='bx bx-check-circle'></i>
                    <span>Cash received from sales</span>
                </div>
            </div>

            <!-- Rice Balance -->
            <div class="stat-card card-balance">
                <div class="card-header-row">
                    <div class="card-icon-small balance">
                        <i class='bx bx-receipt'></i>
                    </div>
                    <div class="card-label">Outstanding Balance</div>
                </div>
                <div class="card-value">₱<?= number_format($rice_total_receivables, 2) ?></div>
                <div class="card-subtitle">
                    <i class='bx bx-time'></i>
                    <span>Pending customer payments</span>
                </div>
            </div>

            <!-- Rice Profit/Loss -->
            <div class="stat-card <?= $rice_actual_profit >= 0 ? 'card-profit' : 'card-loss' ?>">
                <div class="card-header-row">
                    <div class="card-icon-small <?= $rice_actual_profit >= 0 ? 'profit' : 'loss' ?>">
                        <i class='bx bx-trending-up'></i>
                    </div>
                    <div class="card-label">Realized P&L</div>
                </div>
                <div class="card-value <?= $rice_actual_profit >= 0 ? 'value-positive' : 'value-negative' ?>">
                    ₱<?= number_format(abs($rice_actual_profit), 2) ?>
                    <!-- <span><?= $rice_actual_profit >= 0 ? 'Profit' : 'Loss' ?></span> -->
                </div>
                <div class="card-subtitle">
                    <span class="trend-indicator <?= $rice_actual_profit >= 0 ? 'trend-up' : 'trend-down' ?>">
                        <i class='bx bx-bar-chart'></i>
                        <?= $rice_actual_profit >= 0 ? 'Operating Profit' : 'Operating Loss' ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- TOTAL ANALYTICS SECTION -->
        <div class="section-header" style="margin-top: 16px;">
            <div class="section-title">
                <i class='bx bx-stats' style="color: var(--primary-purple);"></i>
                <span>Total Analytics</span>
            </div>
            <div class="section-badge">
                <i class='bx bx-trending-up'></i> Combined metrics
            </div>
        </div>

        <!-- SUMMARY SECTION -->
        <div class="summary-grid">
            <!-- Total Assets Card -->
            <div class="summary-card">
                <div class="summary-header">
                    <span class="summary-title">Total Assets</span>
                    <div class="summary-icon" style="background: rgba(37, 99, 235, 0.1); color: #2563eb;">
                        <i class='bx bx-building-house'></i>
                    </div>
                </div>
                <div class="summary-value">₱<?= number_format($fish_total_stock_value + $rice_total_stock_value, 2) ?>
                </div>
                <div class="summary-footer">
                    <i class='bx bx-trending-up'></i>
                    <span>Combined inventory value</span>
                </div>
            </div>

            <!-- Total Cash Flow Card -->
            <div class="summary-card">
                <div class="summary-header">
                    <span class="summary-title">Total Cash Flow</span>
                    <div class="summary-icon" style="background: rgba(5, 150, 105, 0.1); color: #059669;">
                        <i class='bx bx-credit-card'></i>
                    </div>
                </div>
                <div class="summary-value">₱<?= number_format($fish_total_payments + $rice_total_payments, 2) ?></div>
                <div class="summary-footer">
                    <i class='bx bx-wallet'></i>
                    <span>Total collections received</span>
                </div>
            </div>

            <!-- Total Receivables Card -->
            <div class="summary-card">
                <div class="summary-header">
                    <span class="summary-title">Total Receivables</span>
                    <div class="summary-icon" style="background: rgba(124, 58, 237, 0.1); color: #7c3aed;">
                        <i class='bx bx-receipt'></i>
                    </div>
                </div>
                <div class="summary-value">₱<?= number_format($fish_total_receivables + $rice_total_receivables, 2) ?>
                </div>
                <div class="summary-footer">
                    <i class='bx bx-time'></i>
                    <span>Outstanding customer balances</span>
                </div>
            </div>

            <!-- Net Position Card -->
            <div class="summary-card">
                <div class="summary-header">
                    <span class="summary-title">Net Financial Position</span>
                    <div class="summary-icon" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                        <i class='bx bx-line-chart'></i>
                    </div>
                </div>
                <?php
                $net_position = ($fish_total_payments + $rice_total_payments) - ($fish_total_investment + $rice_total_investment);
                ?>
                <div class="summary-value <?= $net_position >= 0 ? 'value-positive' : 'value-negative' ?>">
                    ₱<?= number_format(abs($net_position), 2) ?>
                    <span><?= $net_position >= 0 ? 'Net Profit' : 'Net Loss' ?></span>
                </div>
                <div class="summary-footer">
                    <i class='bx bx-chart'></i>
                    <span>Overall business performance</span>
                </div>
            </div>
        </div>

        <!-- CLIENT SECTION -->
        <div class="section-header" style="margin-top: 16px;">
            <div class="section-title">
                <i class='bx bx-group' style="color: #3b82f6;"></i>
                <span>Client Relations</span>
            </div>
            <div class="section-badge">
                <i class='bx bx-user-plus'></i> Active accounts
            </div>
        </div>

        <div class="stats-grid">
            <a href="<?= base_url(); ?>client" style="text-decoration: none; display: block;">
                <div class="stat-card client-card">
                    <div class="card-header-row">
                        <div class="card-icon-small client">
                            <i class='bx bx-group'></i>
                        </div>
                        <div class="card-label" style="color: rgba(255,255,255,0.7);">Total Registered</div>
                    </div>
                    <div class="card-value" style="color: white;"><?php echo number_format($total_client); ?></div>
                    <div class="card-subtitle" style="color: rgba(255,255,255,0.6);">
                        <i class='bx bx-user-check'></i>
                        <span>Active client accounts</span>
                        <i class='bx bx-chevron-right' style="margin-left: auto;"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>