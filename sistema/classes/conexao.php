<?php 

class conectar{
	private $servidor = "ftpupload.net";
	private $usuario = "epiz_24695320";
	private $senha = "XbXu3m1A2W";
	private $bd = "epiz_24695320_sistema";
    //$conexao = new mysqli("sql103.epizy.com", "epiz_24695320" ,"XbXu3m1A2W" , "epiz_24695320_noticias");

	public function conexao(){
		$conexao = new mysqli("127.0.0.1", "root" ,"" , "desing");

		return $conexao;
	}
}

 ?>
 <?php

//config.php


