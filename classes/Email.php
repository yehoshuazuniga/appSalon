<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;


class Email
{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        // crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '0f9235b40649d6';
        $mail->Password = '129f0e235aa27f';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
        $mail->Subject = 'Confirma tu cuenta';
        //set html
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . ucfirst($this->nombre) . ' </strong> Has creado tu cuneta en App Salon, solo debes confrimar precionando el siguiente enlace </p>';
        // $contenido .= "<p> Preciona aquí: <a href='https://polar-woodland-79977.herokuapp.com/confirmar-cuenta?token=$this->token'> Confirmar cuenta</a>";
        $contenido .= "<p> Preciona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'> Confirmar cuenta</a>";
        $contenido .= '<p>Si tu no solicitaste esta cuenta , ignora el mensaje</p>';
        $contenido .= '<html>';

        $mail->Body = $contenido;

        //ENVIAR MAIL
        $mail->send();
    }

    public function enviarInstrucciones()
    {
        // crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '0f9235b40649d6';
        $mail->Password = '129f0e235aa27f';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
        $mail->Subject = 'Restablece tu password';
        //set html
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . ucfirst($this->nombre) . ' </strong> Has solicitado restablecer tu password</p>';
        $contenido .= "<p> Preciona aquí: <a href='http://localhost:3000/recuperar?token=$this->token'> Recuperar password</a>";
        $contenido .= '<p>Si tu no solicitaste esta cuenta , ignora el mensaje</p>';
        $contenido .= '<html>';

        $mail->Body = $contenido;

        //ENVIAR MAIL
        $mail->send();
    }
}
