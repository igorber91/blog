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

$peticion0="select distinct YEAR(fecha),MONTH(fecha) from post order by fecha desc ";
$resul0=mysqli_query($conexion,$peticion0);






		while($fila0=mysqli_fetch_array($resul0)){ 


$fecha2=$fila0['YEAR(fecha)'];
$fecha3=$fila0['MONTH(fecha)'];

			echo'<tr>
			<td><a href="index.php?year='.$fecha2.'&month='.$fecha3.'"><img src="imagenes_post/fecha.jpg" alt="no existo">
				'.$fecha3.'/'.$fecha2.'</a></td>
		</tr>';
			}?>

		<th>Etiquetas</th>
		
		
<?php
// Habria que hacer un free result de cada peticion despues de usarlas 
mysqli_free_result($resul0);
// 3.2- idetiqueta de etiqueta
$peticion4="select * from etiqueta " ;
$resul4=mysqli_query($conexion,$peticion4);
// Si se crea una fila fuera del while crea conflicto con los demas elementos!!

while($fila4=mysqli_fetch_array($resul4)){ 
			

$idetiqueta2=$fila4['idetiqueta'];

echo'<tr>
			<td><a href="index.php?idetiqueta='.$idetiqueta2.'"><img src="imagenes_post/enlace_post.jpg" alt="no existo">
				'.($fila4['nombre_etiqueta']).'</a></td>
		</tr>';




			}
			mysqli_free_result($resul4);?>
		
		<th>Por autores</th>


		<?php

// 3.3 Nombre de usuario
		$peticion5="select * from usuario where permisos>1 " ;
$resul5=mysqli_query($conexion,$peticion5);



			while($fila5=mysqli_fetch_array($resul5)){ 
				$nombre_usuario2=$fila5['idusuario'];
			echo'<tr>
			<td><a href="index.php?idusuario='.$nombre_usuario2.'"><img src="imagenes_post/usuario.jpg" alt="no existo">
				'.($fila5['nombre']).'</a></td>
		</tr>';
			}
			mysqli_free_result($resul5);?>
	</tbody>
</table>
</div>


<!-- 4 Post -->
<div class="post">

<?php 

