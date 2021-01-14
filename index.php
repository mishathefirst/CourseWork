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
            <button class="dropbtn">Автомобили в наличии
                <!--<i class="fa fa-caret-down"></i>-->
            </button>
            <div class="dropdown-content">
                <a href="for_sale_cars.php?country=RUSSIA">СССР/Россия</a>
                <a href="for_sale_cars.php?country=UK">Великобритания</a>
            </div>
        </div>
    </div>

    <form action="list_of_vehicles.php" method="get" id="nav-list"  novalidate>
        <p><input type="submit" value="Модели автомобилей"></p>
    </form>
    <form action="for_sale_cars.php" method="get" id="nav-sale"  novalidate>
        <p><input type="submit" value="Автомобили в наличии"></p>
    </form>
</header>
<main>
    <h1>Информационная система салона ретро-автомобилей</h1>




</main>
</body>
</html>