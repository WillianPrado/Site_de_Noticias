<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>noticias</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../classes/conexao.php"; 
		$c= new conectar();
		$conexao=$c->conexao();
		$sql="SELECT id, nome
		from estados";
		$result=mysqli_query($conexao,$sql);
		?>
	</head>
	<body>
	<!-- Inicio feedbac do crude -->
    <?php
    if (isset($_GET['feedback']) ) {

	$feedback = $_GET['feedback'];

	if ($feedback == 'editada') {

		$msg = '<div class="alert alert-success" role="alert">
 					Dados da Noticia editada com sucesso!
				</div>';
	
	}elseif ( $feedback == 'excluida') {

		$msg = '<div class="alert alert-success" role="alert">
 					Noticia excluida com sucesso!
				</div>';
	
	}
	elseif ( $feedback == 'conteudo') {

		$msg = '<div class="alert alert-success" role="alert">
 					Contedo adicionado com sucesso!
				</div>';
	
	}
	echo $msg;
	
}
?>
	<!-- fim feedbac do crude -->

		<div class="container">
			<h1>Noticias</h1>
			<div class="row">
				<div class="col-sm-12">
					frmProdutos
					<form id="frmNoticia" enctype="multipart/form-data">
						<label>titulo</label>
						<input type="text" class="form-control input-sm" id="titulo" name="titulo">
						<label>Estado</label>
						<select class="form-control input-sm" id="estadoSelect" name="estadoSelect">
							<option value="A">Selecionar Estado</option>
							<?php while($mostrar=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
							<?php endwhile; ?>
						</select>

						<label>Tipos de Casos</label>
						<select class="form-control input-sm" id="tipoDeCasoSelect" name="tipoDeCasoSelect">
						<option value="A">Selecionar tipo de caso</option>
								<?php 
								$sql="SELECT id, nome
								from tipoDeCasos";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>
						</select>
						<label>Capital</label>
						<select class="form-control input-sm" id="capitalSelect" name="capitalSelect">
						<option value="A">Selecionar</option>
								<?php 
								$sql="SELECT id, nome
								from capitais";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>
						</select>
						
						<label>Etinia</label>
						<select class="form-control input-sm" id="etiniaSelect" name="etiniaSelect">
						<option value="A">Selecionar Etinia</option>
								<?php 
								$sql="SELECT id, nome
								from etinias";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>
						</select>

						<label>Generos</label>
						<select class="form-control input-sm" id="generoSelect" name="generoSelect">
						<option value="A">Selecionar genero</option>
								<?php 
								$sql="SELECT id, nome
								from generos";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>
						</select>

						<label>faixa etária</label>
						<select class="form-control input-sm" id="faixaEtariaSelect" name="faixaEtariaSelect">
						<option value="A">Selecionar faixa etária</option>
								<?php 
								$sql="SELECT id, nome
								from faixaEtarias";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>
						</select>
						<label>Quantidade de pessoas</label>
						<input type="text" class="form-control input-sm" id="quantidade" name="quantidade">

						<label>sinopse</label>
						 <br>
						
						
						 <br>
						
						
						<label>Imagem</label> <br>
						<input type="file" id="imagem" name="imagem">
						<br>
						<p></p>

					
						
						<span id="btnAddNoticia" class="btn btn-primary">Adicionar</span>
					</form>
				</div>
				<div class="col-sm-12">
					<div id="tabelaNoticiaLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->
		
		<!-- Inicio consulta para pegar o utiltimo id para enviar para página conteudo -->
		<?php
		$sql= "SELECT (id) FROM `noticias` ORDER BY id DESC LIMIT 1";
		$sel = $conexao->query($sql);	

		$noticia = $sel->fetch_assoc();

		$noticia_id = $noticia['id'];
		?>
		    
		<!-- Fim consulta para pegar o utiltimo id para enviar para página conteudo -->
		
	</body>
	</html>

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




	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAtualizarProduto').click(function(){

				dados=$('#frmProdutosU').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/noticias/atualizarNoticias.php",
					success:function(r){
						if(r==1){
							$('#tabelaNoticiaLoad').load("noticias/tabelaProdutos.php");
							alertify.success("Editado com sucesso!!");
						}else{
							alertify.error("Erro ao editar");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tabelaNoticiaLoad').load("noticias/tabelaNoticias.php");

			$('#btnAddNoticia').click(function(){


				vazios=validarFormVazio('frmNoticia');

				if(vazios > 1){
					alertify.alert("Preencha todos os campos!!");
					return false;
				}

				
				var formData = new FormData(document.getElementById("frmNoticia"));

				$.ajax({
					url: "../procedimentos/noticias/inserirNoticias.php",
					type: "post",					
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						//alert(r);
						if(r == 1){
							<?php 

							$sql="SELECT * FROM `noticias` ORDER BY id DESC LIMIT 1  " ;
							$sel = $conexao ->query($sql);	

							$noticia = $sel->fetch_assoc();

							$noticia_id = $noticia['id'] + 1;
							?>

							window.location.href = "../../conteudo.php?id=<?php echo $noticia_id ?>";
							$('#frmNoticia')[0].reset();
						
							$('#tabelaNoticiaLoad').load("noticias/tabelaNoticias.php");
							
							header("Location: index.php");
							alertify.success("Adicionado com sucesso!!");
							
						}else{
							alertify.error("Falha ao Adicionar");
						}
					}
				});
				
			});
		});
	</script>

	<?php 
}else{
	header("location:../index.php");
}
?>