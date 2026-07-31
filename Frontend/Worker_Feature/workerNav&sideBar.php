<?php $current_page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STATRICS</title>
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/worker.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>


<div class="admin-scope">
    <nav class="admin-top-navbar">
        <div class="admin-nav-brand">
            <i class="fa-solid fa-gauge-high admin-brand-icon"></i>
            <div>
                <span class="brand-main">STATRICS</span>
                <span class="brand-badge">WORKER CORE</span>
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
            
            <a onclick="navbarShift('myprojects')" id="myprojects" class="sidebar-link-item <?php echo ($current_page == 'workerMyProjects.php') ? 'active-route' : ''; ?>">
                <i class="fa-solid fa-house-laptop"></i>
                <span>My Projects</span>
            </a>
            
            <a onclick="navbarShift('chat')" id="chat" class="sidebar-link-item <?php echo ($current_page == 'workerChat.php') ? 'active-route' : ''; ?>">
                <i class="fa-solid fa-folder-tree"></i>
                <span>Live chat</span>
            </a>
            
            <a onclick="navbarShift('payment')" id="payment" class="sidebar-link-item <?php echo ($current_page == 'workerPayment.php') ? 'active-route' : ''; ?>">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Payment Records</span>
            </a>
        </div>
        <div class="sidebar-group-block" style="margin-top: 30px;">
            <span class="sidebar-group-title">Personal details</span>          
            <a onclick="navbarShift('profile')" id="profile" class="sidebar-link-item <?php echo ($current_page == 'workerProfile.php') ? 'active-route' : ''; ?>">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <span>Worker Profile</span>
            </a>
            
            
        </div>
      

        <div class="sidebar-footer-action-block">
            <a href="../user/home.php" class="sidebar-exit-btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Return to Public Site</span>
            </a>
        </div>
    </aside>
</div>