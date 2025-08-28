<?php
// Get the current page name
$currentFile = basename($_SERVER["SCRIPT_NAME"]);

// Initialize active variables
$dashboard_active = "";
$banner_active = "";
$services_active = "";
$portfolio_active = "";

// Set the active class based on the current page
if ($currentFile == "dashboard.php") {
    $dashboard_active = "active";
}
if ($currentFile == "banner.php") {
    $banner_active = "active";
}
if ($currentFile == "manage-services.php") {
    $services_active = "active";
}
if ($currentFile == "manage-clients.php") {
    $portfolio_active = "active";
}
?>

<aside class="main-sidebar" style="top: 50px;">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li <?php echo $dashboard_active; ?>>
                <a href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li <?php echo $banner_active; ?>>
                <a href="banner.php">
                    <i class="fas fa-image"></i>
                    <span>Manage Banner</span>
                </a>
            </li>

            <li <?php echo $services_active; ?>>
                <a href="manage-services.php">
                    <i class="fas fa-tools"></i>
                    <span>Manage Services</span>
                </a>
            </li>
            
            <li <?php echo $portfolio_active; ?>>
                <a href="manage-clients.php">
                    <i class="fas fa-users"></i>
                    <span>Portfolio</span>
                </a>
            </li>

            <li>
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
