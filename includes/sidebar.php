<div class="col-md-3">

    <!-- News Widget -->
    <div class="card my-3">
        <h5 class="card-header">News</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        <?php
                        $email = $_SESSION['login'];
                        $sql = "SELECT `id`,`headline` FROM `news` WHERE `is_active`=1";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':email', $email, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results
                                     as $result) {
                                ?>
                                <li>
                                    <a href="news.php?id=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->headline); ?></a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Jobs Widget -->
    <div class="card my-3">
        <h5 class="card-header">Job Offerings</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        <?php
                        $email = $_SESSION['login'];
                        $sql = "SELECT `id`,`title` FROM `jobs` WHERE `is_active`=1";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':email', $email, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        if ($query->rowCount() > 0) {
                            foreach ($results
                                     as $result) {
                                ?>
                                <li>
                                    <a href="jobs.php?id=<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->title); ?></a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Link Widget -->
    <div class="card my-3">
        <h5 class="card-header">Useful Links</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-unstyled mb-0">
                        <a href="https://www.google.com/" target="_blank">Google</a>
                    </ul>
                    <ul class="list-unstyled mb-0">
                        <a href="https://www.bracu.ac.bd/" target="_blank">Brac University</a>
                    </ul>
                    <ul class="list-unstyled mb-0">
                        <a href="http://usis.bracu.ac.bd/" target="_blank">USIS</a>
                    </ul>
                    <ul class="list-unstyled mb-0">
                        <a href="https://www.bbc.com/" target="_blank">BBC News</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
