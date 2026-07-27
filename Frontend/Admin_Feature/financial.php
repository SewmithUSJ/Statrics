<?php 
include '../Admin_Feature/adminNavBar.php'; 

?>

<div class="section-container admin-scope" style="padding-bottom: 40px;margin-top: 80px; margin-left: 300px;">
    
    <div class="section-header">
        <p class="subtitle" style="color: #ef4444;">System Console: Financial Ledger</p>
        <h2>Financial Transactions</h2>
        <p style="color: #94a3b8; max-width: 700px; font-size: 14px; margin-top: -20px;">
            Monitor inbound token balances, track capture authorizations, and review system invoice distributions across modules.
        </p>
    </div>

    <div class="metrics-grid" style="margin-top: 30px;">
        <div class="metric-card">
            <div class="metric-icon" style="background: rgba(16, 185, 129, 0.08); color: #10b981;">
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
            <div class="metric-info">
                <h3>RS99,280.00</h3>
                <p>Gross Revenue</p>
            </div>
        </div>
        <div class="metric-card">
            <div class="metric-icon" style="background: rgba(59, 130, 246, 0.08); color: #3b82f6;">
                <i class="fa-solid fa-wallet"></i>
            </div>
            <div class="metric-info">
                <h3>RS5,580.00</h3>
                <p>Awaiting Payments</p>
            </div>
        </div>
        <div class="metric-card">
            <div class="metric-icon" style="background: rgba(245, 158, 11, 0.08); color: #f59e0b;">
                <i class="fa-solid fa-receipt"></i>
            </div>
            <div class="metric-info">
                <h3>32</h3>
                <p>Settled Invoice Logs</p>
            </div>
        </div>
    </div>

    <div class="admin-panel-card" style="margin-top: 35px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 15px;">
            <div>
                <h4 style="color: var(--accent-blue); margin: 0 0 4px 0;"><i class="fa-solid fa-file-invoice-dollar"></i> Inbound Transaction Stream</h4>
                <p style="font-size: 12px; color: var(--text-muted); margin: 0;">Verified chronological logs of payment router actions.</p>
            </div>
            <input type="text" id="ledgerSearchInput" onkeyup="searchLedgerTable()" placeholder="Search Token / Reference..." style="padding: 8px 14px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 6px; font-size: 13px; width: 240px;">
        </div>

        <div class="table-responsive-wrapper" style="overflow-x: auto;">
            <table class="admin-financial-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13px;">
                <thead>
                    <tr style="border-bottom: 2px solid #1e293b; color: #94a3b8;">
                        <th style="padding: 12px 10px;">Invoice Reference Token</th>
                        <th style="padding: 12px 10px;">Client </th>
                        <th style="padding: 12px 10px;">Service</th>
                        <th style="padding: 12px 10px;">Amount</th>
                        <th style="padding: 12px 10px;">Fulfillment Status</th>
                        <th style="padding: 12px 10px; text-align: right;">System Actions</th>
                    </tr>
                </thead>
                <tbody id="ledgerTableBody">
                    
                    <tr class="ledger-row" style="border-bottom: 1px solid #1e293b; transition: background 0.2s;">
                        <td style="padding: 16px 10px; font-family: monospace; color: #3b82f6; font-weight: 600;">#STR-8090</td>
                        <td style="padding: 16px 10px; color: white; font-weight: 500;">
                            Akeesha Piyadasa
                            <span style="display: block; font-size: 11px; color: var(--text-muted); margin-top: 2px;">ID: AS20240445</span>
                        </td>
                        <td style="padding: 16px 10px; color: #e2e8f0;">Statistical consultant Premium</td>
                        <td style="padding: 16px 10px; color: white; font-weight: 600;">RS2,900.00</td>
                        <td style="padding: 16px 10px;">
                            <span class="days-badge" style="background: rgba(16, 185, 129, 0.08); color: #10b981;">Success Capture</span>
                        </td>
                        <td style="padding: 16px 10px; text-align: right;">
                            <button class="review-trigger-btn" onclick="emitInvoiceAlert('#STR-8090')" style="color: var(--text-muted); background: transparent; border: none; cursor: pointer;"><i class="fa-solid fa-print"></i> Receipt</button>
                        </td>
                    </tr>

                    <tr class="ledger-row" style="border-bottom: 1px solid #1e293b; transition: background 0.2s;">
                        <td style="padding: 16px 10px; font-family: monospace; color: #3b82f6; font-weight: 600;">#STR-8091</td>
                        <td style="padding: 16px 10px; color: white; font-weight: 500;">
                            Nellisha Weerasekera
                            <span style="display: block; font-size: 11px; color: var(--text-muted); margin-top: 2px;">ID: External-Node</span>
                        </td>
                        <td style="padding: 16px 10px; color: #e2e8f0;">Academic Tutor Evaluation</td>
                        <td style="padding: 16px 10px; color: white; font-weight: 600;">RS1,500.00</td>
                        <td style="padding: 16px 10px;">
                            <span class="days-badge" style="background: rgba(245, 158, 11, 0.08); color: #f59e0b;">Pending Route</span>
                        </td>
                        <td style="padding: 16px 10px; text-align: right;">
                            <button class="review-trigger-btn" onclick="emitInvoiceAlert('#STR-8091')" style="color: var(--text-muted); background: transparent; border: none; cursor: pointer;"><i class="fa-solid fa-print"></i> Receipt</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Filter table values instantly based on reference tokens or client identifiers
function searchLedgerTable() {
    const input = document.getElementById('ledgerSearchInput');
    const filter = input.value.toUpperCase();
    const tbody = document.getElementById('ledgerTableBody');
    const rows = tbody.getElementsByClassName('ledger-row');

    for (let i = 0; i < rows.length; i++) {
        const rowText = rows[i].textContent || rows[i].innerText;
        if (rowText.toUpperCase().indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}

// Emulate secure invoice asset streaming commands
function emitInvoiceAlert(invoiceToken) {
    alert("Streaming invoice capture sequence parameters for receipt block " + invoiceToken + " to server output engine.");
}
</script>

<?php include '../commen/footer.php'; ?>