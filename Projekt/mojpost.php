<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mój post</title>
</head>
<body>

<?php
include 'zakladka.php';
$id_postu = $_GET['id'];
$db_connection = mysqli_connect("localhost", "root", "", "blog");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
} else {
    $result = mysqli_query($db_connection, "SELECT * FROM post WHERE id='$id_postu';");
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    } else {
        echo "<div class='mojpost'>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<div class='main-content konkretnypost'>";
            echo "<h1 class='post-title'>{$row["tytul"]}</h1>";
            echo "<div class='post-content'>";
            echo "<img src='{$row["lokalizacja_zdjecia"]}' alt='' class='slider-image'>";
            echo "<br>";
            echo "<br>";
            echo "{$row["tresc"]}";
            echo "<br>";
            echo "<br>";
            echo "<i class='far fa-calendar'></i> Data: ";
            echo $row["data"];
            echo "</div>";
            echo "<div>";
        }
        echo "</div>";
        }
    }
mysqli_close($db_connection);
?>

</body>
</html>