if (isset($_GET['idetiqueta'])) {
@$idetiqueta3=$_GET['idetiqueta'];




// Paginador ...
	$num_reg=2;
@$pagina=$_GET['pagina'];

	// A-
	if (!$pagina) {
		$comienzo=0;
		$pagina=1;
	}
	else{
		$comienzo=($pagina-1)*$num_reg;
	}

	
	
	// B-
	$consulta="select * from post";

	$resul2=mysqli_query($conexion,$consulta);
	$num_filas=mysqli_num_rows($resul2);
	while($fila2=mysqli_fetch_array($resul2)){
// echo"aqui muestro mis campos "
	}
	mysqli_free_result($resul2);
	// C
	$url="index.php";

	$total_paginas=ceil($num_filas/$num_reg);
	// D-
	if ($total_paginas>1) {
		if ($pagina!=1) {
echo'<a class="num1"  href="'.$url.'"?pagina='.($pagina-1).'>---|</a>';		}
	}
	

	// E-
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
	
	// total de paginas
	$num_reg;

// F-

	$peticion41="select idpost from etiqueta_post where idetiqueta=$idetiqueta3";

$resul41=mysqli_query($conexion,$peticion41);
while($fila41=mysqli_fetch_array($resul41)){

// Seleccion de post
$post10=$fila41['idpost'];
$peticion11="select * from post where idpost=$post10 limit $comienzo,$num_reg ";
$resul11=mysqli_query($conexion,$peticion11); 


// 4.1 Todos los elementos del post titulo, descripcion, imagen de post, fecha,
// Empieza el while post
while($fila11=mysqli_fetch_array($resul11)){ 


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
// 6-El usuario que ha creado el post sin while
$peticion21="select * from usuario where idusuario=$idusuario20";
$resul21=mysqli_query($conexion,$peticion21);
@$fila21=mysqli_fetch_array($resul21);
$nombreusuario23=$fila21['nombre'];
$idusuario23=$fila21['idusuario'];

// 6.1
echo " <br><h2 class='titulo'>".htmlspecialchars($fila11['titulo'])."</h2><br>
<h3 class='descripcion'>".htmlspecialchars($fila11['descripcion'])."</h3><br>
";

// 6.2
echo"<div class='usuario_comentario'><h4>Usuario que ha creado el post:<h4>";
echo '<a href="index.php?idusuario='.$idusuario23.'">';
echo'<img src="imagenes_post/usuario.jpg"  alt="no existo" >';
echo$nombreusuario23;
echo"</a>";
echo"<br></div>";
// termina usuario_comentario

//6.3 

echo"
<img class='imagen_post' src='".$fila11['imagen']."'/>
<b class='fecha'>".($fila11['fecha'])."</b><br>";
// echo"<div class='codigo'>soy el post:";
// echo"<br><br>idpost=$codigo_post<br>";
// echo"</div>";


echo"<br><div class='contenido'>Contenido:<br>";
echo"<p >".htmlspecialchars($fila11['contenido'])."</p></div>";

echo"<br><br>";
$peticion22="select  idcomentario, count(idcomentario) as cantidad
from comentario_post
where idpost= $codigo_post";

//7- Comentarios
echo"<h5 class='comente_texto'>Comentarios:</h5>";
echo'<img class="comente_post" src="imagenes/comente.jpg" alt="no estoy en la direccion correcta">';
echo "<br>";
$resul22=mysqli_query($conexion,$peticion22);
while ($fila22=mysqli_fetch_array($resul22)) {
	echo"<h5 class='comente'>";
echo$fila22['cantidad'];
	echo"</h5>";
}

mysqli_free_result($resul22);
echo "<br><br>";
// Comentarios

echo"<br><br>";
// 8- IDEtiquetas de cada post
while($fila333=mysqli_fetch_array($resul333)){

$idetiqueta20=$fila333['idetiqueta'];
// 9- Coger el idetiqueta de etiqueta_post y con eso coger * from etiqueta where idetiqueta=$
$peticion22="select * from etiqueta where idetiqueta=$idetiqueta20";
$resul22=mysqli_query($conexion,$peticion22);
@$fila22=mysqli_fetch_array($resul22);
$idetiqueta20=$fila333['idetiqueta'];
$nombre_etiqueta2=$fila22['nombre_etiqueta'];





echo '<div class="etiqueta_post"><a href="index.php?idetiqueta='.$idetiqueta20.'">';
echo'<img  src="imagenes_post/enlace_post.jpg" alt="no existo">';
echo$nombre_etiqueta2;
echo"</a></div>";


}
mysqli_free_result($resul333);
}




// 10- Enlace dentro del while selec * from post para elegir el post full .php con get


echo '<br>
<a href="post_full.php?idpost='.$codigo_post.'">
Leer mas</a><br><hr/>';
 



}
}



