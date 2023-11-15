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
    <title>Kontakt z autorem</title>
</head>
<body>


<?php
include 'zakladka.php';

$imie='';
$email='';
$tytul='';
$wiadomosci='';

if(isset($_POST['imie']) && isset($_POST['email']) && isset($_POST['tytul']) && isset($_POST['wiadomosc'])){
    $imie=$_POST['imie'];
    $email=$_POST['email'];
    $tytul=$_POST['tytul'];
    $wiadomosci=$_POST['wiadomosc'];
}

?>
<form action="kontaktzautorem.php" method="post"">
    <div class="kontakt-autor">
           <div class="tytul">
               <h2>Formularz kontaktowy</h2>
           </div>
        <p>Imię: <input type="text" name="imie"</p>
        <p>Adres email: <input type="email" name="email"</p>
        <p>Tytuł wiadomości: <input type="text" name="tytul"></p>
        <p>Wiadomość: <input type="textarea" name="wiadomosc"</p>
        <p><input type="submit" value="Wyślij maila"></p>
    </div>
</form>

<?php
if(isset($_POST['imie']) && isset($_POST['email']) && isset($_POST['tytul']) && isset($_POST['wiadomosc'])){
    ini_set(mail("zosiadekowska@gmail.com", "$tytul","$wiadomosci.\nOd: $imie, $email"));
}

?>


</body>
</html>

