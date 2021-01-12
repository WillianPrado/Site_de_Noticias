<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>produtos</title>
		<?php require_once "../../classes/conexao.php"; 
		$c= new conectar();
		$conexao=$c->conexao();
		$sql="SELECT id, nome
		from estados";
		$result=mysqli_query($conexao,$sql);
		?>
	</head>
	<body>
	<?php	
	$sql="SELECT    no.titulo,
					img.nome
					

		  /*as tabelas das noticias*/		
		  from       noticias    as no  
		  inner join imagens     as img 
		  
		  where

		  no.id_imagem      =img.id 

		  
		  ORDER BY no.id DESC
		  ";

	$result=mysqli_query($conexao,$sql);

	

 ?>
<img src="../../arquivos/au.jpg">

 <?php while($mostrar=mysqli_fetch_row($result)): ?>

 	<a href="#">
	 	<div <?php echo 'class="mostrar[1]"'?> width="310" height="310">
			<img id="<?php echo 'mostrar[1]'?>" width="300" height="300" src="../../arquivos/<?php echo $mostrar[1]; ?>">		
		</div>	
	</a>
<?php endwhile; ?>	

</body>
	</html>		

	<?php 
}else{
	header("location:../index.php");
}
?>