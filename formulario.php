<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Material</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 <?php include('barra.php'); ?>
    <div class="container">
        
     
      
       <header class="text-center my-4">
            <h1>Administrador de Material</h1>
            <?php
                 if(!empty($_GET['message'])) { 
                echo "<div class='alert alert-".$_GET['tipo']."' role='alert'>";
                echo '<b> '.$_GET['message'].'</b>';
                echo "</div>";
            } 
                 ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Seleccionar archivo (PDF o Word):</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="title">Título del Documento:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Breve Reseña:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="category">Categoría:</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="biblioteca-docente">Biblioteca Docente</option>
                    <option value="material-pedagogico">Material Pedagógico</option>
                    <option value="multimedia">Multimedia</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Subir Documento</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
