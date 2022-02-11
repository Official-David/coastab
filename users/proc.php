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

    $aut = "SELECT * FROM otp WHERE token = '$token'";
    $outPut = mysqli_query($myConn, $aut);
    $cOut =  mysqli_fetch_array($outPut, MYSQLI_BOTH);
    $otp = $cOut['otp_code'];



    $SQL = "SELECT * FROM images WHERE user_id = '$user_id'";

    $results = mysqli_query($myConn, $SQL);
    $ro = mysqli_fetch_array($results, MYSQLI_BOTH);

    $pic = $ro["file_name"];



    function varItems(){
    $amountSending = $_POST['amount'];
    $acc_num = $_POST['account_number'];
    $recipient = $_POST['recipient'];
    }






    ?>

<?php
}
?>