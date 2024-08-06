<?php
session_start();
session_destroy();
echo "<script type1text/javascript'>
 	    	 window.location = 'index.php?message=Ha salido correctamente del sistema&tipo=danger';
			 </script>"; exit; 
?>