<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuwanie profilu</title>
</head>
<body>

<?php
include 'zakladka.php';
$user=$_SESSION['user'];
$db_connection = mysqli_connect("localhost", "root", "", "blog");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
else {
    $result = mysqli_query($db_connection, "SELECT COUNT(*)ilosc FROM uzytkownik WHERE login='{$user->getLogin()}'");
    $row = mysqli_fetch_array($result);
    $liczba = $row['ilosc'];
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    } else {
        while ($liczba) {
            $result1 = mysqli_query($db_connection, "UPDATE uzytkownik SET login=NULL, haslo=NULL WHERE login='{$user->getLogin()}'");
            session_destroy();
            header('Location:stronaglowna.php');
        }
    }
}
mysqli_close($db_connection);
?>

</body>
</html>
