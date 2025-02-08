<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';
require 'settings.php';

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = $host;
    $mail->SMTPAuth = true;
    $mail->Username = $username;
    $mail->Password = $hostPassword;
    $mail->SMTPSecure = $encryption; // Use TLS encryption
    $mail->Port = $port; // Use port 587 for TLS

    // Enable verbose debug output
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Debugoutput = function($str, $level) {
        file_put_contents('phpmailer_debug.log', gmdate('Y-m-d H:i:s')."\t". $str . "\n", FILE_APPEND);
    };

    // Test connection
    if (!$mail->smtpConnect()) {
        throw new Exception('SMTP connection failed: ' . $mail->ErrorInfo);
    }
} catch (Exception $e) {
    echo 'Ocorreu um erro ao configurar o PHPMailer: ', $e->getMessage();
}
?>