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
    <title>Resetowanie hasła</title>
</head>
<body>

<?php
include 'zakladka.php';

$login='';
$haslo='';
$haslo2='';

if(isset($_GET['login']) && isset($_GET['haslo']) && isset($_GET['haslo2'])){
    $login=$_GET['login'];
    $haslo=$_GET['haslo'];
    $haslo2=$_GET['haslo2'];
}
?>
<div class="reset">
<form action="resetowaniehasla.php" method="get">
    <h2>Zresetuj hasło</h2>
    <p>Login</p>
    <p><input type="text" name="login" required></p>
    <p>Hasło</p>
    <p><input type="password" name="haslo" required></p>
    <p>Powtórz hasło</p>
    <p><input type="password" name="haslo2" required></p>
    <p><input type="submit" value="Zresetuj hasło"></p>
</form>
</div>

<?php
if(isset($_GET['login']) && isset($_GET['haslo'])) {
    $db_connection = mysqli_connect("localhost", "root", "", "blog");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (!$db_connection) {
            echo "<h2>Błąd połączenia z bazą!</h2>";
            exit();
        } else {
            if ($haslo == $haslo2){
                $sprawdzanieLoginu = mysqli_query($db_connection, "SELECT COUNT(*)ilosc FROM uzytkownik WHERE login ='$login'");
                $row = mysqli_fetch_array($sprawdzanieLoginu);
                $ilosc = $row['ilosc'];
                if ($ilosc != 0) {
                    $hasloHash = password_hash($haslo, PASSWORD_DEFAULT);
                    $query_login = mysqli_query($db_connection, "UPDATE uzytkownik SET haslo='$haslo', haslo_hash='$hasloHash' WHERE login ='$login'");
                    header('Location:logowanie.php');
                } else {
                    echo "Użytkownik o podanym loginie nie istnieje";
                }
                mysqli_close($db_connection);
            } else {
                echo "Podane hasła nie są identyczne";
            }
        }
    }
}
?>

</body>
</html>

