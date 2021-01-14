<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/nav-style.css">
    <title>Main page</title>
</head>
<body>
<header>
    <div class="navbar">
        <a class="current" href="index.php">Главная</a>
        <a href="list_of_vehicles.php">Модели автомобилей</a>
        <div class="dropdown">
            <button class="dropbtn">Автомобили в наличии</button>
            <div class="dropdown-content">
                <a href="for_sale_cars.php?country=RUSSIA">СССР/Россия</a>
                <a href="for_sale_cars.php?country=UK">Великобритания</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Обслуживание</button>
            <div class="dropdown-content">
                <a href="for_sale_cars.php?country=RUSSIA">Обслуживаемые автомобили</a>
                <a href="for_sale_cars.php?country=UK">Великобритания</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Запасные части и расходники</button>
            <div class="dropdown-content">
                <a href="for_sale_cars.php?country=RUSSIA">СССР/Россия</a>
                <a href="for_sale_cars.php?country=UK">Великобритания</a>
            </div>
        </div>
    </div>
</header>
<main>
    <h1>Информационная система салона ретро-автомобилей</h1>




</main>
</body>
</html>