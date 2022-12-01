<?php
require_once('./config/connect.php');
$result = $mysqli->query('SELECT category.id, category.title, COUNT(post.id) AS post_count FROM category LEFT JOIN post ON category.id = post.category_id GROUP BY category.id');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Form project</title>
</head>
<body>
<h1>Привет в нашей болталке. Вот список доступных тем: </h1>
<table>
    <tr>
        <th>Категория</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        ?>

        <tr>
            <td><a href="actions/view.php?id=<?= $row['id'] ?>"><?= $row['title'] ?>(<?= $row['post_count'] ?>)</a></td>
            <td><a class="edit" href="actions/update.php?id=<?= $row['id'] ?>">Редактировать</a></td>
            <td><a class="delete" href="actions/delete.php?id=<?= $row['id'] ?>">Удалить</a></td>
        </tr>
        <?php
    }
    ?>
</table>

<form action="actions/create.php" method="post">
    <label>Категория</label>
    <input type="text" name="title" class="input">
    <input type="submit" value="Добавить">
</form>
</body>
</html>
