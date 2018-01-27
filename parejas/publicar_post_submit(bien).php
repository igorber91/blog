<!-- E --> 

<!-- 1- Cabecera y conexion -->
<?php 
include '../includes/cabecera.php';
include '../includes/conexion.php';



// 2- Coge todos los valores Post de los input
$titulo_post=$_POST['titulo'];
$descripcion_post=$_POST['descripcion'];
// $fecha_post=now();
$post=$_POST['post'];

// 3- Aqui coge la etiqueta del select multiple
$id_etiqueta=$_POST['idetiqueta'];

// Definimos el estado_post a 0 
$estado_post=0;



//4- Aqui metemos la direccion de la imagen 

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

	

// 5- Definimos $imagenes_post con el $target_path

$imagen_post=$target_path;



// 6- Declaramos la peticion de insertar todos los valores en post
$peticion1="
insert into post values('','".$titulo_post."','".$descripcion_post."','".$imagen_post."',now(),'".addslashes($post)."','".$estado_post."')
";
$resul1=mysqli_query($conexion,$peticion1);

//7- Cogemos el id de la ultima conexion en nuestro caso idpost
$lastid=mysqli_insert_id($conexion);




// 8-Duda insertamos tantas etiquetas como post haya???

for($i=0;$i<count($id_etiqueta);$i++){

echo $id_etiqueta[$i].'<br />';

$peticion4="
insert into etiqueta_post values('',$id_etiqueta[$i],$lastid)
";

$resul4=mysqli_query($conexion,$peticion4);
echo $peticion4 ;
echo "<br>";
}

// Etiqueta_post!!!


// Comentario_post

$peticion5="
insert into comentario_post values('',$id_comentario,$lastid)
";

$resul5=mysqli_query($conexion,$peticion5);

echo"$peticion5";
echo"<br>";

$peticion3="
insert into usuario_post values('',$idusuario,$lastid)
";
$resul3=mysqli_query($conexion,$peticion3);
echo"$peticion3";
echo"<br>";





 echo '<script>            
setTimeout(function(){location.href="../index.php"} , 300);          
</script>';

?>


