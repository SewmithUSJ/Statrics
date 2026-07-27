<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STATRICS</title>
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>


<div class="admin-scope">
    <nav class="admin-top-navbar">
        <div class="admin-nav-brand">
            <i class="fa-solid fa-gauge-high admin-brand-icon"></i>
            <div>
                <span class="brand-main">STATRICS</span>
                <span class="brand-badge">ADMIN CORE</span>
            </div>
        </div>

        <div class="admin-nav-actions">
            <div class="system-status-pill">
                <span class="status-indicator-pulse"></span>
                <span class="status-text">Matrix Node Active</span>
            </div>
            
            <div class="admin-profile-badge">
                <div class="admin-avatar"><i class="fa-solid fa-user-gear"></i></div>
                <span class="admin-name">Akeesha Piyadasa</span>
            </div>
        </div>
    </nav>

    <aside class="admin-sidebar-nav">
        <div class="sidebar-group-block">
            <span class="sidebar-group-title">Core Management</span>
            
            <a href="adminHome.php" class="sidebar-link-item active-route">
                <i class="fa-solid fa-house-laptop"></i>
                <span>Console Home</span>
            </a>
            
            <a href="manageProj.php" class="sidebar-link-item">
                <i class="fa-solid fa-folder-tree"></i>
                <span>Manage Repositories</span>
                <span class="sidebar-counter-tag count-blue">32</span>
            </a>
            
            <a href="schedule.php" class="sidebar-link-item">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Staged Schedules</span>
                <span class="sidebar-counter-tag count-green">14</span>
            </a>
        </div>

        <div class="sidebar-group-block" style="margin-top: 30px;">
            <span class="sidebar-group-title">Data Audits & Billings</span>
            
            <!-- <a href="admin_reviews.php" class="sidebar-link-item">
                <i class="fa-solid fa-rate-card"></i>
                <span>Peer Feedback Matrix</span>
                <span class="sidebar-counter-tag count-purple">New</span>
            </a> -->
            
            <a href="financial.php" class="sidebar-link-item">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <span>Financial Transactions</span>
            </a>
            
            <!-- <a href="admin_security.php" class="sidebar-link-item">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Telemetry Core Logs</span>
            </a> -->
        </div>

        <div class="sidebar-footer-action-block">
            <a href="../User_Feature/home.php" class="sidebar-exit-btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Return to Public Site</span>
            </a>
        </div>
    </aside>
</div>