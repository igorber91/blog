<!-- B -->
<?php 
// 1-
include 'includes/cabecera.php';
?>



<!-- 2 -->
<div class="panel_lateral">
	
<table>
	<caption>Archivo de posts</caption>
	<thead>
		<tr>
			<th>Filtrar por..</th>
		</tr>
	</thead>
	<tbody>
	<tr>
		<th>FECHAS</th>
	<?php



 // 3-1- Fecha de post

$peticion0="select * from post ";
$resul0=mysqli_query($conexion,$peticion0);






		while($fila0=mysqli_fetch_array($resul0)){ 

$fecha2=$fila0['fecha'];

			echo'<tr>
			<td><a href="mi_mejor_yo.php?fecha='.$fecha2.'"><img src="imagenes_post/fecha.jpg" alt="no existo">
				'.$fecha2.'</a></td>
		</tr>';
			}?>

		<th>Etiquetas</th>
		
		
<?php

// 3.2- idetiqueta de etiqueta
$peticion4="select * from etiqueta " ;
$resul4=mysqli_query($conexion,$peticion4);
// Si se crea una fila fuera del while crea conflicto con los demas elementos!!
while($fila4=mysqli_fetch_array($resul4)){ 
			

$idetiqueta2=$fila4['idetiqueta'];

echo'<tr>
			<td><a href="mi_mejor_yo.php?idetiqueta='.$idetiqueta2.'"><img src="imagenes_post/enlace_post.jpg" alt="no existo">
				'.utf8_encode($fila4['nombre_etiqueta']).'</a></td>
		</tr>';




			}?>
		
		<th>Por autores</th>


		<?php

// 3.3 Nombre de usuario
		$peticion5="select * from usuario " ;
$resul5=mysqli_query($conexion,$peticion5);



			while($fila5=mysqli_fetch_array($resul5)){ 
				$nombre_usuario2=$fila5['idusuario'];
			echo'<tr>
			<td><a href="mi_mejor_yo.php?idusuario='.$nombre_usuario2.'"><img src="imagenes_post/usuario.jpg" alt="no existo">
				'.utf8_encode($fila5['nombre']).'</a></td>
		</tr>';
			}?>
	</tbody>
</table>
</div>


<!-- 4 Post -->
<div class="post">

<?php 

