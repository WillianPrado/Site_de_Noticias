<?php

//config.php


//conecxao

$con = new mysqli("127.0.0.1", "root" ,"" , "desing");

if ($con-> connect_error ) {
	die('Erro na conexao :' . $con-> connect_error);
}

?>