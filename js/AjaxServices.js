XMLHttpRequestObject = new XMLHttpRequest();
var a= false;
var b = false;
XMLHttpRequestObject.onreadystatechange = function()
    {

        if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200)
        {
            var divR = document.getElementById('respuesta');
            var div2= document.getElementById('r');
            var boton = document.getElementById('submit');
            var respuesta=XMLHttpRequestObject.response;
            if(respuesta == 'SI'){
                divR.innerHTML = '<p style="color:green;">Este email es VIP </p>';
                a = true;
            }
            if (respuesta == 'NO'){
                divR.innerHTML = '<p style="color:red;">Este email no es VIP </p>';
                a = false;
            }
            if(respuesta == 'VALIDA'){
                div2.innerHTML = '<p style="color:green;">Contraseña fuerte </p>';
                b = true;            }
            if(respuesta == 'INVALIDA'){
                div2.innerHTML = '<p style="color:red;">Contraseña debil </p>';
                b = false;
            }
            if(respuesta == 'SIN SERVICIO'){
                div2.innerHTML = '<p style="color:red;">Se ha producido un error, intentelo más tarde </p>';
                b = false;
            }
            //Boton desabilitado si la comprobacion de email o la de contraseña han dado false la ultima vez
            if(a&&b){
                boton.disabled=false;
            } else{
                boton.disabled=true;
            }
          
        }
    }
function preguntarEmail(){
    var em = document.getElementById('dirCorreo');
    XMLHttpRequestObject.open("GET","../php/ClientVerifyEnrollment.php?em="+em.value);
    XMLHttpRequestObject.send(null);
}
function preguntarContrasena(){
    var ps = document.getElementById('pass1');
    XMLHttpRequestObject.open("GET","../php/ClientVerifyPass.php?ps="+ps.value+"&t=1010");
    XMLHttpRequestObject.send(null);
}