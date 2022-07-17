<?php

namespace App\Library\Email;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function send()
    {
        //crear una isntancia de PHPmailer
        $mail = new PHPMailer();
        //CONFIGURADOR DEL SERVIDOR
        $mail->isSMTP();
        $mail->Host = "ideasweb21.com"; //viene del servidor
        $mail->SMTPAuth = true;
        $mail->Username = "informe@ideasweb21.com";
        $mail->Password = "carlostucno21";

        // $mail->SMTPSecure = "tls";
        $mail->SMTPSecure = "ssl";
        $mail->Port  = "465";

        //desde donde se envia el correo
        $mail->setFrom('informe@ideasweb21.com', 'ideasweb21.com');
        //a quien se envia el correo
        // $mail->addAddress('carlitostucno@gmail.com', 'Carlos');
        $mail->addAddress($this->email, $this->nombre);

        //habilitar HTML
        $mail->isHTML(true);
        $mail->charset = 'UTF-8';
        $mail->Subject = 'Confirmacion de cuenta';

        //denifinir el contenido del
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong></p> has creado tu cuenta en UpTask, para confirmarla haz click en el siguiente enlace: <a href='" . base_url('/confirm-account?token=') . $this->token . "'>Confirmar cuenta</a>";
        $contenido .= ' si no has creado tu cuenta en UpTask, puedes ignorar este mensaje.';
        $contenido .= '</html>';

        $mail->Body = $contenido;
        $mail->send();
    }
}
