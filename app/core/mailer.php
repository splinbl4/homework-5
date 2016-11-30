<?php

class Mailer
{
    public static function send_mailer($login, $email)
    {
        require_once '/vendor/autoload.php';

        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;
        $mail->isSMTP();
        $mail->Host = 'smtp.yandex.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'byckov.mvc@yandex.ru';
        $mail->Password = 'byckov.mvc222';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('byckov.mvc@yandex.ru', 'Mailer');
        $mail->addAddress($email, $login);
        $mail->isHTML(true);
        $mail->Subject = 'Регистрация';
        $mail->Body = 'Вы успешно зарегестрировались на Сайте';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            //echo 'Message has been sent';
        }
    }
}