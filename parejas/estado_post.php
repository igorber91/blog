

<?php 
include '../includes/cabecera.php';
include '../includes/conexion.php';

$estado_post=0;


echo"
<form action='publicar_post_submit.php' method='POST' accept-charset='utf-8'>
<INPUT TYPE='submit' VALUE='Publicar post'> 
</FORM>";




 echo '<script>    
setTimeout(function(){location.href="../index.php"} , 300000);          
</script>';


?>




if( isset( $estado_post ) && ( $_POST == "" ) ) {
        
        $variable = 1;
}  
