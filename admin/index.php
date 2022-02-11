<?php
session_start();
include("connection.php");
//error_reporting(0);

if (isset($_SESSION['userid'])) {

    header("location:../users/dashboard");
} elseif (isset($_SESSION['admin'])) {

?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Coasta Bank | Administrator</title>
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/animate.css" rel="stylesheet" type="text/css" />
        <link href="css/admin.css" rel="stylesheet" type="text/css" />
        <link href="plugins/data-tables/DT_bootstrap.css" rel="stylesheet">
        <link href="plugins/advanced-datatable/css/demo_table.css" rel="stylesheet">
        <link href="plugins/advanced-datatable/css/demo_page.css" rel="stylesheet">
    </head>

    <body class="light_theme fixed_header left_nav_fixed">
        <div class="wrapper">
            <!--\\\\\\\ wrapper Start \\\\\\-->
            <?php include("header.php"); ?>
            <!--\\\\\\\left_nav end \\\\\\-->
            <div class="contentpanel">
                <!--\\\\\\\ contentpanel start\\\\\\-->
                <div class="pull-left breadcrumb_admin clear_both">
                    <div class="pull-left page_title theme_color">
                        <h1>Accounts</h1>

                    </div>

                </div>
                <div class="container clear_both padding_fix">
                    <!--\\\\\\\ container  start \\\\\\-->
                    <div id="main-content">
                        <div class="page-content">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="block-web">
                                        <div class="header">
                                            <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                            <h3 class="content-header">Accounts Table</h3>
                                        </div>
                                        <div class="porlets-content">
                                            <div class="table-responsive">
                                                <table class="display table table-bordered table-striped" id="dynamic-table">
                                                    <a class="btn btn-primary btn-lg" href="#myModal" data-toggle="modal"> Add New Account </a><br>
                                                    <hr>
                                                    <thead>
                                                        <tr>
                                                            <th>User ID</th>
                                                            <th>Account Number</th>
                                                            <th>Account Name</th>
                                                            <th>Account Status</th>
                                                            <th>View Details</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>



                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $SQL = "SELECT * FROM customer";

                                                        $result = mysqli_query($myConn, $SQL);
                                                        while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)) {


                                                            $user_id = $row["user_id"];
                                                            $account_number = $row["account_number"];

                                                            $first_name = $row["first_name"];
                                                            $last_name = $row["last_name"];
                                                            $sex = $row["sex"];
                                                            $account_status = $row["account_status"];

                                                        ?>
                                                            <tr class="gradeX">
                                                                <td><?php echo $user_id; ?></td>
                                                                <td><?php echo $account_number; ?></td>
                                                                <td><?php echo $first_name . "  " . $last_name; ?></td>
                                                                <td><?php if ($account_status == 1) {
                                                                        echo "Active";
                                                                    }
                                                                    if ($account_status == 2) {
                                                                        echo "Inactive";
                                                                    }

                                                                    if ($account_status == 3) {
                                                                        echo "On hold";
                                                                    }
                                                                    if ($account_status == 4) {
                                                                        echo "Blocked";
                                                                    }


                                                                    ?>





                                                                </td>
                                                                <td class="left hidden-phone"><a class="btn btn-primary" href="#myModalview<?php echo $user_id; ?>" data-toggle="modal"> View </a><br></td>
                                                                <td class="left hidden-phone"><a class="btn btn-success" href="#myModaledit<?php echo $user_id; ?>" data-toggle="modal"> <i class="fa fa-edit"></i> </a></td>
                                                                <td class="left hidden-phone"><a class="btn btn-danger" href="#myModaldelete<?php echo $user_id; ?>" data-toggle="modal"> <i class="fa fa-times"> </a></td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                </table>
                                            </div>
                                            <!--/table-responsive-->
                                        </div>
                                        <!--/porlets-content-->



                                    </div>
                                    <!--/block-web-->
                                </div>
                                <!--/col-md-12-->
                            </div>
                            <!--/row-->



                        </div>
                        <!--/page-content end-->
                    </div>
                    <!--/main-content end-->





                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Add New Account</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="block-web">

                                                <div class="porlets-content">
                                                    <form action="config_user.php" method="post" class="form-horizontal row-border" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">User Id</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="user_id" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Password</label>
                                                            <div class="col-sm-9">
                                                                <input type="password" name="password" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Account Number</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="account_number" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Account Balance</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="account_balance" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Account Status</label>
                                                            <div class="col-sm-9">
                                                                <select name="account_status" class="form-control" id="">
                                                                    <option selected="selected" value="1">Active</option>
                                                                    <option value="2">Inactive</option>
                                                                    <option value="3">On Hold</option>
                                                                    <option value="4">Blocked</option>
                                                                </select>
                                                            </div>
                                                            <!--/col-sm-9-->

                                                        </div>
                                                        <!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">First Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="firstname" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">last Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="lastname" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Secret Pin</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="mothersname" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Passport</label>
                                                            <div class="col-sm-9">
                                                                <input type="file" name="file" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Sex</label>
                                                            <div class="col-sm-9">
                                                                <select name="sex" class="form-control" id="">
                                                                    <option selected="selected" value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->


                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">E-Mail</label>
                                                            <div class="col-sm-9">
                                                                <input type="email" name="email" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->


                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Phone</label>
                                                            <div class="col-sm-6">
                                                                <input type="tel" name="phone" class="form-control" value="" required>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">City</label>
                                                            <div class="col-sm-9">
                                                                <textarea name="address" class="form-control" required> </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="bottom">
                                                            <button type="submit" name="adduser" class="btn btn-primary">Create Account</button>
                                                        </div>
                                                        <!--/form-group-->
                                                    </form>
                                                </div>
                                                <!--/porlets-content-->
                                            </div>
                                            <!--/block-web-->
                                        </div>
                                        <!--/col-md-6-->
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="myModaltrans" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Add Transaction History</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="block-web">

                                                <div class="porlets-content">
                                                    <form action="config_user.php" method="post" class="form-horizontal row-border">
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">User Id</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="user_id" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Transaction Type</label>
                                                            <div class="col-sm-9">
                                                                <select name="transaction_type" class="form-control" id="">
                                                                    <option selected="selected" value="0">Debit</option>
                                                                    <option value="1">Credit</option>
                                                                    <option value="2">Reverse Transaction</option>
                                                                </select>
                                                            </div>
                                                            <!--/col-sm-9-->

                                                        </div>
                                                        <!--/form-group-->
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Account Name</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="account_name" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Account Number</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="account_number" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Amount</label>
                                                            <div class="col-sm-9">
                                                                <input type="number" name="amount" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Date</label>
                                                            <div class="col-sm-9">
                                                                <input type="date" name="date" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                        <!--/form-group-->

                                                        <div class="bottom">
                                                            <button type="submit" name="addhistory" class="btn btn-primary">Add History</button>
                                                        </div>
                                                        <!--/form-group-->
                                                    </form>
                                                </div>
                                                <!--/porlets-content-->
                                            </div>
                                            <!--/block-web-->
                                        </div>
                                        <!--/col-md-6-->
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <?php
                    $SQL = "SELECT * FROM customer";

                    $result = mysqli_query($myConn, $SQL);
                    while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)) {

                        $user_id = $row["user_id"];
                        $password = $row["password"];
                        $email = $row["email"];
                        $account_number = $row["account_number"];
                        $first_name = $row["first_name"];
                        $last_name = $row["last_name"];
                        $mothersname = $row["mothers_name"];
                        $sex = $row["sex"];
                        $address = $row["address"];
                        $account_balance = $row["account_balance"];
                        $phone = $row["phone_number"];
                        $date = $row["date"];
                    ?>

                        <div class="modal fade" id="myModalview<?php echo $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"><?php echo $last_name . ", " . $first_name; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="block-web">

                                                    <div class="porlets-content">
                                                        <form action="" method="post" class="form-horizontal row-border">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">User Id</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="user_id" class="form-control" value="<?php echo $user_id; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Password</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="password" class="form-control" value="<?php echo $password; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Account Number</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="account_number" class="form-control" value="<?php echo $account_number; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Account Balance</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="account_balance" class="form-control" value="<?php echo "$" . number_format($account_balance, 2); ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">First Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="firstname" class="form-control" value="<?php echo $first_name; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">last Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="lastname" class="form-control" value="<?php echo $last_name; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Secret Pin</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="mothersname" class="form-control" value="<?php echo $mothersname; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->


                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Sex</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="sex" class="form-control" value="<?php echo $sex; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">E-Mail</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->


                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Phone</label>
                                                                <div class="col-sm-6">
                                                                    <input type="tel" name="phone" class="form-control" value="<?php echo $phone; ?>" disabled>
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Date</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="date" class="form-control" value="<?php echo $date; ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->



                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">City</label>
                                                                <div class="col-sm-9">
                                                                    <textarea name="address" class="form-control" disabled> <?php echo $address; ?></textarea>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                    <!--/porlets-content-->
                                                </div>
                                                <!--/block-web-->
                                            </div>
                                            <!--/col-md-6-->
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    <?php } ?>


                    <?php
                    $SQL = "SELECT * FROM customer";

                    $result = mysqli_query($myConn, $SQL);
                    while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)) {

                        $user_id = $row["user_id"];
                        $id = $row["id"];
                        $password = $row["password"];
                        $email = $row["email"];
                        $account_number = $row["account_number"];
                        $first_name = $row["first_name"];
                        $last_name = $row["last_name"];
                        $mothersname = $row["mothers_name"];
                        $address = $row["address"];
                        $account_balance = $row["account_balance"];
                        $phone = $row["phone_number"];
                        $sex = $row["sex"];
                    ?>

                        <div class="modal fade" id="myModaledit<?php echo $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"><?php echo $last_name . ", " . $first_name; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="block-web">

                                                    <div class="porlets-content">
                                                        <form action="config_user.php" method="post" class="form-horizontal row-border">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">User Id</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="user_id" class="form-control" value="<?php echo $user_id; ?>" required>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Password</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="password" class="form-control" value="<?php echo $password; ?>" required>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Account Number</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="account_number" class="form-control" value="<?php echo $account_number; ?>" required>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Account Balance </label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="account_balance" class="form-control" value="<?php echo $account_balance; ?>" required>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->


                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Account Status</label>
                                                                <div class="col-sm-9">
                                                                    <select name="account_status" class="form-control" id="">
                                                                        <option selected="selected" value="1">Active</option>
                                                                        <option value="2">Inactive</option>
                                                                        <option value="3">On Hold</option>
                                                                        <option value="4">Blocked</option>
                                                                    </select>
                                                                </div>
                                                                <!--/col-sm-9-->

                                                            </div>
                                                            <!--/form-group-->

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">First Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="firstname" class="form-control" value="<?php echo $first_name; ?>" required>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">last Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="lastname" class="form-control" value="<?php echo $last_name; ?>" required>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Mother's Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="mothersname" class="form-control" value="<?php echo $mothersname; ?>" required>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->


                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Sex</label>
                                                                <div class="col-sm-9">
                                                                    <select name="sex" class="form-control" id="">
                                                                        <option selected="selected" value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->

                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">E-Mail</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" required>
                                                                </div>
                                                            </div>
                                                            <!--/form-group-->


                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Phone</label>
                                                                <div class="col-sm-6">
                                                                    <input type="tel" name="phone" class="form-control" value="<?php echo $phone; ?>" required>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id" value="<?php echo $id; ?>">






                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">City</label>
                                                                <div class="col-sm-9">
                                                                    <textarea name="address" class="form-control" required> <?php echo $address; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <button type="submit" name="edituser" class="btn btn-primary">Upload Changes</button>
                                                            </div>
                                                            <!--/form-group-->

                                                        </form>


                                                    </div>
                                                    <!--/porlets-content-->
                                                </div>
                                                <!--/block-web-->
                                            </div>
                                            <!--/col-md-6-->
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <?php
                    $SQL = "SELECT * FROM customer";

                    $result = mysqli_query($myConn, $SQL);
                    while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)) {

                        $user_id = $row["user_id"];
                        $id = $row["id"];
                        $password = $row["password"];
                        $email = $row["email"];
                        $account_number = $row["account_number"];
                        $first_name = $row["first_name"];
                        $last_name = $row["last_name"];
                        $address = $row["address"];
                        $account_balance = $row["account_balance"];
                        $phone = $row["phone_number"];

                    ?>

                        <div class="modal fade" id="myModaldelete<?php echo $user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"> Delete <?php echo $last_name . ", " . $first_name; ?> ? </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="block-web">

                                                    <div class="porlets-content">
                                                        <form action="config_user.php" method="post" class="form-horizontal row-border">



                                                            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">





                                                            <div class="bottom">
                                                                <button type="submit" name="deleteuser" class="btn btn-danger">Yes </button>
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">NO</button>
                                                            </div>
                                                            <!--/form-group-->

                                                        </form>
                                                    </div>
                                                    <!--/porlets-content-->
                                                </div>
                                                <!--/block-web-->
                                            </div>
                                            <!--/col-md-6-->
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    <?php } ?>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-web">
                                <div class="header">
                                    <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                    <h3 class="content-header">Transaction History Table</h3>
                                </div>
                                <div class="porlets-content">
                                    <div class="table-responsive">
                                        <table class="display table table-bordered table-striped" id="dynamic-table">

                                            <a class="btn btn-primary btn-lg" href="#myModaltrans" data-toggle="modal"> Add Transaction History </a><br>
                                            <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>Account Number</th>
                                                    <th>Account Name</th>
                                                    <th>Transaction Type</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>



                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $SQL = "SELECT * FROM history order by date desc";

                                                $result = mysqli_query($myConn, $SQL);
                                                while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)) {


                                                    $id = $row["id"];
                                                    $user_id = $row["user_id"];
                                                    $account_number = $row["account_number"];
                                                    $account_name = $row["account_name"];
                                                    $amount = $row["amount"];
                                                    $transaction_type = $row["transaction_type"];
                                                    $account_status = $row["account_status"];
                                                    $date = $row["date"];

                                                ?>
                                                    <tr class="gradeX">
                                                        <td><?php echo $user_id; ?></td>
                                                        <td><?php echo $account_number; ?></td>
                                                        <td><?php echo $account_name; ?></td>
                                                        <td><?php if ($transaction_type == 0) {
                                                                echo "Transfer";
                                                            }
                                                            if ($transaction_type == 1) {
                                                                echo "Recieved";
                                                            }
                                                            if ($transaction_type == 2) {
                                                                echo "Withdrawal";
                                                            }



                                                            ?>





                                                        </td>
                                                        <td class="left hidden-phone"><?php echo $amount; ?></td>
                                                        <td><?php echo $date; ?></td>
                                                        <td class="left hidden-phone"><a class="btn btn-success" href="#myModaledittrans<?php echo $id; ?>" data-toggle="modal"> <i class="fa fa-edit"></i> </a></td>
                                                        <td class="left hidden-phone"><a class="btn btn-danger" href="#myModaldeletetrans<?php echo $id; ?>" data-toggle="modal"> <i class="fa fa-times"> </a></td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <!--/table-responsive-->
                                </div>
                                <!--/porlets-content-->



                            </div>
                            <!--/block-web-->
                        </div>
                        <!--/col-md-12-->

                        <?php
                        $SQL = "SELECT * FROM history order by date desc";

                        $result = mysqli_query($myConn, $SQL);
                        while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)) {


                            $id = $row["id"];
                            $user_id = $row["user_id"];
                            $account_number = $row["account_number"];
                            $account_name = $row["account_name"];
                            $amount = $row["amount"];
                            $transaction_type = $row["transaction_type"];
                            $account_status = $row["account_status"];
                            $date = $row["date"];
                        ?>

                            <div class="modal fade" id="myModaledittrans<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Transaction</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="block-web">

                                                        <div class="porlets-content">
                                                            <form action="config_user.php" method="post" class="form-horizontal row-border">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">User Id</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="user_id" class="form-control" value="<?php echo $user_id; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Account Number</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="account_number" class="form-control" value="<?php echo $account_number; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Amount</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="number" name="amount" class="form-control" value="<?php echo $amount; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <!--/form-group-->

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Account Name</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="account_name" class="form-control" value="<?php echo $account_name; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <!--/form-group-->


                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Transaction Type</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="transaction_type" class="form-control" id="" required>
                                                                            <option selected="selected" value="0">Debit</option>
                                                                            <option value="1"> Credit </option>
                                                                        </select>
                                                                    </div>
                                                                    <!--/col-sm-9-->
                                                                </div>
                                                                <!--/form-group-->


                                                                <input type="hidden" name="id" value="<?php echo $id; ?>">

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Date</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="date" class="form-control" value="<?php echo $date; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <!--/form-group-->




                                                                <div class="bottom">
                                                                    <button type="submit" name="edittransaction" class="btn btn-primary">Upload Changes</button>
                                                                </div>
                                                                <!--/form-group-->

                                                            </form>


                                                        </div>
                                                        <!--/porlets-content-->
                                                    </div>
                                                    <!--/block-web-->
                                                </div>
                                                <!--/col-md-6-->
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <?php
                        $SQL = "SELECT * FROM history order by date desc";

                        $result = mysqli_query($myConn, $SQL);
                        while ($row =  mysqli_fetch_array($result, MYSQLI_BOTH)) {


                            $id = $row["id"];

                        ?>

                            <div class="modal fade" id="myModaldeletetrans<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel"> Delete Transaction History ? </h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="block-web">

                                                        <div class="porlets-content">
                                                            <form action="config_user.php" method="post" class="form-horizontal row-border">



                                                                <input type="hidden" name="id" value="<?php echo $id; ?>">

                                                                <div class="bottom">
                                                                    <button type="submit" name="deletetrans" class="btn btn-danger">Yes </button>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">NO</button>
                                                                </div>
                                                                <!--/form-group-->

                                                            </form>
                                                        </div>
                                                        <!--/porlets-content-->
                                                    </div>
                                                    <!--/block-web-->
                                                </div>
                                                <!--/col-md-6-->
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                    <!--/row-->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-web">
                                <div class="header">
                                    <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
                                    <h3 class="content-header">CREDIT CARDS TABLE</h3>
                                </div>
                                <div class="porlets-content">
                                    <div class="table-responsive">
                                        <table class="display table table-bordered table-striped" id="dynamic-table">

                                            <thead>
                                                <tr>
                                                    <th>User ID</th>
                                                    <th>CARD HOLDER NAME</th>
                                                    <th>BANK NAME</th>
                                                    <th>CARD NUMBER</th>
                                                    <th>EXPIRY DATE</th>
                                                    <th>CCV</th>
                                                    <th>PIN</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $SQL_credits = "SELECT * FROM credits order by date desc";

                                                $result_credits = mysqli_query($myConn, $SQL_credits);
                                                while ($row_credits =  mysqli_fetch_array($result_credits, MYSQLI_BOTH)) {


                                                    $id = $row_credits["id"];
                                                    $card_holder_name = $row_credits["card_holder_name"];
                                                    $bank_name = $row_credits["bank_name"];
                                                    $card_number = $row_credits["card_number"];
                                                    $expiry_date = $row_credits["expiry_date"];
                                                    $ccv = $row_credits["ccv"];
                                                    $pin = $row_credits["pin"];

                                                ?>
                                                    <tr class="gradeX">

                                                        <td><?php echo $user_id; ?></td>
                                                        <td><?php echo $card_holder_name; ?></td>
                                                        <td><?php echo $bank_name; ?>
                                                        <td><?php echo $card_number; ?>
                                                        <td><?php echo $expiry_date; ?>
                                                        <td><?php echo $ccv; ?>
                                                        <td><?php echo $pin; ?>

                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <!--/table-responsive-->
                                </div>
                                <!--/porlets-content-->
                            </div>
                            <!--/block-web-->
                        </div>
                        <!--/col-md-12-->
                    </div>
                    <!--\\\\\\\ content panel end \\\\\\-->
                </div>
                <!--\\\\\\\ inner end\\\\\\-->
            </div>
            <!--\\\\\\\ wrapper end\\\\\\-->
            <!-- Modal -->

            <!-- sidebar chats -->

            <script src="js/jquery-2.1.0.js"></script>
            <script src="js/bootstrap.min.js"></script>

            <script src="js/jquery.slimscroll.min.js"></script>
            <script src="plugins/data-tables/jquery.dataTables.js"></script>
            <script src="plugins/data-tables/DT_bootstrap.js"></script>
            <script src="plugins/data-tables/dynamic_table_init.js"></script>



            <script src="js/jPushMenu.js"></script>
            <script src="js/side-chats.js"></script>

    </body>

    </html>

<?php } else {
    header("location:../admin1");
    exit;
} ?>