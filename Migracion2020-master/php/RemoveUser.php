<?php include '../php/DbConfig.php' ?>
<?php
session_start();
if(!isset($_SESSION['Email']) ){
    header('location: Layout.php');
    die("ERROR FATAL");
}
if($_SESSION['Email']!='admin@ehu.es'){
    header('location: Layout.php');
    die("ERROR FATAL");
}
if(isset($_POST['email'])){
$email = $_POST['email'];
$mysqli = mysqli_connect($server, $user, $pass, $basededatos);
if (!$mysqli) {
    die("Fallo al conectar a MySQL: " . mysqli_connect_error());
    echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
}
$sql = "Delete from usuarios WHERE email=\"".$email."\";";

if(!mysqli_query($mysqli, $sql)) {
    die("Fallo al modificar la BD: " . mysqli_error($mysqli));
}
// Cerrar conexión
mysqli_close($mysqli);
// echo "Close OK.";
}
header('location: HandlingAccounts.php');
?>
<?php include '../html/Head.html'?>

