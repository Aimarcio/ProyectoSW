 <!DOCTYPE html>
<html>
<head>
 <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<form id='register' method="POST" name='register' onSubmit="SignUp.php">
		<p>Email *</p>
			<input id="email" name="email" type="text">
		<p>Nombre *</p>
			<input id="nombre" name="nombre" type="text">
		<p>Apellido *</p>
			<input id="apellido1" name="apellido1" type="text">
		<p>Apellido 2 *</p>
			<input id="apellido2" name="apellido2" type="text">
		<p>Contraseña *</p>
			<input id="contraseña" name="contraseña" type="password">
		<p>Repetir contraseña *</p>
			<input type="password" id="password" name="password">
		<br>
		<button type="submit" name="submit" id="submit" >Enviar</button>
	</form>
	
	<?php
		if(isset($_POST["email"])){
		if(empty($_POST["email"])){
			die('Error: Email vacio');
		}
		$email = $_POST["email"];
		if(preg_match("/[a-z]{2,}[0-9]{3,3}@ikasle\.ehu\.eu{0,1}s/",$email)!==1 && preg_match("/[a-z]{2,}\.[a-z]{2,}@ehu\.eu{0,1}s/",$email)!==1 && preg_match("/[a-z]{2,}@ehu\.eu{0,1}s/",$email)!==1){
			die('Error: Email no valido');
		}
		if(empty($_POST["nombre"])){
			die('Error: Nombre vacio');
		}
		if(empty($_POST["apellido1"])){
			die('Error: Apellido1 vacio');
		}
		if(empty($_POST["apellido2"])){
			die('Error: Apellido2 vacio');
		}
		if(empty($_POST["contraseña"])){
			die('Error: Contraseña vacia');
		}
		if(empty($_POST["password"])){
			die('Error: Contraseña no repetida');
		}
		if(strlen($_POST["contraseña"])<6){
			die('Error: La contraseña es demasiado corta');
		}
		if(strcmp($_POST["contraseña"],$_POST["password"])){
			die('Error: Las contraseñas no coinciden');
		}
		
		$link = mysqli_connect("localhost", "id14879003_aimarcio", "hrYc7@vR^+DuSNxd", "id14879003_quiz");
		$sql="INSERT INTO `usuarios` ( `email`, `nombre`, `apellido`, `apellido 2`, `password`) VALUES('$_POST[email]','$_POST[nombre]','$_POST[apellido1]','$_POST[apellido2]','$_POST[contraseña]')";
		if (!mysqli_query($link ,$sql))
		{
			die('Error: ' . mysqli_error($link));
		}else{
			echo 'Registrado el usuario ' . $_POST["email"];
		}
		}
		?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>