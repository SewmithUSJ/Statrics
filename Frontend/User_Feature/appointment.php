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
            <form id="appointmentForm" onsubmit="handleFormSubmit(event)">
                
                <div class="form-group">
                    <label for="clientName">Full Name</label>
                    <input type="text" id="clientName" value="Akeesha Piyadasa" required style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px;">
                </div>

                <div class="form-group" style="margin-top: 20px;">
                    <label for="serviceSelect">Target Analytical Service</label>
                    <select id="serviceSelect" onchange="updateLivePreview()" style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px;">
                        <option value="InsightGather">InsightGather (Data Collection & Sampling Design)</option>
                        <option value="StatAnalytics">StatAnalytics (Comprehensive Data Analysis)</option>
                        <option value="OmniConsult">OmniConsult (Professional Statistical Consultancy)</option>
                        <option value="EduScholar Support">EduScholar Support (Academic & Thesis Guidance)</option>
                    </select>
                </div>

                <div class="form-group" style="margin-top: 20px;">
                    <label style="display: block; margin-bottom: 8px;">Consultation Mode</label>
                    <div style="display: flex; gap: 20px;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="radio" name="meetMode" value="Online" checked onchange="updateLivePreview()"> Online (Zoom / MS Teams)
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="radio" name="meetMode" value="Physical" onchange="updateLivePreview()"> Physical (On-Campus/Office Location)
                        </label>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
                    <div class="form-group">
                        <label for="appDate">Preferred Date</label>
                        <input type="date" id="appDate" required onchange="updateLivePreview()" style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px;">
                    </div>
                    <div class="form-group">
                        <label for="appTime">Preferred Time</label>
                        <input type="time" id="appTime" required onchange="updateLivePreview()" style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px;">
                    </div>
                </div>

                <button type="submit" class="cta-btn" style="margin-top: 30px; width: 100%; padding: 14px;"><i class="fa-solid fa-calendar-plus"></i> Request Allocation</button>
            </form>
        </div>

        <div class="preview-panel" style="display: flex; flex-direction: column; gap: 20px;">
            
            <div id="liveStatusCard" style="background-color: var(--sidebar-bg); border: 1px solid #1e293b; padding: 30px; border-radius: 16px; position: relative; overflow: hidden;">
                <div style="position: absolute; top: 0; right: 0; width: 4px; height: 100%; background-color: var(--accent-blue);" id="statusIndicatorAccent"></div>
                <h3 style="font-size: 18px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-satellite-dish" style="color: var(--accent-blue);"></i> Real-Time Processing Status
                </h3>
                
                <div class="preview-item" style="margin-bottom: 12px;">
                    <span style="font-size: 12px; color: var(--text-muted); display: block;">MATRIX SCHEDULER MATRIX TARGET</span>
                    <strong id="prevService" style="color: white; font-size: 15px;">InsightGather</strong>
                </div>
                <div class="preview-item" style="margin-bottom: 12px;">
                    <span style="font-size: 12px; color: var(--text-muted); display: block;">ENVIRONMENT MODE</span>
                    <strong id="prevMode" style="color: #3b82f6;">Online</strong>
                </div>
                <div class="preview-item" style="margin-bottom: 20px;">
                    <span style="font-size: 12px; color: var(--text-muted); display: block;">REQUESTED WINDOW TIMESTAMP</span>
                    <strong id="prevTimestamp" style="color: white;">Not Selected</strong>
                </div>

                <div id="conflictResolutionBox" style="display: none; background: rgba(245, 158, 11, 0.1); border: 1px dashed #f59e0b; padding: 15px; border-radius: 8px; margin-top: 15px;">
                    <p style="font-size: 13px; color: #f59e0b; margin-bottom: 12px;"></i> Appointment maked successfully!</p>
                    <div style="display: flex; gap: 10px;">
                        <button onclick="resolveStatus('Accepted')" class="secondary-btn" style="padding: 6px 12px; font-size: 12px; border-color: #10b981; color: #10b981; background: transparent;">Accept This Anyway</button>
                        <button onclick="resolveStatus('Alternative Requested')" class="secondary-btn" style="padding: 6px 12px; font-size: 12px; border-color: #f59e0b; color: #f59e0b; background: transparent;">Ask for Another Time</button>
                    </div>
                </div>

                <div id="successStateBox" style="display: none; background: rgba(16, 185, 129, 0.1); border: 1px solid #10b981; padding: 15px; border-radius: 8px; margin-top: 15px; color: #10b981; font-size: 14px;">
                    <i class="fa-solid fa-circle-check"></i> Allocation Parameter Finalized Successfully!
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" ></script>

<script src="../javaScript/user.js">
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

<?php include '../commen/footer.php'; ?>