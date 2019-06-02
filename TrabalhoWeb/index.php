<?php

error_reporting(1);
session_start();
// Clicou em enviar?
if ($_POST != NULL) {

	// Conecta ao BD
	include_once "./fixo/conexao_bd.php";

	$login = addslashes($_POST['login']);
	$senha = addslashes($_POST['senha']);
	$senha = md5($senha);

	// $sql = " SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha' ";
	$sql = " SELECT * FROM usuario WHERE login = '$login'";
	$res = $conexao->query($sql);
	$registro = $res->fetch_array();
	if ($registro) {
		$_SESSION["logado"] = "true";
		$_SESSION["nome"] = $registro["nome"];
		$_SESSION["id"] = $registro["id"];
		$_SESSION["email"] = $registro["email"];
		$_SESSION["foto"] = $registro["foto"];
		$_SESSION["detalhes"] = $registro["detalhes"];

		header("Location: feed.php");
	} else {
		echo "<script>
				  alert('Não foi possível realizar o login');
				  location.href = 'index.php';
				</script>";
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
</head>

<body>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> </script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
	<link href="./css/login.css" rel="stylesheet" id="bootstrap-css">


	<div class="wrapper fadeInDown">
		<div id="formContent">
			<div class="fadeIn first">
				<img src="https://cdn0.iconfinder.com/data/icons/interface-icons-rounded/110/Login-512.png" height="50px" width="50px" alt="Icone" />
				<!--id="icon"-->

			</div>
			<form method="POST">
				<input type="text" id="login" class="fadeIn second" name="login" placeholder="E-mail">
				<input type="text" id="password" class="fadeIn third" name="senha" placeholder="Senha">
				<input type="submit" class="fadeIn fourth" value="Entrar">
			</form>
			<div id="formFooter">
				<a class="underlineHover" href="#">Esqueceu a senha?</a>
			</div>
		</div>
	</div>
</body>

</html>