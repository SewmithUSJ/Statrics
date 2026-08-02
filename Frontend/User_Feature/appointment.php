<?php include 'userNavbar.php'; ?>

<div class="section-container">
    <div class="section-header">
        <p class="subtitle">Scheduler Hub</p>
        <h2>Book a Consultation Session</h2>
    </div>

    <div class="appointment-notifications" id="notificationPanel">
        <div class="notify-banner">
            <div class="notify-icon"><i class="fa-solid fa-bell-ring fa-bounce"></i></div>
            <div class="notify-text">
                <strong>Upcoming Schedule Notification:</strong> Your verification block for tomorrow at 10:00 AM is confirmed. 
            </div>
        </div>
    </div>

    <div class="appointment-grid" style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 40px; margin-top: 30px;">
        
        <div class="appointment-card-box" style="background-color: var(--sidebar-bg); border: 1px solid #1e293b; padding: 40px; border-radius: 16px;">

<div id="appointmentForm" >

    <!-- Select Project Dropdown -->
    <div class="form-group" style="margin-bottom: 20px;">
        <label for="projectSelect" style="display: block; margin-bottom: 8px;">Select Project</label>
        <select id="projectSelect" name="project_id" style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px; font-family: inherit; cursor: pointer;">
            <option value="" disabled selected>-- Select One of Your Active Projects --</option>
            <option value="1">Student Attendance Metrics Extraction Matrix</option>
            <option value="2">AquaRelief Disaster Response Optimization Model</option>
            <option value="3">Regional Polythene Ban Impact Correlation Study</option>
        </select>
    </div>

    <!-- Description / Agenda -->

    <div class="form-group">
        <label for="description" style="display: block; margin-bottom: 8px;">Description</label>
        <textarea id="description" name="description" rows="4" placeholder="Enter session details or agenda..."  style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px; font-family: inherit; resize: vertical;"></textarea>
    </div>

    <!-- Date & Time Row -->

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
        <div class="form-group">
            <label for="appDate" style="display: block; margin-bottom: 8px;">Date</label>
            <input type="date" id="appDate" name="date"  style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px;">
        </div>
       
        <div class="form-group">
            <label for="appTime" style="display: block; margin-bottom: 8px;">Time</label>
            <input type="time" id="appTime" name="time" style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px;">
        </div>
    </div>

    <!-- Duration -->

    <div class="form-group" style="margin-top: 20px;">
        <label for="durationMinutes" style="display: block; margin-bottom: 8px;">Duration (Minutes)</label>
        <input type="number" id="durationMinutes" name="duration_minutes" min="15" step="15" placeholder="e.g. 30"  style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px;">
    </div>

    <!-- Submit Button -->

    <button onclick="requestAppointment()" class="cta-btn" style="margin-top: 30px; width: 100%; padding: 14px; cursor: pointer;">
        <i class="fa-solid fa-calendar-plus"></i> Request Allocation
    </button>

