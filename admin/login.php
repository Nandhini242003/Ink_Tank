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

include("../lib/config.php");
// Assuming you have site title defined in config
$sitetitle = "Welcome | " . $db->select_query("SELECT setting_value FROM site_settings WHERE setting_name = 'site_title' LIMIT 1")[0]['setting_value'];
include("include/header.php");
?>
<style type="text/css">
.msg_cont_position{
    padding:100px 0;
}
.msg_cont_style{
    margin:0 auto;
    float: none
}
.msg_style{
    line-height: 40px;
}
</style>

<?php 
// Assuming you have a sidebar file
include("include/sidebar.php"); 
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Welcome
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Welcome</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="row msg_cont_position">
                        <div class="col-xs-5 text-center msg_cont_style">
                            <h4 class="msg_style">Welcome to <b>INKTANK Admin Panel</b>!<br/> 
                                Please choose an option from the left menu.</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
<?php 
// Assuming you have a footer file
include("include/footer.php");
?>