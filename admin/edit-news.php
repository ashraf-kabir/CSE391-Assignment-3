<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
    header('location: login.php');
} else {
    if (isset($_POST['submit'])) {
        $headline = $_POST['headline'];
        $description = $_POST['desc'];
        $id = intval($_GET['id']);

        $sql = "UPDATE `news` SET headline=:headline,description=:description WHERE id=:id ";
        $query = $dbh->prepare($sql);
        $query->bindParam(':headline', $headline, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('News has updated successfully');</script>";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Edit News</title>
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
                var text_max = 1000;
                $('#textarea_feedback').html(text_max + ' characters remaining');

                $('#textarea').keyup(function () {
                    var text_length = $('#textarea').val().length;
                    var text_remaining = text_max - text_length;
                    $('#textarea_feedback').html(text_remaining + ' characters remaining');
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                var text_max = 60;
                $('#headline_feedback').html(text_max + ' characters remaining');

                $('#headline').keyup(function () {
                    var text_length = $('#headline').val().length;
                    var text_remaining = text_max - text_length;
                    $('#headline_feedback').html(text_remaining + ' characters remaining');
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
                                    <h4 class="page-title">Edit News</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">News</a>
                                        </li>
                                        <li class="active">
                                            Edit News
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
                                    <h4 class="m-t-0 header-title"><b>Edit News</b></h4>
                                    <hr/>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!---Success Message--->
                                            <?php if ($msg) { ?>
                                                <div class="alert alert-success" role="alert">
                                                    <strong><?php echo htmlentities($msg); ?></strong>
                                                </div>
                                            <?php } ?>

                                            <!---Error Message--->
                                            <?php if ($error) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Oh snap!</strong> <?php echo htmlentities($error); ?></div>
                                            <?php } ?>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <?php
                                            $id = intval($_GET['id']);
                                            $sql = "SELECT news.* FROM news WHERE news.id=:id";
                                            $query = $dbh->prepare($sql);
                                            $query->bindParam(':id', $id, PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                            foreach ($results

                                            as $result) { ?>
                                            <form class="form-horizontal" name="user" method="post">

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"
                                                           for="headline">Headline</label>
                                                    <div class="col-md-10">
                                                        <input id="headline" type="text" class="form-control"
                                                               value="<?php echo htmlentities($result->headline); ?>"
                                                               name="headline" maxlength="60" required>
                                                        <div id="headline_feedback"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"
                                                           for="textarea">Description</label>
                                                    <div class="col-md-10">
                                                        <textarea id="textarea" class="form-control" rows="5"
                                                                  maxlength="1000" name="desc"
                                                                  required><?php echo htmlentities($result->description); ?></textarea>
                                                        <div id="textarea_feedback"></div>
                                                    </div>
                                                </div>

                                                <?php }
                                                } ?>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"></label>
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