<!DOCTYPE html>
<html>

<head>
  <?php include '../html/Head.html' ?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
      <!--Código PHP para añadir una pregunta sin imagen-->
      <br/>
      <?php
        // Realizar conexion php
        $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
        if (!$mysqli) {
          die("Fallo al conectar a MySQL: " . mysqli_connect_error());
        }
        // Operar
        // echo "Connection OK.";
        $sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema) VALUES('$_REQUEST[Direccion_de_correo]', '$_REQUEST[Pregunta]', '$_REQUEST[Respuesta_correcta]', '$_REQUEST[Respuesta_incorrecta_1]', '$_REQUEST[Respuesta_incorrecta_2]', '$_REQUEST[Respuesta_incorrecta_3]', '$_REQUEST[complejidad]', '$_REQUEST[tema]');";
        if(!mysqli_query($mysqli, $sql)) {
          die("Fallo al insertar en la BD: " . mysqli_error($mysqli));
        }
        echo "Pregunta guardada en la BD";
        // Cerrar conexión
        !mysqli_close($mysqli);
        // echo "Close OK.";
		
		
		
		//XML
		$xml = simplexml_load_file('../xml/Questions.xml');
		$assessmentItem = $xml->addChild('assessmentItem');
		$assessmentItem->addAttribute('subject',$_REQUEST['tema']);
		$assessmentItem->addAttribute('author', $_REQUEST['Direccion_de_correo']);
		$itemBody = $assessmentItem->addChild('itemBody');
		$itemBody->addChild('p',$_REQUEST['Pregunta']);
		
		$correctResponse = $assessmentItem->addChild('correctResponse');
		$correctResponse->addChild('response',$_REQUEST['Respuesta_correcta']);
		
		$incorrectResponse = $assessmentItem->addChild('incorrectResponse');
		$incorrectResponse->addChild('response',$_REQUEST['Respuesta_incorrecta_1']);
		$incorrectResponse->addChild('response',$_REQUEST['Respuesta_incorrecta_2']);
		$incorrectResponse->addChild('response',$_REQUEST['Respuesta_incorrecta_3']);
		if($xml->asXML()){
			echo '<p>Se ha guardado correctamente en XML</p>';
		} else{
			echo '<p>No se ha podido guardar en XML</p>';
		}
		$xml->asXML('../xml/Questions.xml');
      ?>
      <br/>
      <span><a href='ShowQuestions.php'>Ver preguntas de la BD</a></span>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>