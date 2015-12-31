<?php

error_reporting(E_STRICT | E_ALL);

date_default_timezone_set('America/Mexico_City');

require 'Mail/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = '45.55.94.207';
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true; // SMTP connection will not close after each email sent, reduces SMTP overhead
$mail->Port = 25;
$mail->Username = 'admin@sindral.net';
$mail->Password = 'Xvja8aY3';

$mysql = mysqli_connect('45.55.94.207', 'servi', '3ca6a5f8');
mysqli_select_db($mysql, 'servi');
$result = mysqli_query($mysql, 'SELECT correo,salon,lang FROM notify WHERE enviado = false');

foreach ($result as $row) { //This iterator syntax only works in PHP 5.4+
switch ($row['lang']) {
    case "es": 
        $msg_pre = "Salon ";
        $msg_pos = " ya esta disponible";
        $mail->Subject = "Notificacion de Servi - Salon ".$row["salon"];
        $mail->setFrom('admin@sindral.net', 'Notificación de Servi');
        $mail->addReplyTo('admin@sindral.net', 'Notificación de Servi');
        $mail->AltBody = 'El Salon '.$row["salon"].' ya esta disponible ~ Servi™';
    break;
    case "en":
        $msg_pre = "Room ";
        $msg_pos = " now available";
        $mail->Subject = "Servi Notification - Room ".$row["salon"];
        $mail->setFrom('admin@sindral.net', 'Servi Notification');
        $mail->addReplyTo('admin@sindral.net', 'Servi Notification');
        $mail->AltBody = 'Room '.$row["salon"].' is now available ~ Servi™';
    break;
    case "jp":
        $msg_pre = "利用可能になりまし教室";
        $msg_pos = "";
        $mail->Subject = "通知SERVI - 教室".$row["salon"];
        $mail->setFrom('admin@sindral.net', '通知SERVI');
        $mail->addReplyTo('admin@sindral.net', '通知SERVI');
        $mail->AltBody = '教室'.$row["salon"].'が利用可能になりました ~ Servi™';
    break;
    case "it":
        $msg_pre = "Aula ";
        $msg_pos = " ora disponibile";
        $mail->Subject = "Servi di notifica - Aula ".$row["salon"];
        $mail->setFrom('admin@sindral.net', 'Servi di notifica');
        $mail->addReplyTo('admin@sindral.net', 'Servi di notifica');
        $mail->AltBody = 'Classe '.$row["salon"].' è ora disponibile ~ Servi™';
    break;
    case "fr":
        $msg_pre = "Salle de classe ";
        $msg_pos = " maintenant disponible";
        $mail->Subject = "Avis de Servi - Salle ".$row["salon"];
        $mail->setFrom('admin@sindral.net', 'Avis de Servi');
        $mail->addReplyTo('admin@sindral.net', 'Avis de Servi');
        $mail->AltBody = 'Salle de classe '.$row["salon"].' est maintenant disponible ~ Servi™';
    break;
}

    $body_head = file_get_contents('content_h/'.$row['lang'].'/contents_h.html',FILE_USE_INCLUDE_PATH);
    $body_foot = file_get_contents('content_f/'.$row['lang'].'/contents_f.html',FILE_USE_INCLUDE_PATH);
    $mail->addAddress($row['correo'], $row['correo']);
    $mail->msgHTML($body_head."<h3>".$msg_pre.$row["salon"].$msg_pos."</h3>".$body_foot);
    if (!$mail->send()) {
        echo "Mailer Error (" .  $row["correo"] . ') ' . $mail->ErrorInfo . PHP_EOL;
        break; //Abandon sending
    } else {
        echo date("Y-m-d H:i:s").' - Message sent to: ' . $row['correo'] ." - MSG: ".$msg_pre.$row["salon"].$msg_pos. PHP_EOL;
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