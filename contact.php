<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $baseDir = __DIR__;
    $rootDir = realpath($baseDir . '/..');
    $uploadDir = $rootDir . "/archivos/";

    $uploadedFile = $_FILES["pdfFile"]["tmp_name"];
    $fileName = $_FILES["pdfFile"]["name"];
    $targetPath = $uploadDir . $fileName;

    if (move_uploaded_file($uploadedFile, $targetPath)) {
        echo "El archivo se ha subido exitosamente.";
    } else {
        echo "Error al subir el archivo.";
    }
}
?>
