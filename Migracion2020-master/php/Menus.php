<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/ShowAndHide.js"></script>
<?php include '../php/DbConfig.php' ?>

<style>
  p {
    color: maroon;
  }
</style>
<div id='page-wrap'>
<header class='main' id='h1'>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="../js/Google.js"></script>


  <?php
  echo'<div class="g-signin2" data-onsuccess="onSignIn"></div>';
  ?>

  <span id="registro"><a href="SignUp.php">Registro</a></span>
  <span id="login" ><a href="LogIn.php">Login</a></span>
  <?php if(isset($_SESSION['Email'])){echo $_SESSION['Email'];}
        else{echo '<a href="ForgotPassword.php">Modificar contraseña</a>';} ?>
  <?php if(isset($_SESSION['Image']) && $_SESSION['Image']!=null ){echo '<img height=60px width="55px" src="data:image/png;base64,'.$_SESSION['Image'].'"/>';} ?>
  <?php
  if(!isset($_SESSION['platform'])){
    echo'<span id="logout" ><a href="LogOut.php">Logout</a></span>';
  }else{
    echo'<a href="#" onclick="signOut();">Sign out</a>';
  }
  ?>
  <meta name="google-signin-client_id" content="162648757814-8ip276p1glkv4eklronkdfsevt473hqm.apps.googleusercontent.com">
  <!--<span id="logout" class="right" style="display:none;"><a href="/logout">Logout</a></span>-->
</header>
<nav class='main' id='n1' role='navigation'>
  <!--
  <span id="inicio"><a id="ini" href='Layout.php'>Inicio</a></span>
  <span id="insertar"><a id="ins" href='QuestionFormWithImage.php'>Insertar pregunta</a></span>
  <span id="creditos"><a id="cre" href='Credits.php'>Creditos</a></span>
  <span id="verBD"><a id="ver" href='ShowQuestionsWithImage.php'>Ver preguntas BD</a></span>
  <!--<span><a href='ShowQuestions.php'>Ver preguntas BD</a></span>-->
  <!--<span><a href='prueba.php'>DebugPHP</a></span>-->
  <?php
    if(isset($_SESSION['Rol'])) {
      echo "<span id='inicio'><a id='ini' href='Layout.php'>Inicio</a></span>";
      if($_SESSION['Rol']!='Admin'){
        echo "<span id='QuizAjax'> <a id='QuizAjax' href='HandlingQuizesAjax.php'>HandlingQuizesAjax</a> </span>";
      } else{
        echo "<span id='HandlingAcc'> <a id='HandlingAcc' href='HandlingAccounts.php'>HandlingAccounts</a> </span>";
      }
      echo "<span id='creditos'> <a id='cre' href='Credits.php'> Creditos </a> </span>";
      //echo "<script> $(\"#h1\").append(\"<img/>\");";
      echo "<script> showOnLogIn(); </script>";
    } else {
      echo "<span id='inicio'><a id='ini' href='Layout.php'>Inicio</a></span>";
      echo "<span id='creditos'> <a id='cre' href='Credits.php'> Creditos </a> </span>";
      echo "<span id='play'> <a id='pla' href='Play.php'> A jugar! </a> </span>";
      echo "<script> showOnNotLogIn(); </script>";
    }

    function getImagenDeBD(){
      $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
      if(!$mysqli){
          die("Error: ".mysqli_connect_error);
          echo "<span><a href='javascript:history.back()'>Volver</a></span>";
      }
      $sql = "SELECT imagen FROM usuarios WHERE email=\"".$logInMail."\";";
      $resul = mysqli_query($mysqli,$sql, MYSQLI_USE_RESULT);
      if(!$resul){
          die("Error: ".mysqli_error($mysqli));
          echo "<span><a href='javascript:history.back()'>Volver</a></span>";
      }
      $img = mysqli_fetch_array($resul);
      return $img['imagen'];
    }
  ?>
</nav>
