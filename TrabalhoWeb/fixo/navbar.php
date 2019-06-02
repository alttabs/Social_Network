<?php

if ($_SESSION["logado"] != "true") {
	header("location: index.php");
} else {
	if ($_GET != NULL) {
		var_dump($_GET);		
	}
}
?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">

	<a class="navbar-brand" href="#">Rede Social</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">

		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="./feed.php">Home <span class="sr-only">(current)</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="./solicitacoes_amizade.php">Solicitações de Amizade</a>
			</li>
		</ul>

		<form method="GET" action="listagemusuariosbusca.php" class="form-inline my-2 my-lg-0">
			<input name="buscar_usuarios" class="form-control mr-sm-2" type="search" placeholder="Buscar por amigos" aria-label="Search">
			<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Buscar</button>
		</form>
	</div>
</nav>