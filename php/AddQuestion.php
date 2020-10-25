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
		$link = mysqli_connect("localhost", "root", "", "quiz");
		$sql="INSERT INTO `preguntas` (`Id`, `Email`, `Pregunta`, `Respuesta correcta`, `Respuesta incorrecta 1`, `Respuesta incorrecta 2`, `Respuesta incorrecta 3`, `Dificultad`, `Tema`) VALUES(NULL, '$_GET[email]','$_GET[pregunta]','$_GET[respuesta]','$_GET[respuesta1]','$_GET[respuesta2]','$_GET[respuesta3]','$_GET[dificultad]','$_GET[tema]')";
		if (!mysqli_query($link ,$sql))
		{
			die('Error: ' . mysqli_error($link));
		}
		echo "1 record added";
		echo "<p> <a href='ShowQuestions.php'> Ver registros </a>";
		mysqli_close($link);
		?>


    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
