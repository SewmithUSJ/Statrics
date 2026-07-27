<?php 
include '../Admin_Feature/adminNavBar.php'; 
?>

<div class="section-container admin-scope" style="padding-bottom: 40px;margin-top: 80px; margin-left: 300px;">
    
    <div class="section-header">
        <p class="subtitle" style="color: #ef4444;">System Console: SCHEDULE</p>
        <h2>Staged Service Schedules</h2>
        <p style="color: #94a3b8; max-width: 700px; font-size: 14px; margin-top: -20px;">
            Manage incoming advisory time slots, track designated expert allocations, and authenticate structural review sessions across service roles.
        </p>
    </div>

    <!-- Updated Service Filter Chips -->
    <div class="schedule-filter-bar" style="display: flex; gap: 12px; margin-top: 30px; flex-wrap: wrap;">
        <button class="sched-chip active-sched-filter" onclick="filterScheduleRows('all')">All Staged Blocks</button>
        <button class="sched-chip" onclick="filterScheduleRows('data-analyst')">Data Analyst</button>
        <button class="sched-chip" onclick="filterScheduleRows('statistical-consultant')">Statistical Consultant</button>
        <button class="sched-chip" onclick="filterScheduleRows('academic-tutor')">Academic Tutor</button>
    </div>

    <div class="admin-panel-card" style="margin-top: 25px;">
        <h4 style="color: var(--accent-blue);"><i class="fa-solid fa-clock-history"></i> Upcoming Analytical Queue Matrix</h4>
        <p style="font-size: 12px; color: var(--text-muted); margin-top: -15px; margin-bottom: 25px;">Verified reservation entries requiring direct specialist interaction windows.</p>

        <div class="table-responsive-wrapper" style="overflow-x: auto;">
            <table class="admin-schedule-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13px;">
                <thead>
                    <tr style="border-bottom: 2px solid #1e293b; color: #94a3b8;">
                        <th style="padding: 12px 10px;">Client / Focus Context</th>
                        <th style="padding: 12px 10px;">Assigned Service Specialist</th>
                        <th style="padding: 12px 10px;">Staged Datetime Window</th>
                        <th style="padding: 12px 10px;">Transaction Status</th>
                        <th style="padding: 12px 10px; text-align: right;">System Options</th>
                    </tr>
                </thead>
                <tbody id="scheduleTableBody">
                    
                    <!-- Data Analyst Sample Row -->
                    <tr class="schedule-row-node" data-module="data-analyst" style="border-bottom: 1px solid #1e293b; transition: background 0.2s;">
                        <td style="padding: 16px 10px; vertical-align: top;">
                            <strong style="color: white; display: block; font-size: 14px;">Presentrics Attendance Metrics Dashboard</strong>
                            <span style="font-size: 11px; color: #10b981; font-weight: 500; display: block; margin-top: 4px;">
                                <i class="fa-solid fa-chart-line"></i> Data Analyst Pipeline
                            </span>
                        </td>
                        <td style="padding: 16px 10px; color: #e2e8f0; vertical-align: top;">
                            <strong>Lead Data Analyst</strong>
                            <span style="display: block; font-size: 11px; color: #64748b; margin-top: 2px;">Assigned: Akeesha Piyadasa</span>
                        </td>
                        <td style="padding: 16px 10px; color: #e2e8f0; vertical-align: top;">
                            <span>July 28, 2026</span>
                            <span style="display: block; font-size: 11px; color: #94a3b8; margin-top: 2px;"><i class="fa-regular fa-clock"></i> 09:30 AM - 11:00 AM</span>
                        </td>
                        <td style="padding: 16px 10px; vertical-align: top;">
                            <span class="days-badge" style="background: rgba(16, 185, 129, 0.08); color: #10b981;">Settled ($290)</span>
                        </td>
                        <td style="padding: 16px 10px; text-align: right; vertical-align: top;">
                            <button class="review-trigger-btn" onclick="updateScheduleNodeStatus(this)" style="color: #ef4444; background: transparent; border: none; cursor: pointer;"><i class="fa-solid fa-circle-check"></i> Complete</button>
                        </td>
                    </tr>

                    <!-- Statistical Consultant Sample Row -->
                    <tr class="schedule-row-node" data-module="statistical-consultant" style="border-bottom: 1px solid #1e293b; transition: background 0.2s;">
                        <td style="padding: 16px 10px; vertical-align: top;">
                            <strong style="color: white; display: block; font-size: 14px;">AquaRelief Flood Management Statistical Model</strong>
                            <span style="font-size: 11px; color: #f59e0b; font-weight: 500; display: block; margin-top: 4px;">
                                <i class="fa-solid fa-square-poll-vertical"></i> Statistical Consultant Session
                            </span>
                        </td>
                        <td style="padding: 16px 10px; color: #e2e8f0; vertical-align: top;">
                            <strong>Senior Statistical Consultant</strong>
                            <span style="display: block; font-size: 11px; color: #64748b; margin-top: 2px;">Assigned: Akeesha Piyadasa</span>
                        </td>
                        <td style="padding: 16px 10px; color: #e2e8f0; vertical-align: top;">
                            <span>August 02, 2026</span>
                            <span style="display: block; font-size: 11px; color: #94a3b8; margin-top: 2px;"><i class="fa-regular fa-clock"></i> 01:00 PM - 02:30 PM</span>
                        </td>
                        <td style="padding: 16px 10px; vertical-align: top;">
                            <span class="days-badge" style="background: rgba(245, 158, 11, 0.08); color: #f59e0b;">Pending Route</span>
                        </td>
                        <td style="padding: 16px 10px; text-align: right; vertical-align: top;">
                            <button class="review-trigger-btn" onclick="updateScheduleNodeStatus(this)" style="color: #ef4444; background: transparent; border: none; cursor: pointer;"><i class="fa-solid fa-circle-check"></i> Complete</button>
                        </td>
                    </tr>

                    <!-- Academic Tutor Sample Row -->
                    <tr class="schedule-row-node" data-module="academic-tutor" style="border-bottom: 1px solid #1e293b; transition: background 0.2s;">
                        <td style="padding: 16px 10px; vertical-align: top;">
                            <strong style="color: white; display: block; font-size: 14px;">Calculus & Linear Algebra University Prep</strong>
                            <span style="font-size: 11px; color: #3b82f6; font-weight: 500; display: block; margin-top: 4px;">
                                <i class="fa-solid fa-graduation-cap"></i> Academic Tutor Node
                            </span>
                        </td>
                        <td style="padding: 16px 10px; color: #e2e8f0; vertical-align: top;">
                            <strong>Higher Ed Math Specialist</strong>
                            <span style="display: block; font-size: 11px; color: #64748b; margin-top: 2px;">Assigned: Nellisha Weerasekera</span>
                        </td>
                        <td style="padding: 16px 10px; color: #e2e8f0; vertical-align: top;">
                            <span>August 05, 2026</span>
                            <span style="display: block; font-size: 11px; color: #94a3b8; margin-top: 2px;"><i class="fa-regular fa-clock"></i> 02:00 PM - 03:00 PM</span>
                        </td>
                        <td style="padding: 16px 10px; vertical-align: top;">
                            <span class="days-badge" style="background: rgba(59, 130, 246, 0.08); color: #3b82f6;">Confirmed ($150)</span>
                        </td>
                        <td style="padding: 16px 10px; text-align: right; vertical-align: top;">
                            <button class="review-trigger-btn" onclick="updateScheduleNodeStatus(this)" style="color: #ef4444; background: transparent; border: none; cursor: pointer;"><i class="fa-solid fa-circle-check"></i> Complete</button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Client-side scheduling table filtering function
function filterScheduleRows(moduleClassification) {
    const chips = document.querySelectorAll('.sched-chip');
    chips.forEach(chip => chip.classList.remove('active-sched-filter'));
    event.target.classList.add('active-sched-filter');

    const rows = document.querySelectorAll('.schedule-row-node');
    rows.forEach(row => {
        if (moduleClassification === 'all' || row.getAttribute('data-module') === moduleClassification) {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

// Complete status update function
function updateScheduleNodeStatus(actionButtonElement) {
    const targetTableRow = actionButtonElement.closest('.schedule-row-node');
    targetTableRow.style.opacity = '0.4';
    actionButtonElement.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processed';
    actionButtonElement.style.pointerEvents = 'none';
    actionButtonElement.style.color = '#64748b';
}
</script>

<?php include '../commen/footer.php'; ?>