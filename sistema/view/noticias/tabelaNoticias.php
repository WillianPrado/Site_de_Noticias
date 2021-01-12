
<?php 
	require_once "../../classes/conexao.php";
	$c= new conectar();
	$conexao=$c->conexao();
	$sql="SELECT    no.titulo,
					img.url,
					est.nome,
					ca.nome,
					tip.nome,
					et.nome,
					ge.nome,
					fa.nome,
					no.qtdPessoas,
					no.id_imagem,
                    no.id

		  /*as tabelas das noticias*/		
		  from       noticias    as no  
		  inner join imagens     as img 
		  inner join estados      as est 
		  inner join capitais     as ca  
		  inner join tipoDeCasos  as tip 
		  inner join etinias      as et  
		  inner join generos      as ge               
		  inner join faixaEtarias as fa  
		  
		  where

		  no.id_imagem      =img.id AND 

		  no.id_estado      =est.id AND

		  no.id_capital     =ca.id  AND

		  no.id_tipoDecaso  =tip.id AND

		  no.id_etinia      =et.id  AND

		  no.id_genero      =ge.id  AND

		  no.id_faixaEtaria =fa.id

		  ORDER BY no.id DESC
		  ";

	$result=mysqli_query($conexao,$sql);

	

 ?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Noticias</label></caption>
	<tr>
		<td>Titulos</td>
		<td>Imagens</td>
		<td>Estados</td>
		<td>Capitais</td>
		<td>Tipos De Caso</td>
		<td>Etinias</td>
		<td>Generos</td>
		<td>Faixa Etarias</td>
		<td>Quantidade de Pessoas</td>
        <td>Editar conteudo</td>
        <td>Editar Dados</td>
	</tr>

	<?php while($mostrar=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $mostrar[0]; ?></td>
		<td>
			<?php 
			$imgVer=explode("/", $mostrar[1]) ; 
			$imgurl=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3];
			?>
			<img width="80" height="80" src="<?php echo $imgurl ?>">
		</td>
		<td><?php echo $mostrar[2]; ?></td>
		
		<td><?php echo $mostrar[3]; ?></td>

		<td><?php echo $mostrar[4]; ?></td>
		
		<td><?php echo $mostrar[5]; ?></td>

		<td><?php echo $mostrar[6]; ?></td>

		<td><?php echo $mostrar[7]; ?></td>

		<td><?php echo $mostrar[8]; ?></td>
        <td>
			<a href="../../../conteudo.php?id=<?php echo $mostrar[10] ?>">
				
				<span  data-toggle="modal" data-target="#abremodalUpdateProduto" class="btn btn-warning btn-xs" >
                    Editar conteudo
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</a>
		</td>
        <td>
			<a href="atualizarNoticias.php?id=<?php echo $mostrar[10] ?>">
				
				<span  data-toggle="modal" data-target="#abremodalUpdateProduto" class="btn btn-warning btn-xs" >
                    Editar dados
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</a>
		</td>
		
		<td>
			<a href="../procedimentos/noticias/eliminarNoticias.php?id=<?php echo $mostrar[9] ?>">
			<span class="btn btn-danger btn-xs">
                Excluir noticia
				<span class="glyphicon glyphicon-remove"></span>
			</span>
			</a>
		</td>
	</tr>

<?php endwhile; ?>
</table>