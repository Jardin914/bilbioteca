<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = md5($_POST['contrasena']);
    $rol = $_POST['rol'];

    $sql = "INSERT INTO usuarios (nombre, email, contrasena, rol) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nombre, $email, $contrasena, $rol);

    if ($stmt->execute()) {
        $message="Usuario agregado correctamente.";
        $tipo='success';
    } else {
        $message="Error: " . $stmt->error;
        $tipo='danger';
    }

    $stmt->close();
    $conn->close();
}
 echo "<script type1text/javascript'>
 	    	 window.location = 'form_usu.php?message=".$message."&tipo=".$tipo."';
			 </script>"; 
?>
