<?php
session_start();

if ($_SESSION["logado"] != "true") {

	header("location: index.php");
	
} else {
	include_once "./fixo/conexao_bd.php";

    $idPost = $_GET["id"];
    $idUsuarioDoPost = $_GET["id_usuario"];
    $id = $_SESSION["id"];
    $sql = " SELECT * FROM usuario WHERE id = '$id' ";
    $res = $conexao->query( $sql );
    $podeCurtir = false;

    while($consulta = $res->fetch_array()){
        $usuariologado = $consulta["nome"];
    }
    $sqlVerificarSeUsuariosSaoAmigos = "SELECT * FROM amizade WHERE (id_usuario1 = $id AND id_usuario2 = $idUsuarioDoPost) or (id_usuario1 = $idUsuarioDoPost AND id_usuario2 = $id)";
    $res = $conexao->query($sqlVerificarSeUsuariosSaoAmigos);
    $saoAmigos = $res->fetch_array();
    if($saoAmigos){
        $podeCurtir = true;
    }

    if(!$saoAmigos && ($idUsuarioDoPost != $id)){
        echo "<script>
        alert('Você nao e amigo dessa pessoa, nao pode curtir essa publicacao!');
        location.href = 'visualizar_perfil.php?idUsuario=$idUsuarioDoPost';
    </script>";
    }else{
        $sql = "SELECT * FROM curtida WHERE id_postagem_curtida = '$idPost' AND id_usuario_curtida = '$id' ";
        $res = $conexao->query( $sql );
        $consulta = $res->fetch_array();
        if($consulta){
            echo "<script>
                alert('Você já curtiu essa publicação!.');
                location.href = 'feed.php';
            </script>";
            header("location: visualizar_perfil.php?idUsuario=$idUsuarioDoPost");
        }else{
        $sql = "INSERT INTO curtida (id_postagem_curtida, id_usuario_curtida) VALUES ('$idPost', '$idusuario')";
        $res = $conexao->query( $sql );
        if ($res == true) {

            echo "<script>
                    alert('Publicação curtida com sucesso.');
                    location.href = 'visualizar_perfil.php?idUsuario=$idUsuarioDoPost';
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