<?php 


require_once "../../classes/conexao.php";
require_once "../../classes/etinia.php";

$id = $_POST['idcategoria'];

$obj = new categorias();
echo $obj->excluirCategoria($id);

?>