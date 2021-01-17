<!DOCTYPE html>
<html lang="en">
<head>
    <title>Добавить модель автомобиля в список</title>
</head>
<body>
<style>
    .edit-button {
        overflow: hidden;
        background-color: #333;
        font-family: Arial;
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 8px 12px;
        text-decoration: none;
        margin-left: 20px;
        margin-top: 10px;
    }
    .add-form {
        margin-left: 20px;
        margin-top 30px;
    }
</style>
<a class="edit-button" href="list_of_vehicles.php">Назад</a>
<br>
<br>
<div class="add-form">
<h2> Добавление автомобиля: </h2>
<form name="add" method="get" action="add_to_list_of_vehicles.php">
    <p><b>Введите ИД добавляемого автомобиля:</b><br>
        <input type="number" size="40">
    </p>
    <p><input type="submit" value="Добавить"></p>
</form>




<?php


?>

</div>
</body>
</html>