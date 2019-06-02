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

    if($res){
        echo "
        <script>
            alert('A solicitação excluida com sucesso!');          
        </script>
        ";
        header("Location: ../solicitacoes_amizade.php");
    }


   
}
