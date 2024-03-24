<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar datos del formulario
    $nombre = $_POST["nombre2"];
    $email = $_POST["email2"];
    $comentario = $_POST["comentario"];
    
    // Configurar los datos del correo electrónico
    $destinatario = "carolinainesdelgado@gmail.com"; // Cambia esto por tu dirección de correo
    $asunto = "Nuevo CV recibido para ODIN CONSTRUCCIONES";

    // Archivo adjunto
    $archivo_temporal = $_FILES["archivo"]["tmp_name"];
    $archivo_nombre = $_FILES["archivo"]["name"];
    $archivo_tipo = $_FILES["archivo"]["type"];
    $archivo_tamaño = $_FILES["archivo"]["size"];

    // Verificar si se cargó un archivo
    if (is_uploaded_file($archivo_temporal)) {
        // Leer el contenido del archivo
        $contenido_archivo = file_get_contents($archivo_temporal);
        // Codificar el contenido para que se envíe correctamente por correo
        $contenido_archivo_codificado = chunk_split(base64_encode($contenido_archivo));

        // Encabezados para el correo electrónico
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";
        $headers .= "From: $email\r\n";

        // Cuerpo del mensaje
        $mensaje = "--boundary\r\n";
        $mensaje .= "Content-Type: text/plain; charset=\"UTF-8\"\r\n";
        $mensaje .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $mensaje .= "Se ha recibido un nuevo CV:\r\n\r\n";
        $mensaje .= "Nombre: $nombre\r\n";
        $mensaje .= "Email: $email\r\n";
        $mensaje .= "Comentario: $comentario\r\n\r\n";
        $mensaje .= "--boundary\r\n";
        $mensaje .= "Content-Type: $archivo_tipo; name=\"$archivo_nombre\"\r\n";
        $mensaje .= "Content-Transfer-Encoding: base64\r\n";
        $mensaje .= "Content-Disposition: attachment; filename=\"$archivo_nombre\"\r\n\r\n";
        $mensaje .= $contenido_archivo_codificado . "\r\n";
        $mensaje .= "--boundary--";

        // Enviar el correo electrónico
        if (mail($destinatario, $asunto, $mensaje, $headers)) {
            echo "El CV se ha enviado correctamente.";
        } else {
            echo "Error al enviar el CV.";
        }
    } else {
        echo "No se ha adjuntado ningún archivo.";
    }
} else {
    echo "Acceso denegado.";
}

mail($destinatario, $asunto, $mensaje, $headers);
header('Location:mensaje-de-envio.html')

?>
