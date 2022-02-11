<?php



include("connection.php");

error_reporting(0)

?>

<?php
if (isset($_POST['adduser'])) {

    $user_id = mysqli_escape_string($myConn, $_POST['user_id']);

    $account_number = mysqli_escape_string($myConn, $_POST['account_number']);

    $account_balance = mysqli_escape_string($myConn, $_POST['account_balance']);

    $account_status = mysqli_escape_string($myConn, $_POST['account_status']);

    $password = mysqli_escape_string($myConn, $_POST['password']);



    $first_name = mysqli_escape_string($myConn, $_POST['firstname']);

    $last_name = mysqli_escape_string($myConn, $_POST['lastname']);
    $mothersname = mysqli_escape_string($myConn, $_POST['mothersname']);
    $sex = mysqli_escape_string($myConn, $_POST['sex']);


    $email = mysqli_escape_string($myConn, $_POST['email']);

    $phone = mysqli_escape_string($myConn, $_POST['phone']);

    $address = mysqli_escape_string($myConn, $_POST['address']);


    $filename = $_FILES["file"]["name"];
    $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
    $file_ext = substr($filename, strripos($filename, '.')); // get file name
    $filesize = $_FILES["file"]["size"];
    $allowed_file_types = array('.jpg', '.png', '.rtf', '.jpeg', 'jfif');




    if (in_array($file_ext, $allowed_file_types) && ($filesize < 50000000000)) {
        // Rename file
        $newfilename = md5($file_basename) . $file_ext;
        if (file_exists("../users/passport/" . $newfilename)) {
            // file already exists error
            echo "You have already uploaded this file.";
        } else {

            if (move_uploaded_file($_FILES["file"]["tmp_name"], "../users/passport/" . $newfilename)) {
                $insert = "INSERT into images (file_name, uploaded_on, user_id) VALUES ('$newfilename', NOW(),'$user_id')";
                $ans = mysqli_query($myConn, $insert);
                //     if($insert){



                // echo "<script type='text/javascript'>alert('$message');</script>";
                // }else{
                //     $statusMsg = "File upload failed, please try again.";
                //     } 

            }
        }
    } elseif (empty($file_basename)) {
        // file selection error
        echo "Please select a file to upload.";
    } elseif ($filesize > 2000000) {
        // file size error
        echo "The file you are trying to upload is too large.";
    } else {
        // file type error
        echo "Only these file typs are allowed for upload: " . implode(', ', $allowed_file_types);
        unlink($_FILES["file"]["tmp_name"]);
    }






    $query_code = "SELECT * FROM customer WHERE user_id ='{$user_id}' or account_number = '{$account_number}' ";

    $result_login = mysqli_query($myConn, $query_code);

    $anything_found = mysqli_num_rows($result_login);



    if ($anything_found > 0) { ?>

        <script type="text/javascript">
            alert("account Already Exists");

            window.location = "index.php";
        </script>



        <?php

        die();

        ?>

    <?php } else {



    $add = "INSERT INTO customer (user_id, account_number, account_balance, password, first_name, last_name, mothers_name, sex, email, phone_number, account_status, address, date)

										 VALUES('$user_id', '$account_number', '$account_balance', '$password', '$first_name', '$last_name', '$mothersname', '$sex', '$email', '$phone', '$account_status', '$address', now())";



    if ($myConn->query($add) === TRUE) { ?>



            <script type="text/javascript">
                alert("New Account Created Successfully");

                window.location = "index.php";
            </script>

        <?php } else {

        echo "Error: " . $add . "<br>" . $myConn->error;
    }
}
}



?>



<?php

if (isset($_POST['edituser'])) {

    $id = mysqli_escape_string($myConn, $_POST['id']);

    $user_id = mysqli_escape_string($myConn, $_POST['user_id']);

    $account_number = mysqli_escape_string($myConn, $_POST['account_number']);

    $account_balance = mysqli_escape_string($myConn, $_POST['account_balance']);


    $account_status = mysqli_escape_string($myConn, $_POST['account_status']);

    $password = mysqli_escape_string($myConn, $_POST['password']);

    $first_name = mysqli_escape_string($myConn, $_POST['firstname']);

    $last_name = mysqli_escape_string($myConn, $_POST['lastname']);
    $mothersname = mysqli_escape_string($myConn, $_POST['mothersname']);

    $sex = mysqli_escape_string($myConn, $_POST['sex']);

    $email = mysqli_escape_string($myConn, $_POST['email']);

    $phone = mysqli_escape_string($myConn, $_POST['phone']);

    $address = mysqli_escape_string($myConn, $_POST['address']);



    $file = $_FILES['passport'];
    $filepath = "uploads/" . $_FILES["file"]["name"];

    move_uploaded_file($_FILES["file"]["tmp_name"], $filepath);



    $update = "UPDATE customer SET user_id = '$user_id', first_name = '$first_name', password = '$password', last_name = '$last_name', mothers_name = '$mothersname', sex = '$sex', email = '$email', phone_number = '$phone',address = '$address', account_balance = '$account_balance', account_status = '$account_status' WHERE user_id = '$user_id'";



    if ($myConn->query($update) === TRUE) { ?>



        <script type="text/javascript">
            alert("Changes Uploaded Successfully");

            window.location = "index.php";
        </script>

    <?php } else {

    echo "Error: " . $update . "<br>" . $myConn->error;
}
}

