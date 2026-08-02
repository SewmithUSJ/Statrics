<?php include 'userNavbar.php'; ?>


<div class="section-container" style="padding-bottom: 80px;">
    
    <!-- Enterprise Identity Header -->
    <div class="section-header" style="text-align: center; margin-bottom: 60px;">
        <p class="subtitle" style="color: var(--accent-blue);">Corporate Matrix Intelligence</p>
        <h2 style="text-align: center;">Architecting Computational Clarity</h2>
        <p style="color: var(--text-muted); max-width: 700px; font-size: 15px; margin: -15px auto 0 auto; line-height: 1.6;">
            StatRics delivers quantitative engineering frameworks, data survey systems, and custom analytical dashboard nodes to university researchers and enterprise pipelines globally.
        </p>
    </div>

    <!-- Analytics Operational Telemetry Counters -->
    <div class="abt-telemetry-grid">
        <div class="abt-metric-card">
            <h3>4+</h3>
            <span class="metric-label">Core Enterprise Services</span>
        </div>
        <div class="abt-metric-card">
            <h3>140+</h3>
            <span class="metric-label">Data Projects Deployed</span>
        </div>
        <div class="abt-metric-card">
            <h3>99.4%</h3>
            <span class="metric-label">Statistical Confidence Level</span>
        </div>
        <div class="abt-metric-card">
            <h3>200K+</h3>
            <span class="metric-label">Data Observations Processed</span>
        </div>
    </div>

    <!-- Structural Layout Split -->
    <div class="abt-layout-split">
        
        <!-- Left Column: Core Capability Vectors -->
        <div style="display: flex; flex-direction: column; gap: 30px;">
            <div class="usr-panel-card">
                <h3 class="usr-card-title"><i class="fa-solid fa-layer-group" style="color: var(--accent-blue);"></i> Engineering Focus Areas</h3>
                <p style="color: var(--text-muted); font-size: 13.5px; line-height: 1.6; margin: 0 0 15px 0;">
                    We specialize in constructing highly targeted mathematical processing models. From geofenced real-time logging architectures to large-scale categorical perception tracking, our environments prioritize raw data accuracy and high-scannability dark UI layers.
                </p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; font-size: 12px; color: #cbd5e1;">
                    <div><i class="fa-solid fa-check" style="color: #10b981; margin-right: 6px;"></i> Power BI & DAX Pipelines</div>
                    <div><i class="fa-solid fa-check" style="color: #10b981; margin-right: 6px;"></i> Minitab 16 Variance Analysis</div>
                    <div><i class="fa-solid fa-check" style="color: #10b981; margin-right: 6px;"></i> Geofenced System Locks</div>
                    <div><i class="fa-solid fa-check" style="color: #10b981; margin-right: 6px;"></i> PHP / Full-Stack Form Nodes</div>
                </div>
            </div>

            <!-- Operational History Timeline Card -->
            <div class="usr-panel-card">
                <h3 class="usr-card-title"><i class="fa-solid fa-timeline" style="color: #10b981;"></i> Deployment Milestones</h3>
                <div class="abt-timeline-stack">
                    <div class="abt-timeline-node">
                        <strong>Presentrics Deployment</strong>
                        <span>Smart student tracking system utilizing localized geofencing and predictive forecasting algorithms.</span>
                    </div>
                    <div class="abt-timeline-node">
                        <strong>AquaRelief Framework</strong>
                        <span>Web-based full-stack emergency management system tracking multi-point precipitation data streams.</span>
                    </div>
                    <div class="abt-timeline-node">
                        <strong>Polythene Ban Research Analytics</strong>
                        <span>Configured demographic awareness matrices tracing usage variances within university clusters.</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Corporate Contact Pipeline -->
        <div class="usr-panel-card">
            <h3 class="usr-card-title"><i class="fa-solid fa-paper-plane" style="color: var(--accent-blue);"></i> Command Communication Routing</h3>
            <p style="color: var(--text-muted); font-size: 12px; margin-top: -10px; margin-bottom: 25px;">Submit direct procedural telemetry requests to our core administration deck.</p>
            
            <form id="aboutContactForm" onsubmit="handleContactSubmission(event)" class="usr-compact-form">
                <div class="usr-input-wrapper">
                    <label>Corporate Identity / Operator Name</label>
                    <input type="text" id="cntName" required placeholder="e.g., Akeesha Piyadasa">
                </div>
                <div class="usr-input-wrapper">
                    <label>Transmission Email Address</label>
                    <input type="email" id="cntEmail" required placeholder="operator@domain.com">
                </div>
                <div class="usr-input-wrapper">
                    <label>Message Content Payload</label>
                    <textarea id="cntMessage" rows="5" required placeholder="Specify your desired architecture scope or engineering team requirements..."></textarea>
                </div>
                <button type="submit" class="cta-btn" style="width: 100%; padding: 12px; margin-top: 5px;">
                    <i class="fa-solid fa-tower-broadcast"></i> BroadCast Message Matrix
                </button>
                <div id="abtContactToast" class="usr-toast-success-panel" style="margin-top: 10px;">
                    <i class="fa-solid fa-circle-check"></i> Inquiry transmission successfully verified and queued!
                </div>
            </form>
        </div>
    </div>

    <!-- Active Human Specialists Registry Block -->
    <div class="usr-panel-card" style="margin-top: 40px;">
        <h3 class="usr-card-title" style="margin-bottom: 5px;"><i class="fa-solid fa-network-wired" style="color: var(--accent-blue);"></i> Specialist Engineering Registry</h3>
        <p style="color: var(--text-muted); font-size: 12px; margin-bottom: 30px;">Direct tracking record of engineers, technical advisors, and statistics consultants currently bound to active operational nodes.</p>

        <div class="abt-worker-registry-grid">
            
            <!-- Specialist Profile Card 1 -->
            <div class="abt-worker-card">
                <div class="worker-card-header">
                    <div class="worker-avatar-box"><i class="fa-solid fa-user-gear"></i></div>
                    <div>
                        <h4>Akeesha Piyadasa</h4>
                        <span>Statistical Consultant</span>
                    </div>
                </div>
                <p class="worker-card-excerpt">Full-stack dynamic architecture specialist specializing in geofenced applications, dark UI styling layout systems, and database telemetry tracking structures...</p>
                <button class="worker-inspect-btn" onclick="openWorkerModal('Akeesha Piyadasa', 'Statistical Consultant & Full-Stack Architect', 'University of Sri Jayewardenepura', '2+ Years', 'Regression Models, DAX Scripting, PHP Middleware, MySQL Schema Operations', 'https://linkedin.com')">
                    Show More Details <i class="fa-solid fa-circle-chevron-right"></i>
                </button>
            </div>

            <!-- Specialist Profile Card 2 -->
            <div class="abt-worker-card">
                <div class="worker-card-header">
                    <div class="worker-avatar-box"><i class="fa-solid fa-user-graduate"></i></div>
                    <div>
                        <h4>Nellisha Weerasekera</h4>
                        <span>Data Analyst</span>
                    </div>
                </div>
                <p class="worker-card-excerpt">Analytics engineer focusing on public perception statistical models, environmental impact metric arrays, and complex system interface auditing loops...</p>
                <button class="worker-inspect-btn" onclick="openWorkerModal('Nellisha Weerasekera', 'Data Analyst & Academic Peer Advisor', 'University of Colombo', '3+ Years', 'Data Cleaning Protocols, Minitab 16 Variance Analysis, Population Survey Matrices', 'https://linkedin.com')">
                    Show More Details <i class="fa-solid fa-circle-chevron-right"></i>
                </button>
            </div>

        </div>
    </div>
