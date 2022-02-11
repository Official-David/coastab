<?php
session_start();
include("connection.php");
//error_reporting(0);
if (isset($_SESSION['admin'])) {
    // header("location:dashboard");
} elseif (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];


    $sql = "SELECT * FROM customer WHERE user_id = '$user_id'";
    $result = mysqli_query($myConn, $sql);
    $row =  mysqli_fetch_array($result, MYSQLI_BOTH);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $sex = $row['sex'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $account_balance = $row['account_balance'];
    $account_number = $row['account_number'];
    $account_status = $row['account_status'];
    $address = $row['address'];
    $rows = mysqli_num_rows($result);

    if ($account_status == 1) {
        $account_status = "Active";
    }
    if ($account_status == 2) {
        $account_status = "Inactive";
    }

    if ($account_status == 3) {
        $account_status = "On hold";
    }

    $SQL = "SELECT * FROM images WHERE user_id = '$user_id'";

    $results = mysqli_query($myConn, $SQL);
    $ro = mysqli_fetch_array($results, MYSQLI_BOTH);


    $pic = $ro["file_name"];


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Bank | Profile</title>
        <meta name="description" content="Your profile is ready" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

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
                <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
                <a class="navbar-brand" href="dashboard.php">
                <img class="brand-img d-inline-block" src="dist/img/logo-light.png" alt="brand" width="150" height="30"/>
                </a>
                <ul class="navbar-nav hk-navbar-content">
                    <li class="nav-item dropdown dropdown-authentication">
                        <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media">
                                <div class="media-img-wrap">
                                    <div class="avatar">
                                        <img src="<?php echo "passport/" . $pic ?>" alt="user" class="avatar-img rounded-circle">
                                    </div>
                                    <span class="badge badge-success badge-indicator"></span>
                                </div>
                                <div class="media-body">
                                    <span><?php echo $first_name . "  " . $last_name; ?><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                            <a class="dropdown-item" href="profile.php"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                            <a class="dropdown-item" href="log-out.php"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log
                                    out</span></a>
                        </div>
                    </li>
                </ul>
            </nav>
              
            <!-- /Top Navbar -->
            <!-- Vertical Nav -->
            <nav class="hk-nav hk-nav-dark">
                <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
                <div class="nicescroll-bar">
                    <div class="navbar-nav-wrap">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item active">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#dash_drp">
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
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#dash_dr">
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
                                <a class="nav-link link" href="javascript:void(0);" data-toggle="collapse" data-target="#app_drp">
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
                <!-- Container -->
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12 pa-0">
                            <div class="profile-cover-wrap overlay-wrap">
                                <div class="profile-cover-img" style="background-image:url('dist/img/trans-bg.jpg')"></div>
                                <div class="bg-overlay bg-trans-dark-60"></div>
                                <div class="container profile-cover-content py-50">
                                    <div class="hk-row">
                                        <div class="col-lg-6">
                                            <div class="media align-items-center">
                                                <div class="media-img-wrap  d-flex">
                                                    <div class="avatar">
                                                        <img src="<?php echo "passport/" . $pic ?>" alt="user" class="avatar-img img-thumbnail">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-white text-capitalize display-6 mb-5 font-weight-400"><?php echo ucfirst($first_name) . "  " . ucfirst($last_name); ?></div>
                                                    <div class="font-14 text-white"><span class="mr-5"><span class="mr-5 "><?php echo $account_status ?></span></span><br>
                                                        <a href="edit-profile.php"><button class="btn btn-primary btn-sm">Edit Profile</button></a></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        


                            <!-- /Row -->
                        </div>
                    </div>
                </div>

                <div class="container">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">
                                <h5 class="hk-sec-title font-17">Account Information</h5>
                                <div class="row">
                                    <div class="col-sm">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-md-4 col-xs-6 form-group">
                                                    <h5>Full Name: <i><?php echo ucfirst($first_name) . "  " . ucfirst($last_name) ?></i></h5>
                                                </div>
                                                <div class="col-md-4 col-xs-6 form-group">
                                                    <h5>Account Number: <i><?php echo $account_number ?></i></h5>
                                                </div>
                                                <div class="col-md-4 col-xs-6 form-group">
                                                    <h5>Sex: <i><?php echo $sex ?></i></h5>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4 col-xs-6 form-group">
                                                    <h5>Phone: <i><?php echo $phone_number ?></i></h5>
                                                </div>
                                                <div class="col-md-4 col-xs-6 form-group">
                                                    <h5>Email: <i><?php echo $email ?></i></h5>
                                                </div>
                                                <div class="col-md-4 col-xs-6  text-justified">
                                                    <h5>City: <i><?php echo $address ?></i></h5>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /Row -->
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

        <!-- twitter JavaScript -->
        <script src="dist/js/twitterFetcher.js"></script>
        <script src="dist/js/widgets-data.js"></script>

        <!-- Owl JavaScript -->
        <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>

        <!-- Owl Init JavaScript -->
        <script src="dist/js/owl-data.js"></script>

        <!-- Toggles JavaScript -->
        <script src="vendors/jquery-toggles/toggles.min.js"></script>
        <script src="dist/js/toggle-data.js"></script>

        <!-- Init JavaScript -->
        <script src="dist/js/init.js"></script>

    </body>
    </html>
<?php } else {
    header("location:login.php");
    exit;
} ?>