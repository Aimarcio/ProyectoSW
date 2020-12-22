
<?php
include '../php/DbConfig.php'?>
<?php
$key = $_POST['qid'];
$type = $_POST['type'];
$mysqli = mysqli_connect($server, $user, $pass, $basededatos);
if (!$mysqli) {
    die("Fallo al conectar a MySQL: " . mysqli_connect_error());
}
if($type=="like"){
    $sql = "UPDATE preguntas SET QLike = Qlike+1 WHERE clave =$key";
}
if($type=="dislike"){
    $sql = "UPDATE preguntas SET dislike = dislike+1 WHERE clave =$key";
}
mysqli_query($mysqli, $sql);
?>