<?php session_start();
if(isset($_SESSION['Email'])){
  header('location: Layout.php');
}
?>
<?php
function generateRandomString($length = 90) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
?>

<html>

<head>
  <?php include '../html/Head.html'?>
  <style>
		.table_resetEmail{
			margin: auto;
      text-align: center;
		}
		sup {
			color: red;
		}
    h2 {
        color: darkblue;
    }
    .error {
        color: darkred;
    }
    .success {
        color: darkgreen;
    }
    
  </style>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
    <?php
    if(!isset($_REQUEST['dirCorreo'])){
        echo'
    <p style="color:black;">Introduzca el email de la cuenta cuya contraseña fue olvidada</p>
      <form id="resetEmail" name="resetEmail" method="POST" action="ForgotPassword.php">
        <table class="table_resetEmail">
          <tr><td>Dirección de correo<sup>*</sup> <input required type="email" size="65" id="dirCorreo" name="dirCorreo"></td></tr>
          <tr><td><div id="buttons"><input type="submit" id="submit" value="Enviar"> <input type="reset" id="reset" value="Limpiar"></div></td></tr>
        </table>
      </form>';
    }?>
    </div>
    <div>
      <?php
        
        if(isset($_REQUEST['dirCorreo'])) {
          $email = $_REQUEST['dirCorreo'];
          $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
          if(!$mysqli){
              die("Fallo al conectar con Mysql: ".mysqli_connect_error());
              echo "<span><a href='javascript:history.back()'>Volver</a></span>";
          }
          $sql = "SELECT * FROM usuarios WHERE email=\"".$email."\";";
          $resultado = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
          if(!$resultado){
            echo '<p>No se ha encontrado ninguna cuenta con ese email!</p>';
          }
          $row = mysqli_fetch_array($resultado);
          //Enviar mail de recuperación
          $randomKey = generateRandomString(90);
          mysqli_free_result($resultado);
          $insertSql = "INSERT INTO password_resets(email,clave) VALUES('$email','$randomKey');";

            $to = $email;
            $subject = "Recupera tu contraseña de Quizes";
            $msg = "Hola, click  <a href=\"https://swaimar.000webhostapp.com/Migracion2020-master/php/nuevaContraseña.php?randomKey=" . $randomKey . "\">aquí</a> para recuperar tu contraseña de Quizes.";
            $msg = wordwrap($msg,70);
            $headers = "From: reset@quizes.com". "\r\n";
            $headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
            mail($to, $subject, $msg, $headers);
          
          if(!mysqli_query($mysqli, $insertSql)) {
            die("Fallo al insertar en la BD: " . mysqli_error($mysqli));
            } else {
            echo "<p>Se ha enviado el correo de confirmación (puede encontrarse en spam)</p>";
            }

            mysqli_close($mysqli);

        }
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>

</html>