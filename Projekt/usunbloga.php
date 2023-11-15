<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuwanie bloga</title>
</head>
<body>

<?php
include 'zakladka.php';
?>

<form action="usunbloga.php" method="post">
    <table>
        <tr>
            <td>Usunięcie bloga spowoduje usunięcie wszystkich postów. Czy chcesz kontunować?</td>
        </tr>
        <tr>
            <td><input type="submit" value="Usuń bloga"</td>
        </tr>
    </table>
</form>

<?php
$db_connection = mysqli_connect("localhost", "root", "", "blog");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
else {
    $result = mysqli_query($db_connection, "SELECT COUNT(*)ilosc FROM post");
    $row = mysqli_fetch_array($result);
    $liczba = $row['ilosc'];
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    } else {
        while ($liczba) {
            $result1 = mysqli_query($db_connection, "UPDATE post SET id=null, tytul=null, tresc=null, data=null");
            header('Location:stronaglowna.php');
        }
    }
}
mysqli_close($db_connection);
?>

</body>
</html>
