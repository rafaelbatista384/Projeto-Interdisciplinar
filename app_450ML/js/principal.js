         
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