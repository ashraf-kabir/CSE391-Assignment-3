<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo.png"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-us.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact-us.php">Contact us</a>
                </li>
                <?php
                if (strlen($_SESSION['login']) == 0) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                <?php } else {
                } ?>
                <?php if (isset($_SESSION['login'])): ?>
                    <li class="nav-item">
                        <?php
                        $email = $_SESSION['login'];
                        $sql1 = "SELECT `id` FROM `users` WHERE `email`=:email AND `is_active`=1";
                        $query = $dbh->prepare($sql1);
                        $query->bindParam(':email', $email, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                        foreach ($results

                        as $result) {
                        ?>
                        <a class="nav-link" href="profile.php?id=<?php echo htmlentities($result->id) ?>">
                            <?php }
                            } ?>

                            <!-- showing username at header -->
                            <?php
                            $sql2 = "SELECT `fname` FROM `users` WHERE `email`=:email AND `is_active`=1;";
                            $query = $dbh->prepare($sql2);
                            $query->bindParam(':email', $email, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                                    echo $result->fname;
                                }
                            }
                            //echo $_SESSION['userlogin']['email'];?>
                        </a>
                        <!-- showing username at header -->

                    </li>
                <?php endif; ?>
                <?php if (isset($_SESSION['login'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="userlogout.php">Logout</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
