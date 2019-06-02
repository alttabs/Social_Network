<?php
session_start();

if ($_SESSION["logado"] != "true") {
	header("location: index.php");
} else {
	include_once "./fixo/conexao_bd.php";

	$nome = $_SESSION["nome"];
	$email = $_SESSION["email"];
	$id = $_SESSION["id"];
	$foto = $_SESSION["foto"];
	$detalhes = $_SESSION["detalhes"];

	if ($_POST != NULL) {

		$comentario = $_POST['comentario'];
		$idPost = $_POST['idPost'];
		$sqlAdicionaComentario = " INSERT INTO comentario (id_postagem_coment, id_usuario_coment, conteudo, data) VALUES ($idPost, $id, $comentario, now()) ";
		$res = $conexao->query($sqlAdicionaComentario);
		echo $res;

		echo "<script>
			alert('Comentário realizado com sucesso!');
		</script>";
	}
}
?>

<?php
include_once './fixo/topo.php';
?>

<title>Página Inicial</title>

</head>

<?php
include_once './fixo/conexao_bd.php';
?>

<body>
	<?php
	include_once './fixo/navbar.php';
	?>

	<div class="container conteudo">
		<div class="row">
			<div class="card col-md-3" style="width: 18rem;">
				<img src="<?php echo $foto ?>" class="card-img-top foto-perfil" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?php echo $nome ?></h5>
					<p class="card-text"><?php echo $detalhes ?></p>
				</div>
				<ul class="list-group list-group-flush">
					<?php
					$sqlBuscarQuantidadeDeAmigos = "SELECT COUNT(*) FROM amizade WHERE amizade.id_usuario1 = $id OR amizade.id_usuario2 = $id";
					$resultadoQuantidadeDeAmigos = $conexao->query($sqlBuscarQuantidadeDeAmigos);
					$qtdAmigos = $resultadoQuantidadeDeAmigos->fetch_array();
					?>
					<li class="list-group-item"><?php echo $qtdAmigos[0] ?> Amigos</li>
				</ul>
				<div class="card-body">
					<a href="./fixo/sair.php" class="card-link"> Sair </a>
				</div>
			</div>

			<?php
			if ($_POST != NULL) {

				// Conecta ao BD
				include_once "./fixo/conexao_bd.php";

				$postagem = $_POST['postagem'];
				$datahora = date('Y-m-d H:i:s');
				$sqlRealizaPost = " INSERT INTO postagem (id_usuario, conteudo, data) VALUES ('$id', '$postagem', now()) ";
				$res = $conexao->query($sqlRealizaPost);

				if ($res) {
					header('Refresh:0');
				}
			}
			?>

			<div class="col-md-9">
				<div class="card card-fazer-postagem">
					<div class="card-body">
						<div class="input-group mb-3">
							<form method="POST">
								<input type="text" name="postagem" class="form-control" placeholder="O que você está pensando? (falta de criatividade kaka)" aria-label="Recipient's username" aria-describedby="button-addon2">
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="submit" id="button-addon2">Postar</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<?php

				$sql = " SELECT DISTINCT * FROM postagem, amizade
				WHERE ((postagem.id_usuario = amizade.id_usuario1 OR postagem.id_usuario = amizade.id_usuario2) 
					AND (amizade.id_usuario1 = $id OR amizade.id_usuario2 = $id)) ORDER BY data DESC ";

				$res = $conexao->query($sql);

				while ($publicacao = $res->fetch_array()) {
					$idPost = $publicacao["id"];
					$idUsuarioDoPost = $publicacao["id_usuario"];
					$conteudoDoPost = $publicacao["conteudo"];
					$dataDoPost = $publicacao["data"];
					$sqlBuscaUsuarioPost = " SELECT * FROM usuario WHERE id = $idUsuarioDoPost ";
					$usuarioQuePostou = $conexao->query($sqlBuscaUsuarioPost);
					$usuario = $usuarioQuePostou->fetch_array();
					$idAutor = $usuario["id"];
					$nomeAutor = $usuario["nome"];
					$fotoAutor = $usuario["foto"];

					echo "
					<div class='card card-postagem'>
					<div class='card-body'>
					<div class='header-postagem'>
					<a href='visualizar_perfil.php?idUsuario=$idUsuarioDoPost' target='blank'><img src='$fotoAutor' class='card-img-top imagem-card' alt='...'></a>
					<h5 class='card-title titulo-postagem'>$nomeAutor</h5>
					<h6 class='card-subtitle mb-2 text-muted'>$dataDoPost</h6>
					</div>
					<p class='card-text'>$conteudoDoPost</p>
					<a href='#' class='card-link' id='btn_curtir'> Curtir</a>
					<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
  						Comentários
					</button>
					</div>
					</div>


					<div class='modal fade' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					<div class='modal-dialog' role='document'>
						<div class='modal-content'>
						<div class='modal-header'>
							<h5 class='modal-title' id='exampleModalLabel'>Comentários</h5>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
							</button>
						</div>
						<div class='modal-body'>
						";
					$sqlComentariosDoPost = " SELECT * FROM comentario JOIN usuario ON usuario.id = comentario.id_usuario_coment WHERE comentario.id_postagem_coment = $idPost ";
					$resComentarios = $conexao->query($sqlComentariosDoPost);;

					while ($comentario = $resComentarios->fetch_array()) {
						$idComentario = $comentario["id"];
						$idPostagem = $comentario["id_postagem_coment"];
						$idUsuarioComent = $comentario["id_usuario_coment"];
						$fotoUsuarioComent = $comentario["foto"];
						$nomeUsuarioComent = $comentario["nome"];
						$conteudoComentario = $comentario["conteudo"];
						$data = $comentario["data"];
						echo "<div class='card card-postagem'>
						<div class='card-body'>
						<div class='header-postagem'>
						<a href='visualizar_perfil.php?idUsuario=$idUsuarioComent' target='blank'><img src='$fotoUsuarioComent' class='card-img-top imagem-card' alt='...'></a>
						<h5 class='card-title titulo-postagem'>$nomeUsuarioComent</h5>
						<h6 class='card-subtitle mb-2 text-muted'>$data</h6>
						</div>
						<p class='card-text'>$conteudoComentario</p>						
						</div>
						</div>";
					}
					echo "					
						</div>
						<div class='modal-footer'>
						<form method='POST'>
							<input type='text' name='comentario' class='form-control' placeholder='Comentário' aria-label='Recipients username' aria-describedby='button-addon2'>
							<input type='text' name='idPost' value='$idPost' style='display: none;'>
							<div class='input-group-append'>
								<button class='btn btn-outline-secondary' type='submit' id='button-addon2'>Postar</button>
							</div>
						</form>
						<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
							
						</div>
						</div>
					</div>
					</div>
					";
				};
				?>

			</div>
		</div>

	</div>


	<?php
	include_once './fixo/rodape.php';
	?>