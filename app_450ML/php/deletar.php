<?php

$cod_doador = $_COOKIE["CookieID"];

include_once "conexao_bd/conectabd.inc.php";

$query = "DELETE FROM `doador` WHERE cod_doador = '$cod_doador'";
if ($result = mysqli_query($link, $query)) {
echo "<script>window.location = '../pagina_login.php'</script>";
} else {
    echo "Erro";
};

?>