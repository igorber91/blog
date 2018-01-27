<!-- A -->

<!-- 0 -->
<!DOCTYPE html>
<html>
<head >

<!-- 1.Estilo -->
<style type="text/css" media="screen">

.oculto{
  display: none;
}
.visible{
  display: block;
}
nav{
 margin:10px auto 10px auto;
}
nav ul{
 background-color: #e8dede;
 text-align: center;
}
nav ul a{
  font-size: 40px;
}
ul li{
  width: 19%;padding:0px;
}
nav ul li a{
  text-decoration: none;color: white;padding: 10px; font-size: 10px;display: block;
  color: grey;
}
nav>ul>li>ul{
  display: none;}
nav>ul>li{
  display: inline-block;
}
li{
  position: relative;
  }
 li:hover ul{
  display:block;position:absolute;left: 40%;
  list-style:none;padding: 0;
 }

nav ul li a 
{
  font-size: 150%;
}





/* post*/
body{
/*  background-image: url("imagenes_post/binario.jpg");
*/  background-color: #c8c8ce;
/*  background-repeat: no-repeat;
*//*  background-attachment:fixed; 
*/
}

div.post{
  float: left;
  display: inline-block;
  width: 45%;
  position: relative;left: 17%;
  background-color: #e8dede;
padding: 10px;

}
.titulo{
  text-decoration: underline;
  text-align: center;
}
.descripcion{
text-align: center;
 
}
.usuario_comentario{

  display: inline-block;
  z-index:0;
  float: left;
  background-color: yellow;
  position: absolute;right: 75%;
  margin-top: 10%;
  border: solid;

}

img.imagen_post{
  display: inline-block;
  width: 350px;
  height: 230px;
  margin:  0px  100%  30px 30%  ;
  position: center;
}
b.fecha{
  background-color: #ccc3c3;
  color: #7292ba;
  font-size: 26px;

}
div.codigo{
  background-color: yellow;
  max-width: 800px;
  margin: auto;
}
div.contenido{
  text-align: center;
  border: solid;
  background-color: white;

}

div.comentario{
  text-align: center;
  min-height: 50px;
background-color: white;
color: #1e1616;

}
a.post{
  position:relative;left: 70%;
}

.comente_post{
  width: 100px;
  height: 100px;
  position: absolute;left:72%;
}
.comente_texto{
  float: right;
  width: 60px;
  position: absolute;right: 5%;
}
.comente{
  float: right;
  width: 60px;
}

form.post{
  text-align: center;
}

.etiqueta_post{
display: inline-block;

position: relative;left: 35%;
  text-align: center;

}



/*Panel_lateral*/
div.panel_lateral{
  float: left;
  position: relative;left: 75%;
  width: 10%;
    background-color: #e8dede;
  
}

/*Comentario altura */

p{
  height:110px;
  overflow: hidden;
}

/*imagen cabecera*/

div.cabecera1{
   position: relative;left: 10%;

width: 50%;


}
img.cabecera2{
 position: relative;left: 18%;
 z-index: 999;
}

img.cabecera{
  float:  right;
  width: 100px;
  height: 100px;
  border:solid;
}
.avatar{
  border:solid;
}
a.cabecera{
   width: 100px;
  height: 100px;
  font-size: 12px;
   float: right;
}




div.comentario{
  margin-top: 10px;
  border: solid;
  border-color: black;
}

div.contacto{
margin: auto;
text-align: center;

}
div.modificar_usuario{
  text-align: center;
}



/*Full*/
div.full{
  text-align: center;
    margin:  0  auto  0 auto  ;
}


img.full{
width: 800px;
  height: 500px;
  

}
div.titulo_full{
color: #397003;
background-color: grey;
border: solid;
width: 800px;
margin: auto;
}

div.descripcion_full{
  color: #698251;
}

div.full_comentario{
  text-align: center;
  margin: auto;
  width: 800px;
  color: grey;
  background-color: white;
}
div.avatar_usuario_full img{
  position: absolute; left: 10%;
  width: 200px;
  height: 200px;
  border: solid;

}

div.nombre_comentario_full{
color: blue;
position: relative;right: 20%;

}
p.contenido_full{
  background-color: white;
  width: 800px;
  margin: auto;
color: black;}


.comente_full{
  width: 100px;
  height: 100px;
  position: absolute;left:30%;
}


/*Full*/
/*esto es de publicar post*/

.usuario{
  text-align: center;
border: solid;}
.full{
  text-align: center;
    margin:  0  auto  0 auto  ;
}

.nums{
 position: relative;left: 45%;
}
.nums1{

}
.nums2{
  position: relative;left: 88%;
}


.administrar_contenido{
  position: relative;left: 25%;
  border: solid;
    text-align: center;
      border-color: grey;
  width: 50%;
}
.administrar_fecha{
    position: relative;left: 25%;
  border: solid;
    text-align: center;
      border-color: grey;
  width: 50%;
}

