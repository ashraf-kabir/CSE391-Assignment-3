<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sgroup = $_POST["sgroup"];

    if ($sgroup == "g1") {
        $sql1 = "SELECT email,password,sgroup FROM `groupa` WHERE email=:email, password=:password AND sgroup=:sgroup";
        $query = $dbh->prepare($sql1);
    } elseif ($sgroup == "g2") {
        $sql2 = "SELECT email,password,sgroup FROM `groupb` WHERE email=:email, password=:password AND sgroup=:sgroup";
        $query = $dbh->prepare($sql2);
    } elseif ($sgroup == "g3") {
        $sql3 = "SELECT email,password,sgroup FROM `groupc` WHERE email=:email, password=:password AND sgroup=:sgroup";
        $query = $dbh->prepare($sql3);
    } elseif ($sgroup == "g4") {
        $sql4 = "SELECT email,password,sgroup FROM `groupd` WHERE email=:email, password=:password AND sgroup=:sgroup";
        $query = $dbh->prepare($sql4);
    }

    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        $_SESSION['login'] = $_POST['email'];
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Invalid info');</script>";
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

    <title>Home | Login</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <script type="text/javascript">
        $(document).ready(function () {
            function disablePrev() {
                window.history.forward()
            }
            window.onload = disablePrev();
            window.onpageshow = function (evt) {
                if (evt.persisted) disableBack()
            }
        });
    </script>

</head>

<body class="bg-transparent">

    <?php include('includes/header.php'); ?>

    <div class="container">

        <div class="row" style="margin-top: 4%">

            <div class="col-md-4"></div>
            <div class="col-md-6">
                <div class="account-content">
                    <br>
                    <h2 style="font-family: sans-serif">Log in</h2>
                    <br>
                    <form class="form-horizontal" method="post">
                        <div class="form-group ">
                            <div class="col-md-7">
                                <input class="form-control" type="email" required="" name="email"
                                       placeholder="Email" autocomplete="on">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7">
                                <input class="form-control" type="password" name="password" required=""
                                       placeholder="Password" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7">
                                <select name="sgroup" id="sgroup">
                                    <option value="g1">Group A</option>
                                    <option value="g2">Group B</option>
                                    <option value="g3">Group C</option>
                                    <option value="g4">Group D</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-md-7">
                                <button class="btn w-md btn-bordered btn-primary waves-effect waves-light"
                                        type="submit" name="login">Log In
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="clearfix"></div>

                </div>
            </div>

            <!-- Blog Entries Column -->
            <div class="col-md-4"></div>

        </div>

    </div>


    <?php include('includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>