<?php
// Соединение, выбор базы данных
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=12032001")
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