<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
session_start();
include("connection.php");
//error_reporting(0);
if (isset($_SESSION['admin'])) {
    header("location:../admin/dashboard");
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
    $previous_balance = $row['previous_balance'];
    $account_number = $row['account_number'];
    $limit = $row['transaction_limit'];
    $account_status = $row['account_status'];
    $token = $row['token'];
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

    if ($account_status == 4) {
        $account_status = "Account Blocked";
    }


    $SQL = "SELECT * FROM images WHERE user_id = '$user_id'";

    $results = mysqli_query($myConn, $SQL);
    $ro = mysqli_fetch_array($results, MYSQLI_BOTH);

    $pic = $ro["file_name"];

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function


    //Load Composer's autoloader


    //Instantiation and passing `true` enables exceptions

?>

    <?php
    $error_msg = "";
    $aut = "SELECT * FROM otp WHERE token = '$token'";
    $outPut = mysqli_query($myConn, $aut);
    $cOut =  mysqli_fetch_array($outPut, MYSQLI_BOTH);
    $otp = $cOut['otp_code'];
    if (isset($_POST['transfer'])) {
        $tok = rand(10000, 99999);
        $ootp = rand(10000, 99999);
        $times = date();
        $trans = "UPDATE customer SET token =
'$tok' WHERE user_id = '$user_id'";
        $tan = mysqli_query($myConn, $trans);

        $otinsert = "INSERT INTO otp (user_id, otp_code, date, token)
VALUES ('$user_id', '$ootp', '$times', '$tok')";
        $oan = mysqli_query($myConn, $otinsert);

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'getcoastaplc.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'support@getcoastaplc.com';                     //SMTP username
            $mail->Password   = 'getcoastaplc1234';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('support@getcoastaplc.com', 'OPT Authentication');
            $mail->addAddress($email, $first_name);     //Add a recipient

            $mail->addReplyTo('support@getcoastaplc.com', 'support Team');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'OTP Code';
            $mail->Body    = 'Please use the OTP code: ' . $ootp . ' to complete your transaction';

            $mail->send();
        } catch (Exception $e) {
        }
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Coasta Bank PLC | Auth</title>
        <meta name="description" content="You can now make your transfer" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

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
                                    if (isset($_POST['submit'])) {

                                        $user_input = $_POST['otp'];
                                        if ($user_input == $otp) {

                                            if ($_POST['amount'] >= $limit) {
                                    ?>
                                                <script type="text/javascript">
                                                    swal({
                                                        title: "Transaction limit exceeded!",
                                                        // text: "Verified and sent",
                                                        icon: "error",
                                                    }).then(function() {
                                                        window.location = "dashboard.php";
                                                    });;
                                                </script>
                                            <?php
                                            }
                                            $new_balance = $account_balance - $_POST['amount'];
                                            if ($new_balance < 0) { ?>
                                                <script type="text/javascript">
                                                    swal({
                                                        title: "Insuffcient Balance",
                                                        // text: "Verified and sent",
                                                        icon: "error",
                                                    }).then(function() {
                                                        window.location = "dashboard.php";
                                                    });;
                                                </script><?php } else

                                     if ($_POST['amount'] <= $limit && $account_status == "Active" && $_POST['amount'] <= ($account_balance)) {
                                                            $old_balance = $account_balance;
                                                            $account_name = $_POST['recipient'];
                                                            $amountS = $_POST['amount'];
                                                            $distract = $_POST['descrip'];
                                                            $account_number = $_POST['account_number'];
                                                            $bankCharges = $_POST['bankCharges'];
                                                            $update = "INSERT INTO history (user_id, account_name, amount, account_number, description, date)
                                         VALUES('$user_id', '$account_name', '$amountS', '$account_number', '$distract', now())";
                                                            $an = mysqli_query($myConn, $update);

                                                            $trans = "UPDATE customer SET account_balance =
                                '$new_balance' WHERE user_id = '$user_id'";

                                                            $updates = "INSERT INTO history (user_id, account_name, amount, account_number, description, date)
                                         VALUES('$user_id', '@Coasta sms charges', '$bankCharges', '***********', 'Service Charge', now())";
                                                            $akn = mysqli_query($myConn, $updates);

                                                            $realBalance = $new_balance - $bankCharges;
                                                            $transq = "UPDATE customer SET account_balance =
                                '$realBalance' WHERE user_id = '$user_id'";

                                                            $ansq = mysqli_query($myConn, $transq);
                                                            ?>
                                                <script>
                                                    swal({
                                                        title: "Transaction Successful",
                                                        text: "<?php echo "You Transfered $" . number_format($_POST['amount']) . " To " . ucfirst($_POST['recipient']); ?>",
                                                        icon: "success",
                                                        button: "OK",
                                                    }).then(function() {
                                                        window.location = "dashboard.php";
                                                    });;
                                                </script>
                                            <?php
                                                        }
                                                        if ($account_status == "Inactive") {
                                            ?>
                                                <script>
                                                    swal({
                                                        title: "Account is inactive",
                                                        text: "Kindly contact support@getcoastaplc.com to rectify",
                                                        icon: "warning",
                                                        button: "OK",
                                                    }).then(function() {
                                                        window.location = "dashboard.php";
                                                    });;
                                                </script>
                                            <?php

                                                        }

                                                        if ($account_status == "On hold") {
                                            ?>
                                                <script>
                                                    swal({
                                                        title: "Account on hold",
                                                        text: "Kindly contact support@getcoastaplc.com to rectify",
                                                        icon: "warning",
                                                        button: "OK",
                                                    }).then(function() {
                                                        window.location = "dashboard.php";
                                                    });;
                                                </script>
                                            <?php
                                                        }

                                                        if ($account_status == "Acount Blocked") {
                                            ?>
                                                <script>
                                                    swal({
                                                        title: "Account blocked",
                                                        text: "Kindly contact support@getcoastaplc.com to rectify",
                                                        icon: "warning",
                                                        button: "OK",
                                                    }).then(function() {
                                                        window.location = "log-out.php";
                                                    });;
                                                </script>
                                    <?php

                                                        }
                                                    } else {
                                                        $error_msg = "(OTP is incorrect)";
                                                    }
                                                }

                                    ?>


                                    <div class="d-block avatar avatar-lg mx-auto mb-20">
                                        <img src="<?php echo "passport/" . $pic; ?>" alt="user" class="avatar-img rounded-circle">
                                    </div>
                                    <h1 class="display-6 mb-10 d-flex align-items-end justify-content-center"><?php echo $first_name . " " . $last_name; ?><span class="d-20 d-flex align-items-center justify-content-center border border-1 border-light-40 rounded-circle ml-10"><i class="zmdi zmdi-lock text-light-40 font-12"></i></span></h1>
                                    <p class="mb-30 text-center"><?php echo $email; ?></p>
                                    <div>
                                        <p class="mb-30 text-center">An OPT has been generated and sent to <?php echo $email; ?>. Please check your email</p>
                                        <hr>
                                        <p>Enter OTP</p>
                                        <div><label for="" class="font-8 text-danger"><?php echo $error_msg ?></label></div>
                                    </div>
                                    <div class="form-group">



                                        <form action="authe.php" method="post">

                                            <div class="input-group">

                                                <input class="form-control filled-input bg-white" placeholder="OTP" type="text" name="otp">
                                                <input type="hidden" name="amount" value="<?php echo $_POST['amount']; ?>">
                                                <input type="hidden" name="recipient" value="<?php echo $_POST['recipient']; ?>">
                                                <input type="hidden" name="account_number" value="<?php echo $_POST['account_number']; ?>">
                                                <input type="hidden" name="account_number" value="<?php echo $_POST['account_number']; ?>">
                                                <input type="hidden" name="descrip" value="<?php echo $_POST['descrip']; ?>">
                                                <input type="hidden" name="bankCharges" value="<?php echo $_POST['bankCharges']; ?>">




                                                <div>
                                                    <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

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