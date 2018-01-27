
<?php 
include 'includes/conexion.php';
?>
<?php 
include 'includes/cabecera.php';
?>

<?php 
$peticion1="select * from usuario";
$resul1=mysqli_query($conexion,$peticion1);




echo " has elminado al usuario:  "; 
$idusuario2=$_GET['idusuario'];
echo"$idusuario2  <br>";
 


$peticion1="
delete usuario from usuario where idusuario=$idusuario2";
$resul1=mysqli_query($conexion,$peticion1);
while($fila=mysqli_fetch_array($resul1)){
echo "<option value='".utf8_encode($fila['idetiqueta'])."'>
".utf8_encode($fila['nombre_etiqueta'])."</option>";
}



 echo '<script>            
setTimeout(function(){location.href="administrar_usuarios.php"} , 300);          
</script>';

?>
