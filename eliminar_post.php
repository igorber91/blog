<?php 
include 'includes/cabecera.php';
?>

<?php 
include 'includes/conexion.php';
?>






<form  ENCTYPE="multipart/form-data" action="parejas/eliminar_post_submit.php" method="POST" accept-charset="utf-8">
	


<label>Selecciona el post que quieres eliminar</label><br>
<select  name="idpost" >
<?php 

$peticion1="
SELECT * FROM post";
$resul1=mysqli_query($conexion,$peticion1);
while($fila=mysqli_fetch_array($resul1)){
echo "<option value='".utf8_encode($fila['idpost'])."'>
".utf8_encode($fila['titulo'])."</option>";
}
?>
</select>













<INPUT TYPE="submit" VALUE="Eliminar post"> 
</FORM>



