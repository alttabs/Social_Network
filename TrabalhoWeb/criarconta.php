<?php
	// Não exibe mensagens de alerta
	error_reporting(1);

	// Clicou em enviar?
	if ($_POST != NULL) {

		// Conecta ao BD
		include_once "./fixo/conexao_bd.php";

		// Obtém dados do formulário
		$nome = $_POST["nome"];
		$telefone = $_POST["telefone"];
		$email = $_POST["email"];
		$cod_grupo = $_POST["cod_grupo"];
		$detalhes = $_POST["detalhes"];
		$foto = $_POST["foto"];

		// Não preencheu algum campo obrigatório?
		if ($nome == "" || $telefone == "" ) {

			echo "<script>
						alert('Preencha todos os campos!');
					</script>";

		// Tudo ok.. pode cadastrar no BD
		} else {

			// Cria comando SQL
			$sql = "INSERT INTO contato (nome, telefone, email, cod_grupo, detalhes, foto) 
							VALUES ('$nome', '$telefone', '$email', '$cod_grupo', '$detalhes', '$foto')";

			// Executa no BD
			$retorno = $conexao->query($sql);

			// Executou no BD?
			if ($retorno == true) {

				echo "<script>
								alert('Cadastrado com Sucesso!');
								location.href='index.php';
							</script>";

			} else {

				echo "<script>
								alert('Erro ao Cadastrar!');
							</script>";

				echo $conexao->error;

			}

		}

	}

?>

<?php include_once "./fixo/topo.php"; ?>

<div class="container">
	<h1>Criar Conta</h1>

	<form method="POST">

		<div class="form-group">
			<label>Nome</label>
			<input type="text" name="nome" maxlength="100" required class="form-control">
		</div>

		<div class="form-group">
			<label>Telefone</label>
			<input type="text" name="telefone" maxlength="50" required class="form-control">
		</div>

		<div class="form-group">
			<label>E-Mail</label>
			<input type="email" name="email" maxlength="100" class="form-control">
		</div>

		<div class="form-group">
			<label>Foto (URL)</label>
			<input type="text" name="foto" class="form-control">
		</div>

		<div class="form-group">
			<label>Detalhes</label>
			<textarea name="detalhes" class="form-control"></textarea>
		</div>

		<a href="index.php" class="btn btn-danger">Cancelar</a>
		<button type="submit" class="btn btn-primary">Salvar</button>
		
	</form>
</div>

<?php include_once "./fixo/rodape.php"; ?>