div.administrar_imagen img{

  border: solid;
 width: 100px;
height: 100px;
 position: relative;
   border-color: grey;
 
}
div.administrar_imagen img{

  border: solid;
 width: 100px;
height: 100px;
 position: relative;
   border-color: grey;
 
}
.administrar_descripcion{
    position: relative;left: 25%;
  border: solid;
  border-color: grey;
  width: 50%;
    text-align: center;
}
.administrar_titulo{
    position: relative;left: 25%;
  border: solid;
    text-align: center;
      border-color: grey;
  width: 50%;
}
.administrar_idpost{
    position: relative;left: 25%;
  border: solid;
  text-align: center;
    border-color: grey;
  width: 50%;
}
.administrar_estado{
   position: relative;left: 25%;
  border: solid;
  text-align: center;
    border-color: grey;
  width: 50%;
}

.imagen_usuario{
  width: 100px;
  height: 100px;
}

.descripcion_usuario{
  width:50%;
}
.login{
  background-color: #6e6e72;
  position: absolute;left: 40%;
}
.registrar{
  background-color: orange;
  position: absolute;left: 44%;
}
img.blog{
  position: relative;left: 42%;
}

.administrar_comentario2{
  background-color: white;
    position: relative;left: 25%;
  border: solid;
  text-align: center;
    border-color: white;
  width: 50%;
  color: red;
  height: 40px;
}
.administrar_comentario{
  background-color: white;
    position: relative;left: 25%;
  border: solid;
  text-align: center;
    border-color: white;
  width: 50%;
   color: #4c7a43;
  height: 40px;
}
.registrate{
  color: red;
  border:solid;
  border-color: red;
  width: 50%;
  position: relative;left:25%;
}

</style>

	<title>Camino a mi mejor...YO!</title>

</head>
 <meta charset="utf-8">
<!-- 2 Body -->
<body >


<?php 
include 'conexion.php';
?>

<!-- 3 navegador HTML -->
<nav id="capa">

	<ul>
  

    <li class="li"><a href="index.php">Blog a mi mejor...Yo!</a>
      <ul class="oculto">
        
      </ul>
   </li>

     <li class="li"><a href="contacto.php">Contacto</a>
      <ul class="oculto">
        
      </ul>
   </li>

  





<!-- Sesion php-->
<?php 
@session_start();


// Hacer con id en vez de nombre

@$nombre=$_SESSION['nombre'];


@$idusuario=$_SESSION['idusuario'];

@$permisos=$_SESSION['permisos'];

//5- Imagen de inicio de sesion
$peticion6="select * from usuario where nombre ='$nombre' ";
$resul6=mysqli_query($conexion,$peticion6);

      while($fila6=mysqli_fetch_array($resul6)){ 

$direccion="usuario.php?idusuario=".$idusuario;
echo' <a href="'.$direccion.'" class="cabecera">';
  echo "<img class='cabecera' 
  src='".$fila6['avatar']."' alt='no existo o mi direccion esta mal'/>  ";
  echo"$nombre</a><br><br>";}

// 6- diferentes menu segun permiso
 
if($permisos=='1'){ 
 

 
echo '<li><a href="parejas/cerrar_sesion.php">Cerrar sesion</a>
      <ul> 
      </ul>
   </li>';

   } 
else if ($permisos=='2') {

  echo '<li><a href="publicar_post.php">Crear post</a>
      <ul> 
      </ul>
   </li>';
 
echo '<li><a href="parejas/cerrar_sesion.php">Cerrar sesion</a>
      <ul> 
      </ul>
   </li>';
      echo '<li><a href="administrar_post_programador.php">Administrar post</a>
      <ul> 
      </ul>
   </li>';
}
else if ($permisos=='3') {


 
echo '<li><a href="parejas/cerrar_sesion.php">Cerrar sesion</a>
      <ul> 
      </ul>
   </li>';
echo '<li><a href="publicar_post.php">Crear post</a>
      <ul> 
      </ul>
   </li>';

  echo '<li><a href="administrar_usuarios.php">Administrar usuarios</a>
      <ul> 
      </ul>
   </li>';
   echo '<li><a href="administrar_comentarios.php">Administrar comentarios</a>
      <ul> 
      </ul>
   </li>';
    echo '<li><a href="administrar_post1.php">Administrar post</a>
      <ul> 
      </ul>
   </li>';
}

 
else{ 
echo '<li><a href="login.php" ">Iniciar sesion</a>
      <ul> 
      </ul>
   </li>';
        }

  
?>


</ul>

</nav>



<!-- 7-Imagen cabecera -->
<div class="cabecera1">
<img  class="cabecera2 "src="imagenes/cabecera2.jpg" alt="no salgo porque la ruta no es correcta o no existo">
</div>


