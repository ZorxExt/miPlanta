<?

if (isset($_POST['register'])){
    if(strlen($_POST['name']) >= 1 &&
    strlen($_POST['email']) >= 1 &&
    strlen($_POST['motivo']) >= 1 &&
    strlen($_POST['text']) >= 1){

        $con = mysqli_connect("localhost","miplanta_zorx",".Zorx2658","miplanta_data");

        $name = $_POST['name'];
        $email = $_POST['email'];
        $motivo = $_POST['motivo'];
        $text = $_POST['text'];
        
        $sql = "INSERT INTO `contacto`(`name`, `email`, `motivo`, `text` ) VALUES ('$name','$email','$motivo','$text')";
        $resultado = mysqli_query($con,$sql);
        
        if($resultado){
            echo file_get_contents("successful.html");
        }
        else
        {
            echo "Are you a genuine visitor?";
            
        }


    }

}


?>
