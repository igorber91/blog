<!-- B -->
<?php 
// 1-
include 'includes/cabecera.php';

@$idusuario2=$_GET['idusuario'];

// echo"$idusuario2";
$peticion1="select * from usuario  where idusuario=$idusuario2" ;
// echo"$peticion1";
$resul1=mysqli_query($conexion,$peticion1);
// Si se crea una fila fuera del while crea conflicto con los demas elementos!!
while($fila1=mysqli_fetch_array($resul1)){ 
			

$idusuario2=$fila1['idusuario'];

$nombre2=$fila1['nombre'];
$email2=$fila1['email'];
$avatar2=$fila1['avatar'];
$descripcion2=$fila1['descripcion'];

  echo "<div class='usuario'><tr><ol>$nombre<br>

  <ol> $email2

  </ol><ol><img class='avatar' src=".$avatar2." alt ='no aparezco'>
<ol > $descripcion2
</ol>
  </ol></ol> ";

  echo"<br><br></div>";

}
?>

<?php 
// 1-
include 'includes/pie.php';
?>