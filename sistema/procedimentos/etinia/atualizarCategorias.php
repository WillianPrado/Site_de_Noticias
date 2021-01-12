<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/etinia.php";



$obj = new produtos();



$dados=array(

	$_POST['categoriaU']

);

echo $obj->atualizarCategoria($dados);

 ?>