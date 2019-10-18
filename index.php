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
                        echo "<br><h2>Total rows: $rC</h2>";
                    }
                    ?>
                </div>

                <?php
                if (isset($_POST['submit'])) {
                    $sname = $_POST['name'];
                    $sfname = $_POST['fname'];
                    $sid = $_POST['sid'];
                    $semail = $_POST['email'];

                    $select = $_POST["select1"];

                    if ($select == "2") {
                        $sql1 = "INSERT INTO slot1(sname,sfname,sid,semail) VALUES(:sname,:sfname,:sid,:semail)";
                        $query = $dbh->prepare($sql1);
                    } else if ($select == "2") {
                        $sql2 = "INSERT INTO slot2(sname,sfname,sid,semail) VALUES(:sname,:sfname,:sid,:semail)";
                        $query = $dbh->prepare($sql2);
                    } else if ($select == "3") {
                        $sql3 = "INSERT INTO slot3(sname,sfname,sid,semail) VALUES(:sname,:sfname,:sid,:semail)";
                        $query = $dbh->prepare($sql3);
                    } else if ($select == "4") {
                        $sql4 = "INSERT INTO slot4(sname,sfname,sid,semail) VALUES(:sname,:sfname,:sid,:semail)";
                        $query = $dbh->prepare($sql4);
                    }

                    $query->bindParam(':sname', $sname, PDO::PARAM_STR);
                    $query->bindParam(':sfname', $sfname, PDO::PARAM_STR);
                    $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                    $query->bindParam(':semail', $semail, PDO::PARAM_STR);
                    //$query->bindParam(':select', $select, PDO::PARAM_STR);

                    $query->execute();
                    $lastInsertId = $dbh->lastInsertId();
                    if ($lastInsertId) {
                        echo "<script>alert('Slot added successfully')</script>";
                    } else {
                        echo "<script>alert('Something went wrong')</script>";
                    }
                }
                ?>

                <br><br><br><br>
                <div class="col-md-9">
                    <h3>Register for practical slot</h3>
                    <form class="form-horizontal" action="" name="f1" method="post" style="padding-bottom: 100px;">

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="input1">Name</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="input1" name="name"
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="input2">First Name</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="input2" name="fname"
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="input3">Student ID</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="input3" name="sid"
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="input4">Email</label>
                            <div class="col-md-5">
                                <input type="email" class="form-control" id="input4"
                                       name="email" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label" for="input3">select practical slot</label>
                            <div class="col-md-6">
                                <select name="select1" id="select1" required>
                                    <option value="">--Select--</option>
                                    <?php
                                    $sql = "SELECT slots.id, slots.name FROM slots";
                                    $query = $dbh->prepare($sql);
                                    //$query->bindParam(':id', $id, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    if ($query->rowCount() > 0) {
                                        foreach ($results

                                                 as $result) {
                                            ?>

                                            <option value="<?php echo htmlentities($result->id);?>">
                                                <?php echo htmlentities($result->name); ?> &nbsp; seat remaining</option>
                                        <?php }
                                    } ?>
                                </select>
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
                        <br>
                    </form>
                </div>

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