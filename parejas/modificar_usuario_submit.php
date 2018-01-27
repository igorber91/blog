


<?php 
include '../includes/conexion.php';
?>
<?php 
include '../includes/cabecera.php';
?>

<?php 




echo " Has modificado al usuario:  "; 
$idusuario2=$_GET['idusuario'];
echo"$idusuario2  <br>";
 



$nombre2=$_POST['nombre2'];
echo"$nombre2";
$password2=$_POST['password2'];
$email2=$_POST['email2'];
$fecha_de_inscripcion2=$_POST['fecha_de_inscripcion2'];
$avatar2=$_POST['avatar2'];
$permisos2=$_POST['permisos2'];
$descripcion2=$_POST['descripcion2'];

$peticion1="
Update usuario Set nombre='$nombre2' 
Where idusuario='$idusuario2'
";
  echo"$peticion1 <br>";
$resul1=mysqli_query($conexion,$peticion1);

$peticion2="
Update usuario Set password='$password2' 
Where idusuario='$idusuario2'
";
  echo"$peticion2 <br>";
$resul2=mysqli_query($conexion,$peticion2);

$peticion3="
Update usuario Set email='$email2' 
Where idusuario='$idusuario2'
";
  echo"$peticion3 <br>";
$resul3=mysqli_query($conexion,$peticion3);

$peticion4="
Update usuario Set fecha_de_inscripcion=
'$fecha_de_inscripcion2' 
Where idusuario='$idusuario2'
";
  echo"$peticion4 <br>";
$resul4=mysqli_query($conexion,$peticion4);


$peticion5="
Update usuario Set avatar=
'$avatar2' 
Where idusuario='$idusuario2'
";
  echo"$peticion5 <br>";
$resul5=mysqli_query($conexion,$peticion5);

$peticion6="
Update usuario Set permisos=
'$permisos2' 
Where idusuario='$idusuario2'
";
  echo"$peticion6 <br>";
$resul6=mysqli_query($conexion,$peticion6);

$peticion7="
Update usuario Set descripcion=
'$descripcion2' 
Where idusuario='$idusuario2'
";
  echo"$peticion7 <br>";
$resul7=mysqli_query($conexion,$peticion7);


 echo '<script>            
setTimeout(function(){location.href="../index.php"} , 300);          
</script>';


?>
