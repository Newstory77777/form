<?php
require_once('config.php');

$mysqli = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_errno) {
    echo 'mysqli connection error: ' . $mysqli->connect_error;
    exit;
}
$mysqli->set_charset('utf8mb4');
if ($mysqli->errno) {
    echo 'mysqli error: ' . $mysqli->error;
    exit;
}



