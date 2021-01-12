<?php 

class categorias{
	public function adicionarCategoria($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		

		$sql = "INSERT into tiposDecaso (tiposDecaso) VALUES ('$dados[0]')";

		return mysqli_query($conexao, $sql);
	}


	public function atualizarCategoria($dados){
		$c = new conectar();
		$conexao=$c->conexao();

		

		$sql = "UPDATE tiposDecaso SET tiposDecaso = '$dados[1]' where id = '$dados[0]'";

		echo mysqli_query($conexao, $sql);
	}


	public function excluirCategoria($idcategoria){
		$c = new conectar();
		$conexao=$c->conexao();
		

		$sql = "DELETE from categorias where id_categoria = '$idcategoria' ";

		return mysqli_query($conexao, $sql);
	}

}

?>