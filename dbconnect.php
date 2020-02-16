<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'phptodo';

$connect = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
if ($connect -> connect_errno) {
    echo "Failed to connect to the database!" . $connect -> connect_error;
    exit();
}
