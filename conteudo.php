<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Conteudo</title>
		
		<?php require_once "sistema/classes/conexao.php"; 
		$c= new conectar();
		$conexao=$c->conexao();
		$sql="SELECT id, nome
		from estados";
		$result=mysqli_query($conexao,$sql);
		?>
		
		<link rel="stylesheet" type="text/css" href="sistema//lib/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="sistema/lib/alertifyjs/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="sistema/lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="sistema/lib/select2/css/select2.css">
<link rel="stylesheet" type="text/css" href="sistema/css/menu.css">



<script src="sistema/lib/jquery-3.2.1.min.js"></script>
<script src="sistema/lib/alertifyjs/alertify.js"></script>
<script src="sistema/lib/bootstrap/js/bootstrap.js"></script>
<script src="sistema/lib/select2/js/select2.js"></script>
<script src="sistema/lib/js/funcoes.js"></script>

	</head>
	<body>

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="inicio.php"><img class="img-responsive logo img-thumbnail" src="sistema/img/phpoo.png" alt="" width="200px" height="150px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

            <li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>

            
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Adicionar Categirias <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a id="noticias" href="sistema/view/noticias.php">noticias</a></li>
              <li><a href="sistema/view/categorias.php">estado</a></li>
              <li><a href="sistema/view/etinia.php">etinia</a></li>
              <li><a href="sistema1/sistema/view/tiposDecaso.php">Tipos de caso</a></li>
            </ul>
          </li>      
       
          
          <li class="dropdown" >
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario:   <span class="caret"></span></a>
            <ul class="dropdown-menu">


              <?php if($_SESSION['usuario'] == "admin"): ?>
            <li> <a href="usuarios.php"><span class="glyphicon glyphicon-off"></span> Gestão Usuários</a></li>
          <?php endif; ?>

              <li> <a style="color: red" href="sistema/procedimentos/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->





<!-- /container -->        



	<!-- Inicio da consulta sql de Noticias -->	
	<?php 
	$id = $_GET['id'];

	$sql="SELECT * FROM `noticias` WHERE id= {$id}  " ;
	$sel = $conexao ->query($sql);	

	$noticia = $sel->fetch_assoc();

	$noticia_id = $noticia['id'];
	?>
    <!-- Fim da consulta sql de Noticias -->


    <!-- Inicio da consulta sql das imagens -->
    <?php 
    $sqlC="SELECT no.id,img.id,no.titulo,img.nome, img.url FROM noticias as no, imgConteudo as img WHERE no.id= {$noticia_id} AND img.id_noticia= {$noticia_id} " ;
	$selC = $conexao ->query($sqlC);	


	//$imagens_id = $imagens['id'];
	?>
	
    <!-- Fim da consulta sql de imagens -->
		<div class="container">
			<h1>Conteudo</h1>
			<div class="row">
				<div class="col-sm-12">
					<!-- Inicio form das imagens -->
					<form action="sistema/procedimentos/noticias/inserirImgConteudo.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
						<h2>Ensira as imagens das noticias aqui</h2>
						<label>Imagem</label> <br>
						
						<input type="file" id="poster" riquerid name="poster">
						<br>
						
						
						<p></p>
						
						<input max name="id" type="hidden" size="25" value="<?php echo $noticia['id']; ?>" />
						
						<input type="submit" class="btn btn-primary" value="Enviar">
					</form>
					<!-- Fim form das imagens -->

					 <!-- Inicio da demonstração das imagens para o úsuario -->
					<div class="col-sm-12">
						<div  class="row">
						<!-- se tiver imagens no bd, moste a imagens -->	
						<?php if ($imagens = $selC->fetch_assoc()) : ?>	
							<?php 

						$cont = 0;
						
						while ($imagens = $selC->fetch_assoc()) : ?>
							
							<div   class='col-sm-3 text-center'>
								
									
								<img   height="180px" class="img-thumbnail" src="../imgConteudo/<?php echo $imagens['nome']; ?>">
									
							
								<div>
									<p><?php echo $imagens['url']; ?></p>
								</div>
								
							</div>
								<?php 
									if(++$cont % 4 == 0){
										echo "</div>";
										echo "<div class='row'>";
									}
							endwhile; ?>
						<!-- Fim demonstração imagens -->
							
						<?php else: ?>		
						<!-- se não, moste este aviso -->	
						<h5>não há imgens ainda</h5>

						<?php endif; ?>
						</div>

					</div>	
					<!-- Fim da demonstração das imagens para o úsuario -->
					
					<!-- Inicio form conteudo -->
					<h1>Ensira o conteudo da noticia aqui</h1>
					<br>
					<h3>Titulo: <?php echo $noticia['titulo']; ?></h3>
					<form action="sistema/procedimentos/noticias/inserirConteudo.php" method="post" enctype="multipart/form-data">
						
						
						 <textarea type="textarea"  id="conteudo" name="conteudo"><?php echo $noticia['conteudo']; ?></textarea>
						
						 <br>					
						<input max name="id" type="hidden" size="25" value="<?php echo $noticia['id']; ?>" />
						<input type="submit" class="btn btn-primary" value="Enviar">
					</form>
					<!-- Fim form conteudo -->
				</div>
				
			</div>
		</div>
		
		

	</body>
	</html>
<!-- inicio script da TinyMEC-->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
	tinymce.init({
	  selector: '#conteudo',
	  height: 500,
	  plugins: [
	    "advlist autolink lists link image charmap print preview anchor",
	    "searchreplace visualblocks code fullscreen",
	    "insertdatetime media table paste imagetools wordcount"
	  ],
	  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	  content_css: [
	    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	    '//www.tiny.cloud/css/codepen.min.css'
	  ]
});
</script>
<!-- Fim script da TinyMEC-->


	<?php 
}else{
	header("location:../index.php");
}
?>

