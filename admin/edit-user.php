<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
    header('location: login.php');
} else {
    if (isset($_POST['submit'])) {
        //$user = 'user';
        $id = intval($_GET['id']);

        $username = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if ($password == NULL) {
            //$query1 = mysqli_query($con, "UPDATE `user` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address' WHERE `role`='$user' AND `id`='$id'");
            $sql1 = "UPDATE `user` SET `name`=:username,email=:email,phone=:phone,address=:address WHERE `id`=:id";
            $query = $dbh->prepare($sql1);

            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':phone', $phone, PDO::PARAM_STR);
            $query->bindParam(':address', $address, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_STR);

            $query->execute();

            if ($query) {
                echo "<script>alert('User updated successfully without updating password');</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again');</script>";
            }
        }
        if ($password != NULL) {
            $passwordmd5 = md5($password);
            $sql2 = "UPDATE `user` SET `name`=:username,`email`=:email,`password`=:passwordmd5,`phone`=:phone,`address`=:address WHERE `id`=:id";
            $query = $dbh->prepare($sql2);

            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':passwordmd5', $passwordmd5, PDO::PARAM_STR);
            $query->bindParam(':phone', $phone, PDO::PARAM_STR);
            $query->bindParam(':address', $address, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_STR);

            $query->execute();

            if ($query) {
                echo "<script>alert('User updated successfully & updated password');</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again');</script>";
            }
        }


    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Edit User</title>
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
                                    <h4 class="page-title">Edit User</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">User</a>
                                        </li>
                                        <li class="active">
                                            Edit User
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
                                    <h4 class="m-t-0 header-title"><b>Edit User</b></h4>
                                    <hr/>

                                    <?php
                                    $id = intval($_GET['id']);
                                    $sql = "SELECT * FROM `user` WHERE `is_active`=1 AND `id`=:id";
                                    $query = $dbh->prepare($sql);
                                    $cnt = 1;
                                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                    foreach ($results

                                    as $result) {
                                    ?>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal" name="user" method="post">

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Name</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control"
                                                               value="<?php echo htmlentities($result->name); ?>"
                                                               name="name" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Email</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control"
                                                               value="<?php echo htmlentities($result->email); ?>"
                                                               name="email" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Set New Password</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control"
                                                               value=""
                                                               placeholder="WARNING! This will replace the previous password."
                                                               name="password">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Phone</label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control"
                                                               value="<?php echo htmlentities($result->phone); ?>"
                                                               name="phone" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Address</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" rows="5" name="address"
                                                                  required><?php echo htmlentities($result->address); ?></textarea>
                                                    </div>
                                                </div>

                                                <?php }
                                                } ?>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">

                                                        <button type="submit"
                                                                class="btn btn-custom waves-effect waves-light btn-md"
                                                                name="submit">
                                                            Update
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
        <!-- END wrapper -->


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