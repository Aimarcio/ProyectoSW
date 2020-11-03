<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

		<?php
		if(empty($_GET["email"])){
			die('Error: Email vacio');
		}
		$email = $_GET["email"];
		if(preg_match("/[a-z]{2,}[0-9]{3,3}@ikasle\.ehu\.eu{0,1}s/",$email)!==1 && preg_match("/[a-z]{2,}\.[a-z]{2,}@ehu\.eu{0,1}s/",$email)!==1 && preg_match("/[a-z]{2,}@ehu\.eu{0,1}s/",$email)!==1){
			die('Error: Email no valido');
		}
		if(empty($_GET["pregunta"])){
			die('Error: Pregunta vacia');
		}
		if(empty($_GET["respuesta"])){
			die('Error: Respuesta/s vacia/s');
		}
		if(empty($_GET["respuesta1"])){
			die('Error: Respuesta/s vacia/s');
		}
		if(empty($_GET["respuesta2"])){
			die('Error: Respuesta/s vacia/s');

		}
		if(empty($_GET["respuesta3"])){
			die('Error: Respuesta/s vacia/s');
			
		}
		if(empty($_GET["tema"])){
			die('Error: Tema vacio');
			
		}
		if(empty($_GET["dificultad"])){
			die('Error: Dificultad vacia');
			
		}
		$link = mysqli_connect("localhost", "id14879003_aimarcio", "", "id14879003_quiz");
		$sql="INSERT INTO `preguntas` (`Id`, `Email`, `Pregunta`, `Respuesta correcta`, `Respuesta incorrecta 1`, `Respuesta incorrecta 2`, `Respuesta incorrecta 3`, `Dificultad`, `Tema`) VALUES(NULL, '$_GET[email]','$_GET[pregunta]','$_GET[respuesta]','$_GET[respuesta1]','$_GET[respuesta2]','$_GET[respuesta3]','$_GET[dificultad]','$_GET[tema]')";
		if (!mysqli_query($link ,$sql))
		{
			die('Error: ' . mysqli_error($link));
		}
		echo "1 record added";
		mysqli_close($link);
		?>


    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