</div>
        </div>

        <div class="preview-panel" style="display: flex; flex-direction: column; gap: 20px;">
            
            <div class="status-summary-wrapper" style="display: flex; flex-direction: column; gap: 12px;">
                
                <!-- 1. Confirmed Appointments Card -->
                <div class="status-summary-card" style="background-color: var(--sidebar-bg); border: 1px solid #1e293b; border-left: 4px solid #10b981; border-radius: 12px; padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <h4 style="font-size: 13px; color: #10b981; margin: 0; display: flex; align-items: center; gap: 8px; text-transform: uppercase; letter-spacing: 0.5px;">
                            <i class="fa-solid fa-circle-check"></i> Confirmed Appointments
                        </h4>
                        <span style="background: rgba(16, 185, 129, 0.15); color: #10b981; font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 12px;">2 Sessions</span>
                    </div>
                    <div id="conformedCards" class="status-card-scroll" style="max-height: 120px; overflow-y: auto; padding-right: 6px; display: flex; flex-direction: column; gap: 8px;">
                        <div style="background: var(--bg-dark); padding: 10px; border-radius: 6px; border: 1px solid #1e293b;">
                            <div style="font-size: 13px; font-weight: 600; color: #f8fafc;">StatAnalytics Sync</div>
                            <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">
                                <i class="fa-regular fa-calendar"></i> Aug 02, 2026 @ 10:00 AM • <span style="color: #38bdf8;">Online</span>
                            </div>
                        </div>
                        <div style="background: var(--bg-dark); padding: 10px; border-radius: 6px; border: 1px solid #1e293b;">
                            <div style="font-size: 13px; font-weight: 600; color: #f8fafc;">EduScholar Thesis Guidance</div>
                            <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">
                                <i class="fa-regular fa-calendar"></i> Aug 12, 2026 @ 02:00 PM • <span style="color: #a78bfa;">Physical</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Pending Appointments Card -->
                <div class="status-summary-card" style="background-color: var(--sidebar-bg); border: 1px solid #1e293b; border-left: 4px solid #f59e0b; border-radius: 12px; padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <h4 style="font-size: 13px; color: #f59e0b; margin: 0; display: flex; align-items: center; gap: 8px; text-transform: uppercase; letter-spacing: 0.5px;">
                            <i class="fa-solid fa-clock"></i> Pending Appointments
                        </h4>
                        <span style="background: rgba(245, 158, 11, 0.15); color: #f59e0b; font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 12px;">1 Session</span>
                    </div>
                    <div id="penddingCards" class="status-card-scroll" style="max-height: 120px; overflow-y: auto; padding-right: 6px; display: flex; flex-direction: column; gap: 8px;">
                        <div style="background: var(--bg-dark); padding: 10px; border-radius: 6px; border: 1px solid #1e293b;">
                            <div style="font-size: 13px; font-weight: 600; color: #f8fafc;">InsightGather Sampling Review</div>
                            <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">
                                <i class="fa-regular fa-calendar"></i> Aug 05, 2026 @ 02:30 PM • <span style="color: #38bdf8;">Online</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Cancelled Appointments Card -->
                <div class="status-summary-card" style="background-color: var(--sidebar-bg); border: 1px solid #1e293b; border-left: 4px solid #ef4444; border-radius: 12px; padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                        <h4 style="font-size: 13px; color: #ef4444; margin: 0; display: flex; align-items: center; gap: 8px; text-transform: uppercase; letter-spacing: 0.5px;">
                            <i class="fa-solid fa-circle-xmark"></i> Cancelled Appointments
                        </h4>
                        <span style="background: rgba(239, 68, 68, 0.15); color: #ef4444; font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 12px;">1 Session</span>
                    </div>
                    <div id="cancelledCards" class="status-card-scroll" style="max-height: 120px; overflow-y: auto; padding-right: 6px; display: flex; flex-direction: column; gap: 8px;">
                        <div style="background: var(--bg-dark); padding: 10px; border-radius: 6px; border: 1px solid #1e293b;">
                            <div style="font-size: 13px; font-weight: 600; color: #f8fafc;">OmniConsult Exploratory Session</div>
                            <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">
                                <i class="fa-regular fa-calendar"></i> Jul 28, 2026 @ 11:00 AM • <span style="color: #ef4444;">Cancelled by Client</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="pdfDownloadCard" style="background-color: var(--sidebar-bg); border: 1px solid #1e293b; padding: 30px; border-radius: 16px; display: none; text-align: center;">
                <i class="fa-solid fa-file-pdf" style="font-size: 48px; color: #ef4444; margin-bottom: 15px;"></i>
                <h4>Appointment Documentation Formatted</h4>
                <p style="font-size: 13px; color: var(--text-muted); margin: 5px 0 20px 0;">Download verification matrix blueprint containing session data guidelines.</p>
                <button onclick="generatePDFReceipt()" class="secondary-btn" style="width: 100%; border-color: #ef4444; color: #ef4444;"><i class="fa-solid fa-download"></i> Download Appointment PDF</button>
            </div>

        </div>
        
    </div>
</div>



<script>

    let section="appoinment"
// Live Interface State Updates
function updateLivePreview() {
    const service = document.getElementById('serviceSelect').value;
    const mode = document.querySelector('input[name="meetMode"]:checked').value;
    const date = document.getElementById('appDate').value || 'YYYY-MM-DD';
    const time = document.getElementById('appTime').value || '00:00';

    document.getElementById('prevService').innerText = service;
    document.getElementById('prevMode').innerText = mode;
    document.getElementById('prevTimestamp').innerText = `${date} @ ${time}`;
}

// Intercept Allocation Form
function handleFormSubmit(event) {
    event.preventDefault();
    
    // Simulate complex background scheduling checks: reveal conflict resolution path
    document.getElementById('conflictResolutionBox').style.display = 'block';
    document.getElementById('successStateBox').style.display = 'none';
    document.getElementById('statusIndicatorAccent').style.backgroundColor = '#f59e0b';
}

