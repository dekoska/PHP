<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
include 'zadanie7.php';
$make='';
$model='';
$price=0;
$year=0;
$description='';

if(isset($_GET['make']) && isset($_GET['model']) && isset($_GET['price']) && isset($_GET['year']) && isset($_GET['description'])){
    $make=$_GET['make'];
    $model=$_GET['model'];
    $price=$_GET['price'];
    $year=$_GET['year'];
    $description=$_GET['description'];
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <table>
    <tr>
        <td>Podaj marke samochodu</td>
        <td><input type="text" name="make"></td>
    </tr>
    <tr>
        <td>Podaj model samochodu</td>
        <td><input type="text" name="model"></td>
    </tr>
        <tr>
            <td>Podaj cene samochodu</td>
            <td><input type="text" name="price"></td>
        </tr>
        <tr>
            <td>Podaj rok produkcji samochodu</td>
            <td><input type="text" name="year"></td>
        </tr>
        <tr>
            <td>Podaj opis samochodu*</td>
            <td><input type="text" name="description"></td>
    </tr>
        <tr>
            <td><input type="submit" value="Wyślij"</td>
        </tr>
    </table>
</form>

<?php
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET['make']) && isset($_GET['model']) && isset($_GET['price']) && isset($_GET['year']) && isset($_GET['description'])) {
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
else {
        $query = "insert into samochody (make, model, price, year, description) values (\"$make\",\"$model\",\"$price\",\"$year\", \"$description\");";
        $result = mysqli_query($db_connection, $query);
        if (!$result) {
            echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
            exit();
        }
        else echo "gituwa wysłane";
    }
}
}
?>

</body>
</html>
