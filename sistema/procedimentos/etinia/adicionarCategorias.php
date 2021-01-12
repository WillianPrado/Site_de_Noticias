<?php 

session_start();
require_once "../../classes/conexao.php";
require_once "../../classes/etinia.php";



$data = date("Y-m-d");

$idusuario = $_SESSION['iduser'];
$categoria = $_POST['categoria'];


$obj = new categorias();



$dados=array(

	$categoria


);

echo $obj->adicionarCategoria($dados);

 ?>