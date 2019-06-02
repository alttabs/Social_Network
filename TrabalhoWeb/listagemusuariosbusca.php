<?php
error_reporting(1);
session_start();

if ($_SESSION["logado"] != "true") {
    header("location: index.php");
} else {
    include_once "./fixo/conexao_bd.php";
    $buscarUsuarios = $_GET['buscar_usuarios'];
    $idUsuarioLogado = $_SESSION["id"];
    $sql = " SELECT * FROM usuario WHERE nome LIKE '%$buscarUsuarios%' AND id != $idUsuarioLogado ";
    $res = $conexao->query($sql);
}
?>



<?php
include_once './fixo/topo.php';
?>

<title>Busca</title>

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