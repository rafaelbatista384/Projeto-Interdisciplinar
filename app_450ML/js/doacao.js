//Função para agendamento da doação

var botaoAgendar = document.querySelector("#agendar-doacao");
botaoAgendar.addEventListener("click", function(){
    event.preventDefault();

    //Seleciona os elementos do formulário
    var form = document.querySelector("#agendar");

    var select = document.getElementById('uf');
    var uf = select.options[select.selectedIndex].text;

    var select = document.getElementById('instituicao');
    var instituicao = select.options[select.selectedIndex].text;

    var data = form.data.value;

    var hora = form.hora.value;

            console.log(uf);
            console.log(instituicao);
            console.log(form.data.value);
            console.log(form.hora.value);

    //seleciona o formulário
    var formulario = document.querySelector("#proximaDoacao");
    //Cria uma nova seção
    var sessao = document.createElement("section");

    //cria os elementos do formulario
    var instP = document.createElement("p");    
    var instituicaoP = document.createElement("p");
    var ufP = document.createElement("p");
    var uniFP = document.createElement("p");
    var dataP = document.createElement("p");
    var horaP = document.createElement("p");
    var br = document.createElement("br");
    
    //Cria os textos
    ufP.textContent = "UF:";
    uniFP.textContent = uf;
    instP.textContent = "Instituição:";
    instituicaoP.textContent = instituicao;

    //Insere a seção no formulário
    formulario.appendChild(sessao);

    //Insere os textos e elementos na seção
    sessao.appendChild(ufP);
    sessao.appendChild(uf);
    sessao.appendChild(instP);
    sessao.appendChild(instituicaoP);
    

    
/*
            <p>Instituição: Hemoclínica BSB</p>
            <p>UF: DF</p>
            <br>
            <p>Data: 27/06/2020</p>
            <br>
            <p>Horário: 09:15</p>
            <br>
*/
});