else if (isset($_GET['idusuario'])) {
	$idusuario3=$_GET['idusuario'];
// echo " has seleccionado el blog con  usuario id:  "; 
// echo"$idusuario3";




	// numero de posts x pagina
	$num_reg=2;
@$pagina=$_GET['pagina'];
// A-
	if (!$pagina) {
		$comienzo=0;
		$pagina=1;
	}
	else{
		$comienzo=($pagina-1)*$num_reg;
	}

	
	
	// B-
	$consulta="select * from post";

	$resul2=mysqli_query($conexion,$consulta);
	$num_filas=mysqli_num_rows($resul2);
	while($fila2=mysqli_fetch_array($resul2)){
// echo"aqui muestro mis campos "
	}
	// C
	$url="index.php";

	$total_paginas=ceil($num_filas/$num_reg);
	// D-
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
	
	// total de paginas
	$num_reg;
//!!!!!!!paginador

	$peticion41="select idpost from usuario_post where idusuario=$idusuario3";

$resul41=mysqli_query($conexion,$peticion41);
while($fila41=mysqli_fetch_array($resul41)){

$post10=$fila41['idpost'];
// echo"soy el post:";
// echo $post10;
$peticion11="select * from post where idpost=$post10 limit $comienzo,$num_reg ";
$resul11=mysqli_query($conexion,$peticion11); 


// 4.1 Todos los elementos del post titulo, descripcion, imagen de post, fecha,
// Empieza el while post
while($fila11=mysqli_fetch_array($resul11)){ 


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
// 6-El usuario que ha creado el post sin while
$peticion21="select * from usuario where idusuario=$idusuario20";
$resul21=mysqli_query($conexion,$peticion21);
@$fila21=mysqli_fetch_array($resul21);
$nombreusuario23=$fila21['nombre'];
$idusuario23=$fila21['idusuario'];

// 7
echo " <br><h2 class='titulo'>".htmlspecialchars($fila11['titulo'])."</h2><br>
<h3 class='descripcion'>".htmlspecialchars($fila11['descripcion'])."</h3><br>
";

// 8
echo"<div class='usuario_comentario'><h4>Usuario que ha creado el post:<h4>";
echo '<a href="index.php?idusuario='.$idusuario23.'">';
echo'<img src="imagenes_post/usuario.jpg"  alt="no existo" >';
echo$nombreusuario23;
echo"</a>";
echo"<br></div>";
// termina usuario_comentario

//9

echo"
<img class='imagen_post' src='".$fila11['imagen']."'/>
<b class='fecha'>".($fila11['fecha'])."</b><br>";
// echo"<div class='codigo'>soy el post:";
// echo"<br><br>idpost=$codigo_post<br>";
// echo"</div>";
// 10- Contenido dentro del while select * from post
echo"<br><div class='contenido'>Contenido:<br>";
echo"<p >".htmlspecialchars($fila11['contenido'])."</p></div>";


echo"<br><br>";
$peticion22="select  idcomentario, count(idcomentario) as cantidad
from comentario_post
where idpost= $codigo_post";

// Comentarios!!!!!!!!!!!!!!!!!!!!!!!!!
echo"<h5 class='comente_texto'>Comentarios:</h5>";
echo'<img class="comente_post" src="imagenes/comente.jpg" alt="no estoy en la direccion correcta">';
echo "<br>";
$resul22=mysqli_query($conexion,$peticion22);
while ($fila22=mysqli_fetch_array($resul22)) {
	echo"<h5 class='comente'>";
echo$fila22['cantidad'];
	echo"</h5>";
}

mysqli_free_result($resul22);
echo "<br><br>";
// Comentarios!!!!!!!!!!!!!!!!!!!!!!!!!

echo"<br><br>";
// 11- IDEtiquetas de cada post
while($fila333=mysqli_fetch_array($resul333)){

$idetiqueta20=$fila333['idetiqueta'];
// 12- Coger el idetiqueta de etiqueta_post y con eso coger * from etiqueta where idetiqueta=$
$peticion22="select * from etiqueta where idetiqueta=$idetiqueta20";
$resul22=mysqli_query($conexion,$peticion22);
@$fila22=mysqli_fetch_array($resul22);
$idetiqueta20=$fila333['idetiqueta'];
$nombre_etiqueta2=$fila22['nombre_etiqueta'];





echo '<div class="etiqueta_post"><a href="index.php?idetiqueta='.$idetiqueta20.'">';
echo'<img  src="imagenes_post/enlace_post.jpg" alt="no existo">';
echo$nombre_etiqueta2;
echo"</a></div>";


}
mysqli_free_result($resul333);





// 13- Enlace dentro del while selec * from post para elegir el post full .php con get


echo '<br>
<a href="post_full.php?idpost='.$codigo_post.'">
Leer mas</a><br><hr/>';
 



}
}
}




