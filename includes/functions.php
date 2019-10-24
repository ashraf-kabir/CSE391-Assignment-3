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

function group1($dbh) {
    $sgroup = "1";
    $sql = "SELECT `sgroup` FROM `users` WHERE sgroup=:sgroup";
    $query = $dbh->prepare($sql);
    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    global $rG1;
    $rG1 = $query->rowCount();
    if ($rG1 > 0) {
        echo "<h5>Group 1 total rows: $rG1</h5>";
    } else {
        echo "<h5>Group 1 total rows: 0</h5>";
    }
}

function group2($dbh) {
    $sgroup = "2";
    $sql = "SELECT `sgroup` FROM `users` WHERE sgroup=:sgroup";
    $query = $dbh->prepare($sql);
    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    global $rG2;
    $rG2 = $query->rowCount();
    if ($rG2 > 0) {
        echo "<h5>Group 2 total rows: $rG2</h5>";
    } else {
        echo "<h5>Group 2 total rows: 0</h5>";
    }
}

function group3($dbh) {
    $sgroup = "3";
    $sql = "SELECT `sgroup` FROM `users` WHERE sgroup=:sgroup";
    $query = $dbh->prepare($sql);
    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    global $rG3;
    $rG3 = $query->rowCount();
    if ($rG3 > 0) {
        echo "<h5>Group 3 total rows: $rG3</h5>";
    } else {
        echo "<h5>Group 3 total rows: 0</h5>";
    }
}

function group4($dbh) {
    $sgroup = "4";
    $sql = "SELECT `sgroup` FROM `users` WHERE sgroup=:sgroup";
    $query = $dbh->prepare($sql);
    $query->bindParam(':sgroup', $sgroup, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    global $rG4;
    $rG4 = $query->rowCount();
    if ($rG4 > 0) {
        echo "<h5>Group 4 total rows: $rG4</h5>";
    } else {
        echo "<h5>Group 4 total rows: 0</h5>";
    }
}

// remaining seats status
function rem1() {

}

?>