if (isset($_GET['idetiqueta'])) {
@$idetiqueta3=$_GET['idetiqueta'];

$peticion41="select idpost from etiqueta_post where idetiqueta=$idetiqueta3";

$resul41=mysqli_query($conexion,$peticion41);
while($fila41=mysqli_fetch_array($resul41)){

$post10=$fila41['idpost'];
echo"<div class='codigo'>soy el post:";
echo $post10;
echo"</div>";
$peticion42="select * from post where idpost=$post10";
$resul42=mysqli_query($conexion,$peticion42);
 while($fila42=mysqli_fetch_array($resul42)){
// Nuevo!!!
echo " <br><h2>".utf8_encode($fila42['titulo'])."</h2><br>
<h3>".utf8_encode($fila42['descripcion'])."</h3><br>
<img class='post' src='".$fila42['imagen']."'/>
<b class='fecha'>".utf8_encode($fila42['fecha'])."</b><br>";
//4.2  Coge el idpost del post con $codigo_post
$codigo_post=$fila42['idpost'];
// 5 Seleccionar idcomentario idusuario y idetiqueta de las tablas intermedias
$peticion3="select idcomentario from comentario_post where  idpost='$codigo_post'";
$resul3=mysqli_query($conexion,$peticion3);
$fila3=mysqli_fetch_array($resul3);
$idcomentario20=$fila3['idcomentario'];
$peticion33="select idusuario from usuario_post where  idpost='$codigo_post'";
$resul33=mysqli_query($conexion,$peticion33);
$fila33=mysqli_fetch_array($resul33);
$idusuario20=$fila33['idusuario'];
$peticion333="select idetiqueta from etiqueta_post where  idpost='$codigo_post'";
$resul333=mysqli_query($conexion,$peticion333);

echo"<br><br>idpost=$codigo_post<br>";
// 8- Contenido dentro del while select * from post
echo"<br>Contenido:<br>";
echo"<p>".utf8_encode($fila42['contenido'])."</p>";
// 9- Comentarios del post que hay dentro de un while 
echo"<h4>Comentarios que hay en el post:<h4>";
$peticion20="select * from comentario natural join comentario_post 
where idpost=$codigo_post and estado=1";
$resul20=mysqli_query($conexion,$peticion20);
while($fila20=mysqli_fetch_array($resul20)){
echo"<b>";
echo $fila20['comentario'];
echo"<hr/><br>";
echo"</b>";
}
// 6- IDEtiquetas de cada post
while($fila333=mysqli_fetch_array($resul333)){




$idetiqueta20=$fila333['idetiqueta'];


// 7- Coger el idetiqueta de etiqueta_post y con eso coger * from etiqueta where idetiqueta=$
$peticion22="select * from etiqueta where idetiqueta=$idetiqueta20";
$resul22=mysqli_query($conexion,$peticion22);
@$fila22=mysqli_fetch_array($resul22);
$idetiqueta20=$fila333['idetiqueta'];

$nombre_etiqueta2=$fila22['nombre_etiqueta'];

echo '<a href="mi_mejor_yo.php?idetiqueta='.$idetiqueta20.'">';
echo'<img src="imagenes_post/enlace_post.jpg" alt="no existo">';
echo$nombre_etiqueta2;
echo"</a>";

}
// 10-El usuario que ha creado el post sin while
echo"<h4>Usuario que ha creado el post:<h4>";
$peticion21="select * from usuario where idusuario=$idusuario20";
$resul21=mysqli_query($conexion,$peticion21);
@$fila21=mysqli_fetch_array($resul21);

$nombreusuario23=$fila21['nombre'];
$idusuario23=$fila21['idusuario'];
echo '<a href="mi_mejor_yo.php?idusuario='.$idusuario23.'">';
echo'<img src="imagenes_post/usuario.jpg"  alt="no existo" >';

echo$nombreusuario23;

echo"</a>";
echo"<br>";

// 11- Enlace dentro del while selec * from post para elegir el post full .php con get
echo '<br>
<a href="post_full.php?idpost='.$codigo_post.'">
Leer mas</a><br>';
 





// fin pagina blog
}
}
}
else if (isset($_GET['idusuario'])) {
	@$idusuario3=$_GET['idusuario'];
echo " has seleccionado el blog con  usuario id:  "; 
echo"$idusuario3";



$peticion41="select idpost from usuario_post where idusuario=$idusuario3";

$resul41=mysqli_query($conexion,$peticion41);
while($fila41=mysqli_fetch_array($resul41)){

$post10=$fila41['idpost'];
echo"soy el post:";
echo $post10;

$peticion42="select * from post where idpost=$post10";
$resul42=mysqli_query($conexion,$peticion42);
 while($fila42=mysqli_fetch_array($resul42)){
// Nuevo!!!
echo " <br><h2>".utf8_encode($fila42['titulo'])."</h2><br>
<h3>".utf8_encode($fila42['descripcion'])."</h3><br>
<img class='post' src='".$fila42['imagen']."'/>
<b class='fecha'>".utf8_encode($fila42['fecha'])."</b><br>";
//4.2  Coge el idpost del post con $codigo_post
$codigo_post=$fila42['idpost'];
// 5 Seleccionar idcomentario idusuario y idetiqueta de las tablas intermedias
$peticion3="select idcomentario from comentario_post where  idpost='$codigo_post'";
$resul3=mysqli_query($conexion,$peticion3);
$fila3=mysqli_fetch_array($resul3);
$idcomentario20=$fila3['idcomentario'];
$peticion33="select idusuario from usuario_post where  idpost='$codigo_post'";
$resul33=mysqli_query($conexion,$peticion33);
$fila33=mysqli_fetch_array($resul33);
$idusuario20=$fila33['idusuario'];
$peticion333="select idetiqueta from etiqueta_post where  idpost='$codigo_post'";
$resul333=mysqli_query($conexion,$peticion333);

echo"<br><br>idpost=$codigo_post<br>";
// 8- Contenido dentro del while select * from post
echo"<br>Contenido:<br>";
echo"<p>".utf8_encode($fila42['contenido'])."</p>";
// 9- Comentarios del post que hay dentro de un while 
echo"<h4>Comentarios que hay en el post:<h4>";
$peticion20="select * from comentario natural join comentario_post 
where idpost=$codigo_post and estado=1";
$resul20=mysqli_query($conexion,$peticion20);
while($fila20=mysqli_fetch_array($resul20)){
echo"<b>";
echo $fila20['comentario'];
echo"<hr/><br>";
echo"</b>";
}
// 6- IDEtiquetas de cada post
while($fila333=mysqli_fetch_array($resul333)){




$idetiqueta20=$fila333['idetiqueta'];


// 7- Coger el idetiqueta de etiqueta_post y con eso coger * from etiqueta where idetiqueta=$
$peticion22="select * from etiqueta where idetiqueta=$idetiqueta20";
$resul22=mysqli_query($conexion,$peticion22);
@$fila22=mysqli_fetch_array($resul22);
$idetiqueta20=$fila333['idetiqueta'];

$nombre_etiqueta2=$fila22['nombre_etiqueta'];

echo '<a href="mi_mejor_yo.php?idetiqueta='.$idetiqueta20.'">';
echo'<img src="imagenes_post/enlace_post.jpg" alt="no existo">';
echo$nombre_etiqueta2;
echo"</a>";

echo"</a>";

}
// 10-El usuario que ha creado el post sin while
echo"<h4>Usuario que ha creado el post:<h4>";
$peticion21="select * from usuario where idusuario=$idusuario20";
$resul21=mysqli_query($conexion,$peticion21);
@$fila21=mysqli_fetch_array($resul21);

$nombreusuario23=$fila21['nombre'];
$idusuario23=$fila21['idusuario'];
echo '<a href="mi_mejor_yo.php?idusuario='.$idusuario23.'">';
echo'<img src="imagenes_post/usuario.jpg"  alt="no existo" >';
echo$nombreusuario23;

echo"</a>";
echo"<br>";

// 11- Enlace dentro del while selec * from post para elegir el post full .php con get
echo '<br>
<a href="post_full.php?idpost='.$codigo_post.'">
Leer mas</a><br><hr/>';
 





// fin pagina blog
}
}
}

