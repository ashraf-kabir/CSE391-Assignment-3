<?php

function intro($dbh) {
    $email = $_SESSION['login'];
    $sql = "SELECT `fname`,`lname` FROM `users` WHERE `email`=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results
                 as $result) {
            $fname = $result->fname;
            $lname = $result->lname;
            $name = $fname . " " . $lname;
            echo "<br><h1>Log in successful $name</h1>";
        }
    }
}

?>