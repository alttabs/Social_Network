<?php
session_start();
if ($_SESSION["logado"] != "true") {
    header("Location: index.php");
}
if ($_GET != null) {
    include_once "./conexao_bd.php";
    $idUsuario = $_GET["idUsuario"];
    $idUsuarioLogado = $_SESSION["id"];

    $sqlDeletaSolicitacao = " DELETE FROM solicitacao_amizade WHERE solicitacao_amizade.id_usuario_solicitado = $idUsuarioLogado and solicitacao_amizade.id_usuario_solicitante = $idUsuario ";
    $res = $conexao->query($sqlDeletaSolicitacao);

    $sqlFazAmizade = " INSERT INTO amizade (id_usuario1, id_usuario2) VALUES ($idUsuario, $idUsuarioLogado); ";
    $resFazAmizade = $conexao->query($sqlFazAmizade);

    if($resFazAmizade){
        echo "
        <script>
            alert('Amizade feita com sucesso!');          
        </script>
        ";
        header("Location: ../solicitacoes_amizade.php");
    }


   
}
