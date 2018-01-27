
 <?php
 $host_db = "localhost"; // Host(servidor) de la BD
 $usuario_db = "root"; // Usuario de la BD
 $clave_db = "WEB08"; // Contrase a de la BD ñ
 $nombre_db = "blog"; // Nombre de la BD
 //Establecemos a qu servidor, con qu usuario, con qu contrase a, y nombre de la base de datos, se é é é ñ
//le podr a pasar un 5 par metro que ser a el puerto í º á í
 $conexion=mysqli_connect($host_db, $usuario_db, $clave_db, $nombre_db);
?>

<?php

session_start();
$_SESSION['idusuario']  = $_POST['idusuario'];
$_SESSION['nombre']  = $_POST['nombre'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['email']  = $_POST['email'];
$_SESSION['fecha_inscripcion'] = $_POST['fecha_inscripcion'];

$_SESSION['permisos']  = $_POST['permisos'];
$_SESSION['descripcion'] = $_POST['descripcion'];


$idusuario=$_SESSION['idusuario'];
$nombre=$_SESSION['nombre'];
$password=$_SESSION['password'] ;
$email=$_SESSION['email'] ;
$fecha_inscripcion=$_SESSION['fecha_inscripcion'];

$permisos=$_SESSION['permisos'];
$descripcion=$_SESSION['descripcion'] ;




 // Aqui cargo la imagen

$target_path="imagenes/";
$target_path=$target_path.basename($_FILES['fichero']['name']);
move_uploaded_file($_FILES['fichero']['tmp_name'], "../imagenes/avatar.jpg");



if(move_uploaded_file($_FILES['fichero']['tmp_name'],$target_path)){echo "El archivo".basename($_FILES['fichero']['name'])." ha sido subido";}
else{
	echo "Ha ocurrido un error, trate de nuevo";
	echo"<br>";

}


$avatar=$target_path.basename($_FILES['fichero']['name']);



$peticion1=
"insert into usuario values('$idusuario','$nombre','$password','$email','$fecha_inscripcion','$avatar','$permisos','$descripcion')";
$resul1=mysqli_query($conexion,$peticion1);

echo"$peticion1";
echo"<br>";



 echo '<script>            
setTimeout(function(){location.href="index.php"} , 2000);          
</script>';
 ?>

