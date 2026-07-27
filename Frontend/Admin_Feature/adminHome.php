<?php 
include '../Admin_Feature/adminNavBar.php'; 

?>

<!-- All custom admin layouts live securely inside this namespaced scope class -->
<div class="section-container admin-scope" style="padding-bottom: 40px;margin-top: 80px; margin-left: 300px; ">
    
    <div class="section-header" >
        <p class="subtitle" style="color: #ef4444;">ADMIN CONSOLE</p>
        <h2>Admin Management Dashboard</h2>
        <p style="color: #94a3b8; max-width: 700px; font-size: 14px; margin-top: -0px;">
            Overview of system projects and administrative tasks.
        </p>
    </div>

    <!-- Macro Metrics Cards Matrix -->
    <div class="metrics-grid">
        
        <!-- Metric 1: Total Research Projects -->
        <div class="metric-card">
            <div class="metric-icon" style="background: rgba(59, 130, 246, 0.08); color: #3b82f6;">
                <i class="fa-solid fa-diagram-project"></i>
            </div>
            <div class="metric-info">
                <h3>32</h3>
                <p>Active Projects</p>
            </div>
        </div>

        <!-- Metric 2: Scheduled Consultation Sessions -->
        <div class="metric-card">
            <div class="metric-icon" style="background: rgba(16, 185, 129, 0.08); color: #10b981;">
                <i class="fa-solid fa-calendar-check"></i>
            </div>
            <div class="metric-info">
                <h3>14</h3>
                <p>Staged Appointments</p>
            </div>
        </div>

        <!-- Metric 3: Active Engine Alerts -->
        <div class="metric-card">
            <div class="metric-icon" style="background: rgba(139, 92, 246, 0.08); color: #8b5cf6;">
                <i class="fa-solid fa-bell"></i>
            </div>
            <div class="metric-info">
                <h3>05</h3>
                <p>System Notifications</p>
            </div>
        </div>

    </div>

    <!-- Master Control Split Workspace Grid -->
    <div class="admin-split-grid">
        
        <!-- Left Panel: Critical Project Deadlines Roadmap -->
        <div class="admin-panel-card">
            <h4><i class="fa-solid fa-hourglass-half" style="color: #f59e0b;"></i> Nearest Deadlines</h4>
            
            <div class="deadline-list">
                
                <!-- Project Line 1 -->
                <div class="deadline-row">
                    <div class="deadline-meta">
                        <h5>Presentrics Analytics Validation</h5>
                        <span>Target: Information & Management Domain</span>
                    </div>
                    <span class="days-badge badge-urgent">2 Days Remaining</span>
                </div>

                <!-- Project Line 2 -->
                <div class="deadline-row">
                    <div class="deadline-meta">
                        <h5>Polythene Ban Survey Report Compilation</h5>
                        <span>Target: Statistical Distribution Review</span>
                    </div>
                    <span class="days-badge badge-warning">5 Days Remaining</span>
                </div>

                <!-- Project Line 3 -->
                <div class="deadline-row">
                    <div class="deadline-meta">
                        <h5>AquaRelief Optimization Script Review</h5>
                        <span>Target: Python Data Pipeline Staging</span>
                    </div>
                    <span class="days-badge" style="background: #1e293b; color: #94a3b8;">11 Days Out</span>
                </div>

            </div>
        </div>

        <!-- Right Panel: Inbound Activity & Peer Notification Streams -->
        <div class="admin-panel-card">
            <h4><i class="fa-solid fa-satellite-dish" style="color: var(--accent-blue);"></i> SYSTEM NOTIFICATIONS</h4>
            
            <div class="notification-feed">
                
                <!-- Stream Item 1 -->
                <div class="noti-item alert-unread">
                    <div style="font-size: 14px; color: #3b82f6; margin-top: 2px;"><i class="fa-solid fa-circle-dot"></i></div>
                    <div>
                        <p style="margin: 0 0 4px 0; font-size: 13px; color: white; font-weight: 500;">New user Review Submitted</p>
                        <p style="margin: 0 0 6px 0; font-size: 12px; color: var(--text-muted);">A critic left optimization comments on the Presentrics core architecture module.</p>
                        <span style="font-size: 10px; color: #64748b;">4 mins ago</span>
                    </div>
                </div>

                <!-- Stream Item 2 -->
                <div class="noti-item">
                    <div style="font-size: 14px; color: #10b981; margin-top: 2px;"><i class="fa-solid fa-credit-card"></i></div>
                    <div>
                        <p style="margin: 0 0 4px 0; font-size: 13px; color: white; font-weight: 500;">Premium Transaction Confirmed</p>
                        <p style="margin: 0 0 6px 0; font-size: 12px; color: var(--text-muted);">Invoice token #STR-8090 authenticated via OmniConsult payment console router.</p>
                        <span style="font-size: 10px; color: #64748b;">1 hour ago</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?php include '../commen/footer.php'; ?>