<?php
session_start();
if(isset($_SESSION['Email'])){
    header('location: Layout.php');
  }
$Questions = $_POST['Questions'];
if($Questions>1000 || $Questions == 0){
    header('location: Layout.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include '../html/Head.html'?>
	<script src="../js/jquery-3.4.1.min.js"></script>
  	<script src="../js/ValidateFieldsQuestion.js"></script>
	<style>
		.table_QuestionForm {
			margin: auto;
		}
		sup {
			color: red;
		}
	</style>
</head>

<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div>
            <?php
            $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
            $correctas =0;
            $incorrectas =0;
                for($i=0;$i<=$Questions;$i++){
                    if(isset($_POST[$i])){
                        $Key = $_POST['Q'.$i];
                        $Response = $_POST[$i];
                        $sql = "SELECT respuestac FROM preguntas WHERE clave = $Key";
                        $resul = mysqli_query($mysqli, $sql);
                        $row = mysqli_fetch_array($resul);
                        if($row['respuestac'] == $Response){
                            $correctas=$correctas+1;
                        } else{
                            $incorrectas=$incorrectas+1;
                        }
                    }
                    $_SESSION['correctas']=$correctas;
                    $_SESSION['incorrectas']=$incorrectas;
                }
                echo" <p>Respuestas correctas: $correctas</p>";
                echo" <p>Respuestas incorrectas: $incorrectas</p>";
                
                echo"<br><br>
                <form method='POST' action='ScoreSave.php'>
                Registra tu partida
                <br>
                <input required type='text' name='nickname' placeholder='nickname'>
                <input type='submit'>
                </form>
                <br>
                <hr/>"
                ;
                echo"<input value='Volver a jugar!' type='button' onclick='window.location.href=\"Play.php\"'>";
            ?>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>

</html>