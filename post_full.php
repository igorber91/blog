
<?php 

include 'includes/cabecera.php';
include 'includes/conexion.php';




$cod_post=$_GET['idpost'];

$peticion0="select idusuario from usuario_post where idpost=$cod_post";
$resul0=mysqli_query($conexion,$peticion0); 
$fila0=mysqli_fetch_array($resul0);
$idusuario=$fila0['idusuario'];
$peticion1="select * from post where idpost=$cod_post";
$resul1=mysqli_query($conexion,$peticion1); 
$peticion2="select nombre from usuario where idusuario='$idusuario'";
$resul2=mysqli_query($conexion,$peticion2);



echo'<div class="post_full">';


while($fila1=mysqli_fetch_array($resul1)){ 


echo "<div class='full'> <br> <div class='titulo_full'><h2 >".htmlspecialchars($fila1['titulo'])."
</h2></div><br>
<div class='descripcion_full'><h3 >".htmlspecialchars($fila1['descripcion'])."</h3></div><br>
<img class='full' src='".$fila1['imagen']."'/>
<div class='fecha_full'>
<b>".($fila1['fecha'])."</b></div><br>";

echo"<p class='contenido_full'>".htmlspecialchars($fila1['contenido'])."</p>";
echo"<br>";





echo"<h4>Comentarios que hay en el post:<h4><br><br><hr>";

$peticion20="select * from comentario natural join comentario_post 
where idpost=$cod_post and estado=1";

$resul20=mysqli_query($conexion,$peticion20);


while ($fila20=mysqli_fetch_array($resul20)) {
	$idcomentario111=$fila20['idcomentario'];

$peticion111="select * from comentario where idcomentario=
$idcomentario111";
$resul111=mysqli_query($conexion,$peticion111); 




while($fila111=mysqli_fetch_array($resul111)){

$idusuario111=$fila111['idusuario'];
$peticion17="select nombre from usuario where  idusuario=$idusuario111";
$resul17=mysqli_query($conexion,$peticion17);
$fila17=mysqli_fetch_array($resul17);
$idusuario23=$fila17['nombre'];
$peticion18="select avatar from usuario where  idusuario=$idusuario111";
$resul18=mysqli_query($conexion,$peticion18);
$fila18=mysqli_fetch_array($resul18);
$imagen=$fila18['avatar'];
$avatar23=$fila18['avatar'];
$fila19=mysqli_fetch_array($resul111);



echo"<br><div class='avatar_usuario_full'>";
echo'<img src="'.$imagen.'">';
echo"</div><br><br><br>";
echo"<div class='nombre_comentario_full'>";

echo $fila17['nombre'];
echo" dice: </div>";


echo"<br><div class='full_comentario'>";
echo htmlspecialchars($fila111['comentario']);
$idcomentario23=$fila19['comentario'];
echo"</div><br><br><br><br><br><br><hr><br>";


}

}
$codigo_post2=$fila1['idpost'];
if ($permisos<1) {
	echo"<div class='registrate'>REGISTRATE PAR COMENTAR!</div>";
}
else{




echo"<form  method='post' action='parejas/comentar_submit.php?idpost2='".$codigo_post2."'>";
echo"<input  type='textarea' name='comentario'>
<input type='hidden' value=$codigo_post2 name='post2'>

<input  type='submit' name='' value='COMENTAR' >
</form> <br>";
}


// Espacios!!! borrame al final


echo"<br><br><br><br><br><br><br>";

echo'<img class="comente_full" src="imagenes/comente.jpg" alt="no estoy en la direccion correcta">';
echo "<br>";
}

// $peticion22="select distinct c.idcomentario, count(c.idcomentario) as cantidad from comentario_post cp join
//  comentario c where idpost=$cod_post and estado = 1

//  ";


// $peticion22="select  idcomentario, count(idcomentario) as cantidad
// from comentario_post
// where idpost= $cod_post";


$peticion22="select  idcomentario, count(idcomentario) as cantidad
from comentario_post
where idpost= $codigo_post2";

// Comentarios!!!!!!!!!!!!!!!!!!!!!!!!!
echo "Numero de comentarios (publicados o sin publicar):<br>";
$resul22=mysqli_query($conexion,$peticion22);
while ($fila22=mysqli_fetch_array($resul22)) {

echo$fila22['cantidad'];
}
echo "<br><br>";
// Comentarios!!!!!!!!!!!!!!!!!!!!!!!!!





?>


</div>


<br>


