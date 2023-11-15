<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuwanie postu</title>
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
    $result = mysqli_query($db_connection, "UPDATE post SET tytul=null, tresc=null, data=null, lokalizacja_zdjecia=null WHERE id='$id_postu';");
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    } else header("Location:mojeposty.php");
}
mysqli_close($db_connection);
?>

</body>
</html>
