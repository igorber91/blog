
<?php 
include 'includes/cabecera.php';
include 'includes/conexion.php';


$titulo_post2=$_POST['titulo'];
$titulo_post=mysqli_real_escape_string($conexion,$titulo_post2);


$descripcion_post2=$_POST['descripcion'];
$descripcion_post=mysqli_real_escape_string($conexion,$descripcion_post2);



$post2=$_POST['post'];
$post=mysqli_real_escape_string($conexion,$post2);

$estado_post=1;
$id_etiqueta=$_POST['idetiqueta'];





// usurio_post!!!!!!



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


$peticion1="
insert into post values('','".$titulo_post."','".$descripcion_post."','".$imagen_post."',now(),'".$post."','".$estado_post."')
";
$resul1=mysqli_query($conexion,$peticion1);
$lastid=mysqli_insert_id($conexion);

echo"$peticion1";

// Etiqueta_post!!!


// Recorrer idetiqueta!!!!!!!!!!!!!!!!!!!!!!!!! importante

// con un count!!!!


for($i=0;$i<count($id_etiqueta);$i++){

echo $id_etiqueta[$i].'<br/>';

$peticion4="
insert into etiqueta_post values('',$id_etiqueta[$i],$lastid)
";

$resul4=mysqli_query($conexion,$peticion4);
echo $peticion4 ;
echo "<br>";
}



$peticion3="
insert into usuario_post values('',$idusuario,$lastid)
";
$resul3=mysqli_query($conexion,$peticion3);
echo"$peticion3";
echo"<br>";





 echo '<script>            
setTimeout(function(){location.href="index.php"} , 300);          
</script>';

?>


