<?php 

if (isset($_GET['idetiqueta'])) {
@$idetiqueta3=$_GET['idetiqueta'];

$peticion41="select idpost from etiqueta_post where idetiqueta=$idetiqueta3";

$resul41=mysqli_query($conexion,$peticion41);
while($fila41=mysqli_fetch_array($resul41)){

$post10=$fila41['idpost'];
echo"soy el post:";
echo $post10;

$peticion42="select * from post where idpost=$post10";
$resul42=mysqli_query($conexion,$peticion42);
 while($fila42=mysqli_fetch_array($resul42)){

echo " <br><h2>".utf8_encode($fila42['titulo'])."</h2><br>
<h3>".utf8_encode($fila42['descripcion'])."</h3><br>
<img class='post' src='".$fila42['imagen']."'/>
<b class='post'>".utf8_encode($fila42['fecha'])."</b><br>";
//4.2  Coge el idpost del post con $codigo_post
$codigo_post=$fila42['idpost'];
// 5 Seleccionar idcomentario idusuario y idetiqueta de las tablas intermedias
$peticion3="select idcomentario from comentario_post where  idpost='$codigo_post'";
$resul3=mysqli_query($conexion,$peticion3);
$fila3=mysqli_fetch_array($resul3);
$idcomentario20=$fila3['idcomentario'];
$peticion33="select idusuario from usuario_post where  idpost='$codigo_post'";
$resul33=mysqli_query($conexion,$peticion33);
$fila33=mysqli_fetch_array($resul33);
$idusuario20=$fila33['idusuario'];
$peticion333="select idetiqueta from etiqueta_post where  idpost='$codigo_post'";
$resul333=mysqli_query($conexion,$peticion333);
echo"<h4>Etiquetas  que hay en post:<h4>";
// 6- IDEtiquetas de cada post
while($fila333=mysqli_fetch_array($resul333)){
echo"<br><br>idetiqueta=";
echo $fila333['idetiqueta'];
$idetiqueta20=$fila333['idetiqueta'];
echo"<br><br>";
// 7- Coger el idetiqueta de etiqueta_post y con eso coger * from etiqueta where idetiqueta=$
$peticion22="select * from etiqueta where idetiqueta=$idetiqueta20";
$resul22=mysqli_query($conexion,$peticion22);
@$fila22=mysqli_fetch_array($resul22);
echo"<b>";
echo $fila22['nombre_etiqueta'];
echo"</b>";
}
echo"<br><br>idpost=$codigo_post<br>";
// 8- Contenido dentro del while select * from post
echo"<br>Contenido:<br>";
echo"<p>".utf8_encode($fila42['contenido'])."</p>";
// 9- Comentarios del post que hay dentro de un while 
echo"<h4>Comentarios que hay en el post:<h4>";
$peticion20="select * from comentario natural join comentario_post 
where idpost=$codigo_post and estado=1";
$resul20=mysqli_query($conexion,$peticion20);
while($fila20=mysqli_fetch_array($resul20)){
echo"<b>";
echo $fila20['comentario'];
echo"<hr/><br>";
echo"</b>";
}
// 10-El usuario que ha creado el post sin while
echo"<h4>Usuario que ha creado el post:<h4>";
$peticion21="select * from usuario where idusuario=$idusuario20";
$resul21=mysqli_query($conexion,$peticion21);
@$fila21=mysqli_fetch_array($resul21);
echo"<b>";
echo $fila21['nombre'];
echo"</b>";
// 11- Enlace dentro del while selec * from post para elegir el post full .php con get
echo '<br>
<a href="post_full.php?idpost='.$codigo_post.'">
Leer mas</a><br>';
 





// fin pagina blog
}
}

?>