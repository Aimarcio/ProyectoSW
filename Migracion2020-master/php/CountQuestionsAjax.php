<?php session_start();
if(isset($_SESSION['Email']) && $_SESSION['Email']!='admin@ehu.es'){
$xml = simplexml_load_file("../xml/Questions.xml");
$his = 0;
foreach ($xml->children() as $pregunta){
    if($pregunta['author'] == $_SESSION['Email']){
        $his = $his +1;
    }
}
echo "<table class='table_QuestionForm'><tr><td>Tus preguntas " . $his . " / " .count($xml) . " Preguntas totales</td></tr></table>";
} else{
    die("Error inesperado");
}
?>