<?php
//pages/principal.php

?>

<h1>Confira nossas notícias</h1>

<?php
$sql = "SELECT  noo.id, img.nome, noo.titulo 
			FROM noticias as noo, imagens img 	
			WHERE noo.id_imagem = img.id 
            order by  RAND() desc"; 

//executar um comando sql no bd
$sel = $con->query($sql);?>
<div id="noticias" class="container-fluid">
	<div id="fotoss"  class="conteiner">
<?php if($sel -> num_rows == 0): ?>
	<div id="noticias" class="alert alert-secondary">
		Nenhum resultado encontrado!
	</div> 

<?php else : ?>
	<div id="index3" class="row">
		<?php
		$cont = 0;
       
		while ($noticias = $sel->fetch_assoc()) : ?>
			
			<div  class='col-lg-4 poster text-center'>
				<a class="noticias" data-toggle="lightbox" data-gallery="galeria"href="index.php?sec=noticia&id=<?php echo $noticias['id'];?> ">
					
				<img class="img-thumbnail" src="sistema/arquivos/<?php echo $noticias['nome']; ?>" title="<?php echo $noticias['titulo'];?>"   >
                
				<br>	
				<div class="noticias" class="titulo">
                    <?php echo $noticias['titulo'];  ?>
               </div>
               
				</a>
			</div>
		<?php 
			if(++$cont % 3 == 0){
				echo "</div>";
				echo "<div class='row'>";
			}
			endwhile; ?>
	</div>
	</div>	


	<?php endif; ?>

</div>