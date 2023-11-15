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
    <title>Mój profil</title>
</head>
<body>

<?php
include 'zakladka.php';
$db_connection = mysqli_connect("localhost", "root", "", "blog");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
else {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $result = mysqli_query($db_connection, "SELECT * FROM uzytkownik WHERE login='{$user->getLogin()}';");
        $result1 = mysqli_query($db_connection, "SELECT * FROM post WHERE id_uzytkownik='{$user->getID()}';");
        if (!$result) {
            echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
            exit();
        } else {
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class=mojprofil>";
                echo "<table>";
                echo "<tr>";
                echo "<td><i class='fa fa-user'></i> {$row["login"]}</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<form action='zmienhaslo.php' method='get'>";
                echo "<td><input type='hidden' name=''><input type='submit' value='Zmień hasło'></td>";
                echo "</form>";
                echo "</tr>";
                echo "<tr>";
                echo "<form action='usunprofil.php' method='get'>";
                echo "<td><input type='hidden' name='id'><input type='submit' value='Usuń profil'></td>";
                echo "</form>";
                echo "</tr>";
                if ($user->getIdRola() == 3 || $user->getIdRola() == 2) {
                    echo "<tr>";
                    echo "<form action='usunbloga.php' method='get'>";
                    echo "<td><input type='hidden' name='id'><input type='submit' value='Usuń bloga'></td>";
                    echo "</form>";
                    echo "</tr>";
                }
            }
        }
    }
}
mysqli_close($db_connection);

?>

</body>
</html>
