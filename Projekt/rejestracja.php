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
    <title>Rejestracja</title>
</head>
<body>

<?php
include "zakladka.php";

$login2='';
$haslo2='';
$haslo3='';

if(isset($_GET["login2"]) && isset($_GET["haslo2"]) && isset($_GET["haslo3"])) {
    $login2 = $_GET["login2"];
    $haslo2 = $_GET["haslo2"];
    $haslo3 = $_GET["haslo3"];
}
?>
<
<div class="rejestracja">
<form method="GET" action="rejestracja.php">
    <h2>Rejestracja</h2>
    <h4>Jeżeli nie posiadasz konta przejdź do strony <a href="logowanie.php" class="link">logowania</a></h4>
    <div class="formularz"
        <p>Login</p>
        <p><input type="text" name="login2" required></p>
        <p>Hasło</p>
        <p><input type="password" name="haslo2" required></p>
        <p>Powtórz hasło</p>
        <p><input type="password" name="haslo3" required></p>
        <p><input type="submit" name="submit" value="Zarejestuj się"></p>
    <div>
</form>
</div>

<?php
$db_connection = mysqli_connect("localhost", "root", "", "blog");
if($_SERVER["REQUEST_METHOD"]=="GET") {
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        if (isset($_GET["login2"]) && isset($_GET["haslo2"]) && isset($_GET["haslo3"])) {
            if ($haslo2 == $haslo3) {
                $sprawdzanieLoginu = mysqli_query($db_connection, "SELECT COUNT(*)ilosc FROM uzytkownik WHERE login ='$login2'");
                $row = mysqli_fetch_array($sprawdzanieLoginu);
                $ilosc = $row['ilosc'];
                if ($ilosc == 0) {
                    $hasloHash = password_hash($haslo2, PASSWORD_DEFAULT);
                    mysqli_query($db_connection, "INSERT INTO uzytkownik (login, haslo,haslo_hash,id_rola) VALUES ('$login2', '$haslo2','$hasloHash',1)");
                    $query_login = mysqli_query($db_connection, "SELECT * FROM uzytkownik WHERE login ='$login2'");
                    if (mysqli_num_rows($query_login) > 0) {
                        $record = mysqli_fetch_assoc($query_login);
                        if (password_verify($haslo2, $record["haslo_hash"])) {
                            $user = new Uzytkownik($record["id"], $record["login"], $record["haslo"], $record["id_rola"]);
                            $_SESSION['user'] = $user;
                            header('Location:stronaglowna.php');
                        }
                    }
                } else {
                echo "Podany login już istnieje";
                }
            } else {
                    echo "Podane hasła nie są identyczne";
                }
            }
        }

//                } else {
//                    echo "Podany login już istnieje";
//                } else {
//                    echo "Podane hasła nie są identyczne";
//                }
//            }


//        $sprawdzanieLoginu = mysqli_query($db_connection, "SELECT COUNT(*)ilosc FROM uzytkownik WHERE login ='$login'");
//        $row=mysqli_fetch_array($sprawdzanieLoginu);
//        $ilosc=$row['ilosc'];
//        if($ilosc==0) {
//            mysqli_query($db_connection,"INSERT INTO uzytkownik (login, haslo,id_rola) VALUES ('$login', '$haslo',1)");
//            $query_login = mysqli_query($db_connection, "SELECT * FROM uzytkownik WHERE login ='$login'");
//            if (mysqli_num_rows($query_login) > 0) {
//                $record = mysqli_fetch_assoc($query_login);
//                if ($record["haslo"] == $haslo) {
//                    $user=new Uzytkownik($record["id"], $record["login"],$record["haslo"], $record["id_rola"]);
//                    $_SESSION['user'] = $user;
//                    header('Location:stronaglowna.php');
//                }
//            }
//        }
//        else {
//            echo "Podany login już istnieje";
//        }
        mysqli_close($db_connection);

}

?>

</body>
</html>
