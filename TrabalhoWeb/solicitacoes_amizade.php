<?php
session_start();

if ($_SESSION["logado"] != "true") {
    header("location: index.php");
} else {
    include_once "./fixo/conexao_bd.php";
    $idUsuarioLogado = $_SESSION["id"];
    $sqlVerificaSolicitacoes = " SELECT * FROM solicitacao_amizade JOIN usuario ON usuario.id = solicitacao_amizade.id_usuario_solicitante WHERE solicitacao_amizade.id_usuario_solicitado = $idUsuarioLogado ";
    $res = $conexao->query($sqlVerificaSolicitacoes);
}
?>



<?php
include_once './fixo/topo.php';
?>

<title>Solicitações de Amizade</title>

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
            <div class="col-md-12">
                <?php

                while ($usuario = $res->fetch_array()) {
                    $idUsuario = $usuario["id"];
                    $nomeUsuario = $usuario["nome"];
                    $fotoUsuario = $usuario["foto"];
                    echo "
                    <a href='visualizar_perfil.php?idUsuario=$idUsuario' target='blank'>
					<div class='card card-postagem'>
					<div class='card-body'>
					<div class='header-postagem'>
					<img src='$fotoUsuario' class='card-img-top imagem-card' alt='...'>
                    <h5 class='card-title titulo-postagem'>$nomeUsuario</h5>
                    <a href='./fixo/aceitar_solicitacao.php?idUsuario=$idUsuario' target='blank'><button class='btn btn-outline-dark my-2 my-sm-0' type='submit'>Aceitar Solicitacao</button></a>
                    <a href='./fixo/recusar_solicitacao.php?idUsuario=$idUsuario' target='blank'><button class='btn btn-outline-dark my-2 my-sm-0' type='submit'>Recusar Solicitacao</button></a>

					</div>		
                    </div>
                    </div>
                    </a>
					";
                };
                ?>
            </div>
        </div>
    </div>


    <?php
    include_once './fixo/rodape.php';
    ?>