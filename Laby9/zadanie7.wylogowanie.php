
<?php
include 'Uzytkownik.php';
include "zadanie7.php";
    if (isset($_SESSION['user'])) {
        session_destroy();
        echo "Zostałeś wylogowany";
}
?>
