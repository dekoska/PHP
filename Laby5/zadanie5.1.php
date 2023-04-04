<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
$file='';
if(isset($_POST['file']))
    $file=$_POST['file'];
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <tr>
        <td>Wybierz plik: </td>
        <td><input type="file" name="file"></td>
    </tr>
    <tr>
        <td><input type="submit" value="Prześlij"></td>
    </tr>
</form>


<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $fo = fopen($file, "r+");
    $array = array_reverse(file($file));
    foreach ($array as $f) {
        fwrite($fo, $f);
    }
    fclose($fo);
}

?>

</body>
</html>
