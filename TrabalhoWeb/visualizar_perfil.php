<?php
session_start();
if ($_SESSION["logado"] != "true")
	header("Location: index.php");
include_once "./fixo/conexao_bd.php";
$idUsuario = $_GET["idUsuario"];
$idUsuarioLogado = $_SESSION["id"];

$sql = " SELECT * FROM usuario WHERE id = '$idUsuario'";
$res = $conexao->query($sql);
$registro = $res->fetch_array();
$nomeUsuario = $registro["nome"];
$telefoneUsuario = $registro["telefone"];
$emailUsuario = $registro["email"];
$grupoUsuario = $registro["cod_grupo"];
$fotoUsuario = $registro["foto"];
$detalhes = $registro["detalhes"];
$saoAmigos = false;
$sqlVerificaAmizade = " SELECT * FROM amizade WHERE (id_usuario1 = $idUsuario AND id_usuario2 = $idUsuarioLogado) OR (id_usuario1 = $idUsuarioLogado AND id_usuario2 = $idUsuario); ";
$verificaAmizade = $conexao->query($sqlVerificaAmizade);
$arrayAmizade = $verificaAmizade->fetch_array();
if ($arrayAmizade != null) {
	$saoAmigos = true;
}
?>

<?php
include_once './fixo/topo.php';
?>

<title><?php echo $nomeUsuario ?></title>

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
				<img src="<?php echo $fotoUsuario ?>" class="card-img-top foto-perfil" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?php echo $nomeUsuario ?></h5>
					<p class="card-text"><?php echo $detalhes ?></p>
				</div>
				<div class="card-body">
					<?php
					if (!$saoAmigos) {
						echo "
					<ul class='list-group list-group-flush'>
						<a href='./fixo/adicionar_amigo.php?idUsuario=$idUsuario'>
							<li class='list-group-item'>+ Adicionar Amigo</li>
						</a>
					</ul>
					";
					} else {
						echo "
					<ul class='list-group list-group-flush'>
						<li class='list-group-item'>Vocês são amigos!</li>
					</ul>
					";
					}
					?>

					<ul class="list-group list-group-flush">
						<?php
						$sqlBuscarQuantidadeDeAmigos = "SELECT COUNT(*) FROM amizade WHERE amizade.id_usuario1 = $idUsuario OR amizade.id_usuario2 = $idUsuario";
						$resultadoQuantidadeDeAmigos = $conexao->query($sqlBuscarQuantidadeDeAmigos);
						$qtdAmigos = $resultadoQuantidadeDeAmigos->fetch_array();
						?>
						<li class="list-group-item"><?php echo $qtdAmigos[0] ?> Amigos</li>
					</ul>

				</div>
			</div>

			<div class="col-md-9">
				<?php

				$sql = " SELECT DISTINCT * FROM postagem, amizade
				WHERE ((postagem.id_usuario = amizade.id_usuario1 OR postagem.id_usuario = amizade.id_usuario2) 
					AND (amizade.id_usuario1 = $idUsuario OR amizade.id_usuario2 = $idUsuario)) ORDER BY data DESC ";

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
					<a href=";
					echo (($idUsuarioDoPost === $idUsuarioLogado) ? "feed.php" : "visualizar_perfil.php?idUsuario=$idUsuarioDoPost");
					echo " target='blank'><img src='$fotoAutor' class='card-img-top imagem-card' alt='...'></a>
					<h5 class='card-title titulo-postagem'>$nomeAutor</h5>
					<h6 class='card-subtitle mb-2 text-muted'>$dataDoPost</h6>
					</div>
					<p class='card-text'>$conteudoDoPost</p>
					<a href='#' class='card-link' id='btn_curtir'> Curtir</a>
					<a href='#' class='card-link'> Comentar</a>
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