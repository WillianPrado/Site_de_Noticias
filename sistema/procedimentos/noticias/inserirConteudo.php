<?php 
	session_start();
	$iduser=$_SESSION['iduser'];
	require_once "../../classes/conexao.php";
	$c = new conectar();
	$conexao=$c->conexao();
	//$imagem = $_POST['imagem'];
	$id_noticia = $_POST['id'];	
	$conteudo = $_POST['conteudo'];	
	
		$sql = "UPDATE `noticias` SET `conteudo`=('$conteudo') WHERE id={$id_noticia}";
	
	$id = $_GET['id'];

	
if (mysqli_query($conexao, $sql)) {
	header("Location:  ../../view/noticias.php?feedback=conteudo");
	 } else {
	echo $sql;
	 }

	

	
?>
