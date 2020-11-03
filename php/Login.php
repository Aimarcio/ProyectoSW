 <!DOCTYPE html>
<html>
<head>
 <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<form id='register' method="POST" name='register' onSubmit="Login.php">
		<p>Email *</p>
			<input id="email" name="email" type="text">
		<p>Contraseña *</p>
			<input id="contraseña" name="contraseña" type="password">
		<br>
		<button type="submit" name="submit" id="submit" >Enviar</button>
	</form>
	
	<?php
		if(isset($_POST["email"])){
			if(empty($_POST["email"])){
				die('Error: Email vacio');
			}
			if(empty($_POST["contraseña"])){
				die('Error: Contraseña vacia');
			}
			$link = mysqli_connect("localhost", "id14879003_aimarcio", "hrYc7@vR^+DuSNxd", "id14879003_quiz");
			$sql="Select * From usuarios Where email = '$_POST[email]' and password = '$_POST[contraseña]'";
			$result= mysqli_query($link,$sql);
			$row = mysqli_num_rows($result);
			if($row ==1){
				$email = $_POST["email"];
				echo("<script> alert ('BIENVENIDO AL SISTEMA:". $email . "')</script>");
				echo("Login correcto<p><a href='Layout.php?user=". $email ."'>Pinche aquí para verificar que no es un robot</a>");
			}else{
				echo 'Usuario no valido';
			}
		}
		?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>