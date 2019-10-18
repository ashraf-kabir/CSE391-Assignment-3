<?php
session_start();
include('includes/config.php');
if (isset($_POST['signup'])) {
    $fname = $_POST['name'];
    $lname = $_POST['fname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sid = $_POST['sid'];

    //condition
    $sgroup = "group1";
    //condition
    $sql = "INSERT INTO group1(`fname`,`lname`,`email`,`password`) VALUES(:fname,:lname,:email,:password)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $fname, PDO::PARAM_STR);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':sid', $sid, PDO::PARAM_STR);
    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo "<script>alert('Registration successful');</script>";
    } else {
        echo "<script>alert('Something went wrong');</script>";
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

    <title>Home | Register</title>

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
                    <h2 style="font-family: sans-serif">Register</h2>
                    <br>
                    <form class="form-horizontal" method="post" name="signup">
                        <div class="form-group ">
                            <div class="col-md-7">
                                <input class="form-control" type="text" required="" name="name"
                                       placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-md-7">
                                <input class="form-control" type="text" required="" name="fname"
                                       placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-md-7">
                                <input class="form-control" type="text" required="" name="sid"
                                       placeholder="Student ID">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-7">
                                <select name="sgroup" id="sgroup">
                                    <option value="">Group1</option>
                                    <option value="">Group2</option>
                                    <option value="">Group3</option>
                                    <option value="">Group4</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <div class="col-md-7">
                                <input class="form-control" type="email" required="" name="email"
                                       placeholder="Email">
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
                                <input class="form-control" type="password" name="repass" required=""
                                       placeholder="Re-type Password" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-md-7">
                                <button class="btn w-md btn-bordered btn-primary waves-effect waves-light"
                                        type="submit" name="signup"">Register
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