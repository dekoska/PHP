<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
include 'zadanie7.php';

$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
else {
    $query = "SELECT * FROM samochody ORDER BY price LIMIT 5;";
    $result = mysqli_query($db_connection, $query);
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    }
    else {
        echo "<table>";
        echo "<tr>";
        echo "<td>ID: </td>";
        echo "<td>Marka: </td>";
        echo "<td>Model: </td>";
        echo "<td>Cena: </td>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<form action='zadanie7.podstronadoglownej.php' method='get'>";
            echo "<tr>";
            echo "<td><input type='submit' name='id' value='{$row["id"]}'></td>";
            echo "<td>{$row["make"]}</td>";
            echo "<td>{$row["model"]}</td>";
            echo "<td>{$row["price"]}</td>";
            echo "</tr>";
            echo "</form>";
        }
        echo "</table>";
    }
}
?>

<!--else {-->
<!--echo "<table>";-->
<!--    echo "<tr>";-->
<!--        echo "<td>ID: </td>";-->
<!--        echo "<td>Marka: </td>";-->
<!--        echo "<td>Model: </td>";-->
<!--        echo "<td>Cena: </td>";-->
<!--        echo "</tr>";-->
<!--    while ($row = mysqli_fetch_array($result)) {-->
<!--    echo "<form action='zadanie7.podstronadoglownej.php' method='get'><td><input type='hidden' name='idValue' value='{$row["id"]}'><a href='zadanie7.podstronadoglownej.php'>{$row["id"]}</td></form>";-->
<!--    echo "<td>{$row["make"]}</td>";-->
<!--    echo "<td>{$row["model"]}</td>";-->
<!--    echo "<td>{$row["price"]}</td>";-->
<!--    echo "</tr>";-->
<!--    }-->
<!--    echo "</table>";-->
<!--}-->

</body>
</html>

