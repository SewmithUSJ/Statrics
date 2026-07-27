<?php
    include 'workerNav&sideBar.php';
  ?> 


    

<div class="wprof-dashboard-wrapper">
    
    <!-- Workspace Top Header Bar -->
    <div class="wprof-top-bar">
        <div class="wprof-title-area">
            <h2>Identity & Operational Credentials</h2>
            <p>Maintain your expert functional profile summary matrix and monitor runtime system logs.</p>
        </div>
        <button class="wprof-btn" onclick="wprofToggleUpdateModal(true)">Update Matrix Profile</button>
    </div>

    <!-- Main Profile Workspace Split -->
    <div class="wprof-grid-layout">
        
        <!-- LEFT COLUMN SIDE: METRICS AND PERSONAL CREDENTIALS -->
        <div>
            <!-- Financial & Logged Hours Card Module -->
            <div class="wprof-card">
                <h3>Productivity Balance</h3>
                <div class="wprof-metrics-row">
                    <div class="wprof-metric-tile wprof-tile-rate">
                        <label>Base Hourly Rate</label>
                        <span id="wprof-lbl-rate">LKR 3,500</span>
                    </div>
                    <div class="wprof-metric-tile wprof-tile-hours">
                        <label>Total Logged Hours</label>
                        <span id="wprof-lbl-hours">142.5 hrs</span>
                    </div>
                </div>
            </div>

            <!-- Isolated Personal Details Card Module -->
            <div class="wprof-card">
                <h3>Identity Profile Matrix</h3>
                <div class="wprof-details-list">
                    <div class="wprof-detail-item">
                        <label>Full Legal Designation</label>
                        <div id="wprof-lbl-name">Akeesha Piyadasa (අකීෂ පියදාස)</div>
                    </div>
                    <div class="wprof-detail-item">
                        <label>Electronic Delivery Address</label>
                        <div id="wprof-lbl-email">akeesha.piyadasa@domain.io</div>
                    </div>
                    <div class="wprof-detail-item">
                        <label>Primary Telephone Channel</label>
                        <div id="wprof-lbl-phone">+94 77 123 4567</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN SIDE: CREDENTIAL QUALIFICATIONS & EXPERIENCE -->
        <div>
            <!-- Qualifications Card Module -->
            <div class="wprof-card">
                <h3>Academic & Service Qualifications</h3>
                <div class="wprof-timeline" id="wprof-qualifications-box">
                    <div class="wprof-timeline-node">
                        <h4>BSc (Hons) in Information Technology & Management</h4>
                        <span>Undergraduate Final Year Framework</span>
                        <p>Specialized study tracks covering full-stack systems engineering, advanced linear algebra calculus structures, and industrial database models.</p>
                    </div>
                    <div class="wprof-timeline-node">
                        <h4>Advanced Statistical Analytics Certification</h4>
                        <span>Verified Competency</span>
                        <p>Comprehensive knowledge validation processing across descriptive metrics matrices and automated analysis software packages.</p>
                    </div>
                </div>
            </div>

            <!-- Professional Experience Card Module -->
            <div class="wprof-card">
                <h3>Functional System Experience</h3>
                <div class="wprof-timeline" id="wprof-experience-box">
                    <div class="wprof-timeline-node">
                        <h4>Lead Core Architecture Developer — AquaRelief Ecosystem</h4>
                        <span>March 2026 — Present</span>
                        <p>Architected and executed a full-stack web disaster management platform managing relief workflows and geospatial tracker allocations across Sri Lanka.</p>
                    </div>
                    <div class="wprof-timeline-node">
                        <h4>Data Operations Lead — Presentrics Platform</h4>
                        <span>April 2026 — Present</span>
                        <p>Built full-stack frontend dashboard integrations and analytical computing pipelines evaluating performance metrics mapping arrays.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- ==========================================================================
     ISOLATED MODAL PROFILE INTERACTION CENTER
     ========================================================================== -->
<div class="wprof-modal-overlay" id="wprofUpdateModal">
    <div class="wprof-modal-container">
        <div class="wprof-modal-header">
            <h3>Modify Profile Specification Matrix</h3>
            <button class="wprof-modal-close" onclick="wprofToggleUpdateModal(false)">&times;</button>
        </div>
        
        <form onsubmit="wprofHandleProfileCommit(event)">
            <div class="wprof-modal-body">
                <!-- Personal Coordinates -->
                <div class="wprof-input-group">
                    <label for="wprof-in-name">Full Name Designation</label>
                    <input type="text" id="wprof-in-name" class="wprof-input-field" value="Akeesha Piyadasa (අකීෂ පියදාස)" required>
                </div>
                
                <div class="wprof-input-group">
                    <label for="wprof-in-email">Contact Mail Link</label>
                    <input type="email" id="wprof-in-email" class="wprof-input-field" value="akeesha.piyadasa@domain.io" required>
                </div>

                <div class="wprof-input-group">
                    <label for="wprof-in-phone">Communication Line</label>
                    <input type="text" id="wprof-in-phone" class="wprof-input-field" value="+94 77 123 4567" required>
                </div>

                <!-- Financial Metrics Setup -->
                <div class="wprof-input-group">
                    <label for="wprof-in-rate">Base Hourly Rate Parameter (LKR)</label>
                    <input type="number" id="wprof-in-rate" class="wprof-input-field" value="3500" required>
                </div>

                <div class="wprof-input-group">
                    <label for="wprof-in-hours">Manually Logged Operational Hours</label>
                    <input type="number" step="0.1" id="wprof-in-hours" class="wprof-input-field" value="142.5" required>
                </div>
            </div>
            
            <div class="wprof-modal-footer">
                <button type="button" class="wprof-btn wprof-btn-secondary" onclick="wprofToggleUpdateModal(false)">Abort Changes</button>
                <button type="submit" class="wprof-btn">Commit Changes</button>
            </div>
        </form>
    </div>
</div>

<!-- ==========================================================================
     ISOLATED PROFILE RUNTIME IMPLEMENTATION CONTROLS
     ========================================================================== -->
<script>
    // Toggle Profile Modal Pipeline
    function wprofToggleUpdateModal(shouldOpen) {
        const modalContainer = document.getElementById('wprofUpdateModal');
        if(shouldOpen) {
            modalContainer.classList.add('wprof-modal-open');
        } else {
            modalContainer.classList.remove('wprof-modal-open');
        }
    }

    // Process Profile Data Revision Commits
    function wprofHandleProfileCommit(event) {
        event.preventDefault();
        
        // Extract updated form array states
        const newName = document.getElementById('wprof-in-name').value;
        const newEmail = document.getElementById('wprof-in-email').value;
        const newPhone = document.getElementById('wprof-in-phone').value;
        const newRate = document.getElementById('wprof-in-rate').value;
        const newHours = document.getElementById('wprof-in-hours').value;

        // Push values to UI cards mapping elements directly
        document.getElementById('wprof-lbl-name').innerText = newName;
        document.getElementById('wprof-lbl-email').innerText = newEmail;
        document.getElementById('wprof-lbl-phone').innerText = newPhone;
        document.getElementById('wprof-lbl-rate').innerText = `LKR ${Number(newRate).toLocaleString()}`;
        document.getElementById('wprof-lbl-hours').innerText = `${newHours} hrs`;

        // Terminate Dialog view state gracefully
        wprofToggleUpdateModal(false);
        alert("System Notification: Local Profile Matrix configurations updated successfully.");
    }
</script>

<?php include '../commen/footer.php'; ?>