?>



<?php


if (isset($_POST['addhistory'])) {

    include("connection.php");

    $user_id = $_POST['user_id'];

    $account_number = $_POST['account_number'];

    $account_name = $_POST['account_name'];

    $transaction_type = $_POST['transaction_type'];

    $amount = $_POST['amount'];

    $description = $_POST['description'];

    $date = $_POST['date'];


    if ($transaction_type == 0) {



        $add = "INSERT INTO history (user_id, amount, account_number, transaction_type, description, date)

										 VALUES('$user_id', '$amount', '$account_number', '0', '$description', '$date')";

        $result = mysqli_query($myConn, $add);

        ?>

        <script type="text/javascript">
            alert("history added successfully");

            window.location = "index.php";
        </script>

    <?php }



if ($transaction_type == 1) {

    $add = "INSERT INTO history (user_id, amount, account_name, account_number, transaction_type, description, date)

										 VALUES('$user_id', '$amount', '$account_name', '************', '1', '$description', '$date')";

    $result = mysqli_query($myConn, $add);

    ?>



        <script type="text/javascript">
            alert("history added succesfully");

            window.location = "index.php";
        </script>



    <?php }



if ($transaction_type == 2) {

    $add = "INSERT INTO history (user_id, amount, account_name, transaction_type, description, date)

										 VALUES('$user_id', '$amount', '$account_name', '2', '$description', '$date')";

    $result = mysqli_query($myConn, $add);

    ?>



        <script type="text/javascript">
            alert("history added succesfully");

            window.location = "index.php";
        </script>



    <?php }
}

?>











<?php

if (isset($_POST['deleteuser'])) {
    $user_id = mysqli_escape_string($myConn, $_POST['user_id']);
    $path = "pictures";

    //     $SQL = "SELECT FROM images WHERE user_id = '$user_id'";

    //     $result = mysqli_query($myConn,$SQL);
    // while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){


    //     $pic = $row["file_name"];
    //  unlink($path . "/" . $pic);


    $delete = "DELETE FROM customer WHERE user_id = '$user_id'";

    $clear_history = "DELETE FROM history WHERE user_id = '$user_id'";

    $delete_img = "DELETE FROM images WHERE user_id = '$user_id'";



    if (($myConn->query($delete) === TRUE) && ($myConn->query($clear_history))  && ($myConn->query($delete_img))) { ?>



        <script type="text/javascript">
            alert("Account Deleted Successfully");

            window.location = "index.php";
        </script>

    <?php } else {

    echo "Error: " . $delete . "<br>" . $myConn->error;
}
}



?>







<?php

if (isset($_POST['edittransaction'])) {

    $id = mysqli_escape_string($myConn, $_POST['id']);

    $user_id = mysqli_escape_string($myConn, $_POST['user_id']);

    $account_number = mysqli_escape_string($myConn, $_POST['account_number']);

    $account_name = mysqli_escape_string($myConn, $_POST['account_name']);

    $transaction_type = mysqli_escape_string($myConn, $_POST['transaction_type']);

    $amount = mysqli_escape_string($myConn, $_POST['amount']);



    $date = mysqli_escape_string($myConn, $_POST['date']);



    if ($transaction_type == 0) {





        $update = "UPDATE history SET user_id = '$user_id', account_number = '$account_number', amount = '$amount', transaction_type = '$transaction_type', date = '$date' WHERE history.id = '$id'";



        if ($myConn->query($update) === TRUE) { ?>



            <script type="text/javascript">
                alert("Changes Uploaded Successfully");

                window.location = "index.php";
            </script>

        <?php } else {

        echo "Error: " . $update . "<br>" . $myConn->error;
    }
}
}



if ($transaction_type == 1) {





    $update = "UPDATE history SET user_id = '$user_id', account_name = '$account_name', amount = '$amount', transaction_type = '$transaction_type', date = '$date' WHERE history.id = '$id'";



    if ($myConn->query($update) === TRUE) { ?>



        <script type="text/javascript">
            alert("Changes Uploaded Successfully");

            window.location = "index.php";
        </script>

    <?php } else {

    echo "Error: " . $update . "<br>" . $myConn->error;
}
}





?>





<?php

if (isset($_POST['deletetrans'])) {



    $id = mysqli_escape_string($myConn, $_POST['id']);







    $delete = "DELETE FROM history WHERE id = '$id'";





    if ($myConn->query($delete) === TRUE) { ?>



        <script type="text/javascript">
            alert("Transaction history Deleted Successfully");

            window.location = "index.php";
        </script>

    <?php } else {

    echo "Error: " . $delete . "<br>" . $myConn->error;
}
}




?>