</div>

<!-- ==========================================================================
     GLOBAL LIGHTWEIGHT INSPECTION OVERLAY MODAL
     ========================================================================== -->
<div id="workerProfileInspectionModal" class="abt-inspect-modal-overlay" onclick="closeWorkerModal()">
    <div class="abt-inspect-modal-card" onclick="event.stopPropagation()">
        <div class="inspect-modal-close-trigger" onclick="closeWorkerModal()"><i class="fa-solid fa-xmark"></i></div>
        
        <div class="worker-card-header" style="margin-bottom: 25px;">
            <div class="worker-avatar-box" style="width: 50px; height: 50px; font-size: 20px;"><i class="fa-solid fa-user-shield"></i></div>
            <div>
                <h4 id="mdlWorkerName" style="font-size: 16px; margin: 0; color: white;"></h4>
                <span id="mdlWorkerTitle" style="font-size: 12px; color: var(--accent-blue); font-weight: 600;"></span>
            </div>
        </div>

        <div class="inspect-modal-data-table">
            <div class="inspect-data-row">
                <span class="lbl">Institutional Node:</span>
                <span class="val" id="mdlWorkerUni"></span>
            </div>
            <div class="inspect-data-row">
                <span class="lbl">Seniority Log:</span>
                <span class="val" id="mdlWorkerExp"></span>
            </div>
            <div class="inspect-data-row" style="flex-direction: column; gap: 6px; align-items: flex-start;">
                <span class="lbl">Validated Skill Vectors:</span>
                <span class="val" id="mdlWorkerSkills" style="line-height: 1.5; color: #cbd5e1;"></span>
            </div>
        </div>

        <a id="mdlWorkerLinkedIn" href="#" target="_blank" class="cta-btn" style="width: 100%; text-align: center; margin-top: 25px; padding: 11px; text-decoration: none; box-sizing: border-box; display: block;">
            <i class="fa-brands fa-linkedin"></i> Route to LinkedIn Profile
        </a>
    </div>
</div>

<!-- Controller Logics -->
<script src="../javaScript/user.js">
function handleContactSubmission(event) {
    event.preventDefault();
    const toast = document.getElementById('abtContactToast');
    toast.style.display = 'block';
    setTimeout(() => {
        document.getElementById('aboutContactForm').reset();
        toast.style.display = 'none';
    }, 4000);
}

function openWorkerModal(name, title, university, experience, skills, linkedinUrl) {
    document.getElementById('mdlWorkerName').innerText = name;
    document.getElementById('mdlWorkerTitle').innerText = title;
    document.getElementById('mdlWorkerUni').innerText = university;
    document.getElementById('mdlWorkerExp').innerText = experience;
    document.getElementById('mdlWorkerSkills').innerText = skills;
    document.getElementById('mdlWorkerLinkedIn').href = linkedinUrl;

    const modal = document.getElementById('workerProfileInspectionModal');
    modal.classList.add('inspect-modal-visible');
}

function closeWorkerModal() {
    document.getElementById('workerProfileInspectionModal').classList.remove('inspect-modal-visible');
}

</script>
<?php include '../commen/footer.php'; ?>