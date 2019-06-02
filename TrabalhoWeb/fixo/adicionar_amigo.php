<?php
session_start();
if ($_SESSION["logado"] != "true") {
    header("Location: index.php");
}
if ($_GET != null) {
    include_once "./conexao_bd.php";
    $idUsuario = $_GET["idUsuario"];
    $idUsuarioLogado = $_SESSION["id"];

    $sqlVerificaSolicitacao = " SELECT * FROM solicitacao_amizade WHERE (id_usuario_solicitante = $idUsuarioLogado AND id_usuario_solicitado = $idUsuario)
    OR (id_usuario_solicitante = $idUsuario AND id_usuario_solicitado = $idUsuarioLogado) ";
    $res = $conexao->query($sqlVerificaSolicitacao);
    $verificacao = $res->fetch_array();

    if($verificacao != null){
        echo "
        <script>
            alert('A solicitação já foi enviada!');          
        </script>
        ";
        header("Location: ../feed.php");
    }


    $sqlEnviarSolicitacao = " INSERT INTO solicitacao_amizade (id_usuario_solicitante, id_usuario_solicitado) VALUES ($idUsuarioLogado, $idUsuario); ";
    $res = $conexao->query($sqlEnviarSolicitacao);

    if ($res) {
        echo "
        <script>
            alert('Solicitação de amizade enviada com sucesso!');          
        </script>
        ";
        header("Location: ../feed.php");
    } 
}
