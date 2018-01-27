
<!-- X1 -->
<!-- 1 Conexion -->
<?php 
include 'includes/conexion.php';
?>
<?php 
// 2 Session start
session_start();


//3- Coger todas las variables de login.php

$nombre1=$_POST['nombre'];

// Con el real scape escapamos comillas ' y asi estamos portegidos'
@$nombre=mysqli_real_escape_string($conexion,$nombre1);
$password1 =$_POST['password'];
@$password=mysqli_real_escape_string($conexion,$password1);
$permisos=$_POST['permisos'];

// HE cogido nuevos usuarios!!!!


echo"nombre introducido=>";
echo $nombre;  
echo"<br>";
echo"password introducido=>";
echo $password; 
echo"permisos introducido=>";
echo $permisos; 

// 4- Comprobar usuario y contraseña
$peticion1="
SELECT idusuario,password,nombre,permisos  from usuario where nombre='".$nombre."' and password='".$password."'";
$resul1=mysqli_query($conexion,$peticion1);
echo $peticion1;
echo"<br>";
if (mysqli_num_rows($resul1)>0){
 while( $fila1=mysqli_fetch_array($resul1)){
  $_SESSION['nombre']=$fila1['nombre'];
  $_SESSION['idusuario']=$fila1['idusuario'];
  $_SESSION['permisos']=$fila1['permisos'];
 }
  echo"Hola ".$_SESSION['nombre'];
  echo"Tienes permiso nivel ".$_SESSION['permisos'];
}
else{
  echo"nombre o usuario incorrecto";
}
echo"<br>";



// 5- Script para ir a blog.php em 0.3 segundos

 echo '<script>            
setTimeout(function(){location.href="index.php"} , 300);          
</script>';
?>

