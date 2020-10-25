function patata(){
var form = $('#fquestion');
var $email = $("#email").val();
var $pregunta = $('#pregunta').val();
var $respuesta = $('#respuesta').val();
var $respuesta1 = $('#respuesta1').val();
var $respuesta2 = $('#respuesta2').val();
var $respuesta3 = $('#respuesta3').val();
var $dificultad = $('#dificultad').val();
var $tema = $('#tema').val();
if($email.length<1){
	alert("Introduce un valor en el email");
        return false;
}
if($pregunta.length<1){
	alert('Introduce un valor en el pregunta');
        return false;
}
if($respuesta == ''){
	alert('Introduce un valor en el respuesta');
        return false;
}if($respuesta1 == ''){
	alert('Introduce un valor en el respuesta 1');
        return false;
}
if($respuesta2 == ''){
	alert('Introduce un valor en el respuesta 2');
        return false;
}if($respuesta3 == ''){
	alert('Introduce un valor en el respuesta 3');
        return false;
}
if($tema == ''){
	alert('Introduce un valor en el tema');
        return false;
}
var regular = /[a-z]{2,}[0-9]{3,3}@ikasle.ehu.eu{0,1}s/;

var regularProfe = /[a-z]{2,}.[a-z]{2,}@ehu.eu{0,1}s/;
var regularProfe2 = /[a-z]{2,}@ehu.eu{0,1}s/;
if (regular.test($email)){
	return true;
}
if (regularProfe.test($email)){
	return true;
}
if (regularProfe2.test($email)){
	return true;
}
alert("Introduce un email valido");
return false;

}
	