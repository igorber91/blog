<?php 
include 'includes/conexion.php';
?>
<?php 
include 'includes/cabecera.php';



echo " Estas modificando al usuario:  "; 
$idusuario2=$_GET['idusuario'];
echo"$idusuario2  <br>";

$peticion1="select * from usuario where idusuario=$idusuario2";

$resul1=mysqli_query($conexion,$peticion1);


echo'<br> 
<div class="modificar_usuario">
<form action="modificar_usuario_submit.php?idusuario='.$idusuario2.'" method="POST" accept-charset="utf-8" ENCTYPE="multipart/form-data">
';



while($fila1=mysqli_fetch_array($resul1)){
	$nombre2=$fila1['nombre'];
$password2=$fila1['password'];


$email2=$fila1['email'];
$fecha2=$fila1['fecha_inscripcion'];
$avatar2=$fila1['avatar'];
$permisos2=$fila1['permisos'];
$descripcion2=$fila1['descripcion'];

echo'

<input type="text" name="nombre2"  value="'.$nombre2.'">
<label>Nombre</label><br>


<input type="text" name="password2"  value="'.$password2.'">

<label>Password</label><br>


<input type="text" name="email2"  value="'.$email2.'">
<label>Email</label><br>


<input type="date" name="fecha_de_inscripcion2" value="'.$fecha2.'">
<label>Fecha de inscripcion</label><br>



<img src="'.$avatar2.'">
<label>avatar</label>
<input name="fichero" type="file" >
<br>


<input type="text" name="permisos2" value="'.$permisos2.'">
<label>Permisos</label><br>


<textarea type="text"  name="descripcion2" cols="40" rows="5"  >"'.$descripcion2.'"</textarea>
<label>Descripcion</label><br>

<input type="submit" name="" value="modificar">


</form></div>';
}

?>