<?php

    require_once(__DIR__.'/../vendor/autoload.php');

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
        $mail->oauthUserEmail = 'comunidad.clabki@gmail.com';
        $mail->oauthClientId = '427033392573-2taqpl1iplld5avora6mqda775ipe18v.apps.googleusercontent.com';
        $mail->oauthClientSecret = 'xCVpPVwjVjvn0AFmMUc1Vz17';
        $mail->oauthRefreshToken = '1/MZls6Ee2g_oTR1cnHCWpILrLf1muvmU51xZdR9LDFQM';

        $mail->setFrom('comunidad.clabki@gmail.com', 'Clabki');
        $mail->addAddress( $mail_address );

        $mail->isHTML( true );
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Información sobre el dispositivo del collar';
        $mail->Body = file_get_contents('../public/mail/device_info_mail.html');
        $mail->addAttachment('../public/mail/dispositivo_clabki.pdf');

        $mail->send();
    }
?>
