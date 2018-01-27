
<?php 
include 'includes/cabecera.php';
?>

<?php 
include 'includes/conexion.php';
?>

<?php 
$peticion1="select * from usuario";
$resul1=mysqli_query($conexion,$peticion1);




while($fila1=mysqli_fetch_array($resul1)) {
$idusuario2=$fila1['idusuario'];

echo "<div class='administrar_idpost'>idusuario=<td>".utf8_encode($fila1['idusuario'])."</td><br>
<td><div class='administrar_titulo'>nombre=".utf8_encode($fila1['nombre'])."</div></td><br>
<td><div class='administrar_contenido'>password=".utf8_encode($fila1['password'])."</td><br>
<td>email=".utf8_encode($fila1['email'])."</td><br>
<td>fecha_de_inscripcion=".utf8_encode($fila1['fecha_inscripcion'])."</td></div><br>
<td><div class='administrar_imagen'>avatar=<img class='imagen_usuario' src='".($fila1['avatar'])."' alt='no salgo'></div></td><br>
<td><div class='administrar_descripcion'>permisos=".utf8_encode($fila1['permisos'])."</div></td><br>
<td><div class='administrar_descripcion'>descripcion=<br>".($fila1['descripcion'])."<br></div></td>";

echo '<br>
<a href="modificar_usuario.php?idusuario='.$idusuario2.'"><img width="24px" src="imagenes_post/modificar.jpg" alt="no existo">
Modificar usuario</a>';
echo '
<a href="eliminar_usuario.php?idusuario='.$idusuario2.'"><img width="24px" src="imagenes_post/eliminar.jpg" alt="no existo">
Eliminar usuario</a></div><br><br>';





}
?>





