<?php

    require_once(__DIR__.'/../../vendor/autoload.php');

    function sendDeviceInfoMail( $mail_address ) {

        $mail = new PHPMailerOAuth;

        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->AuthType = 'XOAUTH2';
        $mail->oauthUserEmail = 'miguel9ramos@gmail.com';
        $mail->oauthClientId = '743771286329-r2qv1cemc4siplgft7iqgab47f5tm0ar.apps.googleusercontent.com';
        $mail->oauthClientSecret = '1catvnLYtM4WgFBf6rAbe7Vy';
        $mail->oauthRefreshToken = '1/iJyk2ApS2GhK0I5DbV1G-xvjFC9eP0eIZ22Sq4WqTQfMQ9t-xqijTtZJ2U5eHcyZ';

        $mail->setFrom('miguel9ramos@gmail.com', 'Miguel Ramos');
        $mail->addAddress( $mail_address );

        $mail->isHTML( true );
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Información sobre el dispositivo del collar';
        $mail->Body = file_get_contents('../public/mail/device_info_mail.html');
        $mail->addAttachment('../public/mail/device_info_mail.pdf');

        $mail->send();
    }
?>
