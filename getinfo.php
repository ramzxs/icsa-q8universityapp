<?php
/* GET INFO */
require_once 'libs.php';

sleep(2);

try {
    $DBCONN = databaseConnect();

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