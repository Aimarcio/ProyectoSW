XMLHttpRequestObject = new XMLHttpRequest();
var a= false;
var b = false;
XMLHttpRequestObject.onreadystatechange = function()
    {
        if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200)
        {
            var divR = document.getElementById('respuesta');
            var boton = document.getElementById('submit');
            var respuesta=XMLHttpRequestObject.response;
            if(respuesta == 'VALIDA'){
                divR.innerHTML = '<p style="color:green;">Contraseña fuerte </p>';
                b = true;            }
            if(respuesta == 'INVALIDA'){
                divR.innerHTML = '<p style="color:red;">Contraseña debil </p>';
                b = false;
            }
            if(respuesta == 'SIN SERVICIO'){
                divR.innerHTML = '<p style="color:red;">Se ha producido un error, intentelo más tarde </p>';
                b = false;
            }
            //Boton desabilitado si la comprobacion de email o la de contraseña han dado false la ultima vez
            if(b){
                boton.disabled=false;
            } else{
                boton.disabled=true;
            }
          
        }
    }


//Esta parte se utiliza en restablecimiento de contraseña
function preguntarContrasenaRestablecida(){
    var ps = document.getElementById('nuevaContraseña');
    XMLHttpRequestObject.open("GET","../php/ClientVerifyPass.php?ps="+ps.value+"&t=1010");
    XMLHttpRequestObject.send(null);
}