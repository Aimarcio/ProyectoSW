<div id='page-wrap'>
<header class='main' id='h1'>
  <span class="right"><a href="SignUp.php<?php if(isset($_GET["user"])){ echo '?user='. $_GET["user"];}?>">Registro</a></span>
        <span class="right"><a href="Login.php<?php if(isset($_GET["user"])){ echo '?user='. $_GET["user"];}?>">Login</a></span>
        <span class="right"><a href="LogOut.php">Logout</a></span>

</header>
<nav class='main' id='n1' role='navigation'>

  <span><a href='Layout.php<?php if(isset($_GET["user"])){ echo '?user='. $_GET["user"];}?>'>Inicio</a></span>
  	<?php if(isset($_GET["user"])){
		echo"
  <span><a href='QuestionForm.php?user=". $_GET["user"] ."'> Insertar Pregunta</a></span>
  <span><a href='ShowQuestions.php?user=". $_GET["user"] ."'> Ver Preguntas</a></span>
    ";}?>
  <span><a href='Credits.php<?php if(isset($_GET["user"])){ echo '?user='. $_GET["user"];}?>'>Creditos</a></span>

</nav>

