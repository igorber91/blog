
<?php 
include 'includes/cabecera.php';
?>

<?php 
include 'includes/conexion.php';
?>

<?php 
$peticion1="select * from post";
$resul1=mysqli_query($conexion,$peticion1);





while($fila1=mysqli_fetch_array($resul1)) {
$idpost2=$fila1['idpost'];
echo"";
echo "<td><div class='administrar_idpost'>idpost=".utf8_encode($fila1['idpost'])."</div></td><br>
<td><div class='administrar_titulo'>titulo=".utf8_encode($fila1['titulo'])."</div></td><br>
<td><div class='administrar_descripcion'>descripcion=".($fila1['descripcion'])."</div></td><br>
<td><div class='administrar_imagen'><img src='".($fila1['imagen'])."' alt='no salgo'></div></td><br>
<td><div class='administrar_fecha'>fecha=".($fila1['fecha'])."</div></td><br>
<td><div class='administrar_contenido'>contenido=".($fila1['contenido'])."</div></td><br>
<td><div class='administrar_estado'>estado_post=".utf8_encode($fila1['estado_post'])."</div></td><br>";


echo '
<a href="administrar_post2.php?idpost='.$idpost2.'">
<img width="24px" src="imagenes_post/modificar.jpg" alt="no existo">
Modificar post</a>';
 echo '
<a href="parejas/eliminar_post_submit.php?idpost='.$idpost2.'"><img width="24px" src="imagenes_post/eliminar.jpg" alt="no existo">
Eliminar post</a><div><br><br><hr/>';



}
?>