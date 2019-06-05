<?php
session_start();
if ($_SESSION["logado"] != "true") {
    header("Location: index.php");
  }
  if ($_GET != null) {
    include_once "./conexao_bd.php";
    $idUsuario = $_GET["idUsuario"];
    $idUsuarioLogado = $_SESSION["id"];
  // Cria comando SQL 
  $sqlDesfazerAmizade = " DELETE FROM amizade
     where id_usuario2 = $idUsuario";

  $res = $conexao->query($sqlDesfazerAmizade);

  // Executa  BD
  if($res){
    echo "
    <script>
        alert('Amizade foi desfeita!');          
    </script>
    ";
    header("Location: ../amigos.php");
}
  }
  
?> 