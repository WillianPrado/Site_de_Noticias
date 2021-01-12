<?php include("../config.php"); ?>






<div class="row">
	<div class="col-sm-4">
		<form id="frmComentario" action="conteudoForm.php" method="post">

			
			<label>comentario:</label>
			<label>Capital</label>
						<select class="form-control input-sm" id="capitalSelect" name="capitalSelect">
						<option value="A">Selecionar</option>
								<?php 
								$sql="SELECT id, nome
								from noticias";
								$result=mysqli_query($conexao,$sql);
								?>
								<?php while($mostrar=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1]; ?>
							</option>
								<?php endwhile; ?>
						</select>

			 <textarea id="comentario" name="comentario">Hello, World!</textarea>


			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="submit" name="Enviar" class="btn btn-primary">
			
		</form>
		<h3>Comentarios</h3>
		
	</div>
</div>


<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
	tinymce.init({
	  selector: '#comentario',
	  height: 500,
	  plugins: [
	    "advlist autolink lists link image charmap print preview anchor",
	    "searchreplace visualblocks code fullscreen",
	    "insertdatetime media table paste imagetools wordcount"
	  ],
	  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	  content_css: [
	    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	    '//www.tiny.cloud/css/codepen.min.css'
	  ]
	});
</script>