else if (isset($_GET['fecha'])) {
	@$fecha3=$_GET['fecha'];
echo " has seleccionado el blog con  la fecha:  "; 
echo"$fecha3";




$peticion42="select * from post where fecha='$fecha3'";
$resul42=mysqli_query($conexion,$peticion42);
 while($fila42=mysqli_fetch_array($resul42)){
// Nuevo!!!
echo " <br><h2>".utf8_encode($fila42['titulo'])."</h2><br>
<h3>".utf8_encode($fila42['descripcion'])."</h3><br>
<img class='post' src='".$fila42['imagen']."'/>
<b class='fecha'>".utf8_encode($fila42['fecha'])."</b><br>";
//4.2  Coge el idpost del post con $codigo_post
$codigo_post=$fila42['idpost'];
// 5 Seleccionar idcomentario idusuario y idetiqueta de las tablas intermedias
$peticion3="select idcomentario from comentario_post where  idpost='$codigo_post'";
$resul3=mysqli_query($conexion,$peticion3);
$fila3=mysqli_fetch_array($resul3);
$idcomentario20=$fila3['idcomentario'];
$peticion33="select idusuario from usuario_post where  idpost='$codigo_post'";
$resul33=mysqli_query($conexion,$peticion33);
$fila33=mysqli_fetch_array($resul33);
$idusuario20=$fila33['idusuario'];
$peticion333="select idetiqueta from etiqueta_post where  idpost='$codigo_post'";
$resul333=mysqli_query($conexion,$peticion333);

echo"<br><br>idpost=$codigo_post<br>";
// 8- Contenido dentro del while select * from post
echo"<br>Contenido:<br>";
echo"<p>".utf8_encode($fila42['contenido'])."</p>";
// 9- Comentarios del post que hay dentro de un while 
echo"<h4>Comentarios que hay en el post:<h4>";
$peticion20="select * from comentario natural join comentario_post 
where idpost=$codigo_post and estado=1";
$resul20=mysqli_query($conexion,$peticion20);
while($fila20=mysqli_fetch_array($resul20)){
echo"<b>";
echo $fila20['comentario'];
echo"<hr/><br>";
echo"</b>";
}
// 6- IDEtiquetas de cada post
while($fila333=mysqli_fetch_array($resul333)){




$idetiqueta20=$fila333['idetiqueta'];


// 7- Coger el idetiqueta de etiqueta_post y con eso coger * from etiqueta where idetiqueta=$
$peticion22="select * from etiqueta where idetiqueta=$idetiqueta20";
$resul22=mysqli_query($conexion,$peticion22);
@$fila22=mysqli_fetch_array($resul22);
$idetiqueta20=$fila333['idetiqueta'];

$nombre_etiqueta2=$fila22['nombre_etiqueta'];

echo '<a href="mi_mejor_yo.php?idetiqueta='.$idetiqueta20.'">';
echo'<img src="imagenes_post/enlace_post.jpg" alt="no existo">';
echo$nombre_etiqueta2;
echo"</a>";

echo"</a>";

}
// 10-El usuario que ha creado el post sin while
echo"<h4>Usuario que ha creado el post:<h4>";
$peticion21="select * from usuario where idusuario=$idusuario20";
$resul21=mysqli_query($conexion,$peticion21);
@$fila21=mysqli_fetch_array($resul21);

$nombreusuario23=$fila21['nombre'];
$idusuario23=$fila21['idusuario'];
echo '<a href="mi_mejor_yo.php?idusuario='.$idusuario23.'">';
echo'<img src="imagenes_post/usuario.jpg"  alt="no existo" >';
echo$nombreusuario23;

echo"</a>";
echo"<br>";

// 11- Enlace dentro del while selec * from post para elegir el post full .php con get
echo '<br>
<a href="post_full.php?idpost='.$codigo_post.'">
Leer mas</a><br><hr/>';
 





// fin pagina blog
}
}

