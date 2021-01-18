<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/nav-style.css">
    <link rel="stylesheet" href="styles/filter-style.css">
    <link rel="stylesheet" href="styles/table-style.css">
    <link rel="stylesheet" href="styles/edit-buttons-style.css">
    <title>Автомобили в наличии</title>
</head>
<body>
<header>
    <div class="navbar">
        <a href="index.php">Главная</a>
        <a href="list_of_vehicles.php">Модели автомобилей</a>
        <div class="dropdown">
            <button class="dropbtn">Автомобили в наличии</button>
            <div class="dropdown-content">
                <a href="for_sale_cars.php">Все</a>
                <a href="for_sale_cars.php?country=RUSSIA">СССР/Россия</a>
                <a href="for_sale_cars.php?country=UK">Великобритания</a>
                <a href="for_sale_cars.php?country=USA">США</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Обслуживание</button>
            <div class="dropdown-content">
                <a href="serviced_cars.php">Обслуживаемые автомобили</a>
                <a href="service_staff.php">Персонал</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">ЗИП</button>
            <div class="dropdown-content">
                <a href="repair_parts.php">Запасные части</a>
                <a href="supplies.php">Расходные материалы</a>
                <a href="suppliers_and_producers.php">Поставщики</a>
                <a href="order.php">Сделать заказ</a>
            </div>
        </div>
    </div>
</header>

<?php
//$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=12032001")
//or die('Не удалось соединиться: ' . pg_last_error());

$dbconn = pg_connect("host=localhost port=19755 dbname=studs user=s265085 password=ble545")
or die('Не удалось соединиться: ' . pg_last_error());


// Выполнение SQL-запроса
//echo (empty($_GET['country']));
if (empty($_GET['country'])) {
    $query = 'SELECT * FROM FOR_SALE_CARS';
} else {
    $query = 'SELECT * FROM FOR_SALE_CARS NATURAL JOIN ABSTR_CARS WHERE ABSTR_CARS.COUNTRY_OF_PRODUCTION=\''.$_GET['country'].'\'';
}
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

// Вывод результатов в HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Очистка результата
pg_free_result($result);

// Закрытие соединения
pg_close($dbconn);

?>


</body>
</html>

