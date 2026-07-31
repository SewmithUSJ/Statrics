<?php include 'workerNav&sideBar.php'; ?>

<?php include 'workerNav&sideBar.php'; ?>

<div class="wmp-dashboard-wrapper" style="margin-left: 17%; margin-top: 5%; background-color: #0f172a; ">
    
    <!-- Workspace Control Header -->
    <div class="wmp-top-bar">
        <div class="wmp-title-area">
            <h2>Project Workspace Manager</h2>
            <p>Track actively processing projects and evaluate pending allocations & appointments.</p>
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

            <div class="wmp-card-container" id="wmpOngoingContainer" style="max-height: 400px; overflow-y: auto; padding-right: 5px; margin-bottom: 15px;">
                
                <!-- Ongoing Card 1 -->
                <div class="wmp-project-card" data-role="Data Analysis">
                    <div class="wmp-card-header">
                        <div>
                            <h4>Student Attendance Metrics Extraction Matrix</h4>
                            <span class="wmp-role-tag">Data Analysis</span>
                        </div>
                        <span class="wmp-status wmp-status-running">Processing</span>
                    </div>

                    <!-- About / Description Section -->
                    <div class="wmp-card-description" style="margin-top: 12px; font-size: 13px; color: #94a3b8; line-height: 1.5;">
                        Analytics module for statistical evaluation of university student attendance patterns, attendance correlation, and automated reporting.
                    </div>

                    <!-- Meta Details: Deadline -->
                    <div class="wmp-card-meta-details" style="display: flex; gap: 15px; margin-top: 15px; padding: 10px; background-color: #090d16; border: 1px solid #334155; border-radius: 6px;">
                        <div style="font-size: 12px; color: #38bdf8; font-weight: 600;">
                            <i class="fa-regular fa-calendar" style="margin-right: 4px;"></i> Target Deadline: <span>August 15, 2026</span>
                        </div>
                    </div>

                    <!-- Action Area: Live Chat Button -->
                    <div class="wmp-action-row" style="margin-top: 15px; display: flex; justify-content: flex-end;">
                        <button type="button" class="wmp-btn wmp-btn-primary" onclick="window.location.href='../worker/workerChat.php'">
                            <i class="fa-solid fa-comments" style="margin-right: 6px;"></i> Live Chat
                        </button>
                    </div>
                </div>

                <!-- Ongoing Card 2 -->
                <div class="wmp-project-card" data-role="Statistical Consultancy">
                    <div class="wmp-card-header">
                        <div>
                            <h4>AquaRelief Disaster Response Optimization Model</h4>
                            <span class="wmp-role-tag">Statistical Consultancy</span>
                        </div>
                        <span class="wmp-status wmp-status-running">Processing</span>
                    </div>

                    <!-- About / Description Section -->
                    <div class="wmp-card-description" style="margin-top: 12px; font-size: 13px; color: #94a3b8; line-height: 1.5;">
                        Disaster management and tracking architecture for optimizing flood relief distribution across affected regional sectors in Sri Lanka.
                    </div>

                    <!-- Meta Details: Deadline -->
                    <div class="wmp-card-meta-details" style="display: flex; gap: 15px; margin-top: 15px; padding: 10px; background-color: #090d16; border: 1px solid #334155; border-radius: 6px;">
                        <div style="font-size: 12px; color: #38bdf8; font-weight: 600;">
                            <i class="fa-regular fa-calendar" style="margin-right: 4px;"></i> Target Deadline: <span>September 01, 2026</span>
                        </div>
                    </div>

                    <!-- Action Area: Live Chat Button -->
                    <div class="wmp-action-row" style="margin-top: 15px; display: flex; justify-content: flex-end;">
                        <button type="button" class="wmp-btn wmp-btn-primary" onclick="wmpOpenLiveChat('AquaRelief Disaster Response Optimization Model')">
                            <i class="fa-solid fa-comments" style="margin-right: 6px;"></i> Live Chat
                        </button>
                    </div>
                </div>
            </div>
            <!-- Project Allocations Section -->
            <div class="wmp-panel-header" style="marge: 5px;">
                <h3>Incoming Allocations</h3>
                <span class="wmp-badge wmp-badge-amber" id="wmp-count-allocated">1 Awaiting Action</span>
            </div>

            <!-- Scrollable Container for Incoming Allocations -->
            <div class="wmp-card-container" id="wmpAllocatedContainer" style="max-height: 400px; overflow-y: auto; padding-right: 5px; margin-bottom: 15px;">
                
                <!-- Allocation Request Item 1 -->
                <div class="wmp-project-card" id="wmp-req-card-1" data-role="Data Analysis">
                    <div class="wmp-card-header">
                        <div>
                            <h4>Regional Polythene Ban Impact Correlation Study</h4>
                            <span class="wmp-role-tag">Data Analysis</span>
                        </div>
                        <span class="wmp-status wmp-status-pending">Staged Approval</span>
                    </div>

                    <!-- Project Description Area -->
                    <div class="wmp-card-description" style="margin-top: 12px; font-size: 13px; color: #94a3b8; line-height: 1.5;">
                        Comprehensive structured matrix exploring public behavior, commercial distribution patterns, and compliance timelines across designated institutional frameworks following environmental policy amendments.
                    </div>

                    <!-- Target Deadline & Budget Details Block -->
                    <div class="wmp-card-meta-details" style="display: flex; gap: 15px; margin-top: 15px; padding: 10px; background-color: #090d16; border: 1px solid #334155; border-radius: 6px; flex-wrap: wrap;">
                        <div style="font-size: 12px; color: #38bdf8; font-weight: 600;">
                            <i class="fa-regular fa-calendar" style="margin-right: 4px;"></i> Deadline: <span>August 25, 2026</span>
                        </div>
                        <div style="font-size: 12px; color: #34d399; font-weight: 600;">
                            <i class="fa-solid fa-money-bill-wave" style="margin-right: 4px;"></i> Budget: <span>LKR 45,000 - LKR 75,000</span>
                        </div>
                    </div>
                    
                    <div class="wmp-action-row" style="margin-top: 15px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                        <button type="button" class="wmp-btn wmp-btn-primary" onclick="wmpOpenInspectionModal(
                            'Regional Polythene Ban Impact Correlation Study',
                            'Comprehensive structured matrix exploring public behavior, commercial distribution patterns, and compliance timelines across designated institutional frameworks following environmental policy amendments.',
                            'August 25, 2026',
                            'LKR 45,000 - LKR 75,000'
                        )">
                            More Details
                        </button>
                        
                        <div class="wmp-btn-cluster" style="display: flex; gap: 8px;">
                            <button type="button" class="wmp-btn wmp-btn-success" onclick="wmpHandleAllocationDecision(1, 'Accepted')">Accept</button>
                            <button type="button" class="wmp-btn wmp-btn-danger" onclick="wmpHandleAllocationDecision(1, 'Rejected')">Reject</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- INBOUND INITIATIVES & APPOINTMENTS PANEL -->
        <div class="wmp-column-panel">
            
            <!-- APPOINTMENT NOTIFICATIONS PANEL -->
            <div class="wmp-panel-header" style="margin-top: 30px;">
                <h3>Appointment Notifications</h3>
                <span class="wmp-badge wmp-badge-amber" id="wmp-count-appointments">1 Pending Session</span>
            </div>

            <!-- Scrollable Container for All Appointment Cards -->
            <div class="wmp-card-container" id="wmpAppointmentsContainer" style="max-height: 800px; overflow-y: auto; padding-right: 5px;">
                
                <!-- Pending Appointments Section -->
                <div id="wmpPendingAppointmentsList" style="max-height: 400px; overflow-y: auto; padding-right: 5px; margin-bottom: 15px;">
                    <!-- Appointment Card 1 (Pending) -->
                    <div class="wmp-project-card" id="wmp-appt-card-1" style="border-left: 4px solid #f59e0b; margin-bottom: 15px;">
                        <div class="wmp-card-header">
                            <div>
                                <h4>Client Sync: Data Modeling Strategy</h4>
                                <span class="wmp-role-tag" style="background-color: #3b82f6; color: #fff;">Consultation</span>
                            </div>
                            <span class="wmp-status wmp-status-pending">Awaiting Response</span>
                        </div>

                        <div class="wmp-card-description" style="margin-top: 10px; font-size: 13px; color: #94a3b8; line-height: 1.5;">
                            <strong>Requested By:</strong> Academic Research Team<br>
                            <strong>Purpose:</strong> Reviewing dataset variables and statistical methodology prior to model execution.
                        </div>

                        <!-- Appointment Time & Venue Details -->
                        <div class="wmp-card-meta-details" style="display: flex; gap: 15px; margin-top: 12px; padding: 10px; background-color: #090d16; border: 1px solid #334155; border-radius: 6px; flex-wrap: wrap;">
                            <div style="font-size: 12px; color: #38bdf8; font-weight: 600;">
                                <i class="fa-regular fa-clock" style="margin-right: 4px;"></i> Date & Time: <span>August 05, 2026 @ 02:30 PM</span>
                            </div>
                            <div style="font-size: 12px; color: #a78bfa; font-weight: 600;">
                                <i class="fa-solid fa-video" style="margin-right: 4px;"></i> Mode: <span>Virtual Meeting</span>
                            </div>
                        </div>

                        <!-- Appointment Accept / Reject Actions -->
                        <div class="wmp-action-row" style="margin-top: 15px; display: flex; justify-content: flex-end; gap: 8px;">
                            <button type="button" class="wmp-btn wmp-btn-success" onclick="wmpHandleAppointmentDecision(1, 'Accepted')">
                                <i class="fa-solid fa-check" style="margin-right: 4px;"></i> Accept
                            </button>
                            <button type="button" class="wmp-btn wmp-btn-danger" onclick="wmpHandleAppointmentDecision(1, 'Rejected')">
                                <i class="fa-solid fa-xmark" style="margin-right: 4px;"></i> Reject
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Divider & Sub-Header for Accepted Appointments -->
                <div style="margin-top: 20px; margin-bottom: 12px; padding-bottom: 6px; border-bottom: 1px solid #334155; display: flex; justify-content: space-between; align-items: center;">
                    <h4 style="font-size: 13px; font-weight: 600; color: #10b981; text-transform: uppercase; letter-spacing: 0.5px; margin: 0;">
                        <i class="fa-solid fa-calendar-check" style="margin-right: 6px;"></i> Confirmed Appointments
                    </h4>
                    <span class="wmp-badge" id="wmp-count-accepted" style="background-color: #064e3b; color: #34d399; font-size: 11px;">1 Confirmed</span>
                </div>

                <!-- Accepted Appointments Container -->
                <div id="wmpAcceptedAppointmentsList" style="max-height: 400px; overflow-y: auto; padding-right: 5px;">
                    
                    <!-- Accepted Appointment Card 1 -->
                    <div class="wmp-project-card" id="wmp-accepted-appt-1" style="border-left: 4px solid #10b981; margin-bottom: 15px;">
                        <div class="wmp-card-header">
                            <div>
                                <h4>AquaRelief Architecture & Metric Review</h4>
                                <span class="wmp-role-tag" style="background-color: #059669; color: #fff;">Full-Stack Sync</span>
                            </div>
                            <span class="wmp-status" style="background-color: #064e3b; color: #34d399; padding: 2px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Confirmed</span>
                        </div>

                        <div class="wmp-card-description" style="margin-top: 10px; font-size: 13px; color: #94a3b8; line-height: 1.5;">
                            <strong>Requested By:</strong> Disaster Management Coordinator<br>
                            <strong>Purpose:</strong> System architecture demo and backend optimization sync for flood relief data pipelines.
                        </div>

                        <!-- Appointment Time & Venue Details -->
                        <div class="wmp-card-meta-details" style="display: flex; gap: 15px; margin-top: 12px; padding: 10px; background-color: #090d16; border: 1px solid #334155; border-radius: 6px; flex-wrap: wrap;">
                            <div style="font-size: 12px; color: #38bdf8; font-weight: 600;">
                                <i class="fa-regular fa-clock" style="margin-right: 4px;"></i> Date & Time: <span>August 02, 2026 @ 10:00 AM</span>
                            </div>
                            <div style="font-size: 12px; color: #a78bfa; font-weight: 600;">
                                <i class="fa-solid fa-video" style="margin-right: 4px;"></i> Mode: <span>Google Meet</span>
                            </div>
                        </div>

                        <!-- Action Area: Join / Meeting Link -->
                        <div class="wmp-action-row" style="margin-top: 15px; display: flex; justify-content: flex-end;">
                            <button type="button" class="wmp-btn wmp-btn-primary" style="background-color: #059669;" onclick="alert('Launching meeting session...')">
                                <i class="fa-solid fa-video" style="margin-right: 6px;"></i> Join Meeting
                            </button>
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
            <!-- Project Description -->
            <div class="wmp-meta-block">
                <label>Project Overview & Requirements</label>
                <p id="wmpModalDesc">Detailed structural parameters populate here.</p>
                <label>Extra Details</label>
                <p id="wmpModalEx">Detailed structural parameters populate here.</p>
            </div>
            
            <!-- Target Deadline & Budget Grid -->
            <div class="wmp-grid-block" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div class="wmp-meta-block">
                    <label>Target Deadline</label>
                    <div class="wmp-info-display" style="background-color: var(--wmp-bg-main, #090d16); border: 1px solid var(--wmp-border, #334155); padding: 10px 12px; border-radius: 6px; font-weight: 600; color: #38bdf8;">
                        <i class="fa-regular fa-calendar" style="margin-right: 6px;"></i>
                        <span id="wmpModalDeadline">August 25, 2026</span>
                    </div>
                </div>

                <div class="wmp-meta-block">
                    <label>Budget Range</label>
                    <div class="wmp-info-display" style="background-color: var(--wmp-bg-main, #090d16); border: 1px solid var(--wmp-border, #334155); padding: 10px 12px; border-radius: 6px; font-weight: 600; color: #34d399;">
                        <i class="fa-solid fa-money-bill-wave" style="margin-right: 6px;"></i>
                        <span id="wmpModalBudget">LKR 45,000 - LKR 75,000</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="wmp-modal-footer">
            <button type="button" class="wmp-btn wmp-btn-secondary" onclick="wmpCloseInspectionModal()">Dismiss Details View</button>
        </div>
    </div>
