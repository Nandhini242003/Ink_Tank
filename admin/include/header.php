<?php
// Start a session if one is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$sitetitle=(isset($sitetitle)?(!empty($sitetitle)?$sitetitle:"Admin Panel 1"):"Admin Panel 3");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $sitetitle;?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/select2.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/skins/skin-custom-blue.css">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.repeater.js"></script>
    <script src="js/jquery.form-repeater.js" type="text/javascript"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
<header class="main-header">
    <a href="../index.php" class="logo" target="_blank" style="height: 100px;border: none;">
        <span class="logo-lg">
            <img src="images/logo.jpg" width="180" height="80"/>
        </span>
    </a>
    <nav class="navbar navbar-static-top" style="height: 25px;">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="images/avatar.png" class="user-image" alt="User Image">
                        <span class="hidden-xs">
                            <?php
                            if(!empty($_SESSION["inktank_username"])){
                                echo $_SESSION["inktank_username"];
                            }
                            else{
                                echo "User";
                            }
                            ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="images/avatar.png" class="img-circle" alt="User Image">
                            <p>
                                <?php
                                if(!empty($_SESSION["inktank_username"])){
                                    echo $_SESSION["inktank_username"]." - Administrator";
                                }
                                else{
                                    echo "User - Unknown";
                                }
                                ?>
                                <small></small>
                            </p>
                        </li>
                        <li class="user-body">
                            <div class="row">
                            </div>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="changepassword.php" class="btn btn-default btn-flat">Change Password</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout.php" class="btn btn-default btn-flat">Log out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
