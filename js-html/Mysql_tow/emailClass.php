<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name = $_POST['name'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$City = $_POST['city'];
$country = $_POST['country'];
$product_type = $_POST['product_type'];
$quantity = $_POST['quantity'];
$message = $_POST['message'];
$url_data = $_POST['url'];





use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';




$result="";
$body = '';
$fromName = 'Jenendar';
$fromEmail = 'info.lllogicloop@gmail.com';

$mail = new PHPMailer(true);;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 3;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';     // NOTE: for gmail smtp is-> smtp.gmail.com
//  $mail->Host = 'smtp.gmail.com'; 

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
// $mail->Username = "info.firstresponsehealthcare@gmail.com";
$mail->Username = "jenendar.logicloop@gmail.com";
// $mail->Username = "enquiry.firstresponse@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "Logicloop@123";
// $mail->Password = "frh@3214";

//Set who the message is to be sent from
$mail->setFrom($fromEmail, $fromName);
$mail->addAddress('jenendar.logicloop@gmail.com');

$mail->IsHTML(true);

$body .= '<html>';
$body .= '<body style="font-size: 13px; font-family: Verdana;">';
// $body .= '<h3 style="color:#973393;"> Greetings from Evolute, </h3>';
// $body .= '<p> Thank You For Your Information !</p>';
//  $body .= '<br/>';
//  $body .= '<p> We Will Get Back To You At The Earliest ! </p>';




$body .= '<table style="font-size: 13px; font-family: Verdana;">';
$body .= '<tr><td>Name:</td><td>' . $name . '</td></tr>';
$body .= '<tr><td>Email:</td><td>' . $email . '</td></tr>';
$body .= '<tr><td>Mobile:</td><td>' . $phoneno . '</td></tr>';
$body .= '<tr><td>City:</td><td>' . $City . '</td></tr>';

$body .= '<tr><td>country:</td><td>' . $country . '</td></tr>';

$body .= '<tr><td>product_type:</td><td>' . $product_type . '</td></tr>';

$body .= '<tr><td>quantity:</td><td>' . $quantity . '</td></tr>';
$body .= '<tr><td>message:</td><td>' . $message . '</td></tr>';

$body .= '<tr><td>url</td><td>' . $url_data . '</td></tr>';



// $body .= '<tr><td>Comment:</td><td>' . $comment . '</td></tr>';
// $body .= '<tr><td>Time:</td><td>' . $time . '</td></tr>';
// $body .= '<tr><td>Source:</td><td>' . $source . '</td></tr>';
// $body .= $leadDetails;
$body .= '</table>';
$body .= '<br><br>';
$body .= 'Regards';
$body .= '<br><br>';
$body .= $fromName;
$body .= '<br><br>';
$body .= '</body>';
$body .= '</html>';


$mail->Body = $body;


               


if(!$mail->send()){
    $result="something wrong";
    echo "Mailer Error: " . $mail->ErrorInfo;

}else{
  $result = "Done";
}


?>


  
