<?php 
include '../includes/cabecera.php';
include '../includes/conexion.php';





// Con el real scape escapamos comillas ' y asi estamos portegidos'

$idcomentario12=$_GET['idcomentario'];
@$idcomentario12=mysqli_real_escape_string($conexion,$idcomentario12);

echo"$idcomentario12<br>sad";


echo"Desppublcar comentario<BR>";

$peticion2="Update comentario Set estado=0 
Where idcomentario='$idcomentario12'";
echo"$peticion2";
$resul2=mysqli_query($conexion,$peticion2);


 echo '<script>            
setTimeout(function(){location.href="../administrar_comentarios.php"} , 300);          
</script>';

?>