<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

 if ($stmt->execute()) {
        $message="Usuario eliminado correctamente.";
        $tipo='success';
    } else {
        $message="Error: " . $stmt->error;
        $tipo='danger';
    }

    $stmt->close();
    $conn->close();
}
 echo "<script type1text/javascript'>
 	    	 window.location = 'usuarios.php?message=".$message."&tipo=".$tipo."';
			 </script>"; 
?>
