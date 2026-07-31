<?php include 'workerNav&sideBar.php'; ?>

<div class="wpay-dashboard-wrapper" style="margin-left: 17%; margin-top: 5%; background-color: #0f172a;">
    
    <!-- Top Configuration Bar -->
    <div class="wpay-top-bar">
        <div class="wpay-title-area">
            <h2>Financial Tracking Ledger</h2>
            <p>Monitor system revenue , incoming settlements and generate certified statements.</p>
        </div>
        
        <!-- Document Generation Engine -->
        <div class="wpay-export-controls">
            <label for="wpayScopeSelect">Statement Parameters:</label>
            <select id="wpayScopeSelect" class="wpay-select">
                <option value="OVERALL">Overall Historical Scope</option>
                <option value="CURRENT_MONTH">Current Month Activity</option>
            </select>
            <button class="wpay-btn" onclick="wpayTriggerPDFGeneration()">Export Statement (PDF)</button>
        </div>
    </div>

    <!-- Printable Wrapper Subsystem Area -->
    <div id="wpayPrintArea">
        
        <!-- Structural Element Rendered Exclusively in Print/PDF Mode -->
        <div class="wpay-print-header">
            <h1 id="wpayPrintTitle">Worker Earnings Statement</h1>
            <p>Generated Timestamp Evaluation: <span id="wpayPrintTimestamp"></span></p>
            <p>Scope Framework: <span id="wpayPrintScope">All Time Entries</span></p>
        </div>

        <!-- High-Level Financial Metrics Component -->
        <div class="wpay-metric-grid">
            <div class="wpay-metric-card wpay-total">
                <label>Disbursed Income</label>
                <div class="wpay-amount" id="wpay-total-val">LKR 142,500.00</div>
            </div>
            <div class="wpay-metric-card wpay-upcoming">
                <label>Upcoming Payments</label>
                <div class="wpay-amount" id="wpay-upcoming-val">LKR 45,000.00</div>
            </div>
            <div class="wpay-metric-card wpay-ongoing">
                <label>Ongoing Commitments Value</label>
                <div class="wpay-amount" id="wpay-ongoing-val">LKR 85,000.00</div>
            </div>
        </div>

        <!-- Comprehensive Consolidated Ledger View -->
        <div class="wpay-section-panel">
            <h3>Payment Records</h3>
            <div class="wpay-table-responsive">
                <table class="wpay-table">
                    <thead>
                        <tr>
                            <th>Transaction / Project Allocation Identifier</th>
                            <th>Service Category</th>
                            <th>Date Stage</th>
                            <th>Statement Value</th>
                            <th>Allocation Status</th>
                        </tr>
                    </thead>
                    <tbody id="wpayLedgerBody">
                        <!-- Disbursed Records -->
                        <tr data-month="current">
                            <td>Student Attendance Metrics Extraction Matrix (Phase 1)</td>
                            <td>Data Analysis</td>
                            <td>2026-04-12</td>
                            <td>LKR 65,000.00</td>
                            <td><span class="wpay-status-pill wpay-pill-settled">Disbursed</span></td>
                        </tr>
                        <tr data-month="previous">
                            <td>AquaRelief Disaster Response Optimization Model (Base Build)</td>
                            <td>Statistical Consultancy</td>
                            <td>2026-03-22</td>
                            <td>LKR 77,500.00</td>
                            <td><span class="wpay-status-pill wpay-pill-settled">Disbursed</span></td>
                        </tr>
                        
                        <!-- Upcoming Records -->
                        <tr data-month="current">
                            <td>Regional Polythene Ban Impact Correlation Study</td>
                            <td>Data Analysis</td>
                            <td>2026-05-01 (Est.)</td>
                            <td>LKR 45,000.00</td>
                            <td><span class="wpay-status-pill wpay-pill-pending">Upcoming</span></td>
                        </tr>
                        
                        <!-- Ongoing Records -->
                        <tr data-month="current">
                            <td>Student Attendance Metrics Extraction Matrix (Phase 2)</td>
                            <td>Full-Stack Engineering</td>
                            <td>In Progress</td>
                            <td>LKR 50,000.00</td>
                            <td><span class="wpay-status-pill wpay-pill-running">Ongoing</span></td>
                        </tr>
                        <tr data-month="current">
                            <td>AquaRelief Disaster Response Optimization Model (Refinements)</td>
                            <td>Statistical Consultancy</td>
                            <td>In Progress</td>
                            <td>LKR 35,000.00</td>
                            <td><span class="wpay-status-pill wpay-pill-running">Ongoing</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- ==========================================================================
     ISOLATED FINANCIAL CONTROL SCRIPTS
     ========================================================================== -->
<script src="../javaScript/worker.js">
    function wpayTriggerPDFGeneration() {
        const scopeSelection = document.getElementById('wpayScopeSelect').value;
        const rows = document.querySelectorAll('#wpayLedgerBody tr');
        
        // Contextually manipulate tracking points based on user's scope selection
        if (scopeSelection === 'CURRENT_MONTH') {
            document.getElementById('wpayPrintScope').innerText = "Current Month Functional Activity Only";
            
            // Adjust financial sum matrix strings dynamically for the report view
            document.getElementById('wpay-total-val').innerText = "LKR 65,000.00";
            
            // Filter grid table components visibility out during display pipeline
            rows.forEach(row => {
                if (row.getAttribute('data-month') !== 'current') {
                    row.style.display = 'none';
                }
            });
        } else {
            document.getElementById('wpayPrintScope').innerText = "All Time Functional History Entries";
            document.getElementById('wpay-total-val').innerText = "LKR 142,500.00";
            
            rows.forEach(row => {
                row.style.display = '';
            });
        }

        // Set live generation date string
        const currentTimestamp = new Date().toLocaleString();
        document.getElementById('wpayPrintTimestamp').innerText = currentTimestamp;

        // Trigger native OS hardware printing driver allocation to generate standard PDF layouts
        window.print();

        // Restore UI view variables instantly after window printing sequence returns context control
        setTimeout(() => {
            rows.forEach(row => row.style.display = '');
            document.getElementById('wpay-total-val').innerText = "LKR 142,500.00";
        }, 500);
    }
</script>

<?php include '../commen/footer.php'; ?>