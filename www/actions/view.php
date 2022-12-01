<?php
require_once('../config/connect.php');
$id = htmlspecialchars($_GET['id']);
$result = $mysqli->query('SELECT title FROM category WHERE id=' . $id);
$row = $result->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Form project</title>
</head>
<body>
<?php
if (!$row) {
    ?>
    <h1>Такой категории не существует</h1>
    <a href="/">Назад</a>
    <?php
    exit;
}
?>
<h1><?= $row['title'] ?></h1>
<a href="/">Назад</a>
<?php

$result = $mysqli->query('SELECT text  FROM post WHERE category_id=' . $id);

foreach ($result as $row) {
    ?>
    <p style="border-bottom: 1px solid black">
        <?= $row['text'] ?>
    </p>
    <?php
}
?>
</body>
</html>
