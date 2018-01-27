
<?php
session_start();
session_destroy();


 echo '<script>            
setTimeout(function(){location.href="../index.php"} , 1000);          
</script>';
?>