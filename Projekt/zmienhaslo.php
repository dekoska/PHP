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
    <title>Zmiana hasła</title>
</head>
<body>

<?php
include 'zakladka.php';

$noweHaslo='';
$noweHaslo1='';
$stareHaslo='';

if(isset($_POST['starehaslo']) && isset($_POST['nowehaslo']) && isset($_POST['nowehaslo1'])){
    $noweHaslo=$_POST['nowehaslo'];
    $noweHaslo1=$_POST['nowehaslo1'];
    $stareHaslo=$_POST['starehaslo'];
}
?>

<div class="zmien-haslo">
<form action="zmienhaslo.php" method="post">
    <h2>Zmień hasło<br></h2>
        <p>Stare hasło</p>
        <p><input type="password" name="starehaslo" required></p>
        <p>Nowe hasło</p>
        <p><input type="password" name="nowehaslo" required></p>
        <p>Nowe hasło</p>
        <p><input type="password" name="nowehaslo1" required></p>
        <p><input type="submit" value="Zmień hasło"</p>
</form>
</div>

<?php
$user=$_SESSION['user'];
if(isset($_POST['starehaslo']) && isset($_POST['nowehaslo']) && isset($_POST['nowehaslo1'])) {
    $db_connection = mysqli_connect("localhost", "root", "", "blog");
    if (!$db_connection) {
        echo "<h2>Błąd połączenia z bazą!</h2>";
        exit();
    } else {
        $query_login = mysqli_query($db_connection, "SELECT * FROM uzytkownik WHERE login ='{$user->getLogin()}'");
        if (mysqli_num_rows($query_login) > 0) {
            $record = mysqli_fetch_assoc($query_login);
            if ($record["haslo"] == $stareHaslo) {
                if ($noweHaslo == $noweHaslo1) {
                    $hasloHash = password_hash($noweHaslo, PASSWORD_DEFAULT);
                    $query_login = mysqli_query($db_connection, "UPDATE uzytkownik SET haslo ='$noweHaslo', haslo_hash='$hasloHash' WHERE id='{$user->getID()}'");
                    header('Location:mojprofil.php');
                } else echo "Nowe hasła nie są identyczne";
            } else echo "Podano błędne stare hasło";
        }
    }
    mysqli_close($db_connection);
}
?>

</body>
</html>

