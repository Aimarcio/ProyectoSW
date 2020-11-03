<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/ValidateFieldsQuestion.js"></script>	
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <p>Introduce los datos de la pregunta a añadir</p>
      <form id='fquestion' name='fquestion' action="AddQuestion.php" on-submit="return patata();">
			<p>Email *</p>
			<input id="email" name="email" type="text">
			<p>Enunciado de la pregunta *</p>
			<input id='pregunta' name="pregunta" type='text'>
			<p>Respuesta correcta *</p>
			<input id='respuesta' name="respuesta" type='text'>
			<p>Respuesta incorrecta 1 *</p>
			<input id='respuesta1' name="respuesta1" type='text'>
			<p>Respuesta incorrecta 2 *</p>
			<input id='respuesta2' name="respuesta2" type='text'>
			<p>Respuesta incorrecta 3 *</p>
			<input id='respuesta3' name="respuesta3" type='text'>
			<p>Dificultad de la pregunta *</p>
			<select id='dificultad' name="dificultad">
				<option value='1'>Baja</option>
				<option value='2'>Media</option>
				<option value='3'>Alta</option>
			</select>
			<p>Tema *</p>
			<input id='tema' type='text' name="tema">
			<input type='submit' value="Enviar" id="submitted"/>
		</form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
