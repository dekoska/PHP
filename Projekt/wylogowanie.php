<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wylogowanie</title>
</head>
<body>

<?php
include "zakladka.php";
    if (isset($_SESSION['user'])) {
        session_destroy();
        header("Location:stronaglowna.php");
}
?>

</body>
</html>