</div>

<!-- ==========================================================================
     ISOLATED DASHBOARD MANAGEMENT SCRIPTS
     ========================================================================== -->
<script>
    // Live Chat Initiation Function
    function wmpOpenLiveChat(projectName) {
        alert(`Opening Live Chat session for project: "${projectName}"`);
        // You can redirect to chat page or open chat window here:
        // window.location.href = `chat.php?project=${encodeURIComponent(projectName)}`;
    }

    // Appointment Decision Handler
    function wmpHandleAppointmentDecision(appointmentId, decisionStatus) {
        alert(`Appointment Request status set to: [${decisionStatus}]`);
        const cardTarget = document.getElementById(`wmp-appt-card-${appointmentId}`);
        if(cardTarget) {
            cardTarget.style.transition = 'all 0.3s ease';
            cardTarget.style.opacity = '0';
            setTimeout(() => {
                cardTarget.remove();
                wmpUpdateCountIndicators();
            }, 300);
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
        const cards = document.querySelectorAll('#wmpOngoingContainer .wmp-project-card, #wmpAllocatedContainer .wmp-project-card');
        
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
        const pendingAppointments = document.querySelectorAll('#wmpPendingAppointmentsList .wmp-project-card').length;
        const acceptedAppointments = document.querySelectorAll('#wmpAcceptedAppointmentsList .wmp-project-card').length;
        
        document.getElementById('wmp-count-active').innerText = `${activeItems} Active`;
        document.getElementById('wmp-count-allocated').innerText = `${allocatedItems} Awaiting Action`;
        
        const apptBadge = document.getElementById('wmp-count-appointments');
        if (apptBadge) {
            apptBadge.innerText = `${pendingAppointments} Pending Session${pendingAppointments !== 1 ? 's' : ''}`;
        }

        const acceptedBadge = document.getElementById('wmp-count-accepted');
        if (acceptedBadge) {
            acceptedBadge.innerText = `${acceptedAppointments} Confirmed`;
        }
    }

    // Open Inspection Modal with dynamic arguments
    function wmpOpenInspectionModal(title, description, deadline, budget) {
        document.getElementById('wmpModalTitle').innerText = title;
        document.getElementById('wmpModalDesc').innerText = description;
        document.getElementById('wmpModalDeadline').innerText = deadline;
        document.getElementById('wmpModalBudget').innerText = budget;

        document.getElementById('wmpInspectionModal').classList.add('wmp-modal-open');
    }

    function wmpCloseInspectionModal() {
        document.getElementById('wmpInspectionModal').classList.remove('wmp-modal-open');
    }
</script>

<script src="../javaScript/worker.js">
</script>

<?php include '../commen/footer.php'; ?>