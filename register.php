<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['signup'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sid = $_POST['sid'];
    $sgroup = $_POST["select1"];
    $is_active = "1";

    $sql = "INSERT INTO users(`fname`,`lname`,`email`,`password`,`sid`,`sgroup`,`is_active`) VALUES(:fname,:lname,:email,:password,:sid,:sgroup,:is_active)";
    $query = $dbh->prepare($sql);

    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':lname', $lname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':sid', $sid, PDO::PARAM_STR);
    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
    $query->bindParam(':is_active', $is_active, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo "<script>alert('Registration successful');document.location = 'login.php';</script>";
        //header("location: login.php");
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


    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check-availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function (data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {
                }
            });
        }
    </script>

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
                                <label for="input1">First Name</label>
                                <input id="input1" class="form-control" type="text" required="" name="fname"
                                       placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-md-7">
                                <label for="input2">Last Name</label>
                                <input id="input2" class="form-control" type="text" required="" name="lname"
                                       placeholder="Last Name">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-md-7">
                                <label for="input3">Student ID</label>
                                <input id="input3" class="form-control" type="text" required="" name="sid"
                                       placeholder="Student ID">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="select1">Group</label>
                            <div class="col-md-6">
                                <select name="select1" id="select1" required>
                                    <option value="">-- Select --</option>
                                    <?php
                                    $sql = "SELECT * FROM groups";
                                    $query = $dbh->prepare($sql);
                                    //$query->bindParam(':id', $id, PDO::PARAM_STR);
                                    $query->execute();
                                    $results1 = $query->fetchAll(PDO::FETCH_OBJ);
                                    if ($query->rowCount() > 0) {
                                        foreach ($results1

                                                 as $result1) {
                                            ?>

                                            <option value="<?php echo htmlentities($result1->gid); ?>">
                                                <?php echo htmlentities($result1->name); ?>,
                                                <?php echo htmlentities($result1->description); ?>
                                            </option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-7">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" required="" name="email"
                                       placeholder="Email" onBlur="checkAvailability()">
                                <span id="user-availability-status" style="font-size:12px;"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7">
                                <label for="input5">Password</label>
                                <input id="input5" class="form-control" type="password" name="password" required=""
                                       placeholder="Password" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group account-btn text-center m-t-10">
                            <div class="col-md-7">
                                <button class="btn w-md btn-bordered btn-primary waves-effect waves-light"
                                        type="submit" name="signup">Register
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="form-group account-btn text-center m-t-10">
                        <div class="col-md-7">
                            Already have an account? <a href="login.php">Log in</a>
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