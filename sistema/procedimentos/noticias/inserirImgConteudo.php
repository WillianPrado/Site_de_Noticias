<?php 
	session_start();
	$iduser=$_SESSION['iduser'];
	require_once "../../classes/conexao.php";
	$c = new conectar();
	$conexao=$c->conexao();
	//$imagem = $_POST['imagem'];
	$id_noticia = $_POST['id'];

	$bdUrl= 'imgConteudo/';//caminho da url do banco de dados
	
	$nomeImg=$_FILES['poster']['name'];
	$urlArmazenamento=$_FILES['poster']['tmp_name'];
	$pasta='../../../imgConteudo/'; //caminho da upload
	$urlFinal=$pasta.$nomeImg;// url do upload
	$urlFinalBd=$bdUrl.$nomeImg; //url que sera gravada no banco de dados

	move_uploaded_file($urlArmazenamento, $urlFinal);


		
	
		$sql = "INSERT INTO `imgConteudo`(`nome`, `id_noticia`, `url`) VALUES ('$nomeImg','$id_noticia','$urlFinalBd')";
	
	$id = $_GET['id'];

	
if (mysqli_query($conexao, $sql)) {
	header("Location:  ../../../conteudo.php?id=$id_noticia");
	 } else {
	echo $sql;
	 }

	

	
?>
