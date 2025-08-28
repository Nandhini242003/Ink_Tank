<?php 
$currentFile = $_SERVER["SCRIPT_NAME"]; 
$parts = Explode('/', $currentFile); 
$currentFile = $parts[count($parts) - 1]; 

// This part of the code is responsible for setting the "active" class on the current page's link.
// It checks the current file name and sets a variable accordingly.
$dashboard_active = ($currentFile == "dashboard.php") ? "active" : "";
$banner_active = ($currentFile == "banner.php") ? "active" : "";
$services_active = ($currentFile == "manage-services.php") ? "active" : "";
$portfolio_active = ($currentFile == "manage-clients.php") ? "active" : "";

?> 
<div class="sidebar"> 
    <div class="sidebar-header"> 
        <a href="../"> 
            <img src="../images/logo.png" alt="Ink Tank Logo" class="sidebar-logo"> 
        </a> 
    </div> 
    <ul class="sidebar-menu"> 
        <li><a href="dashboard.php" class="<?php echo $dashboard_active; ?>"><i class="fas fa-home"></i> Dashboard</a></li> 
        <li><a href="banner.php" class="<?php echo $banner_active; ?>"><i class="fas fa-image"></i> Manage Banner</a></li> 
        <li><a href="manage-services.php" class="<?php echo $services_active; ?>"><i class="fas fa-tools"></i> Manage Services</a></li> 
        <li><a href="manage-clients.php" class="<?php echo $portfolio_active; ?>"><i class="fas fa-users"></i> Portfolio</a></li> 
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li> 
    </ul> 
</div>