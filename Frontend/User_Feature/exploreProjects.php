<?php 
include '../commen/header.php'; 
?>

<div class="section-container" style="padding-bottom: 60px;">
    
    <!-- Header Block -->
    <div class="section-header">
        <p class="subtitle" style="color: var(--accent-blue);">System Portfolio Ledger</p>
        <h2>Explore Ongoing Allocations & Build Phases</h2>
        <p style="color: var(--text-muted); max-width: 750px; font-size: 14px; margin-top: -20px;">
            Audit live execution streams, track software components completed to date, and review assigned metrics for architectural frameworks.
        </p>
    </div>

    <!-- Main Vertical Project Stream Ledger -->
    <div class="explore-pipeline-container">
        
        <!-- Project 1: Presentrics -->
        <div class="explore-project-card status-border-active">
            <div class="explore-card-header">
                <div class="project-title-area">
                    <span class="project-tag-icon"><i class="fa-solid fa-square-poll-vertical"></i></span>
                    <div>
                        <h3>Presentrics Student Attendance Intel Matrix</h3>
                        <span class="project-meta-service">Service focus: Data Analysis</span>
                    </div>
                </div>
                <span class="status-badge badge-active"><i class="fa-solid fa-spinner fa-spin"></i> Active Execution</span>
            </div>

            <p class="project-description">
                Building an analytics engine optimizing student tracking variables, geographic data matrices, and automated statistical reporting pipelines.
            </p>

            <!-- Finished Components Tracker Checklist -->
            <div class="project-progress-block">
                <h4><i class="fa-solid fa-circle-check text-active-color"></i> Completed Architecture Phases</h4>
                <div class="completed-chips-grid">
                    <span class="completed-chip"><i class="fa-solid fa-check"></i> 100% Data Analysis (Report Framework)</span>
                    <span class="completed-chip"><i class="fa-solid fa-check"></i> 50% Frontend Dashboard Layout</span>
                    <span class="completed-chip"><i class="fa-solid fa-check"></i> DAX Script Vector Schemas</span>
                    <span class="completed-chip"><i class="fa-solid fa-check"></i> Dark UI Theme Integration</span>
                </div>
            </div>

            <div class="explore-card-footer">
                <div class="assigned-nodes">
                    <span>Allocated Experts:</span>
                    <strong class="node-name">Akeesha Piyadasa</strong>
                </div>
                <div class="footer-actions">
                    <span class="timeline-deadline-pill"><i class="fa-solid fa-calendar-day"></i> Target: Mid 2026</span>
                    <a href="dataAnalysis.php" class="explore-action-btn"><i class="fa-solid fa-layer-group"></i> Inspect Pipeline</a>
                </div>
            </div>
        </div>

        <!-- Project 2: Public Polythene Usage Perception Run -->
        <div class="explore-project-card status-border-active">
            <div class="explore-card-header">
                <div class="project-title-area">
                    <span class="project-tag-icon"><i class="fa-solid fa-chart-line"></i></span>
                    <div>
                        <h3>Public Polythene Usage Perception Run</h3>
                        <span class="project-meta-service">Service focus: Academic Research</span>
                    </div>
                </div>
                <span class="status-badge badge-active"><i class="fa-solid fa-spinner fa-spin"></i> Active Execution</span>
            </div>

            <p class="project-description">
                Investigating behavioural response trends, baseline perception metrics, and structured ecological survey analytics regarding the polythene bag ban in Sri Lanka across regional student demographics.
            </p>

            <div class="project-progress-block">
                <h4><i class="fa-solid fa-circle-check text-active-color"></i> Completed Architecture Phases</h4>
                <div class="completed-chips-grid">
                    <span class="completed-chip"><i class="fa-solid fa-check"></i> Survey Questionnaire Framework</span>
                    <span class="completed-chip"><i class="fa-solid fa-check"></i> Core Statistical Slide Presentations</span>
                    <span class="completed-chip"><i class="fa-solid fa-check"></i> First-Year Target Sample Space Models</span>
                </div>
            </div>

            <div class="explore-card-footer">
                <div class="assigned-nodes">
                    <span>Allocated Experts:</span>
                    <strong class="node-name">Nellisha Weerasekera</strong>
                </div>
                <div class="footer-actions">
                    <span class="timeline-deadline-pill"><i class="fa-solid fa-calendar-day"></i> Target: Immediate</span>
                    <a href="academicResearch.php" class="explore-action-btn"><i class="fa-solid fa-layer-group"></i> Inspect Pipeline</a>
                </div>
            </div>
        </div>

        <!-- Project 3: AquaRelief -->
        <div class="explore-project-card status-border-pending">
            <div class="explore-card-header">
                <div class="project-title-area">
                    <span class="project-tag-icon"><i class="fa-solid fa-droplet"></i></span>
                    <div>
                        <h3>AquaRelief Flood Management Module</h3>
                        <span class="project-meta-service">Service focus: Statistical Consultancy Intermediate</span>
                    </div>
                </div>
                <span class="status-badge badge-pending"><i class="fa-solid fa-clock"></i> Review Backlog</span>
            </div>

            <p class="project-description">
                A high-integrity analytical platform engineered to execute full-stack tracking logic, dataset filtering, and structural relief routing during regional flood disasters.
            </p>

            <div class="project-progress-block">
                <h4><i class="fa-solid fa-circle-check text-active-color"></i> Completed Architecture Phases</h4>
                <div class="completed-chips-grid">
                    <span class="completed-chip"><i class="fa-solid fa-check"></i> Full-Stack Database Schema Layout</span>
                    <span class="completed-chip"><i class="fa-solid fa-check"></i> Regional Precipitation Mapping Models</span>
                </div>
            </div>

            <div class="explore-card-footer">
                <div class="assigned-nodes">
                    <span>Allocated Experts:</span>
                    <strong class="node-name">Akeesha Piyadasa (Lead)</strong>
                </div>
                <div class="footer-actions">
                    <span class="timeline-deadline-pill"><i class="fa-solid fa-lock"></i> Verification Staged</span>
                    <a href="#" class="explore-action-btn btn-disabled" onclick="return false;"><i class="fa-solid fa-ban"></i> Stream Locked</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include '../commen/footer.php'; ?>