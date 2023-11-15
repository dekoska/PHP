<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post</title>
    <style>
        input[type=submit]{
            background-color: #b4a485;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
include 'zakladka.php';

if(isset($_GET['id'])){
    $_SESSION['idpostu']=$_GET['id'];
}

$db_connection = mysqli_connect("localhost", "root", "", "blog");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
else {
    $result = mysqli_query($db_connection, "SELECT * FROM post WHERE id='{$_SESSION['idpostu']}'");
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    } else {
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
            echo "<br><br>";
            echo "<div class='tytul-komentarza>'>";
            echo "<form action='dodawaniekomentarza.php' method='get'>";
            echo "<td><input type='hidden' name='id_postu' value='{$row["id"]}'>";
            echo "<td><input type='submit' value='Dodaj komentarz'></td>";
            echo "<h3>Komentarze:</h3>";
            echo "</div>";
            $resultKom = mysqli_query($db_connection, "SELECT * FROM komentarz WHERE id_post=\"{$row["id"]}\" ORDER BY data DESC;");
            while($row2 = mysqli_fetch_array($resultKom)){
            echo "<br>";
            echo "<div class='komentarz'>";
            echo "<div class='komentarz-content'>";
            echo "<i class='far fa-user'></i> {$row2["login_uzytkownik"]}<br>";
            echo "<div class='komentarz-tresc'>";
            echo "{$row2["tresc"]}";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
            echo "<div>";
        }
        echo "</div>";
        }
}
?>

</body>
</html>
