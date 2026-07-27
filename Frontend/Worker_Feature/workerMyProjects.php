<?php include 'workerNav&sideBar.php'; ?>

<div class="wmp-dashboard-wrapper" style="margin-left: 17%; margin-top: 5%; background-color: #0f172a; ">
    
    <!-- Workspace Control Header -->
    <div class="wmp-top-bar">
        <div class="wmp-title-area">
            <h2>Project Workspace Manager</h2>
            <p>Track actively processing projectss and evaluate pending allocations.</p>
        </div>
        
        <!-- Service Role Configuration Engine -->
        <div class="wmp-role-filter-box">
            <label for="wmpRoleSelect">Service Profile Filter:</label>
            <select id="wmpRoleSelect" class="wmp-role-select" onchange="wmpFilterByRole()">
                <option value="ALL">Show All Assigned Roles</option>
                <option value="Data Analysis">Data Analysis Only</option>
                <option value="Statistical Consultancy">Statistical Consultancy Only</option>
                <option value="Full-Stack Engineering">Full-Stack Engineering Only</option>
            </select>
        </div>
    </div>

    <!-- Main Operational Workspace Grid Split -->
    <div class="wmp-workspace-layout">
        
        <!-- ONGOING PROJECTS STACKS PANEL -->
        <div class="wmp-column-panel">
            <div class="wmp-panel-header">
                <h3>Ongoing Projects</h3>
                <span class="wmp-badge wmp-badge-blue" id="wmp-count-active">2 Active</span>
            </div>

            <div class="wmp-card-container" id="wmpOngoingContainer">
                
                <!-- Card 1 -->
                <div class="wmp-project-card" data-role="Data Analysis">
                    <div class="wmp-card-header">
                        <div>
                            <h4>Student Attendance Metrics Extraction Matrix</h4>
                            <span class="wmp-role-tag">Data Analysis</span>
                        </div>
                        <span class="wmp-status wmp-status-running">Processing</span>
                    </div>

                    <!-- Daily Status Commits Interface -->
                    <div class="wmp-progress-box">
                        <div class="wmp-progress-metrics">
                            Log State: <strong id="wmp-log-val-1">50% UI Templates / 100% Core Analysis Packages Complete</strong>
                        </div>
                        <form class="wmp-form-inline" onsubmit="wmpCommitDailyLog(event, 1)">
                            <input type="text" id="wmp-input-log-1" class="wmp-input-text" placeholder="What parts did you implement today?..." required>
                            <button type="submit" class="wmp-btn wmp-btn-secondary wmp-btn-sm">Log Run</button>
                        </form>
                    </div>

                    <!-- Final Deployment Pipeline -->
                    <div class="wmp-upload-pipeline">
                        <label>Final Deployment Build Package</label>
                        <form class="wmp-form-inline" onsubmit="wmpDeployFinalPackage(event, 'Student Attendance Metrics Extraction Matrix')">
                            <input type="text" class="wmp-input-text" placeholder="Provide delivery archive URL (GitHub/Cloud Link)..." required>
                            <button type="submit" class="wmp-btn wmp-btn-success wmp-btn-sm">Deploy Delivery</button>
                        </form>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="wmp-project-card" data-role="Statistical Consultancy">
                    <div class="wmp-card-header">
                        <div>
                            <h4>AquaRelief Disaster Response Optimization Model</h4>
                            <span class="wmp-role-tag">Statistical Consultancy</span>
                        </div>
                        <span class="wmp-status wmp-status-running">Processing</span>
                    </div>

                    <!-- Daily Status Commits Interface -->
                    <div class="wmp-progress-box">
                        <div class="wmp-progress-metrics">
                            Log State: <strong id="wmp-log-val-2">Relief Distribution Database Models Configured</strong>
                        </div>
                        <form class="wmp-form-inline" onsubmit="wmpCommitDailyLog(event, 2)">
                            <input type="text" id="wmp-input-log-2" class="wmp-input-text" placeholder="What parts did you implement today?..." required>
                            <button type="submit" class="wmp-btn wmp-btn-secondary wmp-btn-sm">Log Run</button>
                        </form>
                    </div>

                    <!-- Final Deployment Pipeline -->
                    <div class="wmp-upload-pipeline">
                        <label>Final Deployment Build Package</label>
                        <form class="wmp-form-inline" onsubmit="wmpDeployFinalPackage(event, 'AquaRelief Disaster Response Optimization Model')">
                            <input type="text" class="wmp-input-text" placeholder="Provide delivery archive URL (GitHub/Cloud Link)..." required>
                            <button type="submit" class="wmp-btn wmp-btn-success wmp-btn-sm">Deploy Delivery</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <!-- INBOUND INITIATIVES STACKS PANEL -->
        <div class="wmp-column-panel">
            <div class="wmp-panel-header">
                <h3>Incoming Allocations</h3>
                <span class="wmp-badge wmp-badge-amber" id="wmp-count-allocated">1 Awaiting Action</span>
            </div>

            <div class="wmp-card-container" id="wmpAllocatedContainer">
                
                <!-- Allocation Request Item 1 -->
                <div class="wmp-project-card" id="wmp-req-card-1" data-role="Data Analysis">
                    <div class="wmp-card-header">
                        <div>
                            <h4>Regional Polythene Ban Impact Correlation Study</h4>
                            <span class="wmp-role-tag">Data Analysis</span>
                        </div>
                        <span class="wmp-status wmp-status-pending">Staged Approval</span>
                    </div>
                    
                    <div class="wmp-action-row">
                        <!-- Inspection Trigger Button -->
                        <button type="button" class="wmp-btn wmp-btn-primary" onclick="wmpOpenInspectionModal(
                            'Regional Polythene Ban Impact Correlation Study',
                            'Comprehensive structured matrix exploring public behavior, commercial distribution patterns, and compliance timelines across designated institutional frameworks following environmental policy amendments.',
                            'https://datasets.server.internal/polythene-ban/survey-metrics-v2.csv',
                            'https://documentation.server.internal/polythene-ban/requirements.pdf'
                        )">
                            Project Details
                        </button>
                        
                        <!-- Decision Interface Elements -->
                        <div class="wmp-btn-cluster">
                            <button type="button" class="wmp-btn wmp-btn-success" onclick="wmpHandleAllocationDecision(1, 'Accepted')">Accept</button>
                            <button type="button" class="wmp-btn wmp-btn-danger" onclick="wmpHandleAllocationDecision(1, 'Rejected')">Reject</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- ==========================================================================
     ISOLATED DIALOG/MODAL OVERLAY COMPONENT
     ========================================================================== -->
