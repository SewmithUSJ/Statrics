<?php 
include 'userNavbar.php'; 
// This relies on your updated styles.css for main theme cohesion
?>

<div class="section-container" style="padding-bottom: 60px;">
    
    <!-- Header Block -->
    <div class="section-header">
        <p class="subtitle" style="color: var(--accent-blue);">Client Workspace Hub</p>
        <h2>My Research & Project Portfolio</h2>
        <p style="color: var(--text-muted); max-width: 750px; font-size: 14px; margin-top: -20px;">
            Provision new project resource pipelines, track pending operational reviews, and access active deployment dashboards.
        </p>
    </div>

    <!-- Layout Grid Structure -->
    <div class="usr-proj-grid">
        
        <!-- Left Column: Initiative Form Pipeline Request -->
        <div class="usr-panel-card">
            <h3 class="usr-card-title"><i class="fa-solid fa-folder-plus" style="color: var(--accent-blue);"></i> Request New Project Allocation</h3>
            <p style="color: var(--text-muted); font-size: 12px; margin-top: -10px; margin-bottom: 25px;">Define your computational criteria, deadline boundaries, and specialist preferences.</p>
            
            <div id="projectRequestForm" onsubmit="handleProjectSubmission(event)" class="usr-compact-form">
                <div class="usr-input-wrapper">
                    <label>Project Title</label>
                    <input type="text" id="projTitle" required placeholder="e.g., Predictive Trend Matrix Ecosystem">
                </div>

                <!-- Service Focus Selector Menu -->
                <div class="usr-input-wrapper">
                    <label>Select Service</label>
                    <select id="projService" required  onchange="toggleConditionalFields(this.value)">
                        <option value="DATA_ANALYSIS">Data Analysis</option>
                        <option value="CONSULTANT_BEGINNER">Statistical Consultancy Beginner</option>
                        <option value="CONSULTANT_INTERMEDIATE">Statistical Consultancy Intermediate</option>
                        <option value="ACADEMIC_RESEARCH">Academic Research</option>
                    </select>
                </div>

                <!-- Dynamic Conditional Inputs Wrapper -->
                <div id="conditionalFieldsContainer" style="margin-top: 15px;">
                    <!-- Data Analysis Fields -->
                    <div id="fieldsDataAnalysis" class="conditional-field-block" style=" margin-bottom: 15px;">
                        <div class="usr-input-wrapper" style="margin-bottom: 15px;">
                            <label>Dataset Link/Target Population Description</label>
                            <input type="text" id="daDatasetLink" placeholder="https://example.com/dataset.csv">
                        </div>
                    </div>

                    <!-- Statistical Consultant Intermediate Fields -->
                    <div id="fieldsConsultantIntermediate" class="conditional-field-block" style="display: none; margin-bottom: 15px;">
                        <div class="usr-input-wrapper" style="margin-bottom: 15px;">
                            <label>Dataset Link</label>
                            <input type="text" id="ciDatasetLink" placeholder="https://example.com/secure-cloud-storage">
                        </div>
                    </div>

                    <!-- Academic Research Fields -->
                    <div id="fieldsAcademicResearch" class="conditional-field-block" style="display: none; margin-bottom: 15px;">
                        <div class="usr-input-wrapper" style="margin-bottom: 15px;">
                            <label>Subject Area / Field of Study</label>
                            <input type="text" id="arSubjectArea" placeholder="e.g., Environmental Management Systems">
                        </div>
                    </div>
                </div>

                <div class="usr-input-wrapper">
                    <label>About Project & UI Specifications</label>
                    <textarea id="projAbout" rows="4" required placeholder="Describe engineering scope, analytical parameters, or visualization formatting styles and the citation style"></textarea>
                </div>

                <div class="usr-form-row-2">
                    <div class="usr-input-wrapper">
                        <label>Target Deadline</label>
                        <input type="date" id="projDeadline" required>
                    </div>
                    <div class="usr-input-wrapper">
                        <label>Affordable Budget Range</label>
                        <select id="projBudget" required>
                            <option value="LOW">Low</option>
                            <option value="MEDIUM">Medium($250 - $500)</option>
                            <option value="HIGH">High</option>
                        </select>
                    </div>
                </div>

                <!-- Specialist Selection Matrix
                <div class="usr-input-wrapper">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <label style="margin: 0;">Assign Preferred Specialist Nodes</label>
                        <button type="button" onclick="selectAllWorkersToggle()" class="usr-text-link-btn">Select All Matrix Workers</button>
                    </div>
                    
                    <div class="usr-worker-selection-box">
                        <label class="usr-worker-pill">
                            <input type="checkbox" class="worker-chk" value="Akeesha Piyadasa">
                            <div class="pill-meta">
                                <strong>Akeesha Piyadasa</strong>
                                <span>Statistical Consultant & Full-Stack Architect</span>
                            </div>
                        </label>
                        <label class="usr-worker-pill">
                            <input type="checkbox" class="worker-chk" value="Nellisha Weerasekera">
                            <div class="pill-meta">
                                <strong>Nellisha Weerasekera</strong>
                                <span>Data Analyst & Academic Peer Advisor</span>
                            </div>
                        </label>
                    </div>
                </div> -->

                <button onclick="request()" class="cta-btn" style="width: 100%; padding: 12px; margin-top: 10px;">
                    <i class="fa-solid fa-paper-plane"></i> Transmit Project Requirements
                </button>
                
                <div id="usrFormSuccessToast" class="usr-toast-success-panel">
                    <i class="fa-solid fa-circle-check"></i> Project request registered! Status: Staged for Admin Review.
                </div>
            </div>
        </div>

        <!-- Right Column: Track Current Pipeline States & Cancellations -->
        <div style="display: flex; flex-direction: column; gap: 30px;">
            
            <!-- Matrix Box A: Active & Accepted Repositories -->
            <div class="usr-panel-card">
                <h3 class="usr-card-title"><i class="fa-solid fa-circle-check" style="color: #10b981;"></i> Active Operational Streams</h3>
                <p style="color: var(--text-muted); font-size: 12px; margin-top: -10px; margin-bottom: 20px;">Repositories successfully assigned to engineer units and actively processing.</p>
                
                <div class="usr-portfolio-stream" id="activeCards">
                    <!-- Stream Item 1 -->
                    <div class="usr-portfolio-card text-active">
                        <div class="card-meta-row">
                            <h4>Presentrics Student Attendance Intel</h4>
                            <span class="status-tag tag-active">Active Execution</span>
                        </div>
                        <p style="margin-bottom: 6px;"><span style="color: #10b981; font-weight: 600; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">Service: Presentrics Smart Management</span></p>
                        <p>Geofenced location mapping, DAX script vectors, and dark ui palette integrations.</p>
                        
                        <div class="card-action-routing-deck">
                            <a href="chat.php" class="action-route-link link-chat"><i class="fa-solid fa-comments"></i> Live Chat</a>
                            <a href="payment.php" class="action-route-link link-pay"><i class="fa-solid fa-credit-card"></i> Payments</a>
                            <a href="exploreProjects.php" class="action-route-link" style="color: #10b981; margin-left: auto; font-weight: 700;"><i class="fa-solid fa-circle-right"></i> Explore project</a>
                        </div>
                    </div>

                    <!-- Stream Item 2 -->
                    <div class="usr-portfolio-card text-active">
                        <div class="card-meta-row">
                            <h4>Public Polythene Usage Perception Run</h4>
                            <span class="status-tag tag-active">Active Execution</span>
                        </div>
                        <p style="margin-bottom: 6px;"><span style="color: var(--accent-blue); font-weight: 600; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">Service: InsightGather Survey Hub</span></p>
                        <p>Statistical survey configuration investigating awareness metrics and behavior models across regional student demographics.</p>
                        
                        <div class="card-action-routing-deck">
                            <a href="livechat.php?project=polythene" class="action-route-link link-chat"><i class="fa-solid fa-comments"></i> Live Chat</a>
                            <a href="financial.php" class="action-route-link link-pay"><i class="fa-solid fa-credit-card"></i> Payments</a>
                            <a href="exploreProjects.php?project=polythene" class="action-route-link" style="color: var(--accent-blue); margin-left: auto; font-weight: 700;"><i class="fa-solid fa-circle-right"></i> Explore project</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Matrix Box B: Pending Verification Backlog -->
            <div class="usr-panel-card">
                <h3 class="usr-card-title"><i class="fa-solid fa-spinner fa-spin" style="color: #f59e0b;"></i> Pending Route Verification</h3>
                <p style="color: var(--text-muted); font-size: 12px; margin-top: -10px; margin-bottom: 20px;">Applications undergoing architectural evaluation or specialist availability mapping.</p>
                
                <div class="usr-portfolio-stream" id="pendingCards">
                    <!-- Stream Item 3 -->
                    <div class="usr-portfolio-card text-pending">
                        <div class="card-meta-row">
                            <h4>AquaRelief Flood Management Module</h4>
                            <span class="status-tag tag-pending">Review Backlog</span>
                        </div>
                        <p style="margin-bottom: 6px;"><span style="color: #f59e0b; font-weight: 600; font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">Service Staged: OmniConsult Architecture</span></p>
                        <p>Real-time dataset filtering and validation arrays for regional precipitation points.</p>
                        <div class="card-action-routing-deck disabled-deck">
                            <span class="action-route-link locked-link"><i class="fa-solid fa-lock"></i> Chat Pending</span>
                            <span class="action-route-link locked-link"><i class="fa-solid fa-lock"></i> Fees Locked</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>

    const section = "projects";
