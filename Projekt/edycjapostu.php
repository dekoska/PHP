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
    <title>Edycja postu</title>
</head>
<body>

<?php
include 'zakladka.php';

function query($query){
    $db_connection = mysqli_connect("localhost", "root", "", "blog");
    $result = mysqli_query($db_connection, $query);
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    } else {
        mysqli_close($db_connection);
    }
}

if(isset($_GET['id'])){
    $_SESSION['idpostu']=$_GET['id'];
}

$db_connection = mysqli_connect("localhost", "root", "", "blog");
$query = "SELECT * FROM post WHERE id='{$_SESSION['idpostu']}'";
$result = mysqli_query($db_connection, $query);
$row=mysqli_fetch_array($result);

$tytul='';
$tresc='';

if(isset($_POST['tytul']) && isset($_POST['tresc'])){
    $post1  = new Post();
    $post1->setTytul($_POST['tytul']);
    $post1->setTresc($_POST['tresc']);
}

?>

<div class="dodawanie-postu">
<form action="edycjapostu.php" method="post" enctype="multipart/form-data">
    <div class="tresc">
    <h2>Edytuj post</h2>
        <br>
    <table>
        <tr>
            <td>Tytuł postu:</td>
            <td><input type="text" name="tytul" maxlength="200" value="<?php echo $row['tytul']?>"></td>
        </tr>
        <tr>
            <td>Treść postu:</td>
            <td><TEXTAREA name="tresc"><?php echo $row['tresc']?></TEXTAREA></td>
        </tr>
        <tr>
            <td>Zdjęcie:*</td>
            <td><input type="file" name="zdjecie"></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
            <td><input type="submit" value="Edytuj post" name="submit"</td>
        </tr>
    </table>
    </div>
</form>
</div>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {

    if(!empty($_FILES['zdjecie']['name'])) {
        $zdjecie = $_FILES['zdjecie'];

        $zdjecieNazwa = $_FILES['zdjecie']['name'];
        $zdjecieTmpNazwa = $_FILES['zdjecie']['tmp_name'];
        $zdjecieRozmiar = $_FILES['zdjecie']['size'];
        $zdjecieError = $_FILES['zdjecie']['error'];
        $zdjecieTyp = $_FILES['zdjecie']['type'];

        $zdjecieRozsz = explode('.', $zdjecieNazwa);
        $zdjecieWlasciweRozsz = strtolower(end($zdjecieRozsz));

        $dozwoloneRozsz = array('jpg', 'jpeg', 'png');

        if (in_array($zdjecieWlasciweRozsz, $dozwoloneRozsz)) {
            if ($zdjecieError == 0) {
                if ($zdjecieRozmiar < 500000) {
                    $zdjecieNowaNazwa = uniqid('', true) . "." . $zdjecieWlasciweRozsz;
                    $lokalizacjaPliku = 'Zdjecia/' . $zdjecieNowaNazwa;
                    $post1->setLokalizacjaZdjecia($lokalizacjaPliku);
                    move_uploaded_file($zdjecieTmpNazwa, $lokalizacjaPliku);
                    $queryLok = "UPDATE post SET lokalizacja_zdjecia='{$post1->getLokalizacjaZdjecia()}' WHERE id='{$_SESSION['idpostu']}'";
                    query($queryLok);
                } else {
                    echo "Twoje zdjęcie jest za duże";
                }
            } else {
                echo "Błąd przy dodawaniu twojego zdjęcia";
            }
        } else {
            echo "Nie można dodać zdjęcia takiego typu";
        }
    }

    if(isset($_POST['tresc']) && isset($_POST['tytul'])) {
        $queryTT = "UPDATE post SET tytul='{$post1->getTytul()}', tresc='{$post1->getTresc()}' WHERE id='{$_SESSION['idpostu']}'";
        query($queryTT);
    }

    header('Location:mojeposty.php');
}

?>

</body>
</html>
