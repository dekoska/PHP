<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
function dayOfBirth($string){
    return date("D",strtotime($string));
}
function years($string){
    return round((time()-strtotime($string))/60/60/24/365);
}
function howMany($string){
    $howManyDays=round((time()-strtotime($string))/60/60/24);
    $rest=$howManyDays%365;
    return 360-$rest;

}
$orgDate='';
if(isset($_GET['date'])) {
    $orgDate = $_GET['date'];
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <table>
        <tr>
            <td>Wybierz datę urodzenia: </td>
            <td><input type="date" name="date"></td>
        </tr>
        <tr>
        <td><input type="submit" value="Wyślij formularz"></td>
        </tr>
    </table>
</form>

<?php
if(isset($_GET['date'])){
    echo 'Dzień urodzenia '.dayOfBirth($orgDate).'<br>';
    echo 'Ukończone lata: '.years($orgDate).'<br>';
    echo 'Zostało '.howMany($orgDate).' dni do następnych urodzin';
}

?>

</body>
</html>

