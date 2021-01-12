<?php 
	session_start();
	$iduser=$_SESSION['iduser'];
	require_once "../../classes/conexao.php";
	require_once "../../classes/noticias.php";

	$obj= new produtos();

	$dados=array();
	
	$nomeImg=$_FILES['imagem']['name'];
	$urlArmazenamento=$_FILES['imagem']['tmp_name'];
	$pasta='../../arquivos/';
	$urlFinal= $pasta.$nomeImg;

	$dadosImg=array(
				
		$_POST['tipoDeCasoSelect'],
		$nomeImg,
		$urlFinal
					);

		if(move_uploaded_file($urlArmazenamento, $urlFinal)){
				$idimagem=$obj->addImagem($dadosImg);

				if($idimagem > 0){
					$dados[0]=$_POST['titulo'];
		
					$dados[1]=$idimagem;	

					$dados[2]=$_POST['estadoSelect'];

					$dados[3]=$_POST['capitalSelect'];

					$dados[4]=$_POST['tipoDeCasoSelect'];

					$dados[5]=$_POST['etiniaSelect'];

					$dados[6]=$_POST['generoSelect'];

					$dados[7]=$_POST['faixaEtariaSelect'];

					$dados[8]=$_POST['quantidade'];

					$dados[9]=$_POST['conteudo'];

					echo $obj->inserirNoticia($dados);
				}else{

					echo 0;
				}
		}

 ?>