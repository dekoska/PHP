<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$login='';
$haslo='';
$login=$_POST['login'];
$haslo=$_POST['haslo'];
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <fieldset><legend>Zaloguj się</legend>
    <table>
        <tr>
            <td>Login </td>
            <td><input type="email" name="login"</td>
        </tr>
        <tr>
            <td>Hasło </td>
            <td><input type="text" name="haslo"</td>
        </tr>
        <tr>
            <td><input type="submit" value="Prześlij"></td>
        </tr>
    </table>
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $array=str_split($haslo);
    if(count($array)<10){
        echo "Podano błędne hasło";
        return false;
    }
    else echo "Twój login to: $login\nTwoje hasło to: $haslo";
}
?>

</body>
</html>

