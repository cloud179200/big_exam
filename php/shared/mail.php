<?php

use PHPMailer\PHPMailer\PHPMailer;
include "../shared/debug_to_console.php";
function sendMail($targetEmail, $content)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "cloud179200@gmail.com";
    $mail->Password   = "Vietanh2000";

    $mail->IsHTML(true);
    $mail->AddAddress("recipient-email@domain", "recipient-name");
    $mail->SetFrom("cloud179200@gmail.com", "Việt Anh");
    $mail->AddReplyTo("cloud179200@gmail.com", "Việt Anh");
    $mail->AddCC($targetEmail, $targetEmail);
    $mail->Subject = "Verify Mail";
    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
    debug_to_console("Error while sending Email.");
    var_dump($mail);
    } else {
    debug_to_console("Email sent successfully");
    }
}
?>
