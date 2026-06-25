<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class CorreoModel {
    /**
     * Envía un correo electrónico con archivos adjuntos.
     *
     * @param string $correo
     * @param string $asunto
     * @param string $mensaje
     * @param array|null $adjunto
     * @return bool|string
     */
    public function sendEmail(string $correo, string $asunto, string $mensaje, ?array $adjunto = null) {
        $mail = null;
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'jugohugohubo123@gmail.com';
            $mail->Password = 'oivaotddprlidczq';

            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            
            // Esto soluciona el problema de certificados SSL en Laragon local
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->setFrom('jugohugohubo123@gmail.com', 'Elvis');
            $mail->addAddress($correo);
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            
            // Cuerpo del mensaje dinámico y bien formateado
            $mail->Body = "<div style='font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden;'>"
                        . "  <div style='background-color: #0f2027; background: linear-gradient(135deg, #0f2027, #203a43); color: #ffffff; padding: 20px; text-align: center;'>"
                        . "    <h2 style='margin: 0; font-size: 20px; font-weight: 600;'>Nuevo Correo Recibido</h2>"
                        . "  </div>"
                        . "  <div style='padding: 20px;'>"
                        . "    <p><strong>Asunto:</strong> " . htmlspecialchars($asunto) . "</p>"
                        . "    <hr style='border: 0; border-top: 1px solid #eeeeee; margin: 15px 0;'>"
                        . "    <p><strong>Mensaje:</strong></p>"
                        . "    <div style='background-color: #f9f9f9; border-left: 4px solid #4facfe; padding: 15px; margin: 10px 0; white-space: pre-wrap;'>"
                        . "      " . htmlspecialchars($mensaje) . ""
                        . "    </div>"
                        . "  </div>"
                        . "  <div style='background-color: #f1f1f1; padding: 10px; text-align: center; font-size: 12px; color: #777777;'>"
                        . "    Enviado localmente desde Laragon local con PHPMailer"
                        . "  </div>"
                        . "</div>";

            // Adjuntar archivo si se ha subido correctamente
            if (isset($adjunto) && $adjunto['error'] === UPLOAD_ERR_OK) {
                $mail->addAttachment($adjunto['tmp_name'], $adjunto['name']);
            }

            return $mail->send();

    }catch (\Throwable $th) {
            return ($mail ? $mail->ErrorInfo : 'Error de inicialización') . " | " . $th->getMessage();
        }
    }
}