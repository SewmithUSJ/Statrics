<?php
// Dynamically pinpoint the currently running script name
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STATRICS</title>
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="app-container">
        <aside class="sidebar">
            <div class="brand-section">
                <div class="brand-logo">
                    <img src="../images/pic1.jpeg" alt="StatRics Logo" height="40" width="40" style="border-radius: 50%;">
                </div>
                <div class="brand-name">
                    <a href="../authentication/commonHome.html">
                        <h2>STATRICS</h2>
                    </a>
                    <span>Consultancy</span>
                </div>
            </div>

            <p class="menu-category">Overview</p>
            <ul class="nav-links">
                <li class="<?php echo ($current_page == 'home.php') ? 'active' : ''; ?>">
                    <a ><div onclick="navbarShift('home')" class="nav-item-content"><i class="fa-solid fa-house"></i> Home</div></a>
                </li>
                <li class="<?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">
                    <a ><div onclick="navbarShift('service')" class="nav-item-content"><i class="fa-solid fa-layer-group"></i> Services</div></a>
                </li>
                <li class="<?php echo ($current_page == 'myProjects.php' || $current_page == 'exploreProject.php') ? 'active' : ''; ?>">
                    <a ><div onclick="navbarShift('myprojects')" class="nav-item-content"><i class="fa-solid fa-folder-open"></i> My Projects</div></a>
                </li>
            </ul>

            <p class="menu-category">Engage</p>
            <ul class="nav-links">
                <li class="<?php echo ($current_page == 'chat.php') ? 'active' : ''; ?>">
                    <a ><div onclick="navbarShift('chat')" class="nav-item-content"><i class="fa-solid fa-comment-dots"></i> Live Chat</div><span class="dot"></span></a>
                </li>
                <li class="<?php echo ($current_page == 'appointment.php') ? 'active' : ''; ?>">
                    <a ><div onclick="navbarShift('appointment')" class="nav-item-content"><i class="fa-solid fa-calendar-days"></i> Book Appointment</div></a>
                </li>
            </ul>

            <p class="menu-category">Billing</p>
            <ul class="nav-links">
                <li class="<?php echo ($current_page == 'payment.php') ? 'active' : ''; ?>">
                    <a ><div onclick="navbarShift('payment')" class="nav-item-content"><i class="fa-solid fa-credit-card"></i> Plans & Payments</div></a>
                </li>
            </ul>

            <p class="menu-category">Company</p>
            <ul class="nav-links">
                <li class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">
                    <a ><div onclick="navbarShift('about')" class="nav-item-content"><i class="fa-solid fa-circle-info"></i> About</div></a>
                </li>
            </ul>
        </aside>

        <div class="main-wrapper">
            <nav class="navbar">
                <div class="user-profile">
                    <span id="username">Akeesha Piyadasa</span>
                    <i class="fa-solid fa-circle-user" style="font-size: 24px;"></i>
                </div>
            </nav>
            <main class="content-body">