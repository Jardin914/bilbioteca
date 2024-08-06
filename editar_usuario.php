<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die("Usuario no encontrado.");
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];

    $sql = "UPDATE usuarios SET nombre = ?, email = ?, rol = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nombre, $email, $rol, $id);
 if ($stmt->execute()) {
        $message="Usuario editado correctamente.";
        $tipo='success';
    } else {
        $message="Error: " . $stmt->error;
        $tipo='danger';
    }

    $stmt->close();
    $conn->close();

 echo "<script type1text/javascript'>
 	    	 window.location = 'usuarios.php?message=".$message."&tipo=".$tipo."';
			 </script>"; 
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
session_start();
include("barra.php");
?>
    
    <div class="container">
        <header class="text-center my-4">
            <h1>Editar Usuario</h1>
        </header>
        <form action="editar_usuario.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $user['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select name="rol" id="rol" class="form-control" required>
                    <option value="admin" <?php if ($user['rol'] == 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="usuario" <?php if ($user['rol'] == 'usuario') echo 'selected'; ?>>Usuario</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>  <button type="button" onclick='javascript:window.location.href(list)'class="btn btn-primary">Eliminar Usuario</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
