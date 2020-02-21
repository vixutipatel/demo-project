<?php
//include_once '../../classes/MysqliDb.php';
include_once '../../includes/connection.php';
$error_message='';
$success_message='';
if(!$db)
{
     error_log("Failed to connect to database!", 0);
}
    //delete
if(isset($_POST['email']))
{
    global $db;
    $email=$_POST['email'];
    $db->where ("email", $email);
    $data = $db->getOne('users');
    if($data ==true)
    {
        $success_message = 'email found';


    }
    else
    {   
        ?>
        <script type="text/javascript">
            alert("This mail is not exist");
        </script>
        <?php
        echo "This mail ID is not exist";
        echo "<script>window.location.href='forgetpassword.php'</script>";

    }

}

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/SMTP.php';
require '../../PHPMailer-master/src/OAuth.php';
error_reporting(0);
error_reporting(~E_ALL & ~E_NOTICE);

   
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer;

try {

                $mail->isSMTP();
                //$mail->SMTPDebug = 3;
                $mail->Debugoutput = 'html';
                $mail->Host = "tls://smtp.gmail.com";
                $mail->Port = 587;
                $mail->SMTPSecure = "tls";
                $mail->SMTPAuth = true;
             //Server settings

                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->Username   = 'vixutipatel129@gmail.com';                     // SMTP username
                // SMTP password
                $mail->Password   = 'vrp@1209';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted

                //Recipients
                $mail->setFrom('vixutipatel129@gmail.com', 'Vixuti Patel');
               // $email=$_POST['email'];
                $email=$data['email'];
                $id=$data['id'];
                $otp = rand(100000, 999999);
              //  $mail->addAddress('vixutipatel129@gmail.com', 'Joe User');     // Add a recipient
                $mail->addAddress($email);               // Name is optional
   // $mail->addReplyTo('vixutipatel129@gmail.com', 'Information');
   // $mail->addCC('vixutipatel129@gmail.com');
 //  $mail->addBCC('vvixutipatel129@gmail.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //  $mail->addAttachment('C:\Users\pvixuti\Pictures\Camera Roll\first.png');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'RESET PASSWORD';
    $mail->Body    = '<b>please click on link to reset password</b><p><a href="http://localhost/OOP/admin/auth/resetpassword.php?id='.$id.'">CLICK HERE</a></p><p>One Time Password for login authentication is:
'. $otp.'</p>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    if($mail)
    {
        global $db;
        $userid=$id;
        $key =  md5(microtime(true).mt_Rand());
        $data = Array(

        'userid' => $id,
        'otp' => $otp,
        'expired' => 0,
        'created' => date("Y-m-d H:i:s"),
        'generate_key' =>$key
        //'password' => $db->func('SHA1(?)',Array ($_POST['password'] . 'salt123')),
           );
         $data = $db->insert('authentication',$data);
            ?>
             <script type="text/javascript">
            alert("please check your mail box");
              </script>
             
              
 <?php      
            header("Location:verify.php?id=$userid&&key=$key");
   
    }

} 
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
