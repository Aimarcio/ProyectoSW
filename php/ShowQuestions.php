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
		$mysqli = mysqli_connect("localhost", "root", "", "quiz");
		echo '<table>';
		echo '<tr><th>Preguntas</th></tr>';
		echo '<tr><td>Id</td><td>Email</td><td>Preguntas</td><td>Respuesta correcta</td><td>Respuesta incorrecta 1</td><td>Respuesta incorrecta 2</td><td>Respuesta incorrecta 3</td><td>Dificultad</td><td>Tema</td></tr>';
	  
		$sSQL="Select * From preguntas";
		$result= mysqli_query($mysqli,$sSQL);
		
		
		while($row = mysqli_fetch_array($result))
			{echo '<tr><td>'.$row[0] .'</td><td>'.$row[1] .'</td><td>'.$row[2] .'</td><td>'.$row[3] .'</td><td>'.$row[4] .'</td><td>'.$row[5] .'</td><td>'.$row[6] .'</td><td>'.$row[7] .'</td><td>'.$row[8] .'</td></tr>';}
		
		mysqli_close($mysqli);
	  ?>
	</table>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
