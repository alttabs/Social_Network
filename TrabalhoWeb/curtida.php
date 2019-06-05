<?php
session_start();

if ($_SESSION["logado"] != "true") {

	header("location: index.php");
	
} else {
	include_once "./fixo/conexao_bd.php";

    $idPost = $_GET["id_postagem_curtida"];
    $idUsuarioDoPost = $_GET["nome"];
    $id = $_SESSION["id_postagem_curtida"];
    $sql = " SELECT * FROM usuarios WHERE id = '$id' ";
    $res = $conexao->query( $sql );

    while($consulta = $res->fetch_array()){
        $usuariologado = $consulta["nome"];
    }

    if($autorlike != $usuariologado){
        echo "Você não pode curtir a publicao, ocorreu um erro de autenticacao";
    }else{
        $sql = "SELECT * FROM curtida WHERE id_postagem_curtida = '$idPost' AND autor_curtida = '$id' ";
        $res = $conexao->query( $sql );
        $consulta = $res->fetch_array();
        if($consulta){
            echo "<script>
                alert('Você já curtiu essa publicação!.');
                location.href = 'feed.php';
            </script>";
        }else{
        $sql = "INSERT INTO likes (id_postagem_curtida, id_postagem_curtida, autor_curtida) VALUES ('$idPost', '$idusuario', '$autorlike')";
        $res = $conexao->query( $sql );
        if ($res == true) {

            echo "<script>
                    alert('Publicação curtida com sucesso.');
                    location.href = 'index.php';
                </script>";
        
        } else {
        
            echo "<script>
                    alert('Erro ao curtir a publicação! :( ');
                </script>";
        
            echo $conexao->error;
        
 
        }
    }
  }
  
}

?>