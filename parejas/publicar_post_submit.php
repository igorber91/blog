
<?php 
include '../includes/cabecera.php';
?>

<?php 
include '../includes/conexion.php';
?>
<!-- Aqui comienza el body -->




<?php 

$id_post=0;
$titulo_post=$_POST['titulo'];
$descripcion_post=$_POST['descripcion'];



// usurio_post!!!!!!
$idusuario_post=0;
$peticion3="
insert into usuario_post values('$idusuario_post','$idusuario','$id_post')
";
$resul3=mysqli_query($conexion,$peticion3);
echo"$peticion3";
echo"<br>";
$target_path="imagenes_post/";
$target_path=$target_path.basename($_FILES['fichero']['name']);
if(move_uploaded_file($_FILES['fichero']['tmp_name'],$target_path)){
	echo "El archivo".basename($_FILES['fichero']['name'])." ha sido subido";
	echo"<br>";
}
else{
	echo "Ha ocurrido un error, trate de nuevo";
	echo"<br>";

}
// usurio_post!!!!!!



$imagen_post=$target_path;
$fecha_post=$_POST['fecha'];
$post="<pre>".$_POST['post']."</pre>";
$estado_post=0;


// addslahes

$peticion1="
insert into post values('$id_post','$titulo_post','$descripcion_post','$imagen_post','$fecha_post','".addslashes($post)."','$estado_post')
";
$resul1=mysqli_query($conexion,$peticion1);

// echo"$peticion1";


// Etiqueta!!!!!!
$id_etiqueta=$_POST['idetiqueta'];
$nombre_etiqueta=$_POST['nombre_etiqueta'];

$peticion2="
insert into etiqueta values('$id_etiqueta','$nombre_etiqueta')
";
$resul2=mysqli_query($conexion,$peticion2);
// Etiqueta!!!!



// Etiqueta_post!!!
$id_etiqueta_post=0;
$peticion4="
insert into etiqueta_post values('$id_etiqueta_post','$id_etiqueta','$nombre_etiqueta')
";

$resul4=mysqli_query($conexion,$peticion4);

echo"$peticion4";
echo"<br>";

// Etiqueta_post!!!








// Comentario_post

$id_comentario=0;
$id_comentario_post=0;
$peticion4="
insert into comentario_post values('$id_comentario_post','$id_comentario','$id_post')
";

$resul4=mysqli_query($conexion,$peticion4);

echo"$peticion4";
echo"<br>";



// Comentario_post






// Aqui tengo que meter el usuario que mete el post


 echo '<script>            
setTimeout(function(){location.href="../index.php"} , 300);          
</script>';
?>



<!-- if (empty $titulo_post -->