<!-- D -->
<!-- 1 Cabecera y conexion-->
<?php 
include 'includes/cabecera.php';
?>

<?php 
include 'includes/conexion.php';
?>
<!-- Aqui comienza el body -->







<form  ENCTYPE="multipart/form-data" action="publicar_post_submit(bien).php" method="POST" accept-charset="utf-8" class="post">
	
<label>Titulo del post</label><br>
<textarea name="titulo" placeholder="escribe tu nombre"></textarea>
<br><br><br>
<label>Descripción</label><br>
<textarea name="descripcion" placeholder="escribe decripcion del post" ></textarea>
<br><br><br>


<label>Etiqueta tu post con alguna de las existentes</label><br>
<!-- Select multiple con peticion select etiqueta,nombre_etiqueta from etiqueta -->
<select  name="idetiqueta[]" multiple>
<?php 

$peticion1="
SELECT idetiqueta,nombre_etiqueta FROM etiqueta";
$resul1=mysqli_query($conexion,$peticion1);

// 3- While para recorrer todas las etiquetas
while($fila=mysqli_fetch_array($resul1)){
echo "<option value='".utf8_encode($fila['idetiqueta'])."'>
".utf8_encode($fila['nombre_etiqueta'])."</option>";
}
?>
</select>




<!-- 4- Input para poner la imagen del post -->
<br><br><br>
<label>Imagen de cabecera del post</label><br>
<INPUT NAME="fichero" TYPE="file">
<br><br><br>




<label>Post</label><br>
<textarea name="post"  placeholder="escribe tu mensaje aqui" rows="10"cols="60"></textarea>
<br><br><br>



<INPUT TYPE="submit" VALUE="Publicar post"> 
</FORM>



