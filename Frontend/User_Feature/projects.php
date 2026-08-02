<?php include 'userNavbar.php'; ?>

<div class="section-container" style="padding-bottom: 40px;">
    <div class="section-header">
        <p class="subtitle">Research Vault</p>
        <h2>Project Portfolios & Case Studies</h2>
        <p style="color: #94a3b8; max-width: 700px; font-size: 14px; margin-top: -20px;">
            Explore completed statistical frameworks, interactive reporting engines, and deployment parameters compiled across diverse data disciplines.
        </p>
    </div>

    <!-- Filter Control Navigation Tabs -->
    <div class="project-filter-bar" style="display: flex; gap: 12px; margin-top: 30px; flex-wrap: wrap; ">
        <button class="filter-chip active-filter" onclick="filterProjectCards('all')">All Repositories</button>
        <button class="filter-chip" onclick="filterProjectCards('powerbi')">Power BI Dashboards</button>
        <button class="filter-chip" onclick="filterProjectCards('python')">Python Engineering</button>
        <button class="filter-chip" onclick="filterProjectCards('ai')">AI Analytics</button>
        <button class="filter-chip" onclick="filterProjectCards('reports')">Questionnaires & Full Reports</button>
    </div>

    <!-- Case Studies Master Grid Layout -->
    <div class="projects-master-grid" id="projectsGrid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px; margin-top: 30px;">
        
        <!-- Case Study 1: Power BI -->
        <div class="project-card-node" data-category="powerbi">
            <div class="project-card-header">
                <span class="tech-tag tag-powerbi"><i class="fa-solid fa-chart-bar"></i> Power BI Matrix</span>
                <span class="status-pill done">Production</span>
            </div>
            <h4>Presentrics Attendance Intelligence</h4>
            <p>An administrative analytics platform built using a strict Midnight Blue and Charcoal aesthetic preference. Implements advanced DAX calculations for automated eligibility forecasting and attendance marking variances.</p>
            <div class="project-card-footer">
                <span><i class="fa-regular fa-folder-open"></i> Executive View</span>
                <button class="review-trigger-btn" onclick="openReviewSystem('Presentrics Attendance Intelligence')"><i class="fa-solid fa-comment-medical"></i> Review Case</button>
            </div>
        </div>

        <!-- Case Study 2: AI Analytics -->
        <div class="project-card-node" data-category="ai">
            <div class="project-card-header">
                <span class="tech-tag tag-ai"><i class="fa-solid fa-brain"></i> AI Analytics</span>
                <span class="status-pill running">Live Node</span>
            </div>
            <h4>AquaRelief Flood Management Matrix</h4>
            <p>A full-stack, AI-assisted flood relief optimization framework designed to map structural disaster data pathways and match resource distribution models across regional target populations in Sri Lanka.</p>
            <div class="project-card-footer">
                <span><i class="fa-regular fa-folder-open"></i> Full Stack Web</span>
                <button class="review-trigger-btn" onclick="openReviewSystem('AquaRelief Flood Management Matrix')"><i class="fa-solid fa-comment-medical"></i> Review Case</button>
            </div>
        </div>

        <!-- Case Study 3: Questionnaires & Full Reports -->
        <div class="project-card-node" data-category="reports">
            <div class="project-card-header">
                <span class="tech-tag tag-reports"><i class="fa-solid fa-file-invoice"></i> Survey Package</span>
                <span class="status-pill done">Published</span>
            </div>
            <h4>Polythene Ban Public Perception Study</h4>
            <p>A comprehensive research framework mapping the behavioral response patterns, ecological awareness coefficients, and sentiment vectors of university cohorts regarding national plastic mitigation guidelines.</p>
            <div class="project-card-footer">
                <span><i class="fa-regular fa-folder-open"></i> Full Report & Questions</span>
                <button class="review-trigger-btn" onclick="openReviewSystem('Polythene Ban Public Perception Study')"><i class="fa-solid fa-comment-medical"></i> Review Case</button>
            </div>
        </div>

        <!-- Case Study 4: Python Engineering -->
        <div class="project-card-node" data-category="python">
            <div class="project-card-header">
                <span class="tech-tag tag-python"><i class="fa-brands fa-python"></i> Python Engine</span>
                <span class="status-pill done">Optimized</span>
            </div>
            <h4>Automated Regression & Outlier Pipeline</h4>
            <p>A data engineering script library built to parse raw matrix sets, calculate regression coefficients, flag population variance anomalies, and clean records ahead of software validation staging routines.</p>
            <div class="project-card-footer">
                <span><i class="fa-regular fa-folder-open"></i> Core Algorithms</span>
                <button class="review-trigger-btn" onclick="openReviewSystem('Automated Regression & Outlier Pipeline')"><i class="fa-solid fa-comment-medical"></i> Review Case</button>
            </div>
        </div>

    </div>

    <!-- Interactive Peer Review Submission Panel Section -->
    <div id="reviewWorkspaceBlock" style="margin-top: 60px; background-color: var(--sidebar-bg); border: 1px solid #1e293b; padding: 40px; border-radius: 16px; display: none;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h3 style="font-size: 18px; margin-bottom: 4px; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-comments" style="color: var(--accent-blue);"></i> Project Peer Review Console
                </h3>
                <p style="font-size: 13px; color: var(--text-muted);">Selected Target: <strong id="reviewTargetName" style="color: white;">--</strong></p>
            </div>
            <button onclick="closeReviewSystem()" style="background: transparent; border: none; color: var(--text-muted); cursor: pointer;"><i class="fa-solid fa-xmark"></i> Close</button>
        </div>

        <form id="projectReviewForm" onsubmit="submitPeerReview(event)" style="margin-top: 25px;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label for="reviewerName">Your Name / Identification</label>
                    <input type="text" id="reviewerName" placeholder="Anonymous or Identity string" required style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px;">
                </div>
                <div class="form-group">
                    <label for="frameworkRating">Architecture Rating</label>
                    <select id="frameworkRating" style="width: 100%; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px;">
                        <option value="5">Tier 5 (Optimal Structural Layout)</option>
                        <option value="4">Tier 4 (Strong Execution Protocol)</option>
                        <option value="3">Tier 3 (Functional Execution)</option>
                    </select>
                </div>
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <label for="reviewComments">Your Ideas, Critiques, & Analytical Improvements</label>
                <textarea id="reviewComments" placeholder="Share code optimization notes, workflow alternatives, dashboard visual style critiques, or metric enhancement proposals..." required style="width: 100%; height: 100px; padding: 12px; background: var(--bg-dark); border: 1px solid #1e293b; color: white; border-radius: 8px; resize: none; font-family: inherit; line-height: 1.6;"></textarea>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 25px;">
                <button type="submit" class="cta-btn" style="padding: 12px 30px;"><i class="fa-solid fa-paper-plane"></i> Commit Review Parameters</button>
                <div id="reviewSuccessStatus" style="font-size: 13px; color: #10b981; display: none;"><i class="fa-solid fa-circle-check"></i> Review processed into system matrix memory log!</div>
            </div>
        </form>
    </div>
