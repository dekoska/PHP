<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php
function pathFile($arg1, $arg2, $option){
    $path=$arg1;
    $catalog=$arg2;
    $opt=$option;

    if($opt=='read'){
        if (is_dir($path)){
            if ($dh = opendir($path)){
                while (($file = readdir($dh)) !== false){
                    echo "$file<br>";
                }
                closedir($dh);
            }
        }
    }

    else if($opt=='delete'){
        if(file_exists($path.'/'.$catalog)){
            rmdir($path.'/'.$catalog);
            echo "Katalog został usunięty";
        }
        else{
            echo "Katalog nie istnieje, nie można usunąć";
        }
    }

    else if($opt=='create'){
        if(file_exists($path.'/'.$catalog)){
            echo "Katalog już istnieje, nie można utworzyć";
        }
        else{
            mkdir($path.'/'.$catalog);
            echo "Katalog został utworzony";
        }
    }
}


$arg1='';
$arg2='';
$option='';
if(isset($_POST['arg1']) && isset($_POST['arg2']) && isset($_POST['option'])){
    $arg1=$_POST['arg1'];
    $arg2=$_POST['arg2'];
    $option=$_POST['option'];
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
    <table>
    <tr>
        <td>Podaj ścieżke: </td>
        <td><textarea name="arg1"></textarea></td>
    </tr>
    <tr>
        <td>Podaj nazwe katalogu: </td>
        <td><textarea name="arg2"></textarea></td>
    </tr>
    <tr>
        <td>Opcje: </td>
        <td><select name="option">
        <option value="read">Read</option>
        <option value="delete">Delete</option>
        <option value="create">Create</option>
        </select></td>
    </tr>
        <tr>
            <td><input type="submit" value="Prześlij"></td>
        </tr>
    </table>
</form>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    pathFile($arg1, $arg2,$option);
}
?>

</body>
</html>
