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

include_once "conexao_bd/conectabd.inc.php";

$query = "INSERT INTO `doador` (nome, sobrenome, data_de_nascimento, cpf, cd_tp_sanguineo, telefone, email, sigla_uf, senha, logradouro, numero, complemento, cidade, cep)
VALUES ('$nome', '$sobrenome', '$dt_nsct', '$cpf', '$tp_sanguineo', '$celular', '$email', '$uf', '$senha', '$logradouro', '$numero', '$complemento', '$cidade', '$cep');";
if ($result = mysqli_query($link, $query)) {
echo "Inclusão efetuada com sucesso";
} else {
    echo "Erro";
};


echo "Nome: $nome";
echo "<br>";
echo "Sobrenome: $sobrenome";
echo "<br>";
echo "Cpf: $cpf";
echo "<br>";
echo "Data de Nascimento: $dt_nsct";
echo "<br>";
echo "Tipo Sanguíneo: $tp_sanguineo";
echo "<br>";
echo "Sexo: $sexo";
echo "<br>";
echo "Logradouro: $logradouro";
echo "<br>";
echo "Numero: $numero";
echo "<br>";
echo "Complemento: $complemento";
echo "<br>";
echo "Cidade: $cidade";
echo "<br>";
echo "UF: $uf";
echo "<br>";
echo "Cep: $cep";
echo "<br>";
echo "Email: $email";
echo "<br>";
echo "Celular: $celular";
echo "<br>";
echo "Senha: $senha";
echo "<br>";


?>