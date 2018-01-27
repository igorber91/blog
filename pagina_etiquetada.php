
<?php 

include 'includes/cabecera.php';
include 'includes/conexion.php';


@$fecha3=$_GET['fecha'];



@$nombre_etiqueta3=$_GET['nombre_etiqueta'];

@$nombre3=$_GET['nombre'];
?>

<div class="post_etiquetado">


<?php


$peticion1="select * from post where fecha='$fecha3'";
$resul1=mysqli_query($conexion,$peticion1); 
$peticion2="select * from usuario where idusuario='$idusuario'";
$resul2=mysqli_query($conexion,$peticion2);
// Soy uin select mal definido

// Soy un comentario mal definido
$peticion3="select * from comentario";
$resul3=mysqli_query($conexion,$peticion3);

// Soy un comentario mal definido
while($fila1=mysqli_fetch_array($resul1)){ 


echo " <br><h2>".utf8_encode($fila1['titulo'])."</h2><br>
<h3>".utf8_encode($fila1['descripcion'])."</h3><br>
<img class='post' src='".$fila1['imagen']."'/>
<b class='post'>".utf8_encode($fila1['fecha'])."</b><br>";
	

echo"<p>".utf8_encode($fila1['contenido'])."</p>";
echo"<br>";

// Soy un comentario mal definido

// Soy un comentario mal definido

$codigo_post2=$fila1['idpost'];
// echo '<br>
// <a href="parejas/comentar_submit.php?idpost='.$codigo_post.'">
// comentar</a><br>';

echo"<form  method='post' action='parejas/comentar_submit.php?idpost2='".$codigo_post2."'>";
echo"<input  type='textarea' name='comentario'>
<input type='hidden' value=$codigo_post2 name='post2'>
<input  type='submit' name='' value='COMENTAR' >
</form> <br>";
}


// Espacios!!! borrame al final
echo"<br><br><br><br><br><br><br><br><br><br><br><br>";




?>


</div>


<br>;



