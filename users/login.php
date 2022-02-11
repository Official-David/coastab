<?php

session_start();

include("connection.php");

error_reporting(0);



if (isset($_SESSION['userid'])) {

    header("location:verify.php");
} elseif (isset($_SESSION['admin'])) {

    header("location:../admin/");
} else

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Coasta Bank PLC | Login</title>
    <meta name="description" content="Online Bank Login" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

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
    <div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-between align-items-center">
                <a class="d-flex auth-brand" href="../index.html">
                    <img class="brand-img" src="dist/img/logo-dark.png" alt="brand" width="150" height="30" />
                </a>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 pa-0">
                        <div id="owl_demo_1" class="owl-carousel dots-on-item owl-theme">
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/bg2.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        <h1 class="display-3 text-white mb-20">Thank you for making us your best banking option.</h1>
                                        <p class="text-white">We are glad to be a part of your journey to acheiving success and we promise to help you grow your finances.</p>
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                            <div class="fadeOut item auth-cover-img overlay-wrap" style="background-image:url(dist/img/bg1.jpg);">
                                <div class="auth-cover-info py-xl-0 pt-100 pb-50">
                                    <div class="auth-cover-content text-center w-xxl-75 w-sm-90 w-xs-100">
                                        <h1 class="display-3 text-white mb-20">Enjoy our new and well improved services.</h1>
                                        <p class="text-white">We have made our online banking services so user friendly and can't wait to see you make use off them.</p>
                                    </div>
                                </div>
                                <div class="bg-overlay bg-trans-dark-50"></div>
                            </div>
                        </div>
                    </div>

                    <?php


                $error_msg = "";
                if (isset($_POST['login'])) {
                    session_start();
                    include("connection.php");
                    $user_id = $_POST['id'];
                    $password = $_POST['password'];

                    $account_status = 4;
                    $sql = "SELECT * FROM customer WHERE user_id = '$user_id' AND password = '$password'";
                    $result = mysqli_query($myConn, $sql);
                    $row =  mysqli_fetch_array($result, MYSQLI_BOTH);
                    $username = $row['first_name'];
                    $account_number = $row['account_number'];
                    $rows = mysqli_num_rows($result);

                    $sqlll = "SELECT * FROM customer WHERE user_id = '$user_id' AND password = '$password' AND account_status = '$account_status'";
                    $resultss = mysqli_query($myConn, $sqlll);
                    $rowa =  mysqli_fetch_array($resultss, MYSQLI_BOTH);
                    $username = $rowa['first_name'];
                    $account_number = $rowa['account_number'];
                    $rowss = mysqli_num_rows($resultss);


                    if ($rowss == 1) {
                        $error_msg = "(Account blocked contact support@getcoastaplc.com to rectify )";
                    } else {
                        if ($rows == 1) {
                            $_SESSION['username'] = $username;
                            $username = $_SESSION['username'];
                            $_SESSION['userid'] = $user_id;
                            $user_id = $_SESSION['userid'];
                    ?>
                                <script type="text/javascript">
                                    window.location = "verify.php";
                                </script>
                    <?php
                        } else {
                            $error_msg = "(User ID or password is incorrect)";
                        }
                    }
                }
                    ?>

                    <div class="col-xl-7 pa-0">
                        <div class="auth-form-wrap py-xl-0 py-50">
                            <div class="auth-form w-xxl-55 w-xl-75 w-sm-90 w-xs-100">
                                <form method="post" action="login.php">
                                    <h1 class="display-4 mb-10">Welcome Back :)</h1>
                                    <p class="mb-30">Sign in to your account and enjoy our new banking features.</p>
                                    <div class="form-group">
                                        <label for="">User ID </label><span class="text-danger text-center"><?php echo " " . $error_msg; ?></span>
                                        <input class="form-control" placeholder="Enter your user id" type="text" name="id" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input class="form-control" placeholder="Enter your password" type="password" name="password" required>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-25">
                                        <input class="custom-control-input" id="same-address" type="checkbox" checked>
                                        <label class="custom-control-label font-14" for="same-address">Keep me logged in</label>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                                </form>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->



    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Owl JavaScript -->
    <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>
    <script src="dist/js/login-data.js"></script>
</body>

</html>