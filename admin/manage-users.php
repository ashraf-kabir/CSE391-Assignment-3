<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
    header('location: login.php');
} else {
    if (isset($_REQUEST['del'])) {
        $delid = intval($_GET['del']);
        $sql = "DELETE FROM `users` WHERE id=:delid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':delid', $delid, PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('User deleted successfully')</script>";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Manage Users</title>
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

            <!-- ========== Left Sidebar Start ========== -->
            <?php include('includes/leftsidebar.php'); ?>
            <!-- Left Sidebar End -->


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Manage Users</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Users</a>
                                        </li>
                                        <li class="active">
                                            Manage Users
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="demo-box m-t-20">

                                        <div class="table-responsive">
                                            <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Student ID</th>
                                                    <th>Groups</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $is_active = "1";
                                                $sql = "SELECT users.*, groups.* FROM users JOIN groups ON groups.gid=users.sgroup WHERE users.is_active=:is_active";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':is_active', $is_active, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                        $name = $result->fname." ".$result->lname; ?>
                                                        <tr>
                                                            <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                            <td><?php echo htmlentities($name); ?></td>
                                                            <td><?php echo htmlentities($result->email); ?></td>
                                                            <td><?php echo htmlentities($result->sid); ?></td>
                                                            <td><?php echo htmlentities($result->name); ?></td>
                                                            <td><a href="manage-users.php?del=<?php echo $result->id; ?>"
                                                                   onclick="return confirm('Do you want to delete?');">delete</a>
                                                            </td>
                                                        </tr>
                                                        <?php $cnt = $cnt + 1;
                                                    }
                                                } ?>
                                                </tbody>

                                            </table>
                                        </div>


                                    </div>

                                </div>


                            </div>
                            <!--- end row -->


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