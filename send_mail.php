<?php
// Verifica si el formulario ha sido enviado (método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $correo = htmlspecialchars($_POST['correo']);
    $tema = htmlspecialchars($_POST['tema']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Dirección de correo a la que se enviará el mensaje
    $destinatario = "natii_moreira@hotmail.com";

    // Asunto del correo
    $asunto = "Mensaje de contacto desde tu sitio web";

    // Construir el cuerpo del mensaje
    $contenido = "Nombre: $nombre\n";
    if (!empty($telefono)) {
        $contenido .= "Teléfono: $telefono\n";
    }
    $contenido .= "Correo: $correo\n";
    if (!empty($tema)) {
        $contenido .= "Tema: $tema\n\n";
    }
    $contenido .= "Mensaje:\n$mensaje";

    // Cabeceras adicionales
    $cabeceras = "From: $nombre <$correo>\r\n";
    $cabeceras .= "Reply-To: $correo\r\n";

    // Enviar el correo electrónico
    if (mail($destinatario, $asunto, $contenido, $cabeceras)) {
        // Redirigir a una página de agradecimiento si se envía correctamente
        header('Location: gracias.html');
        exit;
    } else {
        // Mostrar un mensaje de error si hay un problema con el envío del correo
        echo "Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
}
?>

