<?php
session_start();
include("connection.php");
//error_reporting(0);
if (isset($_SESSION['admin'])){
 header("location:../admin");
}
elseif(isset($_SESSION['userid'])){
$user_id = $_SESSION['userid'];

$sql = "SELECT * FROM customer WHERE user_id = '$user_id'";
$result = mysqli_query($myConn, $sql);
$row=  mysqli_fetch_array($result, MYSQLI_BOTH);
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$phone_number = $row['phone_number'];
$account_balance = $row['account_balance'];
$account_number = $row['account_number'];
$account_status = $row['account_status'];
$rows = mysqli_num_rows($result);

$SQL = "SELECT * FROM images WHERE user_id = '$user_id'";

$results = mysqli_query($myConn,$SQL);
$ro = mysqli_fetch_array($results, MYSQLI_BOTH);


$pic = $ro["file_name"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Bank | Dashboard</title>
    <meta name="description" content="Online banking dashboard" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- select2 CSS -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Daterangepicker CSS -->
    <link href="vendors/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->
    
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
                <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span
                        class="feather-icon"><i data-feather="menu"></i></span></a>
                <a class="navbar-brand" href="dashboard.php">
                <img class="brand-img d-inline-block" src="dist/img/logo-light.png" alt="brand" width="150" height="30"/>
                </a>
                <ul class="navbar-nav hk-navbar-content">
                    <li class="nav-item dropdown dropdown-authentication">
                        <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar">
                                        <img src="<?php echo "passport/".$pic ?>" alt="user" class="avatar-img rounded-circle">
                                    </div>
                                    <span class="badge badge-success badge-indicator"></span>
                                </div>
                                <div class="media-body">
                                    <span><?php echo $first_name. "  ".$last_name; ?><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX"
                            data-dropdown-out="flipOutX">
                            <a class="dropdown-item" href="profile.php"><i
                                    class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                            <a class="dropdown-item" href="log-out.php"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log
                                    out</span></a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /Top Navbar -->

            <!-- Vertical Nav -->
            <nav class="hk-nav hk-nav-dark">
                <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                            data-feather="x"></i></span></a>
                <div class="nicescroll-bar">
                    <div class="navbar-nav-wrap">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item active">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#dash_drp">
                                    <span class="feather-icon"><i data-feather="package"></i></span>
                                    <span class="nav-link-text">Banking Services</span>
                                </a>
                                <ul id="dash_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="set-trans-limit.php">Set Transaction Limit</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="request-new-card.php">Request New Card</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="block-card.php">Block Card</a>
                                            </li>
                                            <li class="nav-item">
                                                    <a class="nav-link" href="add-card.php">Add Card</a>
                                                </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                        data-target="#dash_dr">
                                        <span class="feather-icon"><i data-feather="activity"></i></span>
                                        <span class="nav-link-text">Transactions</span>
                                    </a>
                                    <ul id="dash_dr" class="nav flex-column collapse collapse-level-1">
                                        <li class="nav-item">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="transfer-history.php">Transfer History</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            <li class="nav-item">
                                <a class="nav-link link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#app_drp">
                                    <span class="feather-icon"><i data-feather="zap"></i></span>
                                    <span class="nav-link-text">Send Money</span>
                                </a>
                                <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="transfers.php">Make Transfer</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                </div>
            </nav>
            <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
            <!-- /Vertical Nav -->

            <!-- Setting Panel -->
            <div class="hk-settings-panel">
                <div class="nicescroll-bar position-relative">
                    <div class="settings-panel-wrap">
                        <div class="settings-panel-head">
                            <img class="brand-img d-inline-block align-top" src="dist/img/logo-light.png" alt="brand" />
                            <a href="javascript:void(0);" id="settings_panel_close" class="settings-panel-close"><span
                                    class="feather-icon"><i data-feather="x"></i></span></a>
                        </div>
                        <hr>
                        <h6 class="mb-5">Layout</h6>
                        <p class="font-14">Choose your preferred layout</p>
                        <div class="layout-img-wrap">
                            <div class="row">
                                <a href="javascript:void(0);" class="col-6 mb-30 active">
                                    <img class="rounded opacity-70" src="dist/img/layout1.png" alt="layout">
                                    <i class="zmdi zmdi-check"></i>
                                </a>
                                <a href="dashboard2.php" class="col-6 mb-30">
                                    <img class="rounded opacity-70" src="dist/img/layout2.png" alt="layout">
                                    <i class="zmdi zmdi-check"></i>
                                </a>
                                <a href="dashboard3.php" class="col-6">
                                    <img class="rounded opacity-70" src="dist/img/layout3.png" alt="layout">
                                    <i class="zmdi zmdi-check"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <h6 class="mb-5">Navigation</h6>
                        <p class="font-14">Menu comes in two modes: dark & light</p>
                        <div class="button-list hk-nav-select mb-10">
                            <button type="button" id="nav_light_select"
                                class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span
                                    class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light
                                    Mode</span></button>
                            <button type="button" id="nav_dark_select"
                                class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span
                                    class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark
                                    Mode</span></button>
                        </div>
                        <hr>
                        <h6 class="mb-5">Top Nav</h6>
                        <p class="font-14">Choose your liked color mode</p>
                        <div class="button-list hk-navbar-select mb-10">
                            <button type="button" id="navtop_light_select"
                                class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span
                                    class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light
                                    Mode</span></button>
                            <button type="button" id="navtop_dark_select"
                                class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span
                                    class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark
                                    Mode</span></button>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <h6>Scrollable Header</h6>
                            <div
                                class="toggle toggle-sm toggle-simple toggle-light toggle-bg-primary scroll-nav-switch">
                            </div>
                        </div>
                        <button id="reset_settings" class="btn btn-primary btn-block btn-reset mt-30">Reset</button>
                    </div>
                </div>
                <img class="d-none" src="dist/img/logo-light.png" alt="brand" />
                <img class="d-none" src="dist/img/logo-dark.png" alt="brand" />
            </div>
            <!-- /Setting Panel -->

            <!-- Main Content -->
            <div class="hk-pg-wrapper">
                <!-- Container -->
                <div class="container mt-xl-50 mt-sm-30 mt-15">
                    <!-- Title -->
                    <div class="hk-pg-header align-items-top">
                        <div>
                       
                            <h2 class="hk-pg-title font-weight-600 mb-10"><?php echo "Welcome " .ucfirst($first_name). "!"?></h2>
                            <p>Token Serial Number: <span><i>Token is not attached to this account</i></span></p>
                        </div>

                    </div>
                    <!-- /Title -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hk-row">
                                <div class="col-sm-12">
                                    <div class="card-group hk-dash-type-2">
                                        <div class="card card-sm">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-5">
                                                    <div>
                                                        <span
                                                            class="d-block font-15 text-dark font-weight-500">Balance</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="d-block display-4 text-dark mb-5"><?php echo "$ ".number_format($account_balance + 3000,2); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-sm">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-5">
                                                    <div>
                                                        <span
                                                            class="d-block font-15 text-dark font-weight-500">Available
                                                            Balance</span>
                                                    </div>
                                                </div>
                                                <div>
                                                <span class="d-block display-4 text-dark mb-5"><?php echo "$ ".number_format($account_balance,2); ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="card card-sm">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-5">
                                                    <div>
                                                        <span class="d-block font-15 text-dark font-weight-500">Previous
                                                            Balance</span>
                                                    </div>
                                                </div>
                                                <div>
                                                <span class="d-block display-4 text-dark mb-5"><?php echo "$ ".number_format($previous_balance,2); ?></span>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /Container -->

                <!-- Footer -->
                <div class="hk-footer-wrap container">
                    <footer class="footer">
                        <div>
                            <div class="col-md-12 col-sm-12">
                            <span>Coasta Bank PLC © 2021<span id="google_translate_element">
                    </span></span>
                            
                    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
                            </div>
                        </div>
                    </footer>
                </div>
                <!-- /Footer -->
            </div>
            <!-- /Main Content -->

        </div>
        <!-- /HK Wrapper -->

        <!-- jQuery -->
          <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <script src="vendors/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Slimscroll JavaScript -->
        <script src="dist/js/jquery.slimscroll.js"></script>

        <!-- Fancy Dropdown JS -->
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>

        <!-- FeatherIcons JavaScript -->
        <script src="dist/js/feather.min.js"></script>

        <!-- Toggles JavaScript -->
        <script src="vendors/jquery-toggles/toggles.min.js"></script>
        <script src="dist/js/toggle-data.js"></script>

        <!-- Counter Animation JavaScript -->
        <script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- EChartJS JavaScript -->
        <script src="vendors/echarts/dist/echarts-en.min.js"></script>

        <!-- Sparkline JavaScript -->
        <script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>

        <!-- Vector Maps JavaScript -->
        <script src="vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="dist/js/vectormap-data.js"></script>

        <!-- Owl JavaScript -->
        <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>

        <!-- Toastr JS -->
        <script src="vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

        <!-- Init JavaScript -->
        <script src="dist/js/init.js"></script>
        <script src="dist/js/dashboard-data.js"></script>

    </body>

</html>
<?php }else {
        header("location:login.php");
       exit;
   } ?>