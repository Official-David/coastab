
        <?php

error_reporting(0);



if (isset($_POST['login'])) {
    session_start();
    include ("connection.php");
    $user_id = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE username = '$user_id' AND password = '$password'";
    $result = mysqli_query($myConn, $sql);
    $row =  mysqli_fetch_array($result, MYSQLI_BOTH);
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['admin'] = $user_id;
        $user_id = $_SESSION['admin'];
        ?>
        <script type="text/javascript">
                window.location = "../admin/index.php";
        </script>
    <?php
} else { ?>
      
        <script type="text/javascript">
                alert("Invalid user id or Password");
                window.location = "index.php";
        </script> 
    <?php }
}
?>