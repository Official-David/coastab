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
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Bank | Request New Card</title>
    <meta name="description" content="You can now request for a new credit card" />

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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                    <li class="breadcrumb-item"><a href="#">Banking Services</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Request New Card</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <!-- Container -->
            <div class="container">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Request a new card</h5>
                            <p class="mb-25">Fill in  all the fields below to request a new card.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form method="post" action="request-new-card.php">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="firstName">First name</label>
                                                <input class="form-control" id="firstName" placeholder="" value="" type="text" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="lastName">Last name</label>
                                                <input class="form-control" id="lastName" placeholder="" value="" type="text" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input class="form-control" required id="email" placeholder="you@email.com" type="email" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="number">Account number</label>
                                            <input class="form-control" id="acc_no" placeholder="Account number" type="number" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" id="password" placeholder="Password" type="password" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input class="form-control" id="address" placeholder="1234 Main St" type="text" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                            <input class="form-control" id="address2" placeholder="Apartment or suite" type="text">
                                        </div>



                                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                    </form>
                                  <?php
                                    if (isset($_POST['submit'])) {


    ?>
    <script>
        swal({
            title: "Success!",
            text: "Card requested",
            icon: "success",
            button: "OK",
        }).then(function() {
    window.location = "dashboard.php";
});;
    </script>
<?php
}
?>
                                </div>
                            </div>
                        </section>

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
        header("location:login.php");
       exit;
   } ?>