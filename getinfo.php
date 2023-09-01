<?php
/* GET INFO */


try {
    $dbConnectionString = 'mysql:host=localhost;dbname=q8universityapp_db';
    $DBCONN = new PDO($dbConnectionString, 'root', '');

    $sqlSelect = "SELECT * FROM `student` WHERE `id` = '" . $_GET['id'] . "'";
    $statement = $DBCONN->query($sqlSelect);
    if ($row = $statement->fetch()) {
        echo $row['name'];
    } else {
        echo 'Record not found';
    }
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}