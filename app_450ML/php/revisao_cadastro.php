<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        
        <title>Cadastro de doador - 450ml</title>

        <link href="../css/reset.css" rel="stylesheet" >
        <link href="../css/cabecalho-rodape.css" rel="stylesheet">
        <link href="../css/cadastro.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Thambi+2:wght@500&display=swap" rel="stylesheet">
    </head>

    <body>

<?php //cadastro.php

  include_once "conexao_bd/conectabd.inc.php";

  echo "<h1>Consulta Cadastro Doador</h1>";
  
  print_r($_COOKIE["CookieID"]);

  $cod_doador = $_COOKIE["CookieID"];

  $query = "SELECT * FROM doador where cod_doador = '$cod_doador';";
  if ($result = mysqli_query($link, $query)) {
      // busca os dados lidos do banco de dados
      while ($row = mysqli_fetch_assoc($result)) {
          $cd_doador = $row["cod_doador"];
          $nome = $row["nome"];
          $sobrenome = $row["sobrenome"];
          $data_de_nascimento = $row["data_de_nascimento"];
          $sexo = $row["sexo"];
          $cpf = $row["cpf"];
          $cd_tp_sanguineo = $row["cd_tp_sanguineo"];
          $telefone = $row["telefone"];
          $email = $row["email"];
          $sigla_uf = $row["sigla_uf"];
          $logradouro = $row["logradouro"];
          $numero = $row["numero"];
          $complemento = $row["complemento"];
          $cidade = $row["cidade"];
          $cep = $row["cep"];

        }
      mysqli_free_result($result);
  }
  // fecha a conexão
  mysqli_close($link);
?>  


        <header>
            <div class="pre-cabecalho">
                <nav>
                    <ul class="navegacao">
                        <li><a href="../sobre.html">Sobre</a></li>
                        <li><a href="../contato.html">Contato</a></li>
                    </u>
                </nav>
            </div>

            <div class="cabecalho">
                <img id="logo-cabecalho" src="../imagens\logo.png" alt="Logo do app 450ml">
                
                <nav>
                    <ul class="navegacao">
                        <li><a href="../index.html">HOME</a></li>
                        <li><a href="../doacoes.html">DOAÇÕES</a></li>
                        <li><a href="../cadastro.html">CADASTRO</a></li>
                        <li><a href="../instituicoes.html">INSTITUIÇÕES</a></li>
                        <li><a href="../campanhas.html">CAMPANHAS</a></li>
                        <li><a href="../pagina_login.php">Sair</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <h1>Cadastro de doador</h1>

            <form action="php/cadastro.php" method="POST">
                <section>
                    <legend>Dados pessoais:</legend>
                    <legend>*Nome:</legend>
                    <input type="text" id="nome" name="nome" class="input-padrao" value="<?php echo($nome);?>" required>
                    <legend>*Sobrenome:</legend>
                    <input type="text" id="sobrenome" name="sobrenome" class="input-padrao" value="<?php echo($sobrenome);?>" required>
                    
                    <legend>*CPF:</legend>
                    <input type="number" id="cpf" name="cpf" class="input-padrao" value="<?php echo($cpf);?>" required>
                                    
                    <legend>*Data de nascimento:</legend>
                    <input type="date" id="dt_nsct" name="dt_nsct" class="input-padrao" value="<?php echo($data_de_nascimento);?>" required>

                    <legend>*Tipo sanguíneo:</legend>
                    <select required id="tp_sanguineo" name="tp_sanguineo" value="<?php echo($cd_tp_sanguineo);?>">
                        <option value="">Selecione</option>                        
                        <option value="1">A+</option>
                        <option value="2">A-</option>
                        <option value="3">B+</option>
                        <option value="4">B-</option>
                        <option value="5">AB+</option>
                        <option value="6">AB-</option>
                        <option value="7">O+</option>
                        <option value="8">O-</option>
                        <option value="0">Não sei informar</option>
                    </select>

                    <legend>*Sexo:</legend>

                    <label for="radio-masculino" class="checkbox">
                        <input type="radio" name="sexo" value="M" id="radio-masculino">
                        Masculino
                    </label>                    
                    <label for="radio-feminino" class="checkbox">
                        <input type="radio" name="sexo" value="F" id="radio-feminino">
                        Feminino
                    </label>                    
                </section>
                
                <section>
                    <legend>Endereço:</legend>
                    <input type="text" id="logradouro" name="logradouro" class="input-padrao" value="<?php echo($logradouro);?>" required>
                    <input type="number" id="numero" name="numero" class="input-padrao" value="<?php echo($numero);?>" required>
                    <br>
                    <input type="text" id="complemento" name="complemento" class="input-padrao" value="<?php echo($complemento);?>">
                    <input type="text" id="cidade" name="cidade" class="input-padrao" value="<?php echo($cidade);?>" required>
                    
                    <legend>*UF:</legend>
                    <select required id="uf" name="uf" value="">
                        <option value="">Selecione</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espirito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>                

                    <legend>*CEP:</legend>
                    <input type="number" id="cep" name="cep" class="input-padrao" value="<?php echo($cep);?>" required>
                </section>

                <section>
                    <legend>Contato:</legend>
                    <label for="email">*E-mail:</label>
                    <input type="email" id="email" name="email" class="input-padrao" value="<?php echo($email);?>" required>
                    <label class="checkbox">
                        <input type="checkbox" class="input-padrao" checked>
                        Aceito receber notificações por e-mail
                    </label>
                    <br>

                    <label for="celular">Celular:</label>
                    <input type="tel" id="celular" name="celular" class="input-padrao" value="<?php echo($telefone);?>" required>
                    <label class="checkbox">
                        <input type="checkbox" class="input-padrao" checked>
                        Aceito receber notificações por SMS
                    </label>
                </section>

                <section>
                    <legend>Nova senha:</legend>
                    <input placeholder="Informe a sua senha de 6 a 10 caracteres" type="password" id="senha" name="senha" class="input-padrao" required>
                    <br>
                    <input placeholder="Confirme a sua senha" type="password" id="senhaConf" name="senhaConf" class="input-padrao" required>                    
                </section>

                <input type="submit" value="Enviar formulário" class="botao">
            </form>
        </main>
        
        <footer>
            <img id="logo-rodape" src="../imagens\logo.png" alt="Logo do app 450ml">
            <p class="copyright">&copy;Copyright 450ml - 2020</p>
        </footer>
    </body>
</html>