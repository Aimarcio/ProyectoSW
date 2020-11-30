XMLHttpRequestObject = new XMLHttpRequest();
XMLHttpRequestObject.onreadystatechange = function()
    {
        if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200)
        {
            var divR = document.getElementById('respuesta');
            var respuesta=XMLHttpRequestObject.responseXML;
            var xml = respuesta.getElementsByTagName('assessmentItem');
            divR.innerHTML = '<table id="tablaRespuestas"><tr><th>Autor</th><th>Enunciado</th><th>Respuesta correcta</th></tr></table>'
            var tabR = document.getElementById('tablaRespuestas');
            for(i=0;i<xml.length; i++){
                var autor = xml[i].getAttribute('author');
                var enunciado = xml[i].getElementsByTagName('itemBody')[0].getElementsByTagName('p')[0].textContent;
                var rCorrecta = xml[i].getElementsByTagName('correctResponse')[0].getElementsByTagName('response')[0].textContent;
                tabR.insertAdjacentHTML("beforeend","<tr><td>"+ autor +"</td><td>"+ enunciado +"</td><td>"+ rCorrecta +"</td><tr>");
            }
        }
    }
function mostrarAjax(){
    XMLHttpRequestObject.open("GET","../xml/Questions.xml");
    XMLHttpRequestObject.send(null);
}
function insertarPreguntas(form){
    var form = document.getElementById('fquestion');
    var str = new FormData(form);
    var divR = $('#respuesta')[0];
    $.ajax( {
        url: 'AddQuestionWithImage.php',
        method: 'POST',
        contentType: false,
        processData: false,
        cache: false, 
        data: str, 
        success:function(){divR.insertAdjacentHTML("beforebegin","<p>Pregunta insertada correctamente</p>"); mostrarAjax();}, 
        error:function(){divR.insertAdjacentHTML("beforebegin","<p>No se ha podido insertar la pregunta</p>");} 
    });
}