// Execution Resolve Parameters
function resolveStatus(statusChoice) {
    document.getElementById('conflictResolutionBox').style.display = 'none';
    
    if(statusChoice === 'Accepted') {
        document.getElementById('successStateBox').style.display = 'block';
        document.getElementById('successStateBox').innerText = "✓ Appointment System Parameter Confirmed!";
        document.getElementById('successStateBox').style.color = "#10b981";
        document.getElementById('successStateBox').style.backgroundColor = "rgba(16, 185, 129, 0.1)";
        document.getElementById('statusIndicatorAccent').style.backgroundColor = '#10b981';
        
        // Expose Document Engine Interface
        document.getElementById('pdfDownloadCard').style.display = 'block';
        
        // Insert a temporary banner notice parameter element dynamically
        addNotificationAlert();
    } else {
        document.getElementById('successStateBox').style.display = 'block';
        document.getElementById('successStateBox').innerText = "⚠ Alternative Matrix Pipeline Handover Active. Choose another time value.";
        document.getElementById('successStateBox').style.color = "#f59e0b";
        document.getElementById('successStateBox').style.backgroundColor = "rgba(245, 158, 11, 0.1)";
        document.getElementById('statusIndicatorAccent').style.backgroundColor = '#f59e0b';
    }
}

// Add real-time Notification Banner alert parameter element
function addNotificationAlert() {
    const date = document.getElementById('appDate').value;
    const time = document.getElementById('appTime').value;
    const service = document.getElementById('serviceSelect').value;
    
    const panel = document.getElementById('notificationPanel');
    panel.innerHTML += `
        <div class="notify-banner functional" style="background: rgba(16, 185, 129, 0.1); border-color: #10b981; margin-top:10px;">
            <div class="notify-icon"><i class="fa-solid fa-circle-check" style="color: #10b981;"></i></div>
            <div class="notify-text" style="color: #e2e8f0;">
                <strong>Live Confirmation:</strong> [${service}] session cataloged securely for ${date} at ${time}.
            </div>
        </div>
    `;
}

// Client Side PDF Generation engine mapping data array cleanly
function generatePDFReceipt() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    
    const name = document.getElementById('clientName').value;
    const service = document.getElementById('serviceSelect').value;
    const mode = document.querySelector('input[name="meetMode"]:checked').value;
    const date = document.getElementById('appDate').value;
    const time = document.getElementById('appTime').value;

    // PDF Structural Layout Framing
    doc.setFillColor(11, 19, 41);
    doc.rect(0, 0, 220, 40, 'F');
    
    doc.setTextColor(255, 255, 255);
    doc.setFont("Helvetica", "bold");
    doc.setFontSize(22);
    doc.text("STATRICS CONSULTANCY", 15, 25);
    
    doc.setTextColor(100, 116, 139);
    doc.setFontSize(10);
    doc.text("OFFICIAL REGISTRATION RECEIPT", 140, 25);

    // Body Metadata Info Layout
    doc.setTextColor(15, 23, 42);
    doc.setFontSize(14);
    doc.text("Appointment Specifications Blueprint", 15, 60);
    
    doc.setDrawColor(226, 232, 240);
    doc.line(15, 65, 195, 65);
    
    doc.setFont("Helvetica", "normal");
    doc.setFontSize(11);
    doc.setTextColor(51, 65, 85);
    
    doc.text(`Client Identifier Name: ${name}`, 15, 80);
    doc.text(`Allocated System Module: ${service}`, 15, 95);
    doc.text(`Consultation Mode Type: ${mode}`, 15, 110);
    doc.text(`Scheduled Date Field: ${date}`, 15, 125);
    doc.text(`Target Structural Window Time: ${time}`, 15, 140);
    
    doc.setDrawColor(30, 41, 59);
    doc.line(15, 160, 195, 160);
    
    doc.setFontSize(9);
    doc.setTextColor(148, 163, 184);
    doc.text("Thank you for choosing StatRics frameworks. Please present this document during verification.", 15, 175);
    
    // Trigger localized browser storage system download window trigger
    doc.save(`StatRics-Appointment-${date}.pdf`);
}
</script>

<script src="../javaScript/user.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" ></script>

<?php include '../commen/footer.php'; ?>