else if (isset($_GET['year'])) {
	$fecha3=$_GET['year'];
	$fecha2=$_GET['month'];


// echo " has seleccionado el blog con  la fecha:  "; 
// echo $fecha3.$fecha2;




	$num_reg=2;
@$pagina=$_GET['pagina'];
	// A-
	if (!$pagina) {
		$comienzo=0;
		$pagina=1;
	}
	else{
		$comienzo=($pagina-1)*$num_reg;
	}

	
	
	// B-
	$consulta="select * from post";

	$resul2=mysqli_query($conexion,$consulta);
	$num_filas=mysqli_num_rows($resul2);
	while($fila2=mysqli_fetch_array($resul2)){
// echo"aqui muestro mis campos "
	}
	// C
	$url="index.php";

	$total_paginas=ceil($num_filas/$num_reg);
	// D-
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
	
	// total de paginas
	$num_reg;
// !!!!!!!paginador
$peticion11="select * from post where MONTH(fecha) =".$fecha2."  and YEAR(fecha)= ".$fecha3." limit $comienzo,$num_reg ";
$resul11=mysqli_query($conexion,$peticion11); 


// 4.1 Todos los elementos del post titulo, descripcion, imagen de post, fecha,
// Empieza el while post
while($fila11=mysqli_fetch_array($resul11)){ 


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
// 6-El usuario que ha creado el post sin while
$peticion21="select * from usuario where idusuario=$idusuario20";
$resul21=mysqli_query($conexion,$peticion21);
@$fila21=mysqli_fetch_array($resul21);
$nombreusuario23=$fila21['nombre'];
$idusuario23=$fila21['idusuario'];

// 7
echo " <br><h2 class='titulo'>".htmlspecialchars($fila11['titulo'])."</h2><br>
<h3 class='descripcion'>".htmlspecialchars($fila11['descripcion'])."</h3><br>
";

// 8
echo"<div class='usuario_comentario'><h4>Usuario que ha creado el post:<h4>";
echo '<a href="index.php?idusuario='.$idusuario23.'">';
echo'<img src="imagenes_post/usuario.jpg"  alt="no existo" >';
echo$nombreusuario23;
echo"</a>";
echo"<br></div>";
// termina usuario_comentario

//9

echo"
<img class='imagen_post' src='".$fila11['imagen']."'/>
<b class='fecha'>".($fila11['fecha'])."</b><br>";
// echo"<div class='codigo'>soy el post:";
// echo"<br><br>idpost=$codigo_post<br>";
// echo"</div>";
// 10- Contenido dentro del while select * from post
echo"<br><div class='contenido'>Contenido:<br>";
echo"<p >".htmlspecialchars($fila11['contenido'])."</p></div>";


echo"<br><br>";
$peticion22="select  idcomentario, count(idcomentario) as cantidad
from comentario_post
where idpost= $codigo_post";

// Comentarios!!!!!!!!!!!!!!!!!!!!!!!!!
echo"<h5 class='comente_texto'>Comentarios:</h5>";
echo'<img class="comente_post" src="imagenes/comente.jpg" alt="no estoy en la direccion correcta">';
echo "<br>";
$resul22=mysqli_query($conexion,$peticion22);
while ($fila22=mysqli_fetch_array($resul22)) {
	echo"<h5 class='comente'>";
echo$fila22['cantidad'];
	echo"</h5>";
}

mysqli_free_result($resul22);
echo "<br><br>";
// Comentarios!!!!!!!!!!!!!!!!!!!!!!!!!


// 11- IDEtiquetas de cada post
while($fila333=mysqli_fetch_array($resul333)){

$idetiqueta20=$fila333['idetiqueta'];
// 12- Coger el idetiqueta de etiqueta_post y con eso coger * from etiqueta where idetiqueta=$
$peticion22="select * from etiqueta where idetiqueta=$idetiqueta20";
$resul22=mysqli_query($conexion,$peticion22);
@$fila22=mysqli_fetch_array($resul22);
$idetiqueta20=$fila333['idetiqueta'];
$nombre_etiqueta2=$fila22['nombre_etiqueta'];





echo '<div class="etiqueta_post"><a href="index.php?idetiqueta='.$idetiqueta20.'">';
echo'<img  src="imagenes_post/enlace_post.jpg" alt="no existo">';
echo$nombre_etiqueta2;
echo"</a></div>";


}

mysqli_free_result($resul333);





// 13- Enlace dentro del while selec * from post para elegir el post full .php con get


echo '<br>
<a href="post_full.php?idpost='.$codigo_post.'">
Leer mas</a><br><hr/>';
 



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
	$num_reg=2;
@$pagina=$_GET['pagina'];
	// 2-
	if (!$pagina) {
		$comienzo=0;
		$pagina=1;
	}
	else{
		$comienzo=($pagina-1)*$num_reg;
	}

	
	
	// A-
	$consulta="select * from post";

	$resul2=mysqli_query($conexion,$consulta);
	$num_filas=mysqli_num_rows($resul2);
	while($fila2=mysqli_fetch_array($resul2)){
// echo"aqui muestro mis campos "
	}
	// B
	$url="index.php";

	$total_paginas=ceil($num_filas/$num_reg);
	// C-
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
	
	// total de paginas
	$num_reg;
// 1!!!!!!!paginador
$peticion11="select * from post limit $comienzo,$num_reg ";
$resul11=mysqli_query($conexion,$peticion11); 


// Empieza el while post
while($fila11=mysqli_fetch_array($resul11)){ 


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
// 6-El usuario que ha creado el post sin while
$peticion21="select * from usuario where idusuario=$idusuario20";
$resul21=mysqli_query($conexion,$peticion21);
@$fila21=mysqli_fetch_array($resul21);
$nombreusuario23=$fila21['nombre'];
$idusuario23=$fila21['idusuario'];

// 7
echo " <br><h2 class='titulo'>".htmlspecialchars($fila11['titulo'])."</h2><br>
<h3 class='descripcion'>".htmlspecialchars($fila11['descripcion'])."</h3><br>
";

// 8
echo"<div class='usuario_comentario'><h4>Usuario que ha creado el post:<h4>";
echo '<a href="index.php?idusuario='.$idusuario23.'">';
echo'<img src="imagenes_post/usuario.jpg"  alt="no existo" >';
echo$nombreusuario23;
echo"</a>";
echo"<br></div>";
// termina usuario_comentario

//9

echo"
<img class='imagen_post' src='".$fila11['imagen']."'/>
<b class='fecha'>".($fila11['fecha'])."</b><br>";
// echo"<div class='codigo'>soy el post:";
// echo"<br><br>idpost=$codigo_post<br>";
// echo"</div>";
// 10- Contenido dentro del while select * from post
echo"<br><div class='contenido'>Contenido:<br>";
echo"<p>".htmlspecialchars($fila11['contenido'])."</p></div>";


echo"<br><br>";
$peticion22="select  idcomentario, count(idcomentario) as cantidad
from comentario_post
where idpost= $codigo_post";

// Comentarios!!!!!!!!!!!!!!!!!!!!!!!!!
echo"<h5 class='comente_texto'>Comentarios:</h5>";
echo'<img class="comente_post" src="imagenes/comente.jpg" alt="no estoy en la direccion correcta">';
echo "<br>";
$resul22=mysqli_query($conexion,$peticion22);
while ($fila22=mysqli_fetch_array($resul22)) {
	echo"<h5 class='comente'>";
echo$fila22['cantidad'];
	echo"</h5>";
}
echo "<br><br>";
// Comentarios!!!!!!!!!!!!!!!!!!!!!!!!!



// 11- IDEtiquetas de cada post
while($fila333=mysqli_fetch_array($resul333)){

$idetiqueta20=$fila333['idetiqueta'];
// 12- Coger el idetiqueta de etiqueta_post y con eso coger * from etiqueta where idetiqueta=$
$peticion22="select * from etiqueta where idetiqueta=$idetiqueta20";
$resul22=mysqli_query($conexion,$peticion22);
@$fila22=mysqli_fetch_array($resul22);
$idetiqueta20=$fila333['idetiqueta'];
$nombre_etiqueta2=$fila22['nombre_etiqueta'];





echo '<div class="etiqueta_post"><a href="index.php?idetiqueta='.$idetiqueta20.'">';
echo'<img  src="imagenes_post/enlace_post.jpg" alt="no existo">';
echo$nombre_etiqueta2;
echo"</a></div>";


}





// 13- Enlace dentro del while select * from post para elegir el post full .php con get


echo '<br>
<a href="post_full.php?idpost='.$codigo_post.'">
Leer mas</a><br><hr/>';
 


// Aqui puedo mirar la memoria utilizada
// echo"<br><br>Memoria antes de liberar la variabled de peticion<br>";
// echo memory_get_usage();
// echo"bytes <br>";
// mysqli_free_result($resul22);
// echo memory_get_usage();

}

}



?>


</div>



<br>


<?php 

include 'includes/pie.php';
?>


