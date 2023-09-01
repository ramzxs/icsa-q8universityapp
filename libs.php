<?php
function databaseConnect() {
    $dbConnectionString = 'mysql:host=localhost;dbname=q8universityapp_db';
    $DBCONN = new PDO($dbConnectionString, 'root', '');

    return $DBCONN;
}