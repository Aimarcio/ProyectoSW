<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style>
		.table_Questions {
			margin: auto;
      border-collapse: collapse;
    }
    td, th {
      padding: 5px;
    }
    th {
      background-color: #dbd2c3;
    }
    #div1 {
         overflow: scroll;
         height: 100%;
         width: 100%;
    }
    #div1 table {
        width: 95%;
        background-color: lightgray;
    }
	</style>
</head>
<body>
  <?php include '../php/Menus.php'?>
    <section class="main" id="s1">
    <div id = "div1">
<table border="1px" class="table_Questions">
<tr>
<th>Autor</th><th>Enunciado</th><th>Respuesta Correcta</th><th>Respuestas Incorrectas</th><th>Tema</th>
</tr>
  <?php
  $xml = simplexml_load_file("../xml/Questions.xml");
  foreach ($xml->children() as $pregunta){
	echo "<tr><td>" .$pregunta['author']. "</td><td>" .$pregunta->itemBody->p ."</td><td>" .$pregunta->correctResponse->response ."</td><td>".$pregunta->incorrectResponse->response[0]. "</br>" .$pregunta->incorrectResponse->response[1]. "</br>" .$pregunta->incorrectResponse->response[2]. "</td><td>" .$pregunta['subject']. "</td></tr>";
  }
  ?>
</table>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>