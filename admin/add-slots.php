<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
    header('location: login.php');
} else {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $description = $_POST['desc'];
        $status = 1;

        $sql ="INSERT INTO `slots`(`name`,`description`,`is_active`) VALUES(:name,:description,:status)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo "<script>alert('Slot added successfully')</script>";
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }

    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Add Slots</title>
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <script src="assets/js/modernizr.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script>
            $(document).ready(function () {
                var text_max = 255;
                $('#textarea_feedback').html(text_max + ' characters remaining');

                $('#textarea').keyup(function () {
                    var text_length = $('#textarea').val().length;
                    var text_remaining = text_max - text_length;
                    $('#textarea_feedback').html(text_remaining + ' characters remaining');
                });
            });
        </script>
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
                                    <h4 class="page-title">Add Slots</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Slots</a>
                                        </li>
                                        <li class="active">
                                            Add Slots
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
                                    <h4 class="m-t-0 header-title"><b>Add Slots</b></h4>
                                    <hr/>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <form class="form-horizontal" name="user" method="post">

                                                <div class="form-group">
                                                    <label for="input" class="col-md-2 control-label">Slot Name</label>
                                                    <div class="col-md-10">
                                                        <input id="input" type="text" class="form-control" name="name"
                                                               placeholder="Enter Slot Name" maxlength="25"
                                                               required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="textarea" class="col-md-2 control-label">Description</label>
                                                    <div class="col-md-10">
                                                        <textarea id="textarea" class="form-control" rows="5"
                                                                  maxlength="255" name="desc"
                                                                  placeholder="Enter Description" required></textarea>
                                                        <div id="textarea_feedback"></div>
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