<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/functions.php');
if (strlen($_SESSION['login']) == 0) {
    header("location: login.php");
} else {
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $sid = $_POST['sid'];
        $email = $_SESSION['login'];
        $slot = $_POST["select1"];

        if ($slot == null) {
            $sql1 = "UPDATE `users` SET fname=:fname,lname=:lname,sid=:sid,email=:email WHERE `email`=:email";

            $query = $dbh->prepare($sql1);
            $query->bindParam(':fname', $fname, PDO::PARAM_STR);
            $query->bindParam(':lname', $lname, PDO::PARAM_STR);
            $query->bindParam(':sid', $sid, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);

            $query->execute();

            echo "<script>alert('User updated successfully');</script>";
        } else {
            $sql1 = "UPDATE `users` SET fname=:fname,lname=:lname,sid=:sid,email=:email,slot=:slot WHERE `email`=:email";

            $query = $dbh->prepare($sql1);
            $query->bindParam(':fname', $fname, PDO::PARAM_STR);
            $query->bindParam(':lname', $lname, PDO::PARAM_STR);
            $query->bindParam(':sid', $sid, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':slot', $slot, PDO::PARAM_STR);

            $query->execute();

            echo "<script>alert('Slot added successfully');</script>";
        }

    }
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
                    <?php intro($dbh); ?>
                </div>

                <!-- Slot1 Row Count -->
                <div class="col-md-9">
                    <?php slot1($dbh); ?>
                </div>
                <!-- Slot2 Row Count -->
                <div class="col-md-9">
                    <?php slot2($dbh); ?>
                </div>
                <!-- Slot3 Row Count -->
                <div class="col-md-9">
                    <?php slot3($dbh); ?>
                </div>
                <!-- Slot4 Row Count -->
                <div class="col-md-9">
                    <?php slot4($dbh); ?>
                </div>


                <!-- Group1 Row Count -->
                <div class="col-md-9">
                    <?php group1($dbh);?>
                </div>
                <!-- Group2 Row Count -->
                <div class="col-md-9">
                    <?php group2($dbh); ?>
                </div>
                <!-- Group3 Row Count -->
                <div class="col-md-9">
                    <?php group3($dbh); ?>
                </div>
                <!-- Group4 Row Count -->
                <div class="col-md-9">
                    <?php group4($dbh); ?>
                </div>


                <div class="col-md-9">
                    <br>
                    <h2 style="text-align: center; font-weight: bold">Register for practical slot</h2>
                    <?php
                    $email = $_SESSION['login'];
                    $sql2 = "SELECT * FROM `users` WHERE `email`=:email";
                    $query = $dbh->prepare($sql2);
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                    if ($query->rowCount() > 0) {
                    foreach ($results

                    as $result) {
                    ?>

                    <form class="form-horizontal" method="post"
                          style="border-style: solid; padding-top: 20px; padding-left: 15px; background-color: #C8D3D5;">

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="input1">First Name</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="input1" name="fname"
                                       required value="<?php echo htmlentities($result->fname); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="input2">Last Name</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="input2" name="lname"
                                       required value="<?php echo htmlentities($result->lname); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="input3">Student ID</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="input3" name="sid"
                                       required value="<?php echo htmlentities($result->sid); ?>">
                            </div>
                        </div>

                        <?php
                        $email = $_SESSION['login'];
                        $sql4 = "SELECT users.*, groups.* FROM users JOIN groups ON groups.id=users.sgroup WHERE email=:email";
                        $query = $dbh->prepare($sql4);
                        $query->bindParam(':email', $email, PDO::PARAM_STR);
                        $query->execute();
                        $results4 = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results4 as $result4) {
                                $gname = htmlentities($result4->name);
                                $gdesc = htmlentities($result4->description);
                                $gnamedesc = $gname . ", " . $gdesc;
                                ?>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="input4">Group</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="input4"
                                               name="group" required
                                               value="<?php echo $gnamedesc; ?>"
                                               disabled>
                                    </div>
                                </div>
                            <?php }
                        } ?>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="input5">Email</label>
                            <div class="col-md-5">
                                <input type="email" class="form-control" id="input5"
                                       name="email" required value="<?php echo htmlentities($result->email); ?>"
                                       disabled>
                            </div>
                        </div>

                        <?php
                        if ($result->slot == null) {
                            ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="select1">Select a practical slot</label>
                                <div class="col-md-6">
                                    <select name="select1" id="select1" required>
                                        <option value="">-- Select --</option>
                                        <?php
                                        $sql = "SELECT * FROM slots";
                                        $query = $dbh->prepare($sql);
                                        //$query->bindParam(':id', $id, PDO::PARAM_STR);
                                        $query->execute();
                                        $results1 = $query->fetchAll(PDO::FETCH_OBJ);
                                        if ($query->rowCount() > 0) {
                                            foreach ($results1

                                                     as $result1) {
                                                ?>

                                                <option value="<?php echo htmlentities($result1->id); ?>">
                                                    <?php echo htmlentities($result1->name); ?>
                                                    , <?php echo htmlentities($result1->description); ?>
                                                </option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="input4">Slot</label>
                                <div class="col-md-7">
                                    <span>You are already assigned to </span>
                                    <?php
                                    $email = $_SESSION['login'];
                                    $sql3 = "SELECT users.*, slots.* FROM users JOIN slots ON slots.id=users.slot WHERE email=:email";
                                    $query = $dbh->prepare($sql3);
                                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result3) {
                                            ?>
                                            <?php echo htmlentities($result3->name); ?> at
                                            <?php echo htmlentities($result3->description); ?>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                        <?php }
                        ?>

                        <?php }
                        } ?>


                        <div class="form-group">
                            <label class="col-md-2 control-label">&nbsp;</label>
                            <div class="col-md-10">
                                <button type="submit"
                                        class="btn btn-primary"
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
            <div class="row" style="margin-top: 25px;">
                <div class="col-md-9"
                     style="padding-bottom: 150px; padding-top: 30px; background-color: #EDF060; border-style: solid;">
                    <h4>Seat status</h4>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="input5">Slot 1</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="input5"
                                   name="" disabled value="<?php
                            if ($rC1 > 0) {
                                echo $rem1;
                            } else {
                                echo $rem1 = 40;
                            } ?> seats remaining">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="input6">Slot 2</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="input6"
                                   name="" disabled value="<?php
                            if ($rC2 > 0) {
                                echo $rem2;
                            } else {
                                echo $rem2 = 40;
                            } ?> seats remaining">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="input7">Slot 3</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="input7"
                                   name="" disabled value="<?php
                            if ($rC3 > 0) {
                                echo $rem3;
                            } else {
                                echo $rem3 = 40;
                            } ?> seats remaining">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="input8">Slot 4</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="input8"
                                   name="" disabled value="<?php
                            if ($rC4 > 0) {
                                echo $rem4;
                            } else {
                                echo $rem4 = 40;
                            } ?> seats remaining">
                        </div>
                    </div>
                </div>
            </div>

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