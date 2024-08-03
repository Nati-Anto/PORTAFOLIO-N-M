<?php
// Verifica si el formulario ha sido enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $tema = $_POST['tema'];
    $mensaje = $_POST['mensaje'];

    // Dirección de correo a la que se enviará el mensaje
    $destinatario = "natii_moreira@hotmail.com";

    // Asunto del correo
    $asunto = "Mensaje de contacto desde tu sitio web";

    // Construir el cuerpo del mensaje
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Teléfono: $telefono\n";
    $contenido .= "Correo: $correo\n";
    $contenido .= "Tema: $tema\n\n";
    $contenido .= "Mensaje:\n$mensaje";

    // Cabeceras adicionales
    $cabeceras = "From: $nombre <$correo>";

    // Enviar el correo electrónico
   
    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        // Redirigir a una página de agradecimiento si se envía correctamente
        header('Location: gracias.html');
        exit;
    } else {
        // Mostrar un mensaje de error si hay un problema con el envío del correo
        die("Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.");
    }
    
}
?>
