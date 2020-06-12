<?php

    require('Email/PHPMailerAutoload.php');

    class Email
    {
        static public function send($from,$subject,$message,$to)
        {
            $mail = new PHPMailer();
            $mail->IsSmtp();
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Host = 'smtp.gmail.com';
            $mail ->Port = 465;
            $mail ->IsHTML(true);
            $mail ->Username = "17bmiit048@gmail.com";
            $mail ->Password = "dharmil007";
            $mail ->SetFrom($from);            
            $mail ->Subject = $subject;
            $mail ->Body = $message;
            $mail ->AddAddress($to);
            if(!$mail->Send())
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }
?>