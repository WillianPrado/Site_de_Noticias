<!-- consulta sql das noticias -->
<?php
	$id = $_GET['id'];	

	$sql = "SELECT conteudo, titulo, id_tipoDeCaso FROM `noticias` WHERE id = {$id} ";
	$sel = $con->query($sql);
	$sels = $con->query($sql);

	
?>
<!-- Fim consulta sql das noticias -->

<!-- div que mostra o tudo do conteudo dá noticia e anuncios -->
<div class="container-fluid">
  <div class="row">
  <?php if($sel -> num_rows == 0): ?>
		<div class="alert alert-secondary">
			Nenhum resultado encontrado!
		</div>
		<!-- se encontrar noticia mostra ela -->	
		<?php else : ?>

		<?php while ($noticias = $sel->fetch_assoc()) : ?>			
			<h1 id="cabecalho" ><?php echo $noticias['titulo'];?></h1>	<!-- mostra titulo da noticia -->
	        <?php $conteudo = $noticias['conteudo'];?>	<!-- passando o conteudo para uma variavel no intuito de utilizar ela embaixo -->
        <?php endwhile; ?>		
        <!-- Fim while -->			
	<?php endif; ?>	
							
				
  	<!-- div que mostra apenas o conteudo e titulo da noticia -->
	  <div class=" col-lg-8 ">
            <?php echo $conteudo;?><!-- exibe o conteudo da noticia -->
               
	  </div>
		<!-- Fim div que mostra apenas o conteudo e titulo da noticia -->

	<!-- div que mostra os anuncios, materias e outras noticias -->
	  <div id="noticias" class=" col-lg-4 ">.
      <h1>Notícias relacionadas</h1>
	  	<!-- pegando o ID do tipo de casa da noticia -->
			<?php 
				$noticiass = $sels->fetch_assoc();
				$id_tipoDeCaso = $noticiass['id_tipoDeCaso'];
			?>
			<!--Fim pegando o ID do tipo de casa da noticia -->
			
			<!--Consulta Sql dos tipos de casos -->
			<?php
				$sqlTipoDeCasos = "SELECT no.id, img.nome, no.titulo 
									FROM noticias as no, imagens img, tipoDeCasos ti 
									WHERE no.id_imagem = img.id 
									AND no.id_tipoDeCaso = ti.id 
									AND ti.id = {$id_tipoDeCaso}
									order by  RAND() desc
                                    LIMIT 5 
                                    ";
				
				$selTipoDeCasos = $con->query($sqlTipoDeCasos);
		  	?>
			<!-- Fim Consulta Sql dos tipos de casos -->	
			<?php if($selTipoDeCasos -> num_rows == 0): ?>
				<div class="alert alert-secondary">
					Nenhum resultado encontrado!
				</div>

				<!-- se encontrar noticia mostra ela -->	
				<?php else : ?>
				<?php while ($noticiasTipoDeCasos = $selTipoDeCasos->fetch_assoc()) : ?>
							
					<div   class='col-lg-12 poster text-center'>
						<!-- Link na imagem da noticia -->
						<a class="noticias" data-toggle="lightbox" data-gallery="galeria" href="index.php?sec=noticia&id=<?php echo $noticiasTipoDeCasos['id'];?> ">
									
							<img class="noticias" class="img-thumbnail" src="sistema/arquivos/<?php echo $noticiasTipoDeCasos['nome']; ?>" title="<?php echo $noticiasTipoDeCasos['titulo'];?>"   >
                            
									
						</a>
						<!-- FimLink na imagem da noticia -->

						<!-- Div mostra titulo -->		
						<div>
							<a class="noticias" href="index.php?sec=noticia&id=<?php echo $noticiasTipoDeCasos['id'];?> ">
								<?php echo $noticiasTipoDeCasos['titulo'];  ?> 
							</a>
						</div>
						<!-- Fim Div mostra titulo -->		
					</div>
				<?php endwhile; ?>
		
			<?php endif; ?>
		</div>
		<!-- Fim div que mostra os anuncios, materias e outras noticias -->		

	</div>
	<!-- Fim div row -->
</div>
<!-- Fim div container-fluid -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


 <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <!-- Your share button code -->
  <p>compartilhe a esse relato com seus amigos 
  
 
 <button class="fb-share-button" 
    data-href="http://sucessoemotivacao.epizy.com/index.php?sec=noticia&amp;id=<?php echo $_GET['id']; ?>" 
    data-layout="button_count">
  </button>

  

</p>
<!--Comentarios do Facebook -->
<div class="fb-comments" data-href="http://sucessoemotivacao.epizy.com/index.php?sec=noticia&amp;id=<?php echo $_GET['id']; ?>" data-width="" data-numposts="5"></div>
<!-- Script de Comentários do facebook-->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0"></script>

	