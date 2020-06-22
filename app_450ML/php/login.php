<?php 
session_start();
 
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
$lembrete = (isset($_POST['lembrete'])) ? $_POST['lembrete'] : '';


if (!empty($email) && !empty($senha)):
 
	$conexao = new PDO('mysql:host=localhost;dbname=450ml', 'rafaelBatista', 'root123');
	$sql = 'SELECT cod_doador, nome, email FROM doador WHERE email = ? AND senha = ?';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $email);
	$stm->bindValue(2, $senha);
	$stm->execute();
	$dados = $stm->fetch(PDO::FETCH_OBJ);
 
 print_r($dados);

	if(!empty($dados)):
 
		$_SESSION['cod_doador'] = $dados->cod_doador;
		$_SESSION['nome'] = $dados->nome;
		$_SESSION['email'] = $dados->email;
		$_SESSION['logado'] = TRUE;
 
		if($lembrete == 'SIM'):
 
		   $expira = time() + 60*60*24*30; 
		   setCookie('CookieLembrete', base64_encode('SIM'), $expira);
		   setCookie('CookieID', $dados->cod_doador, $expira);
		   setCookie('CookieEmail', base64_encode($email), $expira);
		   setCookie('CookieSenha', base64_encode($senha), $expira);
 
		else:
 
		   setCookie('CookieLembrete');
		   setCookie('CookieID');
		   setCookie('CookieEmail');
		   setCookie('CookieSenha');
 
		endif;

		echo "<script>window.location = 'revisao_cadastro.php'</script>";
	else:
 
		$_SESSION['logado'] = FALSE;

	    echo "<script>alert('Falha no Login!')</script>";
	    echo "<script>window.location = '../pagina_login.php'</script>";
 
	endif;
 
endif;
