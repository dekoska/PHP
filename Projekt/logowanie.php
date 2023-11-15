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
    <title>Logowanie</title>
</head>
<body>

<?php
include "zakladka.php";

$login1='';
$haslo1='';

if(isset($_GET["login1"]) && isset($_GET["haslo1"])) {
    $login1 = $_GET["login1"];
    $haslo1 = $_GET["haslo1"];
}


?>

<div class="logowanie">
<form method="GET" action="logowanie.php">
    <h2>Logowanie</h2>
    <h4>Jeżeli nie posiadasz konta przejdź do strony <a href="rejestracja.php" class="link">rejestracji</a></h4>
    <div class="formularz">
        <p>Login</p>
        <p><input type="text" name="login1" placeholder="Wpisz login" required></p>
        <p>Hasło</p>
        <p><input type="password" name="haslo1" placeholder="Wpisz hasło" required></p>
        <p><input type="submit" value="Zaloguj się"></p>
    </div>
    </form>
<form method="get" action="resetowaniehasla.php">
    <p><input type="submit" value="Zresetuj hasło"</p>
</form>
</div>


<?php
if($_SERVER["REQUEST_METHOD"]=="GET") {

    $db_connection = mysqli_connect("localhost", "root", "", "blog");
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {

        if (isset($_GET["login1"]) && isset($_GET["haslo1"])) {
            $query_login = mysqli_query($db_connection, "SELECT * FROM uzytkownik WHERE login ='$login1'");
            if (mysqli_num_rows($query_login) > 0) {
                $record = mysqli_fetch_assoc($query_login);
                if (password_verify($haslo1, $record["haslo_hash"])) {
                    $user = new Uzytkownik($record["id"], $record["login"], $record["haslo"], $record["id_rola"]);
                    $_SESSION['user'] = $user;

                    header('Location:stronaglowna.php');
                } else echo "Podano błędne hasło";
            }
        }

        mysqli_close($db_connection);
    }
}

?>

</body>
</html>

