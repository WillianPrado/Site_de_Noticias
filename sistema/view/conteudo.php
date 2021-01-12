<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>produtos</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../classes/conexao.php"; 
		$c= new conectar();
		$conexao=$c->conexao();
		$sql="SELECT id, titulo
		from noticias";
		$result=mysqli_query($conexao,$sql);
		?>
	</head>
	<body>
		<div class="container">
			<h1>Noticias</h1>
			<div class="row">
				<div class="col-sm-4">
					frmProdutos
					<form id="frmNoticia" enctype="multipart/form-data">
						
						<label>titulo</label>
						<select class="form-control input-sm" id="estadoSelect" name="estadoSelect">
							<option value="A">Selecionar noticia</option>
							<?php while($mostrar=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
							<?php endwhile; ?>
						</select>

						

						<textarea id="conteudo"></textarea>
						
						<span id="btnAddNoticia" class="btn btn-primary">Adicionar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tabelaNoticiaLoad"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->
		
	

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

			$('#btnAddNoticia').click(function(){

				vazios=validarFormVazio('frmNoticia');

				if(vazios > 0){
					alertify.alert("Preencha todos os campos!!");
					return false;
				}

				var formData = new FormData(document.getElementById("frmNoticia"));

				$.ajax({
					url: "../procedimentos/noticias/inserirConteudo.php",
					type: "post",					
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(r){
						//alert(r);
						if(r == 1){
							$('#frmNoticia')[0].reset();
							
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