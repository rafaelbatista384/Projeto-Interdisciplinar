<?php

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
$notif_email = isset($_REQUEST["notif_email"][1]) ? 1 : 0;
$notif_sms = isset($_REQUEST["notif_sms"][1]) ? 1 : 0;


include_once "conexao_bd/conectabd.inc.php";

$query = "INSERT INTO `doador` (nome, sobrenome, data_de_nascimento, sexo,cpf, cd_tp_sanguineo, telefone, email, sigla_uf, senha, logradouro, numero, complemento, cidade, cep, notificacao_email, notificacao_sms)
VALUES ('$nome', '$sobrenome', '$dt_nsct', '$sexo','$cpf', '$tp_sanguineo', '$celular', '$email', '$uf', '$senha', '$logradouro', '$numero', '$complemento', '$cidade', '$cep', '$notif_email', '$notif_sms');";
if ($result = mysqli_query($link, $query)) {
echo "<script>window.location = '../pagina_login.php'</script>";
} else {
    echo "Erro";
};

?>