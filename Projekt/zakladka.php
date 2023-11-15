<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--   slick carousel-->
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

    <!--    font awesome-->
    <script src="https://kit.fontawesome.com/2e7b59b105.js" crossorigin="anonymous"></script>
    <!--    google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!--    custom styling-->
    <link rel="stylesheet" href="css/style.css">

    <title>Zakładka</title>
</head>

<?php
include 'Uzytkownik.php';
include 'Post.php';
include 'Komentarz.php';
session_start();
?>

<body>
<header>
    <div class="logo">
        <h1 class="logo-text"><span>Kochamy</span>Kotki</h1>
    </div>
    <i class="fa fa-bars menu-toggle"></i>
    <ul>
        <li><a href="stronaglowna.php" >Strona główna</a></li>
        <?php
        if(isset($_SESSION['user']))
        $user=$_SESSION['user'];
        if(empty(isset($_SESSION['user'])) || $user->getIdRola()==2 || $user->getIdRola()==1){
            echo "<li><a href='kontaktzautorem.php'>Kontakt</a></li>";
        }
        if(empty(isset($_SESSION['user']))) {
            echo "<li><a href='logowanie.php'>Zaloguj się<a/></li>";
        }
        if(isset($_SESSION['user'])) {
            echo "<li>";
            echo "<a href='mojprofil.php'><i class='fa fa-user'></i> Mój profil <i class='fa fa-chevron-down' font-size='.0.8em'></i></a>";
            echo "<ul>";
            if($user->getIdRola()==3 || $user->getIdRola()==2 ){
                echo "<li><a href='dodawaniepostu.php'>Dodaj post<a/></li>";
                echo "<li><a href='mojeposty.php'>Moje posty<a/></li>";
            }
            echo "<li><a href='wylogowanie.php'>Wyloguj się<a/></li>";
            echo "</ul>";
            echo "</li>";
            echo "</ul>";
        }
        ?>
    </ul>
</header>

</div>
</body>
</html>
