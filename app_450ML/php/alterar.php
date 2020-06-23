<?php

$cod_doador = $_COOKIE["CookieID"];
$nome = $_REQUEST["nome"];
$sobrenome = $_REQUEST["sobrenome"];
$cpf = $_REQUEST["cpf"];
$dt_nsct = $_REQUEST["dt_nsct"];
$tp_sanguineo = $_REQUEST["tp_sanguineo"];
$sexo = $_REQUEST["sexo"];
$logradouro = $_REQUEST["logradouro"];
$numero = $_REQUEST["numero"];
$complemento = $_REQUEST["complemento"];
$cidade = $_REQUEST["cidade"];
$uf = $_REQUEST["uf"];
$cep = $_REQUEST["cep"];
$email = $_REQUEST["email"];
$celular = $_REQUEST["celular"];
$senha = $_REQUEST["senha"];

include_once "conexao_bd/conectabd.inc.php";

$query = "UPDATE `doador` SET nome='$nome', sobrenome='$sobrenome', data_de_nascimento='$dt_nsct', sexo='$sexo',cpf='$cpf', cd_tp_sanguineo='$tp_sanguineo', telefone='$celular', email='$email', sigla_uf='$uf', senha='$senha', logradouro='$logradouro', numero='$numero', complemento='$complemento', cidade='$cidade', cep='$cep' WHERE cod_doador = '$cod_doador';";
if ($result = mysqli_query($link, $query)) {
echo "<script>window.location = 'revisao_cadastro.php'</script>";
} else {
    echo "Erro";
};

?>