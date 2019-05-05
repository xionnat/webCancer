<?php 
	error_reporting(1);
	if ($_POST != NULL) {

		include_once "connect_db.php";

	    // Obtem dados do POST
	    $usuario = $_POST["usuario"];
	    $senha = $_POST["senha"];
	    $email = $_POST["email"];

	    //addslashes() <- evita SQL Injection quado for fazer um SELECT

	    // Valida campos obrigatórios
	    if ($usuario != "" && $senha != "" && $email != "" ) {

	      // Cria o comando SQL
	      $sql = "INSERT INTO user_info (user, password, email) 
	              VALUES ('$usuario', '$senha', '$email')";

	      // Executa no BD
	      $retorno = $conexao->query($sql);

	      // Executou?
	      if ($retorno == true) {

	        echo "<script>
	                alert('Cadastrado com Sucesso!');
	                location.href='welcome.php';
	              </script>";

	      } else {

	        echo "<script>
	                alert('Erro ao Cadastrar!');
	              </script>";

	        // Exibe do erro que o banco retorna
	        echo $conexao->error;

	      }

	    } else {
	        echo "<script>
	                alert('Preencha todos os campos!');
	              </script>";
	    }
	}

 


?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Cadastro</title>
			<meta charset="utf-8">

		</head>
		<body>

			<h1>Crie sua conta agora!!</h1>
			
			<form method="POST">
				<label>Digite seu usuário:</label><br>
				<input type="text" name="usuario"><br><br>
				<label>Digite sua senha:</label><br>
				<input type="password" name="senha"><br><br>
				<label>Confime sua senha:</label><br>
				<input type="password" name="confirmeSenha"><br><br>
				<label>Digite seu email:</label><br>
				<input type="email" name="email"><br><br>
				<input type="submit" value="Salvar">
			</form>
		
		</body>
	</html>