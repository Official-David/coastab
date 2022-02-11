<?php
session_start();
include("connection.php");
//error_reporting(0);
if (isset($_SESSION['admin'])) {
    header("location:../admin");
} elseif (isset($_SESSION['userid'])) {
    $user_id = $_SESSION['userid'];
    $sql = "SELECT * FROM customer WHERE user_id = '$user_id'";
    $result = mysqli_query($myConn, $sql);
    $row =  mysqli_fetch_array($result, MYSQLI_BOTH);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $phone_number = $row['phone_number'];
    $account_balance = $row['account_balance'];
    $account_number = $row['account_number'];
    $account_status = $row['account_status'];
    $mothers_name = $row['mothers_name'];
    $rows = mysqli_num_rows($result);

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
        <title>Coasta Bank PLC | Security</title>
        <meta name="description" content="Answer security question to verify ownership of account" />

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
                        <img class="brand-img" src="dist/img/logo-lighter.png" alt="brand" width="150" height="30" />
                    </a>
                    <div class="btn-group btn-group-sm">
                    <a href="log-out.php" class="btn btn-outline-secondary">Log out</a>
                </div>
                </header>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 pa-0">
                            <div class="auth-form-wrap pt-xl-0 pt-100">
                                <div class="auth-form w-xl-25 w-sm-50 w-100">
                                <?php

$error_msg = "";
if (isset($_POST['verify'])) {
    session_start();
    $user_input = $_POST['mothername'];
    if ($user_input == $mothers_name) {
        ?>
        <script type="text/javascript">
            window.location = "dashboard.php";
        </script>
    <?php
} else {
    $error_msg = "(Answer to security question is incorrect)";
}
}
?>
                                    <form method="post" action="verify.php">
                                        <div class="d-block avatar avatar-lg mx-auto mb-20">
                                            <img src="<?php echo "passport/" . $pic; ?>" alt="user" class="avatar-img rounded-circle">
                                        </div>
                                        <h1 class="display-6 mb-10 d-flex align-items-end justify-content-center"><?php echo $first_name . " " . $last_name; ?><span class="d-20 d-flex align-items-center justify-content-center border border-1 border-light-40 rounded-circle ml-10"><i class="zmdi zmdi-lock text-light-40 font-12"></i></span></h1>
                                        <p class="mb-30 text-center"><?php echo $email; ?></p>
                                        <div>
                                            <p class="mb-30 text-center">You might have recently changed location, thats why you are getting this notification</p>
                                            <hr>
                                            <p>Enter secret pin</p>
                                            <div><label for="" class="font-8 text-danger"><?php echo $error_msg?></label></div>
                                        </div>
                                        <div class="form-group">
                                            <form action="verify.php">
                                                <div class="input-group">

                                                    <input class="form-control filled-input bg-white" placeholder="Passowrd" type="password" name="mothername">
                                                    <div><button type="submit" class="btn btn-success btn-block" name="verify">Verify</button></div>
                                                </div>
                                            </form>
                                        </div>
                                </div>
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

        <!-- FeatherIcons JavaScript -->
        <script src="dist/js/feather.min.js"></script>

        <!-- Tablesaw JavaScript -->
        <script src="vendors/tablesaw/dist/tablesaw.jquery.js"></script>
        <script src="dist/js/tablesaw-data.js"></script>

        <!-- Init JavaScript -->
        <script src="dist/js/init.js"></script>
    </body>

    </html>
<?php } else {
    header("location:login");
    exit;
} ?>