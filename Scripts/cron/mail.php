<?php

error_reporting(E_STRICT | E_ALL);

date_default_timezone_set('America/Mexico_City');

require 'Mail/PHPMailerAutoload.php';

$mail = new PHPMailer;

$body_head = file_get_contents('contents_h.html',FILE_USE_INCLUDE_PATH);
$body_foot = file_get_contents('contents_f.html',FILE_USE_INCLUDE_PATH);

$mail->isSMTP();
$mail->Host = '45.55.94.207';
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
$mail->Port = 25;
$mail->Username = 'admin@sindral.net';
$mail->Password = 'Xvja8aY3';
$mail->setFrom('admin@sindral.net', 'Servi Notification');
$mail->addReplyTo('admin@sindral.net', 'Servi Notification');

$mail->Subject = "Notificacion de Servi";

//Same body for all messages, so set this before the sending loop
//If you generate a different body for each recipient (e.g. you're using a templating system),
//set it inside the loop
//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

//Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database
$mysql = mysqli_connect('45.55.94.207', 'servi', '3ca6a5f8');
mysqli_select_db($mysql, 'servi');
$result = mysqli_query($mysql, 'SELECT correo,msg FROM notify WHERE enviado = false');

foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
    $mail->addAddress($row['correo'], $row['correo']);
    $mail->msgHTML($body_head."<h3>".$row["msg"]."</h3>".$body_foot);
    if (!$mail->send()) {
        echo "Mailer Error (" . str_replace("@", "&#64;", $row["correo"]) . ') ' . $mail->ErrorInfo . '<br />';
        break; //Abandon sending
    } else {
        echo date("Y-m-d H:i:s").' - Message sent to: ' . $row['correo'] ." - MSG: ".$row["msg"]. PHP_EOL;
        //Mark it as sent in the DB
        mysqli_query(
            $mysql,
            "UPDATE notify SET enviado = true WHERE correo = '" .
            mysqli_real_escape_string($mysql, $row['correo']) . "'"
        );
    }
    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
}