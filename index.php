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

        <title>Home</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/modern-business.css" rel="stylesheet">
    </head>

    <body>
        <!-- Navigation -->
        <?php include 'includes/header.php'; ?>

        <!-- Page Content -->
        <div class="container">

            <div class="row" style="margin-top: 4%">

                <!-- Blog Entries Column -->
                <div class="col-md-9">
                    <?php
                    $email = $_SESSION['login'];
                    $sql = "SELECT `name` FROM `users` WHERE `email`=:email";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results
                                 as $result) {
                            echo "<br><h1>Log in successful $result->name</h1>";
                        }
                    }
                    ?>
                </div>

                <!-- Group Name -->
                <div class="col-md-9">
                    <?php
                    //$email = $_SESSION['login'];
                    $sgroup = "g1";
                    $sql1 = "SELECT `sgroup` FROM `users` WHERE `sgroup`=:sgroup";
                    $query = $dbh->prepare($sql1);
                    //$query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results
                                 as $result) {
                            $rC = $query->rowCount();
                            echo "<br><h3>Group $result->sgroup, total rows: $rC</h3>";
                        }
                    }
                    ?>
                </div>

                <div class="col-md-9">
                    <?php
                    //$email = $_SESSION['login'];
                    $sgroup = "g2";
                    $sql2 = "SELECT `sgroup` FROM `users` WHERE `sgroup`=:sgroup";
                    $query = $dbh->prepare($sql2);
                    //$query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results
                                 as $result) {
                            $rC = $query->rowCount();
                            echo "<br><h3>Group $result->sgroup, total rows: $rC</h3>";
                        }
                    }
                    ?>
                </div>

                <div class="col-md-9">
                    <?php
                    //$email = $_SESSION['login'];
                    $sgroup = "g3";
                    $sql2 = "SELECT `sgroup` FROM `users` WHERE `sgroup`=:sgroup";
                    $query = $dbh->prepare($sql2);
                    //$query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results
                                 as $result) {
                            $rC = $query->rowCount();
                            echo "<br><h3>Group $result->sgroup, total rows: $rC</h3>";
                        }
                    }
                    ?>
                </div>

                <div class="col-md-9">
                    <?php
                    //$email = $_SESSION['login'];
                    $sgroup = "g4";
                    $sql2 = "SELECT `sgroup` FROM `users` WHERE `sgroup`=:sgroup";
                    $query = $dbh->prepare($sql2);
                    //$query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results
                                 as $result) {
                            $rC = $query->rowCount();
                            echo "<br><h3>Group $result->sgroup, total rows: $rC</h3>";
                        }
                    }
                    ?>
                </div>

                <!-- Row Count -->
                <div class="col-md-9">
                    <?php
                    //$email = $_SESSION['login'];
                    $sql = "SELECT `sgroup` FROM `users`";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        $rC = $query->rowCount();
                        echo "<br><h2>total rows: $rC</h2>";
                    }
                    ?>
                </div>



                <!-- Sidebar Widgets Column -->
                <?php include 'includes/sidebar.php'; ?>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

        <!-- Footer -->
        <?php include 'includes/footer.php'; ?>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
<?php } ?>