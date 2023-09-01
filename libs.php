<?php
function databaseConnect() {
    $dbConnectionString = 'mysql:host=localhost;dbname=q8universityapp_db';
    return new PDO($dbConnectionString, 'root', '');
}