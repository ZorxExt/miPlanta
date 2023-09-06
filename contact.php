<?php
    $baseDir = __DIR__;
    $rootDir = realpath($baseDir . "/..");
    $uploadDir = $rootDir . "/archivos/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la base de datos
    $servername = "localhost";
    $username = "miplanta_zorx";
    $password = ".Zorx2658";
    $dbname = "miplanta_data";

    

    // Crear una conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Recopilar los datos del formulario
    $nombre = $_POST["nombre"];
    $dni = $_POST["dni"];
    $nacimiento = $_POST["nacimiento"];
    $edad = $_POST["edad"];
    $provincia = $_POST["provincia"];
    $localidad = $_POST["localidad"];
    $domicilio = $_POST["domicilio"];
    $vinculacion = $_POST["vinculacion"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $obra_social = $_POST["obra-social"];
    $renovacion = $_POST["renovacion"];
    $patologia = $_POST["patologia"];
    $desde_cuando = $_POST["desde-cuando"];
    $tratamiento = $_POST["tratamiento"];
    $enfermedades_cardiacas = $_POST["enfermedades-cardiacas"];
    $antecedentes_enfermedades = $_POST["antecedentes-enfermedades"];
    $ocupacion = $_POST["ocupacion"];
    $maquinaria_precision = $_POST["maquinaria-precision"];
    $alergias = $_POST["alergias"];
    $embarazo_lactancia = $_POST["embarazo-lactancia"];
    $tratamiento_psicologico = $_POST["tratamiento-psicologico"];
    $nombre_tutor = $_POST["nombre-tutor"];
    $vinculo_tutor = $_POST["vinculo-tutor"];
    $dni_tutor = $_POST["dni-tutor"];
    $nacimiento_tutor = $_POST["nacimiento-tutor"];
    $provincia_tutor = $_POST["provincia-tutor"];
    $localidad_tutor = $_POST["localidad-tutor"];
    $domicilio_tutor = $_POST["domicilio-tutor"];
    $celular_tutor = $_POST["celular-tutor"];
    $email_tutor = $_POST["email-tutor"];
    $obra_social_tutor = $_POST["obra-social-tutor"];

    // Consulta SQL para insertar los datos en la tabla correspondiente
    $sql = "INSERT INTO formulario (
        nombre, dni, nacimiento, edad, provincia, localidad, domicilio, vinculacion, email, celular, obra_social, renovacion, 
        patologia, desde_cuando, tratamiento, enfermedades_cardiacas, antecedentes_enfermedades, ocupacion, maquinaria_precision, alergias, 
        embarazo_lactancia, tratamiento_psicologico, nombre_tutor, vinculo_tutor, dni_tutor, nacimiento_tutor, provincia_tutor, localidad_tutor, domicilio_tutor, celular_tutor, email_tutor, obra_social_tutor
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la consulta SQL
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular los parámetros y sus valores
        $stmt->bind_param("ssssssssssssssssssssssssssssssss",
            $nombre, $dni, $nacimiento, $edad, $provincia, $localidad, $domicilio, $vinculacion, $email, $celular, $obra_social, $renovacion,
            $patologia, $desde_cuando, $tratamiento, $enfermedades_cardiacas, $antecedentes_enfermedades, $ocupacion, $maquinaria_precision, $alergias,
            $embarazo_lactancia, $tratamiento_psicologico, $nombre_tutor, $vinculo_tutor, $dni_tutor, $nacimiento_tutor, $provincia_tutor, $localidad_tutor, $domicilio_tutor, $celular_tutor, $email_tutor, $obra_social_tutor);

        // Ejecutar la consulta SQL
        if ($stmt->execute()) {
            
            if(!file_exists($uploadDir . $nombre)){
                mkdir($uploadDir . $nombre);
            }

            $firma = pathinfo($_FILES["firma"]["name"]);
            $fileRenova = pathinfo($_FILES["file-renova"]["name"]);
            $recibo = pathinfo($_FILES["recibo"]["name"]);

            move_uploaded_file($_FILES["firma"]["tmp_name"], $uploadDir . $nombre . "/Firma." . $firma["extension"]);
            
            if(file_exists($_FILES["file-renova"]["tmp_name"])){
                move_uploaded_file($_FILES["firma"]["tmp_name"], $uploadDir . $nombre . "/DDJJ PREVIA." . $fileRenova["extension"]);
            }

            move_uploaded_file($_FILES["recibo"]["tmp_name"], $uploadDir . $nombre . "/Recibo." . $recibo["extension"]);

            header("Location:contact-successful.html");


        } else {
            echo "Error al insertar datos:" . $stmt->error;
        }

        // Cerrar la declaración preparada
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
