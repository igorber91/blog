<?php 
include 'includes/cabecera.php';
?>

<?php 
include 'includes/conexion.php';
?>


<?php 
echo " Estas modificando al post:  "; 
$idpost2=$_GET['idpost'];
echo"$idpost2  <br>";




	
$peticion1="select * from post where idpost=$idpost2";

$resul1=mysqli_query($conexion,$peticion1);
while($fila1=mysqli_fetch_array($resul1)){

$titulo2=$fila1['titulo'];
$descripcion2=$fila1['descripcion'];


$imagen2=$fila1['imagen'];
$fecha2=$fila1['fecha'];
$contenido2=$fila1['contenido'];
$estado_post2=$fila1['estado_post'];


}

echo'<br> 
<form  enctype="multipart/form-data" action="intermediaro_actualizar.php?idpost='.$idpost2.'" method="POST" accept-charset="utf-8">

<input type="text" name="titulo2" value="'.$titulo2.'">

<label>titulo</label><br>


<input type="text" name="descripcion2"  value="'.$descripcion2.'">
<label>descripcion</label><br>


<img src="'.$imagen2.'">
<INPUT  NAME="fichero" TYPE="file" value="'.$imagen2.'">
<label>imagen</label><br>




<input type="date" name="fecha2"  value="'.$fecha2.'">
<label>fecha</label><br>


<textarea type="text"  name="contenido2" cols="40" rows="5"  >"'.$contenido2.'"</textarea>
<label>contenido</label><br>

<select name="estado_post2" >
	<option value="estado_post2">
		0
	</option>
		<option value="estado_post2">
		1
	</option>
</select>
<label>estado_post</label><br>

<input type="submit" name="" value="modificar">


</form>';


?>