<div class="wmp-modal-overlay" id="wmpInspectionModal">
    <div class="wmp-modal-container">
        <div class="wmp-modal-header">
            <h3 id="wmpModalTitle">Project Specification Parameters</h3>
            <button class="wmp-modal-close" onclick="wmpCloseInspectionModal()">&times;</button>
        </div>
        <div class="wmp-modal-body">
            <div class="wmp-meta-block">
                <label>Operational Objective Description</label>
                <p id="wmpModalDesc">Detailed structural parameters populate here.</p>
            </div>
            
            <div class="wmp-meta-block">
                <label>System Data Reference Source Link</label>
                <div class="wmp-link-display">
                    <input type="text" id="wmpModalDataLink" readonly>
                    <button type="button" class="wmp-btn wmp-btn-primary wmp-btn-sm" onclick="wmpOpenExternalLink('wmpModalDataLink')">Browse</button>
                </div>
            </div>

            <div class="wmp-meta-block">
                <label>Primary Core Dataset Package (.CSV / .SQL)</label>
                <div class="wmp-link-display">
                    <input type="text" id="wmpModalDatasetLink" readonly>
                    <button type="button" class="wmp-btn wmp-btn-primary wmp-btn-sm" onclick="wmpOpenExternalLink('wmpModalDatasetLink')">Browse</button>
                </div>
            </div>
        </div>
        <div class="wmp-modal-footer">
            <button type="button" class="wmp-btn wmp-btn-secondary" onclick="wmpCloseInspectionModal()">Dismiss Matrix View</button>
        </div>
    </div>
