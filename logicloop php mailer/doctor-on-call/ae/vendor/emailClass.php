<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
//Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

//Load dependencies from composer
//If this causes an error, run 'composer install'
require './vendor/autoload.php';


function sendMail(){


    $name = $_POST['fname'];
$emailid = $_POST['email'];
$mobile = $_POST['mobile'];
$comment = $_POST['comment'];
$websiteurl = $_POST['url'];
$formname = $_POST['formname'];
$utm_source  = $_POST['utm_source'];
$utm_medium  = $_POST['utm_medium'];
$utm_campaign  = $_POST['utm_campaign'];


// $country = $_POST['country'];
// $product_type = $_POST['product_type'];
// $quantity = $_POST['quantity'];
// $message = $_POST['message'];


//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->SMTPDebug = 0;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number:
// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
// - 587 for SMTP+STARTTLS
$mail->Port = 465;

//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Set AuthType to use XOAUTH2
$mail->AuthType = 'XOAUTH2';

//Start Option 1: Use league/oauth2-client as OAuth2 token provider
//Fill in authentication details here
//Either the gmail account owner, or the user that gave consent
$email = 'info.lllogicloop@gmail.com';
$clientId = '227875720370-69p7fcdu2cgpd5gj8doogv9ea2d6tdpe.apps.googleusercontent.com';
$clientSecret = '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';

//Obtained by configuring and running get_oauth_token.php
//after setting up an app in Google Developer Console.
$refreshToken = '1//04KI4DA-vkBRZCgYIARAAGAQSNwF-L9IrA_fuNTTfIxEBIIr--aKmaYTU7bx9aJnJhgQV9i-8wepIMLiaheMRig8F7Nym-tousvU';

//Create a new OAuth2 provider instance
$provider = new Google(
    [
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
    ]
);

//Pass the OAuth provider instance to PHPMailer
$mail->setOAuth(
    new OAuth(
        [
            'provider' => $provider,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'userName' => $email,
        ]
    )
);
//End Option 1

//Option 2: Another OAuth library as OAuth2 token provider
//Set up the other oauth library as per its documentation
//Then create the wrapper class that implementations OAuthTokenProvider
// $oauthTokenProvider = new MyOAuthTokenProvider(/* Email, ClientId, ClientSecret, etc. */);

// //Pass the implementation of OAuthTokenProvider to PHPMailer
// $mail->setOAuth($oauthTokenProvider);
// //End Option 2

//Set who the message is to be sent from
//For gmail, this generally needs to be the same as the user you logged in as
$mail->setFrom($email, 'First Response Landing page form');

//Set who the message is to be sent to
$mail->addAddress('healthdesk@firstresponse.ae', 'First  Response');
$mail->AddCC('kavita@logicloop.io');
$mail->AddCC('jenendar.logicloop@gmail.com');
//Set the subject line
$mail->Subject = 'Doctor on Call Form';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->CharSet = PHPMailer::CHARSET_UTF8;
// $mail->msgHTML(file_get_contents('contentsutf8.html'), __DIR__);
$mail->IsHTML(true);

//Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';
$body ='';
$body = '';
$body .= '<html>';
$body .= '<body style="font-size: 13px; font-family: Verdana;">';
$body .= '<table style="font-size: 13px; font-family: Verdana;">';
$body .= '<tr><td>Name:</td><td>' . $name . '</td></tr>';
$body .= '<tr><td>Email:</td><td>' . $emailid . '</td></tr>';
$body .= '<tr><td>Mobile:</td><td>' . $mobile . '</td></tr>';
$body .= '<tr><td>Comment:</td><td>' . $comment . '</td></tr>';
$body .= '<tr><td>Comment:</td><td>' . $websiteurl . '</td></tr>';

$body .= '<tr><td>Source:</td><td>' . $utm_source . '</td></tr>';
$body .= '<tr><td>medium:</td><td>' . $utm_medium . '</td></tr>';

$body .= '<tr><td>campaign:</td><td>' . $utm_campaign . '</td></tr>';
$body .= '<tr><td>campaign:</td><td>' . $formname . '</td></tr>';


$body .= '</table>';
$body .= '<br><br>';
$body .= 'Regards';
$body .= '<br><br>';
$body .= '<br><br>';
$body .= '</body>';
$body .= '</html>';
$params['messageBody'] = $body;

$mail->Body = $body;


//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    // echo 'Message sent!';
}

}

?>


<!-- https://developers.google.com/oauthplayground/ -->

<!-- https://console.cloud.google.com/apis/ -->