<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/nav-style.css">
    <link rel="stylesheet" href="styles/filter-style.css">
    <link rel="stylesheet" href="styles/table-style.css">
    <title>Модели ретро-автомобилей</title>
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
<main>
    <br>
    <div id="filter" class="filter">
        <div class="filter-content">
    <h1>Фильтр характеристик:</h1>
    <form name="input" action="list_of_vehicles.php" method="get">
        <label for="country_of_production">Страна производства:</label>
        <select name="country" id="country_of_production">
            <optgroup label="Countries">
                <option value="" name="thing">Все</option>
                <option value="RUSSIA" name="thing">СССР/Россия</option>
                <option value="UK" name="thing">Великобритания</option>
                <option value="USA" name="thing">США</option>
            </optgroup>
        </select>
        <br>
        <label for="min_power">Минимальная мощность двигателя:</label>
            <input type="range" name="min_power" id="min_power" min="80" max="250" step="10" value="<?php $power_value = (empty($_GET['min_power']))? 80 : $_GET['min_power']; echo $power_value; ?>">
        <br>
        <input type="submit" class="submit-button" value="Применить">
        <br>
        <h2>     </h2>

    </form>
        </div>
    </div>
</main>



<div id="table" class="table">
    <h1>Модели:</h1>






<?php
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=12032001")
or die('Не удалось соединиться: ' . pg_last_error());

/*
if (empty($_GET['country'])) {
    $query = 'SELECT * FROM ABSTR_CARS';
} else {
    $query = 'SELECT * FROM ABSTR_CARS WHERE ABSTR_CARS.COUNTRY_OF_PRODUCTION=\''.$_GET['country'].'\'';
}
*/

$previous_query = 0;
$query = 'SELECT * FROM ABSTR_CARS';
if (!(empty($_GET['country']) and empty($_GET['min_power']))) {
    $query = $query.' WHERE ';
    if (!empty($_GET['country'])){
        $query = $query.'ABSTR_CARS.COUNTRY_OF_PRODUCTION=\''.$_GET['country'].'\'';
        $previous_query = 1;
    }
    if ((!empty($_GET['min_power'])) and $previous_query == 0){
        $query = $query.'ABSTR_CARS.ENGINE_POWER >= \''.$_GET['min_power'].'\'';
        $previous_query = 1;
    } elseif (!empty($_GET['min_power'])) {
        $query = $query.' AND ABSTR_CARS.ENGINE_POWER >= \''.$_GET['min_power'].'\'';
    }
}
$result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

// Вывод результатов в HTML
//echo "<table>\n";
$block_counter = 1;
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    //echo "\t<tr class='table-block'>\n";
    echo "\t<div class='table-block'>\n";
    echo "\t<div class='table-content'>\n";
    //echo "$line[1]";
    foreach ($line as $col_value) {
        //echo "\t\t<td>$col_value</td>\n";
        //echo "\t\t$line[0]\n";
        //echo "\t\t$col_value\n";
        if ($block_counter == 1) {
            echo "ID: \t\t$col_value\n";
            $block_counter++;
        } elseif ($block_counter == 2 or $block_counter == 3) {
            echo "<h1>\t\t$col_value\n</h1>";
            $block_counter++;
        } else {
            echo "\t\t$col_value\n";
            $block_counter++;
        }
    }
    //echo "\t</tr>\n";
    echo "\t</div>\n";
    echo "\t</div>\n";
    $block_counter = 1;
}
//echo "</table>\n";

pg_free_result($result);

pg_close($dbconn);
$previous_query = 0;
$block_counter = 1;
?>

</div>
</body>
</html>
