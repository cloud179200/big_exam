<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';

function sendMail($targetEmail, $content)
{
    try{
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Host       = "smtp.gmail.com";
        $mail->Username   = "cloud179200@gmail.com";
        $mail->Password   = "Vietanh2000";
    
        $mail->IsHTML(true);
        $mail->AddAddress($targetEmail, "recipient-name");
        $mail->SetFrom("cloud179200@gmail.com", "Exam Web" );
        $mail->AddReplyTo("cloud179200@gmail.com", "Exam Web");
        $mail->AddCC($targetEmail, $targetEmail);
        $mail->Subject = "Verify Mail";
        $mail->MsgHTML("<p>$content</p>"); 
        $mail->Send();
    }
    catch (Exception $e){
        echo $e;
    }
    
}
?>
