<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



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
require '../vendor/autoload.php';


function sendMail(){


    $name = $_POST['name'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$City = $_POST['city'];
$country = $_POST['country'];
$product_type = $_POST['product_type'];
$quantity = $_POST['quantity'];
$message = $_POST['message'];
$url_data = $_POST['url'];


//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

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
$email = 'jenendar.logicloop@gmail.com';
$clientId = '13243608550-lcdq5jt9t4k0tb7asfqhhe0plckja9rk.apps.googleusercontent.com';
$clientSecret = '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';

//Obtained by configuring and running get_oauth_token.php
//after setting up an app in Google Developer Console.
$refreshToken = '1//04UrKTOHyIUgKCgYIARAAGAQSNwF-L9IrPVRarfljPc1pyrEA1U28C-dxJj-zJqnoOoewWxPriOgzhFPMRu4kfqrSqV5wyRgg_uI';

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
$mail->setFrom($email, 'First Last');

//Set who the message is to be sent to
$mail->addAddress('jenendar.logicloop@gmail.com', 'John Doe');

//Set the subject line
$mail->Subject = 'PHPMailer GMail XOAUTH2 SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->CharSet = PHPMailer::CHARSET_UTF8;
// $mail->msgHTML(file_get_contents('contentsutf8.html'), __DIR__);
$mail->IsHTML(true);


//Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';
$body ='';
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
$body .= '<br><br>';
$body .= '</body>';
$body .= '</html>';


$mail->Body = $body;


//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}

}

?>


<!-- https://developers.google.com/oauthplayground/ -->

<!-- https://console.cloud.google.com/apis/ -->