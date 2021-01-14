<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/nav-style.css">
    <title>Модели ретро-автомобилей</title>
</head>
<body>
<header>

    <div class="navbar">
        <a href="index.php">Главная</a>
        <div class="dropdown">
            <button class="dropbtn">Автомобили в наличии
                <!--<i class="fa fa-caret-down"></i>-->
            </button>
            <div class="dropdown-content">
                <a href="list_of_vehicles.php?country=RUSSIA">Российские</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div>
    </div>

    <form action="index.php" method="get" id="nav-home"  novalidate>
        <p><input type="submit" value="Домашняя страница"></p>
    </form>
</header>
<!--<main>
    <form action="MainPageFinalVersion.php" method="get" id="form"  onsubmit="check(); return true;" novalidate>

        <label class="instructions" for="hidden_x"> Insert X: </label>
        <button type="button" class="button" name="button_x" value="-4" id="x_-4" onclick="document.getElementById('hidden_x').value = -4"> -4 </button>
        <button type="button" class="button" name="button_x" value="-3" id="x_-3" onclick="document.getElementById('hidden_x').value = -3"> -3 </button>
        <button type="button" class="button" name="button_x" value="-2" id="x_-2" onclick="document.getElementById('hidden_x').value = -2"> -2 </button>
        <button type="button" class="button" name="button_x" value="-1" id="x_-1" onclick="document.getElementById('hidden_x').value = -1"> -1 </button>
        <button type="button" class="button" name="button_x" value="0" id="x_0" onclick="document.getElementById('hidden_x').value = 0"> 0 </button>
        <button type="button" class="button" name="button_x" value="1" id="x_1" onclick="document.getElementById('hidden_x').value = 1"> 1 </button>
        <button type="button" class="button" name="button_x" value="2" id="x_2" onclick="document.getElementById('hidden_x').value = 2"> 2 </button>
        <button type="button" class="button" name="button_x" value="3" id="x_3" onclick="document.getElementById('hidden_x').value = 3"> 3 </button>
        <button type="button" class="button" name="button_x" value="4" id="x_4" onclick="document.getElementById('hidden_x').value = 4"> 4 </button>
        <input type="hidden" name="hidden_x" id="hidden_x" value=""> <br>
        <p id="warningX" class="toWarnPoints"></p><br>


        <label for="yCoordinate" class="instructions"> Insert Y: </label>
        <input type="text" id="yCoordinate" name="yCoordinate" autocomplete="off">
        <p id="warning" class="toWarnPoints"></p><br>
        <p id="warningY" class="toWarnPoints"></p><br>

        <label class="instructions" for="hidden_r"> Insert R: </label>
        <button type="button" class="button" name="button_r" value="1" id="r_1" onclick="document.getElementById('hidden_r').value = 1"> 1 </button>
        <button type="button" class="button" name="button_r" value="2" id="r_2" onclick="document.getElementById('hidden_r').value = 2"> 2 </button>
        <button type="button" class="button" name="button_r" value="3" id="r_3" onclick="document.getElementById('hidden_r').value = 3"> 3 </button>
        <button type="button" class="button" name="button_r" value="4" id="r_4" onclick="document.getElementById('hidden_r').value = 4"> 4 </button>
        <button type="button" class="button" name="button_r" value="5" id="r_5" onclick="document.getElementById('hidden_r').value = 5"> 5 </button>
        <input type="hidden" name="hidden_r" id="hidden_r" value=""> <br>
        <p id="warningR" class="toWarnPoints"></p><br>

        <p id="button" class="input_button">
            <input type="submit" value="Check the result.">
        </p>
    </form>
    </main>-->
<?php
// Соединение, выбор базы данных
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=12032001")
or die('Не удалось соединиться: ' . pg_last_error());

// Выполнение SQL-запроса
//echo (empty($_GET['country']));
if (empty($_GET['country'])) {
    $query = 'SELECT * FROM ABSTR_CARS';
} else {
    $query = 'SELECT * FROM ABSTR_CARS WHERE ABSTR_CARS.COUNTRY_OF_PRODUCTION=\''.$_GET['country'].'\'';
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
