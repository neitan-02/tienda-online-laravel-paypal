<?php
use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;//SMTP::DEBUG_OFF;
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hernandezmorenonathan09@gmail.com';                     //SMTP username
    $mail->Password   = 'kgbhaakfxosqkacd';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('al222210794@gmail.com', 'Tienda cdp');
    $mail->addAddress('hernandezmorenonathan09@gmail.com', 'Neitan');    

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Detalles de su compra';

    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo .= '<p>El ID de su compra es <b>'. $id_transaccion . '</b></p>';

    $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');


    $mail->CharSet = 'UTF-8';
    $mail->Body    = $cuerpo;
    $mail->AltBody = 'Le enviamos los detalles de su compra';

    $mail->send();
} catch (Exception $e) {
    echo "Error al enviar el correo electronico no de la compra: {$mail->ErrorInfo}";
    //exit;
}