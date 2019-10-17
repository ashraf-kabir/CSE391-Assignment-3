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

        <title>Profile</title>

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
                <div class="col-md-9">

                    <!-- Blog Post -->
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $email = $_SESSION['login'];
                        $sql = "SELECT `id`,`name`,`department`,`phone`,`address` FROM `user` WHERE `id`=:id AND `email`=:email AND `is_active`=1";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':id', $id, PDO::PARAM_STR);
                        $query->bindParam(':email', $email, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results
                                     as $result) {
                                echo "
                            <div class='col-md-12'>
                                <br>
                                <h4>Hello $result->name, your information is given below:</h4>
                                <br>
                                <table class='table table-bordered'>
                                            
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>$result->id</td>
                                            <td>$result->name</td>
                                            <td>$email</td>
                                            <td>$result->department</td>
                                            <td>$result->phone</td>
                                            <td>$result->address</td>
                                        </tr>
                                    </tbody>
                                                
                                </table>
                            </div>
                            ";
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