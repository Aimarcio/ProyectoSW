<?php
session_start();
if(isset($_SESSION['Email'])){
    header('location: Layout.php');
  }
?>

<!DOCTYPE html>
<html>

<head>
	<?php include '../html/Head.html'?>
	<script src="../js/jquery-3.4.1.min.js"></script>
  	<script src="../js/ValidateFieldsQuestion.js"></script>
    <script>
    function next(num){
        var idAn = num;
        document.getElementById(idAn).style.display="none";
        var idAc = num+1;
        try{
            document.getElementById(idAc).style.display="";
        } catch (e){
            document.getElementById("FORM").submit();
        }
    }

    function l(cod){
        $.ajax({
            url: 'LikeHandler.php',
            method: 'POST',
            cache: false, 
            data: {
                qid: cod,
                type: "like"
            },
            complete: function () {
                document.getElementById(cod+"dislike").disabled = true;
                document.getElementById(cod+"like").disabled = true;
            }
        });
    }
    function d(cod){
        $.ajax( {
            url: 'LikeHandler.php',
            method: 'POST',
            cache: false, 
            data: {
                qid: cod,
                type: "dislike"
            },
            complete: function () {
                document.getElementById(cod+"dislike").disabled = true;
                document.getElementById(cod+"like").disabled = true;
            }
        });
    }
    </script>
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
            if(isset($_GET['theme'])){
                $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
                if (!$mysqli) {
                    die("Fallo al conectar a MySQL: " . mysqli_connect_error());
                    echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
                }
                $theme = $_GET['theme'];
                $sql = 'SELECT clave, enunciado, imagen, respuestac, respuestai1, respuestai2, respuestai3, Qlike, dislike FROM preguntas WHERE tema ="'.$theme .'"';
                $resul = mysqli_query($mysqli, $sql);
                $cont = 0;
                echo '<form id="FORM" method="POST" action="Score.php">';
                while($row = mysqli_fetch_array($resul)){
                    if($cont==0){
                        echo '<div id="'. $cont .'">';
                    } else{
                        echo '<div style="display: none;" id="'. $cont .'">';
                    }
                    echo $row['enunciado'] . '<br/>';
                    if($row['imagen']){
                    echo "<img width=\"150\" height=\"150\" src=\"data:image/*;base64, ".$row['imagen']."\" alt=\"Sin imagen relacionada\"/><br/>";
                    }
                    $answer = rand(1,4);
                    echo 'Likes: '.$row['Qlike'].' <input type="button" id="'. $row["clave"] .'like" value="Like" onclick="l('. $row["clave"] .');" />';
                    echo ' <input type="button" id="'. $row["clave"] .'dislike" value="Dislike" onclick="d('. $row["clave"] .');"/> Dislikes: '.$row['dislike'].'<br/>';
                    echo ' <input type="hidden" name="Q'.$cont.'" value="'. $row["clave"] .'"/>';
                    switch ($answer){
                        case 1:
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestac'] . '>' . $row['respuestac'] . '<br/>' ;
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai1'] . '>' . $row['respuestai1']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai2'] . '>' . $row['respuestai2']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai3'] . '>' . $row['respuestai3']. '<br/>';
                            break;
                        case 2:
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai1'] . '>' . $row['respuestai1']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestac'] . '>' . $row['respuestac']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai2'] . '>' . $row['respuestai2']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai3'] . '>' . $row['respuestai3']. '<br/>';
                            break;
                        case 3:
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai1'] . '>' . $row['respuestai1']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai2'] . '>' . $row['respuestai2']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestac'] . '>' . $row['respuestac']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai3'] . '>' . $row['respuestai3']. '<br/>';
                            break;
                        case 4:
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai1'] . '>' . $row['respuestai1']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai2'] . '>' . $row['respuestai2']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestai3'] . '>' . $row['respuestai3']. '<br/>';
                            echo '<input type="radio" name="'.$cont.'" value=' . $row['respuestac'] . '>' . $row['respuestac']. '<br/>';
                            break;
                    }
                    echo '<input type="button" onclick="next('.$cont.');" value=" Siguiente"/>';
                    echo '<input type="submit" value="Terminar">';
                    echo '</div>';
                    $cont = $cont+1;
                }
                echo "<input type='hidden' name='Questions' value='$cont-1'>";
                echo '</form>';
                if($cont==0){
                    echo'<form method="GET" action="Play.php">
                <input required name="theme" type="text" placeholder="Escribe el tema que quieras responder"></input>
                <input type="submit"/>
                </form>';
                }
            } else{
                echo'<form method="GET" action="Play.php">
                <input required name="theme" type="text" placeholder="Escribe el tema que quieras responder"></input>
                <input type="submit"/>
                </form>';
            }
            ?>
			
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>

</html>