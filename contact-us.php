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

        <title>Contact us</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/modern-business.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            $(document).ready(function () {
                var text_max = 255;
                $('#textarea_feedback').html(text_max + ' characters remaining');
                $('#textarea').keyup(function () {
                    var text_length = $('#textarea').val().length;
                    var text_remaining = text_max - text_length;
                    $('#textarea_feedback').html(text_remaining + ' characters remaining');
                });
            });
        </script>

    </head>

    <body>
        <!-- Navigation -->
        <?php include('includes/header.php'); ?>

        <!-- Page Content -->
        <div class="container">

            <?php
            $email = $_SESSION['login'];
            $sql1 = "SELECT `pagetitle`,`description` FROM `pages` WHERE `pagename`='contactus'";
            $query = $dbh->prepare($sql1);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            if ($query->rowCount() > 0) {
                foreach ($results
                         as $result1) {

                    ?>
                    <br>
                    <h1 class="mt-4 mb-3"><?php echo htmlentities($result1->pagetitle) ?>
                    </h1>

                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>

                    <div class="col-md-6 col-xs-18">
                        <div class="showcase-left">

                            <form id="contact-form" method="post" action="mail/contact_me.php" role="form">
                                <?php
                                $email = $_SESSION['login'];

                                $sql2 = "SELECT `name`,`phone`,`id` FROM `user` WHERE `email`=:email AND `is_active`=1";
                                $query = $dbh->prepare($sql2);
                                $query->bindParam(':email', $email, PDO::PARAM_STR);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                foreach ($results

                                as $result2) {

                                ?>

                                <div class="messages"></div>

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_name">Name</label>
                                                <input id="form_name" type="text" name="name"
                                                       value="<?php echo $result2->name; ?>"
                                                       class="form-control"
                                                       required="required">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_name">ID</label>
                                                <input id="form_name" type="text" name="id" value="<?php echo $result2->id; ?>"
                                                       class="form-control"
                                                       required="required">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_email">Email</label>
                                                <input id="form_email" type="email" name="email"
                                                       value="<?php echo $email; ?>"
                                                       class="form-control"
                                                       required="required">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_phone">Phone</label>
                                                <input id="form_phone" type="tel" name="phone"
                                                       value="<?php echo $result2->phone; ?>"
                                                       class="form-control">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="textarea">Message</label>
                                                <textarea id="textarea" name="message" class="form-control"
                                                          placeholder="Leave your message" rows="4" required="required"
                                                          maxlength="255"></textarea>
                                                <div id="textarea_feedback"></div>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <?php }
                                        } ?>
                                        <div class="col-md-12">
                                            <button type="submit"
                                                    class="btn w-md btn-bordered btn-primary waves-effect waves-light"
                                                    name="submit">Submit
                                            </button>
                                        </div>
                                        <script type="text/javascript">
                                            function redirect() {
                                                //alert('Your form has submitted');
                                                window.location.href = "contact-us.php";
                                            }
                                        </script>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br><br>

                    <!-- Intro Content -->
                    <div class="row">
                        <div class="col-lg-12">
                            <p><?php echo $result1->description; ?></p>
                        </div>
                    </div>
                    <!-- /.row -->
                <?php }
            } ?>

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