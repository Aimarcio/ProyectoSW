<?php include '../php/DbConfig.php' ?>
<?php
session_start();
if(isset($_SESSION['Email'])){
    header('location: Layout.php');
}
if(!isset($_POST['nickname'])){
    echo 'Nickname invalido, introduzca uno nuevo';
    echo '<form method="POST" action="ScoreSave.php">
            <input required type="text" name="nickname">
        </form>';
} else{

    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
    if (!$mysqli) {
        die("Fallo al conectar a MySQL: " . mysqli_connect_error());
    }
    $nick = $_POST['nickname'];
    $c = $_SESSION['correctas'];
    $i = $_SESSION['incorrectas'];
    $sql = "INSERT INTO resultados(nickname,success,fail) VALUES('$nick','$c','$i');";
            
    if(!mysqli_query($mysqli, $sql)) {
        echo 'Nickname ya utilizado, introduzca uno nuevo';
        echo '<form method="POST" action="ScoreSave.php">
                <input required type="text" name="nickname">
                <input type="submit">
            </form>';
    } else{
         header('location: Layout.php');
    }
}?>