</div>

<!-- ==========================================================================
     ISOLATED DASHBOARD MANAGEMENT SCRIPTS
     ========================================================================== -->
<script>
    // Scoped Inspection Modal Trigger Mechanics
    function wmpOpenInspectionModal(title, description, dataLink, datasetLink) {
        document.getElementById('wmpModalTitle').innerText = title;
        document.getElementById('wmpModalDesc').innerText = description;
        document.getElementById('wmpModalDataLink').value = dataLink;
        document.getElementById('wmpModalDatasetLink').value = datasetLink;
        
        document.getElementById('wmpInspectionModal').classList.add('wmp-modal-open');
    }

    function wmpCloseInspectionModal() {
        document.getElementById('wmpInspectionModal').classList.remove('wmp-modal-open');
    }

    function wmpOpenExternalLink(elementId) {
        const linkVal = document.getElementById(elementId).value;
        if(linkVal) {
            window.open(linkVal, '_blank');
        }
    }

    // Interactive Daily Update Commitment Form Action
    function wmpCommitDailyLog(event, logIndex) {
        event.preventDefault();
        const inputField = document.getElementById(`wmp-input-log-${logIndex}`);
        const textReadout = document.getElementById(`wmp-log-val-${logIndex}`);
        
        if (inputField && textReadout) {
            textReadout.innerText = inputField.value;
            alert(`Progress Authenticated: Today's modifications successfully pushed to the activity log stream.`);
            inputField.value = '';
        }
    }

    // Interactive Final Delivery Package Submission Pipeline
    function wmpDeployFinalPackage(event, projectName) {
        event.preventDefault();
        const inputField = event.target.querySelector('input[type="text"]');
        if(inputField) {
            alert(`Deployment Confirmed:\nProject "${projectName}" final builds successfully compiled and routed via: ${inputField.value}`);
            inputField.value = '';
        }
    }

    // Inbound Allocation Order Validation Workflow
    function wmpHandleAllocationDecision(requestId, selectionStatus) {
        alert(`Allocation Matrix Request verified as: [${selectionStatus}]`);
        const cardTarget = document.getElementById(`wmp-req-card-${requestId}`);
        if(cardTarget) {
            cardTarget.style.transition = 'all 0.3s ease';
            cardTarget.style.opacity = '0';
            setTimeout(() => {
                cardTarget.remove();
                wmpUpdateCountIndicators();
            }, 300);
        }
    }

    // Service Assignment Sorting Architecture 
    function wmpFilterByRole() {
        const filterSelection = document.getElementById('wmpRoleSelect').value;
        const cards = document.querySelectorAll('.wmp-project-card');
        
        cards.forEach(card => {
            const cardRole = card.getAttribute('data-role');
            if (filterSelection === 'ALL' || cardRole === filterSelection) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
        wmpUpdateCountIndicators();
    }

    // Runtime Panel Counters Updating Architecture
    function wmpUpdateCountIndicators() {
        const activeItems = document.querySelectorAll('#wmpOngoingContainer .wmp-project-card').length;
        const allocatedItems = document.querySelectorAll('#wmpAllocatedContainer .wmp-project-card').length;
        
        document.getElementById('wmp-count-active').innerText = `${activeItems} Active`;
        document.getElementById('wmp-count-allocated').innerText = `${allocatedItems} Awaiting Action`;
    }
</script>

<?php include '../commen/footer.php'; ?>