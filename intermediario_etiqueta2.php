
<!-- G -->
<?php 

// 1- Cabecera y conexion
include 'includes/cabecera.php';
include 'includes/conexion.php';


// 2-Se coge el usuario con un session
echo " has seleccionado el blog con  usuario id:  "; 
@$idusuario3=$_GET['idusuario'];
echo"$idusuario3  <br>";



// 3- Se hace la peticion para recoger el idPost que tenga el usuario que haya hecho session
$peticion2="select idpost from usuario_post where idusuario=$idusuario3";
$resul2=mysqli_query($conexion,$peticion2);


// 4- Se pone  un while para recorrer todos los post que tenga el usuario seleccionado
while ($fila2=mysqli_fetch_array($resul2)) {

//5- se pone el idpost que sea  $idpost3
$idpost3=$fila2['idpost'];


echo"soy el post:";
echo$idpost3;
echo"<br>";


// 6- Se selecciona el post que cumpla con la condicion de usuario
$peticion11="select * from post where idpost =$idpost3  ";
$resul11=mysqli_query($conexion,$peticion11); 


// 7- While para recorrer todos los post
while($fila11=mysqli_fetch_array($resul11)){ 


// 8- Aqui Se ponen todos los campos en el post  $idpost3
echo " <br><h2>".utf8_encode($fila11['titulo'])."</h2><br>
<h3>".utf8_encode($fila11['descripcion'])."</h3><br>
<img class='post' src='".$fila11['imagen']."'/>
<b class='post'>".utf8_encode($fila11['fecha'])."</b><br>";





	$codigo_post=$fila11['idpost'];


// 9-  Peticion para coger el idcomentario que esta en comentario_post


$peticion3="select idcomentario from comentario_post where  idpost='$codigo_post'";
$resul3=mysqli_query($conexion,$peticion3);
$fila3=mysqli_fetch_array($resul3);
echo"<br>idcomentario=";
echo $fila3['idcomentario'];
$idcomentario20=$fila3['idcomentario'];
echo"<br>";


// 10-  Peticion para coger el idusuario que esta en usuario_post

$peticion33="select idusuario from usuario_post where  idpost='$codigo_post'";
$resul33=mysqli_query($conexion,$peticion33);
$fila33=mysqli_fetch_array($resul33);
echo"idusuario=";
echo $fila33['idusuario'];
$idusuario20=$fila33['idusuario'];
echo"<br>";


// 11-  Peticion para coger el idetiqueta que esta en etiqueta_post

$peticion333="select idetiqueta from etiqueta_post where  idpost='$codigo_post'";
$resul333=mysqli_query($conexion,$peticion333);
$fila333=mysqli_fetch_array($resul333);
echo"idetiqueta=";
echo $fila333['idetiqueta'];
$idetiqueta20=$fila333['idetiqueta'];
echo"<br>";



echo"$peticion333<br>";
echo"$peticion33<br>";
echo"$peticion3<br>";

echo"$codigo_post<br>";


// 12- Aqui lo que hago es poner el contenido del post
echo"<p>".utf8_encode($fila11['contenido'])."</p>";

// El comentario esta aqui
// 3-
echo"<h4>Comentarios que hay en el post:<h4><br><br>";
$peticion20="select * from comentario where idcomentario=$idcomentario20";
$resul20=mysqli_query($conexion,$peticion20);
@$fila20=mysqli_fetch_array($resul20);
echo"<b>";
echo $fila20['comentario'];
echo"</b>";
echo "<br><br>";

// El comentario esta aqui


// El usuario esta aqui

echo"<h4>Usuario que ha creado el post:<h4><br>";
$peticion21="select * from usuario where idusuario=$idusuario20";
$resul21=mysqli_query($conexion,$peticion21);
@$fila21=mysqli_fetch_array($resul21);
echo"<b>";
echo $fila21['nombre'];
echo"</b>";
echo "<br><br>";


// El usuario esta aqui

// El usuario esta aqui

echo"<h4>Etiquetas  que hay en post:<h4><br>";
$peticion22="select * from etiqueta where idetiqueta=$idetiqueta20";
$resul22=mysqli_query($conexion,$peticion22);
@$fila22=mysqli_fetch_array($resul22);
echo"<b>";
echo $fila22['nombre_etiqueta'];
echo"</b>";
echo "<br><br>";


// El usuario esta aqui



echo '<br>
<a href="post_full.php?idpost='.$codigo_post.'">
Leer mas</a><br>';
 



}




}






?>


</div>


<br>
 






