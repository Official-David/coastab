<?php
session_start();
include("connection.php");
//error_reporting(0);
if (isset($_SESSION['admin'])){
// header("location:dashboard");
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
<!--
Template Name: Pangong - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Contact: https://hencework.ticksy.com/
License: You must have a valid license purchased only from themeforest to legally use the template for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Bank | Request New Card</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

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
                    <img class="brand-img d-inline-block" src="dist/img/logo-light.png" alt="brand" />
                </a>
                <ul class="navbar-nav hk-navbar-content">

                    <li class="nav-item dropdown dropdown-notifications">
                        <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><span class="feather-icon"><i
                                    data-feather="bell"></i></span><span class="badge-wrap"><span
                                    class="badge badge-primary badge-indicator badge-indicator-sm badge-pill pulse"></span></span></a>
                        <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn"
                            data-dropdown-out="fadeOut">
                            <h6 class="dropdown-header">Notifications <a href="javascript:void(0);" class="">View
                                    all</a></h6>
                            <div class="notifications-nicescroll-bar">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media">
                                        <div class="media-img-wrap">
                                            <div class="avatar avatar-sm">
                                                <img src="dist/img/avatar1.jpg" alt="user"
                                                    class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                <div class="notifications-text"><span
                                                        class="text-dark text-capitalize">Evie Ono</span> accepted your
                                                    invitation to join the team</div>
                                                <div class="notifications-time">12m</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media">
                                        <div class="media-img-wrap">
                                            <div class="avatar avatar-sm">
                                                <img src="dist/img/avatar2.jpg" alt="user"
                                                    class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                <div class="notifications-text">New message received from <span
                                                        class="text-dark text-capitalize">Misuko Heid</span></div>
                                                <div class="notifications-time">1h</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media">
                                        <div class="media-img-wrap">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-text avatar-text-primary rounded-circle">
                                                    <span class="initial-wrap"><span><i
                                                                class="zmdi zmdi-account font-18"></i></span></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                <div class="notifications-text">You have a follow up with<span
                                                        class="text-dark text-capitalize"> Pangong head</span> on <span
                                                        class="text-dark text-capitalize">friday, dec 19</span> at <span
                                                        class="text-dark">10.00 am</span></div>
                                                <div class="notifications-time">2d</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media">
                                        <div class="media-img-wrap">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-text avatar-text-success rounded-circle">
                                                    <span class="initial-wrap"><span>A</span></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                <div class="notifications-text">Application of <span
                                                        class="text-dark text-capitalize">Sarah Williams</span> is
                                                    waiting for your approval</div>
                                                <div class="notifications-time">1w</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media">
                                        <div class="media-img-wrap">
                                            <div class="avatar avatar-sm">
                                                <span class="avatar-text avatar-text-warning rounded-circle">
                                                    <span class="initial-wrap"><span><i
                                                                class="zmdi zmdi-notifications font-18"></i></span></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div>
                                                <div class="notifications-text">Last 2 days left for the project</div>
                                                <div class="notifications-time">15d</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
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
                                    <span>Madelyn Shane<i class="zmdi zmdi-chevron-down"></i></span>
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
            <form role="search" class="navbar-search">
                <div class="position-relative">
                    <a href="javascript:void(0);" class="navbar-search-icon"><span class="feather-icon"><i
                                data-feather="search"></i></span></a>
                    <input type="text" name="example-input1-group2" class="form-control"
                        placeholder="Type here to Search">
                    <a id="navbar_search_close" class="navbar-search-close" href="#"><span class="feather-icon"><i
                                data-feather="x"></i></span></a>
                </div>
            </form>
            <!-- /Top Navbar -->

        <nav class="hk-nav hk-nav-dark">
                <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                            data-feather="x"></i></span></a>
                <div class="nicescroll-bar">
                    <div class="navbar-nav-wrap">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item active">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#dash_drp">
                                    <span class="feather-icon"><i data-feather="activity"></i></span>
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
                                                <!-- <li class="nav-item">
                                                        <a class="nav-link" href="#">Transaction Summary</a>
                                                    </li> -->
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            <li class="nav-item">
                                <a class="nav-link link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#app_drp">
                                    <span class="feather-icon"><i data-feather="package"></i></span>
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
                            <li class="nav-item">
                                <a class="nav-link link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#app_rp">
                                    <span class="feather-icon"><i data-feather="package"></i></span>
                                    <span class="nav-link-text">Help</span>
                                </a>
                                <ul id="app_rp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="faqs.php">FAQ</a>
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
                        <a href="javascript:void(0);" id="settings_panel_close" class="settings-panel-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
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
                        <button type="button" id="nav_light_select" class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light Mode</span></button>
                        <button type="button" id="nav_dark_select" class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark Mode</span></button>
                    </div>
                    <hr>
                    <h6 class="mb-5">Top Nav</h6>
                    <p class="font-14">Choose your liked color mode</p>
                    <div class="button-list hk-navbar-select mb-10">
                        <button type="button" id="navtop_light_select" class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light Mode</span></button>
                        <button type="button" id="navtop_dark_select" class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark Mode</span></button>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Scrollable Header</h6>
                        <div class="toggle toggle-sm toggle-simple toggle-light toggle-bg-primary scroll-nav-switch"></div>
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
            <!-- Breadcrumb -->
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">Help</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

             <!-- Container -->
             <div class="container-fluid">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12 pa-0">
                            <div class="container mt-sm-30 mt-10">
                                <div class="hk-row">
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <h6 class="card-header">
                                                Category
                                            </h6>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex align-items-center active">
                                                    <i class="ion ion-md-sunny mr-15"></i>Terms & conditions<span class="badge badge-light badge-pill ml-15">06</span>
                                                </li>
                                                <li class="list-group-item d-flex align-items-center">
                                                    <i class="ion ion-md-unlock mr-15"></i>Privacy policy<span class="badge badge-light badge-pill ml-15">14</span>
                                                </li>
                                                <li class="list-group-item d-flex align-items-center">
                                                    <i class="ion ion-md-bookmark mr-15"></i>Terms of use<span class="badge badge-light badge-pill ml-15">10</span>
                                                </li>
                                                <li class="list-group-item d-flex align-items-center">
                                                    <i class="ion ion-md-filing mr-15"></i>Documentation<span class="badge badge-light badge-pill ml-15">27</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="card card-lg">
                                            <h3 class="card-header border-bottom-0">
                                                Terms and Conditions
                                            </h3>
                                            <div class="accordion accordion-type-2 accordion-flush" id="accordion_2">
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between activestate">
                                                        <a role="button" data-toggle="collapse" href="#collapse_1i" aria-expanded="true">The Intellectual Property</a>
                                                    </div>
                                                    <div id="collapse_1i" class="collapse show" data-parent="#accordion_2" role="tabpanel">
                                                        <div class="card-body pa-15">The Intellectual Property disclosure will inform users that the contents, logo and other visual media you created is your property and is protected by copyright laws.</div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_2i" aria-expanded="false">Termination clause</a>
                                                    </div>
                                                    <div id="collapse_2i" class="collapse" data-parent="#accordion_2">
                                                        <div class="card-body pa-15">A Termination clause will inform that users’ accounts on your website and mobile app or users’ access to your website and mobile (if users can’t have an account with you) can be terminated in case of abuses or at your sole discretion.</div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_3i" aria-expanded="false">Governing Law</a>
                                                    </div>
                                                    <div id="collapse_3i" class="collapse" data-parent="#accordion_2">
                                                        <div class="card-body pa-15">A Governing Law will inform users which laws govern the agreement. This should the country in which your company is headquartered or the country from which you operate your website and mobile app.</div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_4i" aria-expanded="false">Limit what users can do</a>
                                                    </div>
                                                    <div id="collapse_4i" class="collapse" data-parent="#accordion_2">
                                                        <div class="card-body pa-15">A Limit What Users Can Do clause can inform users that by agreeing to use your service, they’re also agreeing to not do certain things. This can be part of a very long and thorough list in your Terms and Conditions agreements so as to encompass the most amount of negative uses.</div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_5i" aria-expanded="false">Limitation of liability of your products</a>
                                                    </div>
                                                    <div id="collapse_5i" class="collapse" data-parent="#accordion_2">
                                                        <div class="card-body pa-15">No matter what kind of goods you sell, best practices direct you to present any warranties you are disclaiming and liabilities you are limiting in a way that your customers will notice.</div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse_6i" aria-expanded="false">How to enforce Terms and Conditions</a>
                                                    </div>
                                                    <div id="collapse_6i" class="collapse" data-parent="#accordion_2">
                                                        <div class="card-body pa-15">While creating and having a Terms and Conditions is important, it’s far more important to understand how you can make the Terms and Conditions enforceable. You should always use clickwrap to get users to agree to your Terms and Conditions. Clickwrap is when you make your users take some action – typically clicking something – to show they’re agreeing. Here’s how Engine Yard uses the clickwrap agreement with the I agree check box:</div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
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
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Pampered by<a href="https://hencework.com/" class="text-dark" target="_blank">Hencework</a> © 2019</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="d-inline-block">Follow us</p>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
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
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Jasny-bootstrap  JavaScript -->
    <script src="vendors/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Ion JavaScript -->
    <script src="vendors/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="dist/js/rangeslider-data.js"></script>

    <!-- Select2 JavaScript -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="dist/js/select2-data.js"></script>

    <!-- Bootstrap Tagsinput JavaScript -->
    <script src="vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

    <!-- Daterangepicker JavaScript -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/daterangepicker/daterangepicker.js"></script>
    <script src="dist/js/daterangepicker-data.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Toggles JavaScript -->
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
</body>

</html>
<?php }else {
        header("location:login");
       exit;
   } ?>