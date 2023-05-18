<?php
include "zadanie7.php";
$id=$_GET['id'];
$db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
$query = "SELECT * FROM samochody WHERE id='$id'";
$result = mysqli_query($db_connection, $query);

$row=mysqli_fetch_array($result);
$make='';
$model='';
$price=0;
$year=0;
$description='';

if(isset($_GET['make']) && isset($_GET['model']) && isset($_GET['price']) && isset($_GET['year']) && isset($_GET['description'])) {
    $make = $_GET['make'];
    $model = $_GET['model'];
    $price = $_GET['price'];
    $year = $_GET['year'];
    $description = $_GET['description'];
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
    <h2>Edytuj samochód</h2>
    <table>
        <tr>
            <td>Podaj marke samochodu</td>
            <td><input type="text" name="make" value="<?php echo $row['marka']?>"></td>
        </tr>
        <tr>
            <td>Podaj model samochodu</td>
            <td><input type="text" name="model" value="<?php echo $row['model']?>"></td>
        </tr>
        <tr>
            <td>Podaj cene samochodu</td>
            <td><input type="text" name="price" value="<?php echo $row['cena']?>"></td>
        </tr>
        <tr>
            <td>Podaj rok produkcji samochodu</td>
            <td><input type="text" name="year" value="<?php echo $row['rok']?>"></td>
        </tr>
        <tr>
            <td>Podaj opis samochodu*</td>
            <td><input type="text" name="description" value="<?php echo $row['opis']?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Wyślij"</td>
        </tr>
    </table>
</form>

<?php
    if($_SERVER["REQUEST_METHOD"]=="GET") {
        if (isset($_SESSION['current_user'])) {
            if (isset($_GET['make']) && isset($_GET['model']) && isset($_GET['price']) && isset($_GET['year']) && isset($_GET['description'])) {
                $db_connection = mysqli_connect("localhost", "root", "", "mojaBaza");
                $current_user = $_SESSION['current_user'];
                $query = "UPDATE samochody SET marka='$make', model='$model', cena='$price', rok='$year', opis='$description' WHERE id='{$id}';";
                if (!$db_connection) {
                    echo "<h2>Błąd połączenia z bazą!</h2>";
                    exit();
                }
                $result = mysqli_query($db_connection, $query);
                if (!$result) {
                    echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
                    exit();
                } else {
                    echo "Edycja samochodu przebiegła pomyślnie";
                    exit();
                }
            }
        }
    }
    ?>