// 5 posts en el index clausula limit de 
// limit x,y
// limit $inicio,$reg
// select * from post limit 0,3

// x =$pagina lo que voy a mostrar , y =el numero de resultados

// Variable total de paginas todo lo redondeamos con ceil!!!!  

// todal de paginas = ceil num_roral registros/$reg
// mysqli_num_rows

// $reg=5 segundo numero del limit

// Sino pasamos por get !$pagina se inicia ppor 0 y la pagina en la que estoy es 0

// En caso de que exista lapagina contar $padina 2 -1 * reg
// else{
// 	$inicion=($pagina -1)*$reg;
// }
else{
	// numero de posts x pagina
	$num_reg=1;
$pagina=$_GET['pagina'];
	// 2-
	if (!$pagina) {
		$comienzo=0;
		$pagina=1;
	}
	else{
		$comienzo=($pagina-1)*$num_reg;
	}

	
	
	// 3-
	$consulta="select * from post limit 1,7";

	$resul2=mysqli_query($conexion,$consulta);
	$num_filas=mysqli_num_rows($resul2);
	while($fila2=mysqli_fetch_array($resul2)){
// echo"aqui muestro mis campos "
	}
	// 4
	$url="mi_mejor_yo.php";

	$total_paginas=ceil($num_filas/$num_reg);
	// 5-
	if ($total_paginas>1) {
		if ($pagina!=1) {
echo'<a class="num1"  href="'.$url.'"?pagina='.($pagina-1).'>---|</a>';		}
	}
	
for ($i=1; $i <=$total_paginas ; $i++) { 
if ($pagina==$i) {
	// si muestro el indeice de la pagina actual, no coloco enlace
	echo"<span class='nums'>".$pagina."</span>  ";
} else{
	// si el indice no corresponde con la pagina mostrada actualmente, coloco el enlace para ir a esa pagina.
	echo'<a class="nums" href="'.$url.'?pagina='.$i.'">'.$i.'</a>';
	}	
	}
	if ($pagina!=$total_paginas) {
		echo'<a class="nums2" href="'.$url.'"?pagina="'.($pagina+1).'">|---</a>';
	}
	// numero de posts por pagina
	$x=$pagina;
	// total de paginas
	$y=$total_paginas;

	// 1!!!!!!!paginador
$peticion11="select * from post limit $x,$y ";
$resul11=mysqli_query($conexion,$peticion11); 


// 4.1 Todos los elementos del post titulo, descripcion, imagen de post, fecha,
// Empieza el while post
while($fila11=mysqli_fetch_array($resul11)){ 

// Nuevo!!!

// Nuevo!!!
echo " <br><h2>".utf8_encode($fila11['titulo'])."</h2><br>
<h3>".utf8_encode($fila11['descripcion'])."</h3><br>
<img class='post' src='".$fila11['imagen']."'/>
<b class='post'>".utf8_encode($fila11['fecha'])."</b><br>";




//4.2  Coge el idpost del post con $codigo_post

$codigo_post=$fila11['idpost'];

// 5 Seleccionar idcomentario idusuario y idetiqueta de las tablas intermedias
$peticion3="select idcomentario from comentario_post where  idpost='$codigo_post'";
$resul3=mysqli_query($conexion,$peticion3);
$fila3=mysqli_fetch_array($resul3);

$idcomentario20=$fila3['idcomentario'];



$peticion33="select idusuario from usuario_post where  idpost='$codigo_post'";
$resul33=mysqli_query($conexion,$peticion33);
$fila33=mysqli_fetch_array($resul33);


$idusuario20=$fila33['idusuario'];


$peticion333="select idetiqueta from etiqueta_post where  idpost='$codigo_post'";
$resul333=mysqli_query($conexion,$peticion333);


echo"<div class='codigo'>soy el post:";
echo"<br><br>idpost=$codigo_post<br>";
echo"</div>";



// 8- Contenido dentro del while select * from post
echo"<br><div class='contenido'>Contenido:<br>";
echo"<p >".utf8_encode($fila11['contenido'])."</p></div>";


// 9- Comentarios del post que hay dentro de un while 
echo"<h4>Comentarios que hay en el post:<h4>";
$peticion20="select * from comentario natural join comentario_post 
where idpost=$codigo_post and estado=1";
$resul20=mysqli_query($conexion,$peticion20);
while($fila20=mysqli_fetch_array($resul20)){
echo"<div class='comentario'><b>";
echo $fila20['comentario'];
echo"<hr/><br>";
echo"</b></div>";

}

// 6- IDEtiquetas de cada post
while($fila333=mysqli_fetch_array($resul333)){




$idetiqueta20=$fila333['idetiqueta'];


// 7- Coger el idetiqueta de etiqueta_post y con eso coger * from etiqueta where idetiqueta=$
$peticion22="select * from etiqueta where idetiqueta=$idetiqueta20";
$resul22=mysqli_query($conexion,$peticion22);
@$fila22=mysqli_fetch_array($resul22);
$idetiqueta20=$fila333['idetiqueta'];

$nombre_etiqueta2=$fila22['nombre_etiqueta'];

echo '<a href="mi_mejor_yo.php?idetiqueta='.$idetiqueta20.'">';
echo'<img src="imagenes_post/enlace_post.jpg" alt="no existo">';
echo$nombre_etiqueta2;
echo"</a>";


}

// 10-El usuario que ha creado el post sin while


echo"<h4>Usuario que ha creado el post:<h4>";
$peticion21="select * from usuario where idusuario=$idusuario20";
$resul21=mysqli_query($conexion,$peticion21);
@$fila21=mysqli_fetch_array($resul21);

$nombreusuario23=$fila21['nombre'];
$idusuario23=$fila21['idusuario'];
echo '<a href="mi_mejor_yo.php?idusuario='.$idusuario23.'">';
echo'<img src="imagenes_post/usuario.jpg"  alt="no existo" >';

echo$nombreusuario23;

echo"</a>";
echo"<br>";







// 11- Enlace dentro del while selec * from post para elegir el post full .php con get


echo '<br>
<a href="post_full.php?idpost='.$codigo_post.'">
Leer mas</a><br><hr/>';
 



}

}



?>


</div>



<br>


<!-- B -->
<?php 
// 1-
include 'includes/pie.php';
?>


