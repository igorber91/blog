<?php 
include '../includes/cabecera.php';
include '../includes/conexion.php';





$comentario2=$_POST['comentario'];
$comentario=mysqli_real_escape_string($conexion,$comentario2);

echo"$comentario";
echo " has seleccionado el blog:  "; 
$cod_post=$_GET['idpost2'];
$cod_post2=$_POST['post2'];
echo"$cod_post  <br>";
 
$estado=1;



$peticion4="
insert into comentario values
('',$idusuario,NOW(),'".$comentario."',$estado)";

$resul4=mysqli_query($conexion,$peticion4);
$lastid=mysqli_insert_id($conexion);

echo"$peticion4";
echo"<br>";


$peticion5="
insert into comentario_post values('',$lastid,$cod_post2)
";

$resul5=mysqli_query($conexion,$peticion5);

echo"$peticion5";
echo"<br>";
// Comentario_post

 echo '<script>            
setTimeout(function(){location.href="../index.php"} , 300);          
</script>';



?>