</div>

<script src="../javaScript/user.js">
// Client side grid repository filtering loops
function filterProjectCards(categoryString) {
    // Refresh filter button highlight state configurations
    const chips = document.querySelectorAll('.filter-chip');
    chips.forEach(chip => chip.classList.remove('active-filter'));
    event.target.classList.add('active-filter');

    const cards = document.querySelectorAll('.project-card-node');
    cards.forEach(card => {
        if (categoryString === 'all' || card.getAttribute('data-category') === categoryString) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}

// Open and point peer review node inputs to targeted case files
function openReviewSystem(projectName) {
    document.getElementById('reviewTargetName').innerText = projectName;
    const workspace = document.getElementById('reviewWorkspaceBlock');
    workspace.style.display = 'block';
    workspace.scrollIntoView({ behavior: 'smooth' });
}

function closeReviewSystem() {
    document.getElementById('reviewWorkspaceBlock').style.display = 'none';
}

// Process and submit system feedback simulations smoothly
function submitPeerReview(event) {
    event.preventDefault();
    
    const statusMsg = document.getElementById('reviewSuccessStatus');
    statusMsg.style.display = 'inline-block';
    
    // Clear structural input parameters safely upon completion
    setTimeout(() => {
        document.getElementById('reviewerName').value = '';
        document.getElementById('reviewComments').value = '';
        statusMsg.style.display = 'none';
        closeReviewSystem();
    }, 1800);
}
</script>

<?php include '../commen/footer.php'; ?>