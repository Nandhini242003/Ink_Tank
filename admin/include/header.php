<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $sitetitle;?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin_styles.css"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> </head>
<body>
    <div class="dashboard-container">
        ```

**2. Modify `index.php`**

This file will now include the main content within the new layout. You will need to move the sidebar and the main content into this file, as your `header.php` no longer contains the `wrapper` or `main-header` elements.

```php
<?php
// dashboard.php - Admin dashboard
error_reporting(1);
ob_start();
session_start();

// Use your session variables
if(empty($_SESSION['inktank_id']) && empty($_SESSION['inktank_username'])){
    $_SESSION["cms_status"]="error";
    $_SESSION["cms_msg"]="Please login now!";
    header('Location:login.php');
    exit();
}

include("../../lib/config.php");
// Assuming you have site title defined in config
$sitetitle = "Welcome | " . $db->select_query("SELECT setting_value FROM site_settings WHERE setting_name = 'site_title' LIMIT 1")[0]['setting_value'];
include("include/header.php");
?>

<div class="main-content">
    <div class="top-bar">
        <h1 class="page-title">Welcome <small>Control panel</small></h1>
        <div class="user-info">
            <img src="images/avatar.png" class="user-image" alt="User Image">
            <span>
                <?php
                if(!empty($_SESSION["inktank_username"])){
                    echo htmlspecialchars($_SESSION["inktank_username"]);
                } else {
                    echo "User";
                }
                ?>
            </span>
        </div>
    </div>
    
    <div class="content-body">
        <h4 class="welcome-heading">Welcome to <b>INKTANK Admin Panel</b>!</h4>
        <p class="overview-text">Please choose an option from the left menu.</p>
        
        <div class="info-cards-container">
            <div class="info-card">
                <div class="card-title">Total Users</div>
                <div class="card-number">1,234</div>
            </div>
            <div class="info-card">
                <div class="card-title">Total Posts</div>
                <div class="card-number">567</div>
            </div>
            <div class="info-card">
                <div class="card-title">New Comments</div>
                <div class="card-number">89</div>
            </div>
        </div>
    </div>
</div>

<?php 
// Assuming you have a footer file
include("include/footer.php");
?>