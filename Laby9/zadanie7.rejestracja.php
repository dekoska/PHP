<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
include "zadanie7.php";
$login='';
$haslo='';

if(isset($_POST["login"]) && isset($_POST["haslo"])) {
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
}
$haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);

?>
<form method="POST" action="zadanie7.rejestracja.php">
    <h2>Rejestracja</h2>
    <h3>Jeżeli nie posiadasz konta przejdź do strony <a href="zadanie7.logowanie.php">logowania</a></h3>
    <table>
    <tr>
        <td><input type="login" name="login" placeholder="Login" required></td>
        <td><input type="haslo" name="haslo" placeholder="Hasło" required></td>
    </tr>
    <tr>
        <td><input type="submit" name="submit" value="Zarejestuj się"></td>
    </tr>
    </table>
</form>

<?php
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if($_SERVER["REQUEST_METHOD"]=="POST") {
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    }
    else {
        $query = "INSERT INTO uzytkownik (login, haslo,id_rola,haslo_hash) VALUES ('$login', '$haslo',1, '$haslo_hash')";
        $result = mysqli_query($db_connection, $query);
        if (!$result) {
            echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
            exit();
        }
        else {
            echo "Rejestracja przebiegła pomyślnie, proszę się zalogować";
            exit();
        }
    }
    mysqli_close($db_connection);
}
?>