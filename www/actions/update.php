<?php
require_once('../config/connect.php');
$id = htmlspecialchars($_GET['id']);
if (isset($_POST['title'])) {
    $title = htmlspecialchars($_POST['title']);
    $mysqli->query('UPDATE category SET title="' . $title . '" WHERE id ='. $id);
    header('Location: /');
}
$result = $mysqli->query('SELECT title FROM category WHERE id=' . $id);
$row = $result->fetch_assoc();
if (!$row) {
    echo 'There is not category with this id!!!!';
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>Редактирование категорий</title>
</head>
<body>

<form action="update.php?id=<?= $id ?>" method="post">
    <label>Категория</label>
    <input type="text" name="title" class="input" value="<?= $row['title'] ?>">
    <input type="submit" value="Обновить">
</form>
</body>
</html>
