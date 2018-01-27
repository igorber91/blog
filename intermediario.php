
 <?php

include 'includes/conexion.php';


session_start();



$_SESSION['nombre']  = $_POST['nombre'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['email']  = $_POST['email'];
// $_SESSION['fecha_inscripcion'] = $_POST['fecha_inscripcion'];

$_SESSION['descripcion'] = $_POST['descripcion'];

$_SESSION['permisos'] = 1;


@$idusuario2=$_SESSION['idusuario'];




// Aqui pongo la ruto de la imagen!!!!!
$target_path="imagenes/";
$target_path=$target_path.basename($_FILES['fichero']['name']);
move_uploaded_file($_FILES['fichero']['tmp_name'], "imagenes/avatar.jpg");
if(move_uploaded_file($_FILES['fichero']['tmp_name'],$target_path)){echo "El archivo".basename($_FILES['fichero']['name'])." ha sido subido";}
else{
	echo "Ha ocurrido un error, trate de nuevo";
	echo"<br>";
}


$nombre=$_SESSION['nombre'];
$password=$_SESSION['password'];
$email=$_SESSION['email'];
// $fecha_inscripcion=$_SESSION['fecha_inscripcion'];
$avatar="imagenes/".basename($_FILES['fichero']['name']);

$permisos= $_SESSION['permisos'] ;
$descripcion=$_SESSION['descripcion'];









$peticion1=
"insert into usuario values('','".$nombre."','".$password."','".$email."',NOW(),'".$avatar."','".$permisos."','".$descripcion."')";
$resul1=mysqli_query($conexion,$peticion1);

echo"$peticion1";
echo"<br>";



 echo '<script>            
setTimeout(function(){location.href="index.php"} , 200);          
</script>';
 ?>



