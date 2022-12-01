<?php
require_once('../config/connect.php');
$id = htmlspecialchars($_GET['id']);
$mysqli->query('DELETE FROM category WHERE id="' . $id . '"');
header('Location: /');
