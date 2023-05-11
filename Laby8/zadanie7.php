<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
session_start();
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <table>
        <tr>
            <td><a href="zadanie7.glowna.php" >Strona główna</a></td>
            <td><a href="zadanie7.wszystkie.php">Wszystkie samochody</a></td>
            <td><a href="zadanie7.dodawanie.php">Dodaj samochód</a></td>
            <?php
            if(isset($_SESSION["current_user_id"]) && isset($_SESSION["current_user_login"]))
                echo "<td><a href=\"zadanie7.mojesamochody.php\">Moje samochody<a/></td>";
            ?>
            <td><a href="zadanie7.logowanie.php">Logowanie</a></td>
        </tr>
    </table>
</form>
</body>
</html>
