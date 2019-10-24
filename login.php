<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    //$sgroup = $_POST["sgroup"];

    $sql = "SELECT email,password FROM `users` WHERE email=:email AND password=:password";
    $query = $dbh->prepare($sql);

    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    //$query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
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
            <div class="col-md-4">
                <div class="account-content">
                    <br>
                    <h1 style="font-family: sans-serif; text-align: center; font-weight: bold;">Log in</h1>
                    <br>
                    <form class="form-horizontal" method="post" style="background-color: #97B1A6; padding: 20px 0 10px 0; border-width: 4px; border-style: solid; border-color: #000000; border-radius: 5px;">
                        <div class="form-group ">
                            <div class="col-md-12">
                                <label for="email">Email Address</label>
                                <input id="email" class="form-control" type="email" required="" name="email"
                                       placeholder="Enter email address" autocomplete="on">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password" required=""
                                       placeholder="Password" autocomplete="off">
                            </div>
                        </div>



                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-md-12">
                                <button class="btn w-md btn-bordered btn-primary waves-effect waves-light"
                                        type="submit" name="login">Log In
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="form-group account-btn text-center m-t-10">
                        <div class="col-md-12">
                            Don't have an account? <a href="register.php">Register</a>
                        </div>
                    </div>

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