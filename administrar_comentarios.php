
<?php 
include 'includes/cabecera.php';
include 'includes/conexion.php';

mysqli_set_charset($conexion,'utf8');








$peticion1="
SELECT * from comentario ";
$resul1=mysqli_query($conexion,$peticion1);




while($fila1=mysqli_fetch_array($resul1)){
$estado_comentario=$fila1['estado'];
	if ($estado_comentario==0) {

echo "<td><div class='administrar_idpost'>idcomentario=".utf8_encode($fila1['idcomentario'])."</div></td><br>
<td><div class='administrar_idpost'>idusuario=".utf8_encode($fila1['idusuario'])."</div></td><br>
<td><div class='administrar_idpost'>fecha=".utf8_encode($fila1['fecha'])."</div></td><br>
<td><div class='administrar_comentario2'>comentario=".htmlspecialchars($fila1['comentario'])."</div></td><br>
<td><div class='administrar_idpost'>estado".($fila1['estado'])."</div></td>";
$idcomentario2=$fila1['idcomentario'];
echo '<br><div class="administrar_idpost">
<a href="parejas/administrar_comentario_submit.php?idcomentario='.$idcomentario2.'"><img width="24px" src="imagenes_post/ok.jpg" alt="no existo">
Validar comentario</a>';


echo '
<a href="parejas/eliminar_comentario.php?idcomentario='.$idcomentario2.'"><img width="24px" src="imagenes_post/eliminar.jpg" alt="no existo">
Eliminar comentario</a><br> </div><br><hr/>';

}

elseif ($estado_comentario==1) {

echo "<td><div class='administrar_idpost'>idcomentario:".utf8_encode($fila1['idcomentario'])."</div></td><br>
<td><div class='administrar_idpost'>idusuario:".utf8_encode($fila1['idusuario'])."</div></td><br>
<td><div class='administrar_idpost'>fecha:".utf8_encode($fila1['fecha'])."</div></td><br>
<td><div class='administrar_comentario'>comentario=>".htmlspecialchars($fila1['comentario'])."</div></td><br>
<td><div class='administrar_idpost'>estado:".utf8_encode($fila1['estado'])."</div></td>";
$idcomentario2=$fila1['idcomentario'];
echo '<br><div class="administrar_idpost">
<a href="parejas/administrar_comentario_submit2.php?idcomentario='.$idcomentario2.'"><img width="24px" src="imagenes_post/ok.jpg" alt="no existo">
Despubliar comentario</a>';


echo '
<a href="parejas/eliminar_comentario.php?idcomentario='.$idcomentario2.'"><img width="24px" src="imagenes_post/eliminar.jpg" alt="no existo">
Eliminar comentario</a></div><br> <hr/>';
// 
}
}

?>


