
<?php 
include '../includes/conexion.php';
?>
<?php 
include '../includes/cabecera.php';


$titulo2= $_POST['titulo2'];
 $descripcion2= $_POST['descripcion2'];

$fecha2 = $_POST['fecha2'];
$contenido2 = $_POST['contenido2'];
$estado_post2  = $_POST['estado_post2'];






 // Aqui cargo la imagen

$target_path="../imagenes/";
$target_path=$target_path.basename($_FILES['fichero']['name']);
move_uploaded_file($_FILES['fichero']['tmp_name'], "/imagenes/avatar.jpg");



if(move_uploaded_file($_FILES['fichero']['tmp_name'],$target_path)){echo "El archivo".basename($_FILES['fichero']['name'])." ha sido subido";}
else{
	echo "Ha ocurrido un error, trate de nuevo";
	echo"<br>";

}


$imagen2=$target_path.basename($_FILES['fichero']['name']);




echo " Has modificado al post:  "; 
$idpost2=$_GET['idpost'];
echo"$idpost2  <br>";
 





$peticion1="
Update post Set titulo='$titulo2' 
Where idpost='$idpost2'
";
  echo"$peticion1 <br>";
$resul1=mysqli_query($conexion,$peticion1);

$peticion2="
Update post Set descripcion='$descripcion2' 
Where idpost='$idpost2'
";
  echo"$peticion2 <br>";
$resul2=mysqli_query($conexion,$peticion2);

$peticion3="
Update post Set imagen='$imagen2' 
Where idpost='$idpost2'
";
  echo"$peticion3 <br>";
$resul3=mysqli_query($conexion,$peticion3);

$peticion4="
Update post Set fecha=
'$fecha2' 
Where idpost='$idpost2'
";
  echo"$peticion4 <br>";
$resul4=mysqli_query($conexion,$peticion4);


$peticion5="
Update post Set contenido2=
$contenido2 
Where idpost='$idpost2'
";
  echo"$peticion5 <br>";
$resul5=mysqli_query($conexion,$peticion5);

$peticion6="
Update post Set estado_post2=
'$estado_post2' 
Where idpost='$idpost2'
";
  echo"$peticion6 <br>";
$resul6=mysqli_query($conexion,$peticion6);



 echo '<script>            
setTimeout(function(){location.href="../index.php"} , 300);          
</script>';


?>

