<?php 
include '../includes/cabecera.php';
include '../includes/conexion.php';





$idcomentario12=$_GET['idcomentario'];


echo"$idcomentario12<br>";


echo"Eliminar comentario<BR>";


$peticion2="delete from comentario_post  
Where idcomentario='$idcomentario12'";
echo"$peticion2";
$resul2=mysqli_query($conexion,$peticion2);
$peticion3="delete from comentario  
Where idcomentario='$idcomentario12'";
echo"$peticion3";
$resul3=mysqli_query($conexion,$peticion3);

 echo '<script>            
setTimeout(function(){location.href="../administrar_comentarios.php"} , 300);          
</script>';

?>
