<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <table>
        <tr>
            <td><a href="zadanie7.glowna.php" >Strona główna</a></td>
            <td><a href="zadanie7.wszystkie.php">Wszystkie samochody</a></td>
            <td><a href="zadanie7.dodawanie.php">Dodaj samochód</a></td>
            <?php
            if(isset($_SESSION['current_user_login']) && isset($_SESSION['current_user_id'])) {
                echo "<td><a href='zadanie7.mojesamochody.php'>Moje samochody<a/></td>";
                echo "<td><a href='zadanie7.wylogowanie.php.php'>Wyloguj się<a/></td>";
                }

            ?>
            <td><a href='zadanie7.mojesamochody.php'>Moje samochody<a/></td>
            <td><a href='zadanie7.wylogowanie.php'>Wyloguj się<a/></td>
            <td><a href="zadanie7.logowanie.php">Logowanie</a></td>
        </tr>
    </table>
</form>
</body>
</html>
