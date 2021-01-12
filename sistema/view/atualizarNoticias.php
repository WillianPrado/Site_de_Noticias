<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Atualizando Noticias</title>
		
		<?php require_once "../classes/conexao.php"; 
		$c= new conectar();
		$conexao=$c->conexao();
		
		?>
		<?php require_once "menu.php"; ?>

<?php  
$id = $_GET['id'];
$sqlNO= "SELECT * FROM noticias WHERE id='$id'";
$result_noticia =  mysqli_query($conexao, $sqlNO);
$noticia = mysqli_fetch_assoc($result_noticia);


?>		
	</head>
	<body>
		<div class="container">
			<h1>Atualizando Noticias</h1>
			<div class="row">
				<div class="col-sm-12">
					<!--INICIO DO FORM -->
					<form action="../procedimentos/noticias/atualizarNoticias.php?id=<?php echo $id;?>" method="post" >
						<!--INICIO ESTADOS -->
						<label>titulo</label>
						<input type="text" class="form-control input-sm" id="titulo" name="titulo" value="<?php echo $noticia['titulo']; ?>">
						<!--FIM TITULO -->

						<!--FIM ESTADOS -->
						<label>Estado</label>
						<select class="form-control input-sm" id="estadoSelect" name="estadoSelect">	
							<!-- valor atual e nome atual de ESTADOS-->
							    <?php 
							    // Selecionando o id de ESTADOS atraves de variaves
							    $estado = $noticia['id_estado'];
							    // Consulta sql do TIPOS DE CASOS
								$sql="SELECT id, nome
								from estados WHERE id= '$estado'";
								$result=mysqli_query($conexao,$sql);
								//fim consutla
								?>
								<!-- Mostra o  valor atual e nome atual de ESTADOS -->
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1] ?></option>
								<?php endwhile; ?>
							<!-- Fim valor atual e nome atual de ESTADOS-->
								<?php 
								// Consulta sql de ESTADOS
								$sql="SELECT id, nome
								from estados";
								$result=mysqli_query($conexao,$sql);
								//fim consulta ESTADOS
								?>
								<!-- Mostra o  valores de ESTADOS existentes-->
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>	
								<!-- FIM o  valores de ESTADOS existentes-->					
							
						</select>
						<!--FIM ESTADOS -->

						<!--INICIO TIPOS DE CASO -->
						<label>Tipos de Casos</label>
						<select class="form-control input-sm" id="tipoDeCasoSelect" name="tipoDeCasoSelect">
							<!-- valor atual e nome atual  TIPOS DE CASOS-->
							    <?php 
							    // Selecionando o id do TIPOS DE CASOS 
							    $tipoDeCaso = $noticia['id_tipoDeCaso'];
							    // Consulta sql do TIPOS DE CASOS
								$sql="SELECT id, nome
								from tipoDeCasos WHERE id='$tipoDeCaso'";
								$result=mysqli_query($conexao,$sql);
								?>
								<!-- mostras os valores existentes TIPOS DE CASOS -->
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1] ?></option>
								<?php endwhile; ?>
							<!-- Fim valor atual e nome atual -->
								<?php 
								$sql="SELECT id, nome
								from tipoDeCasos";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>
						</select>
						<!--FIM TIPOS DE CASO -->


						<label>Capital</label>
						<select class="form-control input-sm" id="capitalSelect" name="capitalSelect">
								<!-- valor atual e nome atual de CAPITAL -->
							    <?php 
							    // Selecionando o id da CAPITAL
							    $capital = $noticia['id_capital'];
							    // Consulta sql da CAPITAL
								$sql="SELECT id, nome
								from capitais WHERE id='$capital'";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1] ?></option>
								<?php endwhile; ?>
							<!-- Fim valor atual e nome atual de CAPITAL -->
							<!-- mostras os valores existentes TIPOS DE CASOS -->
								<?php 
								// Consulta sql da CAPITAL 
								$sql="SELECT id, nome
								from capitais";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<!-- exibindo os valores existentes TIPOS DE CASOS -->
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>
								
						</select>
						<!-- FIM mostras os valores existentes TIPOS DE CASOS -->

						<label>Etinia</label>
						<select class="form-control input-sm" id="etiniaSelect" name="etiniaSelect">
						<!-- valor atual e nome atual de ETINIA-->
							    <?php 
							    // Consulta sql de ETINIA
							     $etinia = $noticia['id_etinia'];
								$sql="SELECT id, nome
								from etinias WHERE id='$etinia'";
								$result=mysqli_query($conexao,$sql);
								//FIM Consulta sql de ETINIA
								?>
								<!-- EXIBINDO valor atual  do nome  ETINIA-->
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1] ?></option>
								<?php endwhile; ?>
							<!-- Fim valor atual e nome atual ETINIA-->
								<?php 
								// Consulta sql de ETINIA
								$sql="SELECT id, nome
								from etinias";
								$result=mysqli_query($conexao,$sql);
								//FIM Consulta sql de ETINIA
								?>
								<!-- exibindo os valores existentes TIPOS DE CASOS -->
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?></option>
								<?php endwhile; ?>
						</select>
						<!--FIM valor atual e nome atual de ETINIA-->

						<label>Generos</label>
						<select class="form-control input-sm" id="generoSelect" name="generoSelect">
						<!-- valor atual e nome atual -->
							    <?php 
							    $genero = $noticia['id_genero'];
								$sql="SELECT id, nome
								from generos WHERE id='$genero'";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1] ?></option>
								<?php endwhile; ?>
							<!-- Fim valor atual e nome atual -->
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
						<!-- valor atual e nome atual da FAIXA ETARIA-->
							    <?php 
							    $faixaEtaria = $noticia['id_faixaEtaria'];
								$sql="SELECT id, nome FROM 
                                `faixaEtarias` 
                                WHERE  id = '$faixaEtaria'";
									$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1] ?></option>
								<?php endwhile; ?>
							<!-- Fim valor atual e nome atual -->
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
						<input type="text" class="form-control input-sm" id="quantidade" name="quantidade" value="<?php echo $noticia['qtdPessoas'] ?>">

						 <br>
						

						
							<input id="btnAddNoticia" class="btn btn-primary"type="submit" value="Atualizar">
					</form>
					<!--FIM DO FORM -->
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
							
							alertify.success("Editado com sucesso!!");
						}else{
							alertify.error("Erro ao editar");
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