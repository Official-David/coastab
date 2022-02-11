
        <?php

error_reporting(0);



if (isset($_POST['login'])) {
    session_start();
    include ("connection.php");
    $user_id = $_POST['id'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM customer WHERE user_id = '$user_id' AND password = '$password'";
    $result = mysqli_query($myConn, $sql);
    $row =  mysqli_fetch_array($result, MYSQLI_BOTH);
    $username = $row['first_name'];
    $account_number = $row['account_number'];
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['username'] = $username;
        $username = $_SESSION['username'];
        $_SESSION['userid'] = $user_id;
        $user_id = $_SESSION['userid'];
        ?>

        <script type="text/javascript">
                window.location = "dashboard";
        </script>
    <?php
} else { ?>

        <script type="text/javascript">
                alert("Invalid user id or Password");
                window.location = "login";
        </script>
    <?php }
}
?>