<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        input[type=submit]{
            background-color: #b4a485;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <title>Moje posty</title>
</head>
<body>

<?php
include 'zakladka.php';
$db_connection = mysqli_connect("localhost", "root", "", "blog");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
else {
    $result = mysqli_query($db_connection, "SELECT * FROM post WHERE tytul IS NOT NULL;");
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    } else {
        echo "<div class=mojeposty>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class=post>";
            echo "<div class=tresc>";
            echo "<form action='edycjapostu.php' method='get'>";
            echo "Tytuł: {$row["tytul"]} <br>";
            echo "Data: {$row["data"]} <br>";
            echo "<table>";
            echo "<tr>";
            echo "<form action='edycjapostu.php' method='get'>";
            echo "<td><input type='hidden' name='id' value='{$row["id"]}'></td>";
            echo "<td><input type='submit' value='Edytuj'></td>";
            echo "</form>";
            echo "<form action='mojpost.php' method='get'>";
            echo "<td><input type='hidden' name='id' value='{$row["id"]}'></td>";
            echo "<td><input type='submit' value='Podgląd'></td>";
            echo "<form action='usunpost.php' method='get'>";
            echo "<td><input type='hidden' name='id' value='{$row["id"]}'></td>";
            echo "<td><input type='submit' value='Usuń'></td>";
            echo "</tr>";
            echo "</table>";
            echo "</form>";
            echo "</div>";
            echo "</div>";

        }
        echo "</div>";
    }
}
mysqli_close($db_connection);
?>

</body>
</html>

