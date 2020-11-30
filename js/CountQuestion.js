$(document).ready(function () {
    setInterval(function (){
            divR = $('#numPreguntas')[0];
            logInMail = getUrlParameter('logInMail');
            $.ajax({
                url:'../xml/Questions.xml', 
                cache: false,
                type: "GET",
                dataType:"xml",
                success: function(data){ 
                    $xml = $(data).find("assessmentItem");
                    var tusPreguntas = 0;
                    $xml.each(function(){
                       if($(this).attr('author')==logInMail){
                           tusPreguntas = tusPreguntas +1;
                       }
                    })
                    
                    divR.innerHTML="<table class='table_QuestionForm'><tr><td>Tus preguntas " + tusPreguntas + " / " + $xml.length + " Preguntas totales</td></tr></table>"; 
                }, 
                error: function(){divR.innerHTML="Error, se reintentara mas tarde";}
            });
        },10000);
});

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};