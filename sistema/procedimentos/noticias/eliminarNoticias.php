<?php 

	require_once "../../classes/conexao.php";
	$c = new conectar();
	$conexao=$c->conexao();
	$id = $_GET['id'];

//pegando nome da imagem
$sqlimg="SELECT  nome
		from  imagens as img
		where   img.id='{$id}'
		LIMIT 1";

			$resultimg=mysqli_query($conexao,$sqlimg);

			$nome=mysqli_fetch_row($resultimg);

$pasta="../../arquivos/";
$urll= $pasta.$nome[0];
//fim pegar nome
	//apagando noticias
	$sql = "DELETE FROM `noticias` WHERE id_imagem='$id'";
	echo $id;
	echo $urll;

	$result=mysqli_query($conexao,$sql);
	//fim apagandonoticias
	if($result){
			
		//apagando imagem no banco de dadosw
		$sqlI="DELETE from imagens where id='$id'";
		$result=mysqli_query($conexao,$sqlI);
		//fim apagando imagens no banco de dados	

			header("Location: ../../view/noticias.php?feedback=excluida");
					
	}


		

			
		

	 

	
?>