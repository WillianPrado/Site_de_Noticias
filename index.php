<?php
//inclui as configuraçoes de conexao ao banco de dados
include('config.php');
?>


<!DOCTYPE html>
<html>
<head>
    <title>Superação&Sucesso</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/fontawesome/css/all.css">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="lib/lightbox/ekko-lightbox.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>



<!-- Header -->

<header id="sucesso" class="container-fluid site-header">

		<img id="sucesso" src="arquivos/sucesso.png"  text='Superação & Sucesso' width="100%" height="15%" >
		
	
</header>

 <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
 
  <!-- Links -->
 <ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php">Home</a>
			</li>
		
			
			<!-- Dropdown -->
		    <li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		        Tipos de casos
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=tipoDeCasos&id=2">Empresarial</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=tipoDeCasos&id=1">Estudantil</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=tipoDeCasos&id=3">Esporte</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=tipoDeCasos&id=7">Ecologico</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=tipoDeCasos&id=5">Social</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=tipoDeCasos&id=4">Outros</a>

		      </div>
		    </li>
		    <li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		        Faixa Etária
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=faixaEtarias&id=4">Idoso</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=faixaEtarias&id=3">Adulto</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=faixaEtarias&id=2">Jovem</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=faixaEtarias&id=1">Criança</a>
		      </div>
		    </li>
		    <li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		        Etnia
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=etinias&id=3">Negro</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=etinias&id=2">Pardo</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=etinias&id=1">Branco</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=etinias&id=4">Japonês</a>		        
		        
		      </div>
		    </li>
		    <li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		        Gênero
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=genero&id=1">Homem</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=genero&id=2">Mulher</a>
		        <a class="dropdown-item" href="index.php?sec=busca&assunto=genero&id=3">Empresa</a>
		      </div>
		    </li>
		    </li>
		   
		    
		</ul>

  <!-- Busca -->
	<form class="form-inline" action="index.php" method="get">
		<input type="hidden" name="sec" value="busca">
		<input type="hidden" name="assunto" value="geral">
		<div class="input-group">
			<input type="text" name="palavra" class="form-control" placeholder="Busca">
			<div class="input-group-append">
				<button class="btn btn-dark" type="submit">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</div>
		
	</form>

</nav> 







<!-- Main/Principal -->
<section id="index1" class="container-fluid site-main">
	<div id="index2" class="container">
<?php
//verificando qual pagina sera incluida no meio do site
if (isset($_GET['sec'])) {

	// seçoes aceitaveis para inclusao
	$secoes = ['noticias','generos','busca', 'conteudo','noticia'];
	$sec = $_GET['sec'];

	if (in_array($sec, $secoes)) { //existe esta secao
		include("pages/" . $sec . ".php");
	}else{ // nao existe
		include("pages/principal.php");
	}
}else{
	include('./pages/principal.php');

}

?>
	</div>
</section>




<!-- Footer -->
<footer class="container-fluid site-footer">
	<div class="container">
		
	</div>
</footer>



<!-- Javascripts -->
<script src="lib/js/jquery-3.4.1.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script src="lib/js/scripts.js"></script>

</body>
</html> 