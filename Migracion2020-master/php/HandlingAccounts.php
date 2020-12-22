<?php session_start();
if(isset($_SESSION['Email'])){
	if ($_SESSION['Email']!='admin@ehu.es'){
		header('location: Layout.php');
		die('No tienes permiso para entrar en esta pagina');
	}
} else{
	header('location: LogIn.php');
	die('No tienes permiso para entrar en esta pagina');
}
?>
<!DOCTYPE html>
<html>

<head>
	<?php include '../html/Head.html'?>
    <style>
		table{
			margin: auto;
		}
		sup {
			color: red;
		}
		#respuesta{
			margin: auto;
		}
		#numPreguntas{
			margin: auto;
		}
		#tablaRespuestas{
			border: 1px solid black;
			margin: auto;
			background-color: lightblue;
		}
		#tablaRespuestas tr:hover{
			background-color: pink;
		}
		#tablaRespuestas th{
			background-color: #5ebdd3;
			padding : 5px;
		}
		#tablaRespuestas td{
			padding : 5px;
		}
	</style>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
	<div id = div></div>
	<?php
	if(isset($_SESSION['Email'])){
		$mysqli = mysqli_connect($server, $user, $pass, $basededatos);
		if (!$mysqli) {
			die("Fallo al conectar a MySQL: " . mysqli_connect_error());
		}
		$sql = "Select * from usuarios where email!=\"".$_SESSION['Email']."\";";
		$resul = mysqli_query($mysqli, $sql);
		echo '<table border="1px" id="tablaRespuestas" name="tablaRespuestas"><tr><th>Email</th><th>Pass</th><th>Imagen</th><th>Estado</th><th>Bloqueo</th><th>Borrar</th></tr>';
        while($row = mysqli_fetch_array($resul)){
            echo "<tr><td>".$row['email']."</a></td><td>".$row['pass']."</td><td><img height=60px width='55px' src='data:image/png;base64,".$row['imagen']."'/></td><td>".$row['estado']."</td><td><form method='POST' action='ChangeUserState.php'><input type='hidden' name='email' value='".$row['email']."'/><input type='hidden' name='estado' value='".$row['estado']."'/><button type='sumbit' onclick='return confirm(\"¿Estas seguro de que quieres cambiar el estado?\")'>Cambiar estado</button></form></td><td><form method='POST' action='RemoveUser.php'><input type='hidden' name='email' value='".$row['email']."'/><button type='submit' onclick='return confirm(\"¿Estas seguro de que quieres eliminar la cuenta?\")'>Eliminar</button></form></td></tr>";
		}
		echo '</table>';

		// Cerrar conexión
		mysqli_close($mysqli);
		// echo "Close OK.";
		}
	?>
	</section>
	<?php include '../html/Footer.html' ?>
</body>