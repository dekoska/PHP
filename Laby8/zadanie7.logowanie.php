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

?>
<form method="POST" action="zadanie7.logowanie.php">
        <h2>Logowanie</h2>
        <h3>Jeżeli nie posiadasz konta przejdź do strony <a href="zadanie7.rejestracja.php">rejestracji</a></h3>
    <table>
    <tr>
        <td><input type="login" name="login" placeholder="Login" required></td>
        <td><input type="haslo" name="haslo" placeholder="Hasło" required></td>
    </tr>
    <tr>
        <td><input type="submit" name="submit" value="Zaloguj się"></td>
    </tr>
    </table>
</form>

<?php
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if($_SERVER["REQUEST_METHOD"]=="POST") {
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        $query_login = mysqli_query($db_connection, "SELECT * FROM uzytkownik WHERE login ='$login'");
        if (mysqli_num_rows($query_login) > 0) {
            $record = mysqli_fetch_assoc($query_login);
            $hash=$record["haslo_hash"];
            if (password_verify($haslo, $hash)) {
                $_SESSION['current_user_id'] =$record["id"] ;
                $_SESSION['current_user_login']=$record["login"];
                echo "Zalogowano pomyślnie";

            }
            else echo "Podano błędne hasło";
        }
    }
}
mysqli_close($db_connection);

?>
