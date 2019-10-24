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

function slot1($dbh) {
    $slot = "1";
    $sql = "SELECT `slot` FROM `users` WHERE slot=:slot";
    $query = $dbh->prepare($sql);
    $query->bindParam(':slot', $slot, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    global $rC1;
    $rC1 = $query->rowCount();
    global $rem1;
    if ($rC1 > 0) {
        $rem1 = 40 - $rC1;
        echo "<h5>Slot 1 total rows: $rC1</h5>";
    } else {
        echo "<h5>Slot 1 total rows: 0</h5>";
    }
}

function slot2($dbh) {
    $slot = "2";
    $sql = "SELECT `slot` FROM `users` WHERE slot=:slot";
    $query = $dbh->prepare($sql);
    $query->bindParam(':slot', $slot, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    global $rC2;
    $rC2 = $query->rowCount();
    global $rem2;
    if ($rC2 > 0) {
        $rem2 = 40 - $rC2;
        echo "<h5>Slot 2 total rows: $rC2</h5>";
    } else {
        echo "<h5>Slot 2 total rows: 0</h5>";
    }
}

function slot3($dbh) {
    $slot = "3";
    $sql = "SELECT `slot` FROM `users` WHERE slot=:slot";
    $query = $dbh->prepare($sql);
    $query->bindParam(':slot', $slot, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    global $rC3;
    $rC3 = $query->rowCount();
    global $rem3;
    if ($rC3 > 0) {
        $rem3 = 40 - $rC3;
        echo "<h5>Slot 3 total rows: $rC3</h5>";
    } else {
        echo "<h5>Slot 3 total rows: 0</h5>";
    }
}

function slot4($dbh) {
    $slot = "4";
    $sql = "SELECT `slot` FROM `users` WHERE slot=:slot";
    $query = $dbh->prepare($sql);
    $query->bindParam(':slot', $slot, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    global $rC4;
    $rC4 = $query->rowCount();
    global $rem4;
    if ($rC4 > 0) {
        $rem4 = 40 - $rC4;
        echo "<h5>Slot 4 total rows: $rC4</h5>";
    } else {
        echo "<h5>Slot 4 total rows: 0</h5>";
    }
}



?>