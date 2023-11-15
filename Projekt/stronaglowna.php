<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Strona główna</title>
    <style>
        input[type=submit]{
            background-color: #b4a485;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
include 'zakladka.php';
$db_connection = mysqli_connect("localhost", "root", "", "blog");
if (!$db_connection) {
    echo "<h2>Błąd połączenia z bazą!</h2>";
    exit();
}
else {
    $result = mysqli_query($db_connection, "SELECT * FROM post WHERE tytul IS NOT NULL ORDER BY data DESC;");
    if (!$result) {
        echo "<h2>Błąd przy wykonywaniu zapytania!</h2>";
        exit();
    } else {
        echo "<div class='page-wrapper'>";
        echo "<div class='post-slider'>";
        echo "<h1 class='slider-title'>Posty</h1>";
        echo "<i class='fas fa-chevron-left prev'></i>";
        echo "<i class='fas fa-chevron-right next'></i>";
        echo "<div class='post-wrapper'>";
        while ($row = mysqli_fetch_array($result)) {
            $resultKom = mysqli_query($db_connection, "SELECT COUNT(*) FROM komentarz WHERE id_post=\"{$row["id"]}\" ORDER BY data DESC;");
            $row2 = mysqli_fetch_row($resultKom);
            echo "<div class='post'>";
            echo "<form action='konkretnypost.php' method='get'>";
            echo "<img src='{$row["lokalizacja_zdjecia"]}' alt='' class='slider-image'>";
            echo "<div class='post-info'>";
            echo "<h3>{$row["tytul"]}</h3>";
            echo "<i class='far fa-calendar'></i> {$row["data"]}";
            echo "<br>";
            echo "Liczba komentarzy: {$row2[0]}\n";
            echo "<br>";
            echo "<input type='hidden' name='id' value='{$row["id"]}'>";
            echo "<input type='submit' value='Zobacz więcej'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
        mysqli_close($db_connection);
    }
}

?>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.post-wrapper').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            nextArrow: $('.next'),
            prevArrow: $('.prev'),
    });
    });
</script>

</body>
</html>
