<?php
include 'zadanie7.php';
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
else {
    $query = "SELECT * FROM samochody ORDER BY year";
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
        echo "<td>Rok produkcji: </td>";
        echo "<td>Opis: </td>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>{$row["id"]}</td>";
            echo "<td>{$row["make"]}</td>";
            echo "<td>{$row["model"]}</td>";
            echo "<td>{$row["price"]}</td>";
            echo "<td>{$row["year"]}</td>";
            echo "<td>{$row["description"]}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}