<?php  
require_once "../../classes/conexao.php";
	$c = new conectar();
	$conexao=$c->conexao();
	$id = $_GET['id'];

$dados[0]=$_POST['titulo'];
$dados[2]=$_POST['estadoSelect'];
$dados[3]=$_POST['capitalSelect'];
$dados[4]=$_POST['tipoDeCasoSelect'];
$dados[5]=$_POST['etiniaSelect'];
$dados[6]=$_POST['generoSelect'];
$dados[7]=$_POST['faixaEtariaSelect'];
$dados[8]=$_POST['quantidade'];




			$sql="UPDATE `noticias` SET 
			`titulo`='$dados[0]',
			`id_estado`='$dados[2]',
			`id_faixaEtaria`='$dados[7]',
			`id_genero`='$dados[6]',
			`id_etinia` = '$dados[5]',
			`id_tipoDeCaso`='$dados[4]',
			`id_capital`='$dados[3]',
			`qtdPessoas`='$dados[8]' WHERE id={$id}";
			

	if( mysqli_query($conexao,$sql)){
			

			header("Location: ../../view/noticias.php?feedback=editada");
					
	}else{
		echo "erro: ";
		echo $sql;
	}

?>			