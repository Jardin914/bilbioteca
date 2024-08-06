<?php
if (isset($_GET['category']) && isset($_GET['fileName']) && isset($_GET['title']) && isset($_GET['description'])) {

    $category = $_GET['category'];
    $fileName = $_GET['fileName'];
    $title = $_GET['title'];
    $description = $_GET['description'];

    $file = 'documents.csv';
    $tempFile = 'temp.csv';
    $input = fopen($file, 'r');
    if ($input === false) {
        header('Location: index.php?message=Error al abrir el archivo original');
        exit();
    }
    $output = fopen($tempFile, 'w');
    if ($output === false) {
        fclose($input);
        header('Location: index.php?message=Error al crear el archivo temporal');
        exit();
    }

    while (($data = fgetcsv($input, 1000, ",")) !== FALSE) {

        if (base64_encode($data[0]) === $category && 
            base64_encode($data[1]) === $fileName && 
             base64_encode($data[2]) === $title && 
             base64_encode($data[3])=== $description) {
            // No escribir la línea que coincide
        } else {
            fputcsv($output, $data);
        }
    }

    fclose($input);
    fclose($output);

    // Reemplazar el archivo original con el archivo temporal
    if (file_exists($tempFile)) {
        rename($tempFile, $file);
    }

    header('Location: '.base64_decode($category).'.php?message=Documento eliminado con éxito&tipo=success');
    exit();
} else {
    header('Location:'.base64_decode($category).'.php?message=Error al eliminar el documento&tipo=danger');
    exit();
}
?>
