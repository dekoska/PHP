<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
include "zadanie7.php";
    if (isset($_SESSION['current_user_login']) && isset($_SESSION['current_user_id'])) {
        session_destroy();
        echo $_SESSION['current_user_login'];;
        echo "Zostałeś wylogowany";
}
?>

</body>
</html>
