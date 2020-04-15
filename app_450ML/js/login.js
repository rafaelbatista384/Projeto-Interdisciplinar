//Função para troca de Login

$(document).ready(function(){ 
    $(".login-usuario").hide();
    $(".login-instituicao").hide();

    $("#usuario").click(function(event){
        event.preventDefault();
        $(".login-usuario").show(1500);
        $(".login-instituicao").hide(700);
        $("#capa").hide();
    });

    $("#instituicao").click(function(event){
    event.preventDefault();
    $(".login-usuario").hide(700);
    $(".login-instituicao").show(1500);
    $("#capa").hide();
    }); 
});

//Função para agendamento da doação

var botaoAgendar = document.querySelector("#agendar-doacao");
botaoAgendar.addEventListener("click", function(){
    event.preventDefault();

    var form = document.querySelector("#agendar");

    console.log(form.section.instituicao.value);    
});