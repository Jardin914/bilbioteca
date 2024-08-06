<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $allowedTypes = array('pdf', 'doc', 'docx');
    $fileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (in_array($fileType, $allowedTypes)) {
        $fileName = basename($_FILES['file']['name']);
        $category = $_POST['category'];
        $uploadDir = $category . '/';
        
        // Crear directorio si no existe
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filePath = $uploadDir . $fileName;

        // Mueve el archivo al directorio de subida
        if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $csvFile = 'documents.csv';

            // Guarda los detalles en el archivo CSV
            $file = fopen($csvFile, 'a');
            fputcsv($file, array($category, $fileName, $title, $description));
            fclose($file);
            
           $message="El archivo se ha subido y la información se ha guardado correctamente.";
           $tipo="success";
        } else {
            $message="Hubo un error al subir el archivo.";
             $tipo="danger";
        }
    } else {
       $message="Solo se permiten archivos PDF y Word.";
        $tipo="danger";
    }
} else {
    $message="Método no permitido.";
     $tipo="danger";
}
echo "<script type1text/javascript'>
 	    	 window.location = 'formulario.php?message=".$message."&tipo=".$tipo."';
			 </script>"; exit; 
?>
