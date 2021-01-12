<?php 

class categorias{
	public function adicionarCategoria($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		

		$sql = "INSERT into genero (genero) VALUES ('$dados[0]')";

		return mysqli_query($conexao, $sql);
	}


	public function atualizarCategoria($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		

		$sql = "UPDATE etinia SET nome_categoria = '$dados[1]' where id_categoria = '$dados[0]'";

		echo mysqli_query($conexao, $sql);
	}


	public function excluirCategoria($idcategoria){
		$c = new conectar();
		$conexao=$c->conexao();
		

		$sql = "DELETE from etinia where id = '$idcategoria' ";

		return mysqli_query($conexao, $sql);
	}

}

?>