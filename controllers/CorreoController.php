<?php

require_once 'models/CorreoModel.php';

class CorreoController {

    public function index() {
        require_once 'views/correo/index.php';
    }

    public function sendMail() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = $_POST['correo'];
            $asunto = $_POST['asunto'];
            $mensaje = $_POST['mensaje'];
            $adjunto = $_FILES['adjunto'] ?? null;

            $model = new CorreoModel();
            $response = $model->sendEmail($correo, $asunto, $mensaje, $adjunto);

            if ($response === true) {
                $status = 'success';
                $mensajeEstado = "El correo se ha enviado correctamente a $correo.";
            } else {
                $status = 'error';
                $mensajeEstado = "Hubo un error al enviar: " . $response;
            }
            
            // Cargar la vista de respuesta
            require_once 'views/correo/respuesta.php';
        }
    }
}
?>