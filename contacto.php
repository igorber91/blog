<?php 
include 'includes/cabecera.php';
?>



<div class="contacto">
	

<form action="contacto_submit" method="POST" accept-charset="utf-8">
	
<label>NOMBRE</label><br>
<input type="text" name="nombre"  placeholder="escribe tu nombre">
<br><br><br>
<label>EMAIL</label><br>
<input type="text" name="email"  placeholder="escribe tu email">
<br><br><br>
<label>ASUNTO</label><br>
<input type="text" name="asunto"  placeholder="escribe el asunto del que quieres escribir">
<br><br><br>
<label>MENSAJE</label><br>
<textarea name="menasje" placeholder="escribe tu mensaje aqui" cols="50" rows="10"></textarea>

<br><br><br>




<INPUT TYPE="submit" VALUE="Enviar consulta"> 
</FORM>



</div>