$(document).ready(function () {
    setInterval(function (){
            divR = $('#numPreguntas')[0];
            $.ajax({
                url:'../php/CountQuestionsAjax.php', 
                cache: false,
                type: "GET",
                success: function(data){ 
                    /*
                    obsoleto
                    $xml = $(data).find("assessmentItem");
                    var tusPreguntas = 0;
                    $xml.each(function(){
                       if($(this).attr('author')==logInMail){
                           tusPreguntas = tusPreguntas +1;
                       }
                    })*/
                    
                    //divR.innerHTML="<table class='table_QuestionForm'><tr><td>Tus preguntas " + tusPreguntas + " / " + $xml.length + " Preguntas totales</td></tr></table>"; 
                    divR.innerHTML= data;
                }, 
                error: function(){divR.innerHTML="Error, se reintentara mas tarde";}
            });
        },10000);
});