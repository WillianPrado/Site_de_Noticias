<!-- Comentários -->
<?php
	

	
	include("../config.php");


	$id = $_POST['id'];
	$mensagem = $_POST['texto'];
	

	$sql = "INSERT INTO noticias (conteudo) VALUES ( '$mensagem')
			WHERE id = {$id}";
	if (mysqli_query($con, $sql)) {
	//       //echo "New record created successfully";
	 } else {
	//     //echo "Error: " . $sql . "<br>" . mysqli_error($con);
	 }

	header("Location: ../index.php?sec=filme&id={$id}");

?>

<?php


require_once '../config.php';



$id    = $_POST['id'];

$comentario = $_POST['comentario'];

$sqlComentario = "UPDATE `noticias` 
					SET `conteudo`= '$comentario' 
					WHERE '$id'";


	 $con -> query($sqlComentario);		

	 header("Location: conteudo.php");


?>
