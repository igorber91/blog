

<?php 
include '../includes/conexion.php';
?>







<?php 

$id_post=$_GET['idpost'];

$peticion2="
delete FROM usuario_post where idpost=$id_post";
$resul2=mysqli_query($conexion,$peticion2);
echo"$peticion2";

$peticion3="
delete FROM comentario_post where idpost=$id_post";
$resul3=mysqli_query($conexion,$peticion3);
echo"$peticion3";

$peticion4="
delete FROM etiqueta_post where idpost=$id_post";
$resul4=mysqli_query($conexion,$peticion4);
echo"$peticion4";

$peticion1="
delete FROM post where idpost=$id_post";
$resul1=mysqli_query($conexion,$peticion1);


echo"$peticion1";
 echo '<script>            
setTimeout(function(){location.href="../administrar_post1.php"} , 300);          
</script>';
?>


