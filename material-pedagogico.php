<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>Material Pedagógico</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="text-center my-4">
            <h1>Material Pedagógico</h1>
            <?php
                 if(!empty($_GET['message'])) { 
                echo "<div class='alert alert-".$_GET['tipo']."' role='alert'>";
                echo '<b> '.$_GET['message'].'</b>';
                echo "</div>";
            } 
                 ?>
            <a href="https://jardin914.rf.gd/" class="btn btn-secondary mb-4">Volver a la Portada</a>
        </header>
       <ul class="list-group">
            <?php
            $csvFile = 'documents.csv';
            if (($handle = fopen($csvFile, 'r')) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                    $category = $data[0];
                    $fileName = $data[1];
                    $title = $data[2];
                    $description = $data[3];

                    // Filtrar solo los documentos de Biblioteca Docente
                    if ($category == 'material-pedagogico') {
                        echo '<li class="list-group-item">';
                        echo '<a href="' . htmlspecialchars($category) . '/' . htmlspecialchars($fileName) . '" target="_blank">' . htmlspecialchars($title) . '</a>';
                        echo '<p class="mb-0">' . htmlspecialchars($description) . '</p>';
                        echo '</li>';
                    }
                }
                fclose($handle);
            }
            ?>
        </ul>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
