<?php

$termo = ['assunto' => '','campo' =>'']; //oque esta sendo buscado.
$comp = 'Geral';

// lIMITE DE BUSCA



if (isset($_GET['assunto'])) { //busca por um assunto especifico

	$assunto = $_GET['assunto'];
	$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
	$palavra = (isset($_GET['palavra'])) ? $_GET['palavra'] : "";
	

	switch ($assunto) {
		case 'genero':
			$sql = "SELECT no.id, img.nome, no.titulo 
						FROM noticias as no, imagens img, generos ge 
						WHERE no.id_imagem = img.id 
						AND no.id_genero = ge.id 
						AND ge.id = {$id}
                        order by  RAND() desc";
			break;

		case 'tipoDeCasos':
			$sql = "SELECT no.id, img.nome, no.titulo 
						FROM noticias as no, imagens img, tipoDeCasos ti 
						WHERE no.id_imagem = img.id 
						AND no.id_tipoDeCaso = ti.id 
						AND ti.id = {$id}
                        order by  RAND() desc";
			break;

		case 'faixaEtarias':
			$sql = "SELECT no.id, img.nome, no.titulo 
						FROM noticias as no, imagens img, faixaEtarias fa 
						WHERE no.id_imagem = img.id 
						AND no.id_faixaEtaria = fa.id 
						AND fa.id = {$id}
                        order by  RAND() desc";
			break;	

		case 'etinias':
			$sql = "SELECT no.id, img.nome, no.titulo 
						FROM noticias as no, imagens img, etinias et 
						WHERE no.id_imagem = img.id 
						AND no.id_etinia = et.id 
						AND et.id = {$id}
                        order by  RAND() desc";
			break;	

		//buscar em titulo do filme, nome do ator, diretor ou genero
		case 'geral':
			if($palavra != ""){
				$sql = "SELECT DISTINCT(no.id),ti.nome ,  no.titulo, et.nome, fa.nome, ge.nome,img.nome  FROM noticias AS no, etinias et, faixaEtarias fa, imagens img, generos as ge, tipoDeCasos as ti WHERE (no.id_faixaEtaria = fa.id AND no.id_imagem = img.id ) AND  (no.id_genero = ge.id AND no.id_imagem = img.id ) AND (no.id_tipoDeCaso = ti.id AND no.id_imagem = img.id)AND (no.id_etinia = et.id AND no.id_imagem = img.id) AND (no.titulo LIKE '%{$palavra}%' OR et.nome LIKE '%{$palavra}%' OR fa.nome LIKE '%{$palavra}%' OR ge.nome LIKE '%{$palavra}%')";
			}else{
				$sql = "SELECT id, titulo  FROM `noticias` no WHERE id = 9";
			}
		//buscar em tituo do filme, nome do ator, diretor ou genero.
			$termo['assunto'] = 'Geral';
			$termo['campo'] = 'titulo';
			break;
		
		default:
			# code...
		break;
	}	


	$sel = $con -> query($sql);

}else {
	//busca o form
}

?>

<div id="noticias" class="container-fluid">
	<div id="fotoss"  class="conteiner">
<h1 class="">Resultados</h1>
<?php if($sel -> num_rows == 0): ?>
	<div class="alert alert-secondary">
		Nenhum resultado encontrado!
	</div>
	<?php echo $sel ?>
<?php else : ?>
	<div id="index4" class="row">
		<?php
		$cont = 0;
		while ($noticias = $sel->fetch_assoc()) : ?>
			
				
				<div  class='col-lg-4 poster text-center'>
					<a class="noticias" data-toggle="lightbox" data-gallery="galeria"href="index.php?sec=noticia&id=<?php echo $noticias['id'];?> ">
						
					<img class="img-thumbnail" src="sistema/arquivos/<?php echo $noticias['nome']; ?>" title="<?php echo $noticias['titulo'];?>"   >
						
					</a>
					<div>
						<a class="noticiasBus" href="index.php?sec=noticia&id=<?php echo $noticias['id'];?> ">
						<?php echo $noticias['titulo'];  ?> 
						</a>
					</div>
					
				</div>
			<?php 
				if(++$cont % 3 == 0){
					echo "</div>";
					echo "<div class='row'>";
				}
			endwhile; ?>
	</div>

	<?php endif; ?>
	</div>
</div>