<?php
session_start();
include 'includes/config.php';
if (strlen($_SESSION['login']) == 0) {
    header("location: login.php");
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Jobs</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/modern-business.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>
        <!-- Navigation -->
        <?php include('includes/header.php'); ?>

        <!-- Page Content -->
        <div class="container">

            <div class="row" style="margin-top: 4%">

                <!-- Blog Entries Column -->
                <div class="col-md-8">

                    <!-- Blog Post -->
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        $sql = "SELECT * FROM `jobs` WHERE `id`=:id AND `is_active`=1";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':id', $id, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results
                                     as $result) {
                                $title = $result->title;
                                $createdon = $result->creationdate;
                                $updatedon = $result->updationdate;
                                $desc = $result->description;
                                $link = $result->link;
                                if ($updatedon == NULL) {
                                    $date = $createdon;
                                    echo "
                                <br>
                                <div>
                                <h3 style='font-family: arial; font-weight: bold;'>$title</h3>
                                <p style='font-family: georgia; font-size:16px; text-align: justify;'>$desc</p>
                                Link: <a href='$link' target='_blank' style='font-family: Arial; font-size:16px; text-align: justify;'>$link</a><br>
                                <p style='font-family: monospace; font-size:13px;'>Last Update: $date</p>
                                </div>
                                ";
                                } else {
                                    echo "
                                <br>
                                <div>
                                <h3 style='font-family: arial; font-weight: bold;'>$title</h3>
                                <p style='font-family: georgia; font-size:16px; text-align: justify;'>$desc</p>
                                Link: <a href='$link' target='_blank' style='font-family: Arial; font-size:16px; text-align: justify;'>$link</a><br>
                                <p style='font-family: monospace; font-size:13px;'>Last Update: $updatedon</p>
                                </div>
                                ";
                                }
                            }
                        }
                    }

                    ?>

                </div>

                <!-- Sidebar Widgets Column -->
                <?php include('includes/sidebar.php'); ?>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <?php include('includes/footer.php'); ?>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
<?php } ?>
