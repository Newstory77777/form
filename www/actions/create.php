<?php
require_once('../config/connect.php');
$title = htmlspecialchars($_POST['title']);
$mysqli->query('INSERT INTO category (title) VALUES ("' . $title . '")');
header('Location: /');
exit;
