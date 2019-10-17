<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
    header('location: login.php');
} else {
    if (isset($_POST['submit'])) {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $pass2 = $_POST['pass2'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $status = 1;

        if ($password == $pass2) {
            $flag = true;
        }

        if ($flag == true) {
            //$hashed = hash('md5', $password);
            $passwordmd5 = md5($password);
            $sql = "INSERT INTO `user`(`name`,`email`,`password`,`phone`,`address`,`is_active`) VALUES(:username,:email,:passwordmd5,:phone,:address,:status)";

            $query = $dbh->prepare($sql);
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':passwordmd5', $passwordmd5, PDO::PARAM_STR);
            $query->bindParam(':phone', $phone, PDO::PARAM_STR);
            $query->bindParam(':address', $address, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                echo "<script>alert('New User added successfully')</script>";
            } else {
                echo "<script>alert('Something went wrong')</script>";
            }
        } else {
            echo "<script>alert('Password didn\'t match')</script>";
        }

    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Add User</title>
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <script src="assets/js/modernizr.min.js"></script>
    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include('includes/topheader.php'); ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Add User</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">User</a>
                                        </li>
                                        <li class="active">
                                            Add User
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add User</b></h4>
                                    <hr/>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal" name="user" method="post">

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="input1">Name</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" id="input1" name="name"
                                                               required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="input2">Email</label>
                                                    <div class="col-md-5">
                                                        <input type="email" class="form-control" id="input2"
                                                               name="email" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="input3">Password</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" id="input3"
                                                               name="password" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="input4">Repeat
                                                                                                       Password</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" id="input4" name="pass2"
                                                               required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" for="input5">Phone</label>
                                                    <div class="col-md-5">
                                                        <input type="tel" class="form-control" id="input5" name="phone"
                                                               required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"
                                                           for="textarea1">Address</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" id="textarea1" rows="5"
                                                                  name="address" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                        <button type="submit"
                                                                class="btn btn-custom waves-effect waves-light btn-md"
                                                                name="submit">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include('includes/footer.php'); ?>

            </div>
        </div>

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
    </html>
<?php } ?>