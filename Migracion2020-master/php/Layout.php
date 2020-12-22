<?php session_start()?>
<!DOCTYPE html>
<html>
   <head>
      <?php include '../html/Head.html'?>
      <script>// easter egg
document.addEventListener("DOMContentLoaded",t);function t(){window.addEventListener("keydown",e)}let n=0;function e(t){const e="copyright".split("");const o=t.key.toLowerCase();if(e[n]===o){n++;if(n===e.length){document.body.style.transition="all .5s ease-out";document.body.style.filter="invert(1)";document.body.style.transform="rotateY(180deg) rotateX(180deg)"}}else{n=0;document.body.style.filter="";document.body.style.transform=""}}</script>
      <style>
      #tablaRespuestas{
			border: 1px solid black;
			margin: auto;
         margin-top:10px;
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
         #s1 {
          background-image: url("../images/quiz.png");
          background-position: center; /* Center the image */
          background-repeat: no-repeat; /* Do not repeat the image */
          background-size: auto; /* Resize the background image to cover the entire container */
          /*background-image: linear-gradient(red, yellow);*/
         }
         h2 {
          color: darkblue;
         }
      </style>
   </head>
   <body>
      <?php include '../php/Menus.php' ?>
      <section class="main" id="s1">
         <div id = "div_quiz">
            <h2>Quiz: el juego de las preguntas</h2>
            <?php
            $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
            if (!$mysqli) {
                die("Fallo al conectar a MySQL: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM resultados ORDER BY success desc LIMIT 10";
            $resul = mysqli_query($mysqli, $sql);
            echo '<h3>TOP TEN PLAYERS</h3>';
            echo '<table id="tablaRespuestas">
                  <tr><th>Nickname</th><th>Aciertos</th><th>Fallos</th></tr>';
            while($row = mysqli_fetch_array($resul)){
               echo '<tr>';
               echo "<td>".$row['nickname']."</td>";
               echo "<td>".$row['success']."</td>";
               echo "<td>".$row['fail']."</td>";
               echo '</tr>';
            }
            echo '</table>';
            ?>
         </div>
      </section>
      <?php include '../html/Footer.html' ?>
   </body>
</html>