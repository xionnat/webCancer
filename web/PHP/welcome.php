<?php 

	error_reporting(1);


	if($_POST != NULL){

		include_once "connect_db.php";

		$usuario = $_POST["usuario"];
		$senha = $_POST["senha"];

		if($usuario != NULL && $senha != NULL){

			$sql = "SELECT * 
					FROM user_info 
					WHERE user = '$usuario'";
			


			$retorno = $conexao->query($sql);

			if ($retorno == false) {
				echo $conexao->error;
			}

			$registro = $retorno->fetch_array();

			$user = $registro["user"];
			$password = $registro["password"];

			if($usuario == $user && $senha == $password){
				echo 
				"<script>
					alert('Logado com Sucesso!!');
					location.href='feed.php';
				 </script>";
			}else{
				echo 
				"<script>
					alert('Usuário/Senha incorretos!!');
				 </script>";
			}

		}else{
			echo 
				"<script>
					alert('Usuário/Senha incorretos!!');
				 </script>";
		}

	}


?>



<!DOCTYPE html>



<html>

	<head>
		<title>Ren Chon</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../CSS/login-style.css">
	</head>

	<body>
		<div class="container">
			<content id="login-sidebar">
				<table class="login-table" >
					<tr>
						<th><img src="https://pm1.narvii.com/6274/91e724ccdf21f9002929ae41d560fdcc09a0d3bc_hq.jpg" width="30%"> <h2> Rede da Ren-Chon </h2></th>
					</tr>
					<tr>
						<td>
							<div class="container">
								<br><br><br><br><br><br>
								<form method="POST">
								  	<input type="text" name="usuario" placeholder="usuario"><br><br>
								  	<input type="password" name="senha" placeholder="senha"><br><br>
								  	<input type="submit" value="Login">
								</form><br>
								<a href="cadastro.php">Cadastrar</a>
								<a href="">Esqueceu a senha?</a>
							</div>
						</td>	
					</tr>
				</table>
			</content>
	</div>


	</body>
</html>