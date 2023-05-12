<?php
include "zadanie7.php";
session_start();
$current_user_id=$_SESSION['current_user_id'];
$current_user_login=$_SESSION['current_user_login'];
if(isset($current_user_login) && isset($current_user_id)){
    $db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
    if($current_user_login=='admin'){
        $query = "SELECT * FROM samochody";
    }
    else {
        $query = "SELECT * FROM samochody WHERE id_uzytkownik='$current_user_id'";
    }
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
            echo "<form action='zadanie7.edycja.php' method='get'>";
            echo "<tr>";
            echo "<td><input type='submit' name='id' value='{$row["id"]}'></td>";
            echo "<td>{$row["marka"]}</td>";
            echo "<td>{$row["model"]}</td>";
            echo "<td>{$row["cena"]}</td>";
            echo "<td>{$row["rok"]}</td>";
            echo "<td>{$row["opis"]}</td>";
            echo "</tr>";
            echo "</form>";
        }
        echo "</table>";
    }
    mysqli_close($db_connection);
}