// Toggle showing input blocks dynamically conditional on selected dropdown options
function toggleConditionalFields(selectedService) {
    // Collect and hide all dynamic conditional wrappers initially
    const blocks = document.querySelectorAll('.conditional-field-block');
    blocks.forEach(block => {
        block.style.display = 'none';
        // Remove requirement properties smoothly while hidden to prevent validation validation drops
        const inputs = block.querySelectorAll('input, textarea');
        inputs.forEach(input => input.removeAttribute('required'));
    });

    // Toggle specific matching blocks on and apply required rules safely
    if (selectedService === 'data_analysis') {
        const targetBlock = document.getElementById('fieldsDataAnalysis');
        targetBlock.style.display = 'block';
        targetBlock.querySelectorAll('input, textarea').forEach(input => input.setAttribute('required', 'true'));
    } else if (selectedService === 'consultant_intermediate') {
        const targetBlock = document.getElementById('fieldsConsultantIntermediate');
        targetBlock.style.display = 'block';
        targetBlock.querySelectorAll('input, textarea').forEach(input => input.setAttribute('required', 'true'));
    } else if (selectedService === 'academic_research') {
        const targetBlock = document.getElementById('fieldsAcademicResearch');
        targetBlock.style.display = 'block';
        targetBlock.querySelectorAll('input, textarea').forEach(input => input.setAttribute('required', 'true'));
    }
}

// Select or deselect all worker nodes inside form layout checkboxes smoothly
function selectAllWorkersToggle() {
    const checkboxes = document.querySelectorAll('.worker-chk');
    const allChecked = Array.from(checkboxes).every(chk => chk.checked);
    checkboxes.forEach(chk => chk.checked = !allChecked);
}

// Intercept form data submission pipelines cleanly
function handleProjectSubmission(event) {
    event.preventDefault();
    
    const toast = document.getElementById('usrFormSuccessToast');
    toast.style.display = 'block';
    
    setTimeout(() => {
        document.getElementById('projectRequestForm').reset();
        toggleConditionalFields(''); // Clear dynamic display states safely
        toast.style.display = 'none';
    }, 4000);
}

// Manage operations for the cancellation tracking card pipelines
function handleCancelSubmission(event) {
    event.preventDefault();
    
    const cancelToast = document.getElementById('usrCancelSuccessToast');
    cancelToast.style.display = 'block';
    
    setTimeout(() => {
        document.getElementById('cancelRequestForm').reset();
        cancelToast.style.display = 'none';
    }, 4000);
}
</script>
<script src="../javaScript/user.js"></script>
<?php include '../commen/footer.php'; ?>