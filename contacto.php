<?php

//llamados a los campos
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

//Datos para el correo 

$destinatario = "carolinainesdelgado@gmail.com";
$asunto = "Contacto de la WEB ODIN CONTRUCCIONES";

$carta = "De: $nombre \n";
$carta .= "Telefono: $telefono \n";
$carta .= "Email: $email \n";
$carta .= "Mensaje: $mensaje";

//ENVIANDO MENSAJE

mail($destinatario, $asunto, $carta);
header('Location:mensaje-de-envio.html')

?>
