<?php

date_default_timezone_set('Asia/Dubai');
require 'PHPMailerAutoload.php';
include_once 'helperClass.php';

/**
 * Description of emailClass
 *
 * @author admin
 */
class EmailClass
{
//NOTE : please delete << and >> sign after replacing with actual value

    var $fromname = 'First Response Healthcare';
    var $fromemail = 'info.firstresponsehealthcare@gmail.com';
    // var $bcc = 'pooja@logicloop.io';
    var $PageUrl = 'First Response Healthcare';
    var $emailRecipients = array('appointment@firstresponse.ae', 'kavita.logicloop@gmail.com', 'mayank@logicloop.io');
    //var $emailRecipients = array('kavita.logicloop@gmail.com');

// public function defaultTo() {
//     return array('marketing@happyheap.com');
// }

    // public function defaultReplyTo() {
    //   return 'sales@gaganunnatii.com';
    // }

    public function sendMail($params)
    {
        $fromName = $this->fromname;
        $fromEmail = $this->fromemail;
        $bcc = $this->bcc;

        $toEmail = $this->emailRecipients;

        // $replyToEmail = $this->defaultReplyTo();

        //Create a new PHPMailer instance
        $mail = new PHPMailer();

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host = 'smtp.sendgrid.net';     // NOTE: for gmail smtp is-> smtp.gmail.com

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        // $mail->Username = "info.firstresponsehealthcare@gmail.com";
        $mail->Username = "admin@triplerr.com";

        //Password to use for SMTP authentication
        $mail->Password = "admin@100";

        //Set who the message is to be sent from
        $mail->setFrom($fromEmail, $fromName);

        //Set an alternative reply-to address
        // $mail->addReplyTo($replyToEmail, $fromName);

        //Set who the message is to be sent to
        foreach ($toEmail as $email) {
            $mail->addAddress($email);
        }

        $mail->addBCC($bcc);

        //Set the subject line
        $mail->Subject = $params['subject'];

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
        $mail->Body = $params['messageBody'];
        $file_to_attach = $_FILES['biodata']['tmp_name'];
        $filename = $_FILES['biodata']['name'];        

        //Set to sent content as HTML
        $mail->IsHTML(true);
        $mail->addAttachment($file_to_attach, $filename);

        //Replace the plain text body with one created manually
        //$mail->AltBody = $params['messageBody'];
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
        //echo "<pre>"; print_r($mail); echo "</pre>";die();
        //send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            echo "<br />";
            return false;
        } else {
            //echo "Message sent!";
            //header("Location: http://" . $this->defaultUrl . "/thank-you.php");
            return true;
        }
    }

    public function getLeadDetails()
    {
        $keyword = $_COOKIE['vaLead_Keyword'];
        $channel = $_COOKIE['vaLead_Channel'];
        $campaign = $_COOKIE['vaLead_Campaign'];
        $placement = $_COOKIE['vaLead_Placement'];
        $device = $_COOKIE['vaLead_Device'];
        $UtmSourceName = $_COOKIE['vaLead_UtmSourceName'];
        $UtmMediumName = $_COOKIE['vaLead_UtmMediumName'];
        $UtmCampaignName = $_COOKIE['vaLead_UtmCampaignName'];

        $lead = '';
        $lead .= '<tr><td>Keyword:</td><td>' . $keyword . '</td></tr>';
        $lead .= '<tr><td>Channel:</td><td>' . $channel . '</td></tr>';
        $lead .= '<tr><td>Campaign:</td><td>' . $campaign . '</td></tr>';
        $lead .= '<tr><td>Placement:</td><td>' . $placement . '</td></tr>';
        $lead .= '<tr><td>Device:</td><td>' . $device . '</td></tr>';
        $lead .= '<tr><td>UTM Source Name:</td><td>' . $UtmSourceName . '</td></tr>';
        $lead .= '<tr><td>UTM Medium Name:</td><td>' . $UtmMediumName . '</td></tr>';
        $lead .= '<tr><td>UTM Campaign Name:</td><td>' . $UtmCampaignName . '</td></tr>';

        return $lead;
    }

    public function callback()
    {
       // $name = $_REQUEST['name'];
        $fname = $_REQUEST['fname'];
        //$lname = $_REQUEST['lname'];
        $mobile = $_REQUEST['mobile'];
        $email = $_REQUEST['email'];
        $comment = $_REQUEST['comment'];
       // $time = $_REQUEST['time'];
        $short_descrp = $_REQUEST['short-descrp'];
        $comments = $_REQUEST['comments'];
        $position = $_REQUEST['position'];
        $compname = $_REQUEST['compname'];
        $location = $_REQUEST['location'];
        $mobile = str_replace(' ', '', $_REQUEST['mobile']);
        $source = $_REQUEST['source'];
        $name = $fname;
        $file_to_attach = $_FILES['biodata']['tmp_name'];
        $filename = $_FILES['biodata']['name'];

        $leadDetails = $this->getLeadDetails();

        $queryString2 = '&Campaign=' . urlencode($_COOKIE['vaLead_Campaign']);
        $queryString2 .= '&Channel=' . urlencode($_COOKIE['vaLead_Channel']);
        $queryString2 .= '&Keyword=' . urlencode($_COOKIE['vaLead_Keyword']);
        $queryString2 .= '&Placement=' . urlencode($_COOKIE['vaLead_Placement']);
        $queryString2 .= '&Device=' . urlencode($_COOKIE['vaLead_Device']);


        // $ProjectID = "524531139397891207";
        // $ProjectName = urlencode("Acons 54 Greens");
        // $url = "http://api.dishadirect.in/index.php?Name=" . urlencode($name) . "&Mobile=" . urlencode($mobile) . "&EmailID=" . urlencode($email) . "&projectid=$ProjectID&projectname=$ProjectName&Source=" . urlencode($source) . "&pageUrl=" . urlencode($this->PageUrl) . "&format=raw&task=reqashowing&view=detail&option=com_projects&Itemid=1$queryString2";
//         var_dump($url);
//         die();
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HEADER, 0);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $result = curl_exec($ch);
        // var_dump($result);

        if ($source === 'mainpopup') {
            //var_dump($mobile);die;
            //setcookie('popout', 'it works');
            if (EmailClass::validationCheckMobile($mobile) === true) {

                $body = '';
                $body .= '<html>';
                $body .= '<body style="font-size: 13px; font-family: Verdana;">';
               // $body .= '<h3 style="color:#973393;"> Greetings from Evolute, </h3>';
               // $body .= '<p> Thank You For Your Information !</p>';
              //  $body .= '<br/>';
              //  $body .= '<p> We Will Get Back To You At The Earliest ! </p>';
                $body .= '<table style="font-size: 13px; font-family: Verdana;">';
                $body .= '<tr><td>Name:</td><td>' . $name . '</td></tr>';
                $body .= '<tr><td>Email:</td><td>' . $email . '</td></tr>';
                $body .= '<tr><td>Mobile:</td><td>' . $mobile . '</td></tr>';
                $body .= '<tr><td>Comment:</td><td>' . $comment . '</td></tr>';
               // $body .= '<tr><td>Time:</td><td>' . $time . '</td></tr>';
                $body .= '<tr><td>Source:</td><td>' . $source . '</td></tr>';
                $body .= $leadDetails;
                $body .= '</table>';
                $body .= '<br><br>';
                $body .= 'Regards';
                $body .= '<br><br>';
                $body .= $this->fromname;
                $body .= '<br><br>';
                $body .= '</body>';
                $body .= '</html>';
                $params['messageBody'] = $body;
                $params['subject'] = 'First Response Healthcare Popup Form';

                // Send Mail
                if ($this->sendMail($params)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } elseif ($source === 'query_form') {

            if (EmailClass::validationCheckMobile($mobile) === true) {

                $body = '';
                $body .= '<html>';
                $body .= '<body style="font-size: 13px; font-family: Verdana;">';
            //$body .= '<h3 style="color:#973393;"> Greetings from Evolute, </h3>';
            //$body .= '<p> Thank You For Your Information !</p>';
            //$body .= '<br/>';
            //$body .= '<p> We Will Get Back To You At The Earliest ! </p>';
                $body .= '<table style="font-size: 13px; font-family: Verdana;">';
                $body .= '<tr><td>Name:</td><td>' . $name . '</td></tr>';
                $body .= '<tr><td>Email:</td><td>' . $email . '</td></tr>';
                $body .= '<tr><td>Mobile:</td><td>' . $mobile . '</td></tr>';
                $body .= '<tr><td>Comment:</td><td>' . $comment . '</td></tr>';
               // $body .= '<tr><td>Time:</td><td>' . $time . '</td></tr>';
                $body .= '<tr><td>Source:</td><td>' . $source . '</td></tr>';
                $body .= $leadDetails;
                $body .= '</table>';
                $body .= '<br><br>';
                $body .= 'Regards';
                $body .= '<br><br>';
                $body .= $this->fromname;
                $body .= '<br><br>';
                $body .= '</body>';
                $body .= '</html>';
                $params['messageBody'] = $body;
                $params['subject'] = 'First Response Healthcare Query Form';

                // Send Mail
                if ($this->sendMail($params)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
        // } elseif ($source === 'career_form') {

        //     if (EmailClass::validationCheckMobile($mobile) === true) {

        //         $body = '';
        //         $body .= '<html>';
        //         $body .= '<body style="font-size: 13px; font-family: Verdana;">';
        //         $body .= '<h3 style="color:#973393;"> Greetings from Evolute, </h3>';
        //         $body .= '<p> Thank you for expressing interest on our website. Our expert will get in touch with you shortly. </p>';
        //         $body .= '<br/>';
        //         $body .= '<table style="font-size: 13px; font-family: Verdana;">';
        //         $body .= '<tr><td>Name:</td><td>' . $name . '</td></tr>';
        //         $body .= '<tr><td>Email:</td><td>' . $email . '</td></tr>';
        //         $body .= '<tr><td>Mobile:</td><td>' . $mobile . '</td></tr>';
        //         $body .= '<tr><td>Date:</td><td>' . $date . '</td></tr>';
        //         $body .= '<tr><td>Time:</td><td>' . $time . '</td></tr>';
        //         $body .= '<tr><td>Source:</td><td>' . $source . '</td></tr>';
        //         // $body .= $leadDetails;
        //         $body .= '</table>';
        //         $body .= '<br><br>';
        //         $body .= 'Regards';
        //         $body .= '<br><br>';
        //         $body .= $this->fromname;
        //         $body .= '<br><br>';
        //         $body .= '</body>';
        //         $body .= '</html>';
        //         $params['messageBody'] = $body;
        //         $params['subject'] = 'Evolute Career Enquiry';

        //         // Send Mail
        //         if ($this->sendMail($params)) {
        //             return true;
        //         } else {
        //             return false;
        //         }
        //     } else {
        //         return false;
        //     }
        // } elseif ($source === 'contact_form') {

        //     if (EmailClass::validationCheckMobile($mobile) === true) {

        //         $body = '';
        //         $body .= '<html>';
        //         $body .= '<body style="font-size: 13px; font-family: Verdana;">';
        //         $body .= '<h3 style="color:#973393;"> Greetings from Evolute, </h3>';
        //         $body .= '<p> Thank you for expressing interest on our website. Our expert will get in touch with you shortly. </p>';
        //         $body .= '<br/>';
        //         $body .= '<table style="font-size: 13px; font-family: Verdana;">';
        //         $body .= '<tr><td>Name:</td><td>' . $name . '</td></tr>';
        //         $body .= '<tr><td>Email:</td><td>' . $email . '</td></tr>';
        //         $body .= '<tr><td>Mobile:</td><td>' . $mobile . '</td></tr>';
        //         $body .= '<tr><td>Date:</td><td>' . $date . '</td></tr>';
        //         $body .= '<tr><td>Time:</td><td>' . $time . '</td></tr>';
        //         $body .= '<tr><td>Source:</td><td>' . $source . '</td></tr>';
        //         // $body .= $leadDetails;
        //         $body .= '</table>';
        //         $body .= '<br><br>';
        //         $body .= 'Regards';
        //         $body .= '<br><br>';
        //         $body .= $this->fromname;
        //         $body .= '<br><br>';
        //         $body .= '</body>';
        //         $body .= '</html>';
        //         $params['messageBody'] = $body;
        //         $params['subject'] = 'Evolute Contact Form';

        //         // Send Mail
        //         if ($this->sendMail($params)) {
        //             return true;
        //         } else {
        //             return false;
        //         }
        //     } else {
        //         return false;
        //     }
        // } elseif ($source === 'contact-form') {

        //     if (EmailClass::validationCheckMobile($mobile) === true) {

        //         $body = '';
        //         $body .= '<html>';
        //         $body .= '<body style="font-size: 13px; font-family: Verdana;">';
        //         $body .= '<h3 style="color:#973393;"> Greetings from Evolute, </h3>';
        //         $body .= '<p> Thank you for expressing interest on our website. Our expert will get in touch with you shortly. </p>';
        //         $body .= '<br/>';
        //         $body .= '<table style="font-size: 13px; font-family: Verdana;">';
        //         $body .= '<tr><td>Name:</td><td>' . $name . '</td></tr>';
        //         $body .= '<tr><td>Email:</td><td>' . $email . '</td></tr>';
        //         $body .= '<tr><td>Mobile:</td><td>' . $mobile . '</td></tr>';
        //         $body .= '<tr><td>Date:</td><td>' . $date . '</td></tr>';
        //         $body .= '<tr><td>Time:</td><td>' . $time . '</td></tr>';
        //         $body .= '<tr><td>Source:</td><td>' . $source . '</td></tr>';
        //         $body .= $leadDetails;
        //         $body .= '</table>';
        //         $body .= '<br><br>';
        //         $body .= 'Regards';
        //         $body .= '<br><br>';
        //         $body .= $this->fromname;
        //         $body .= '<br><br>';
        //         $body .= '</body>';
        //         $body .= '</html>';
        //         $params['messageBody'] = $body;
        //         $params['subject'] = 'Evolute Contact-Form';

        //         // Send Mail
        //         if ($this->sendMail($params)) {
        //             return true;
        //         } else {
        //             return false;
        //         }
        //     } else {
        //         return false;
        //     }
        // } elseif ($source === 'iamform') {

            // if (EmailClass::validationCheckMobile($mobile) === true) {

            //     $body = '';
            //     $body .= '<html>';
            //     $body .= '<body style="font-size: 13px; font-family: Verdana;">';
            //     $body .= '<h3 style="color:#973393;"> Greetings from Evolute, </h3>';
            //     $body .= '<p> Thank you for expressing interest on our website. Our expert will get in touch with you shortly. </p>';
            //     $body .= '<br/>';
            //     $body .= '<table style="font-size: 13px; font-family: Verdana;">';
            //     $body .= '<tr><td>Name:</td><td>' . $name . '</td></tr>';
            //     $body .= '<tr><td>Email:</td><td>' . $email . '</td></tr>';
            //     $body .= '<tr><td>Mobile:</td><td>' . $mobile . '</td></tr>';
            //     $body .= '<tr><td>Date:</td><td>' . $date . '</td></tr>';
            //     $body .= '<tr><td>Time:</td><td>' . $time . '</td></tr>';
            //     $body .= '<tr><td>Source:</td><td>' . $source . '</td></tr>';
            //     $body .= $leadDetails;
            //     $body .= '</table>';
            //     $body .= '<br><br>';
            //     $body .= 'Regards';
            //     $body .= '<br><br>';
            //     $body .= $this->fromname;
            //     $body .= '<br><br>';
            //     $body .= '</body>';
            //     $body .= '</html>';
            //     $params['messageBody'] = $body;
            //     $params['subject'] = 'Evolute Im Interested';

            //     // Send Mail
            //     if ($this->sendMail($params)) {
            //         return true;
            //     } else {
            //         return false;
            //     }
            // } else {
            //     return false;
            // }
          //}
        else {
            return false;
        }
    }

    public static function validationCheckMobile($mobile)
    {
        $msg = true;
        if (empty($mobile) || strlen($mobile) >= 18 || strlen($mobile) <= 3 || $mobile === 'Mobile:' || !(EmailClass::is_mobileNumber($mobile))) {
            $msg = 'Enter a valid mobile number';
            return $msg;
        }
        return $msg;
    }

    public static function validationCheckEmail($email)
    {
        $msg = true;
        if (empty($email) || !(EmailClass::isValidEmail($email)) || $email === 'Email:') {
            $msg = 'Enter a valid email address';
            return $msg;
        }
        return $msg;
    }

    public static function isValidEmail($email)
    {
        //return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
        return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email);
    }

    public static function is_mobileNumber($mobile)
    {
        $regex1 = '123456789';
        $regex2 = '1234567890';
        $regex3 = '0123456789';

        if (preg_match('/^([0-9])\1*$/', $mobile)) {
            return false;
        } elseif ($mobile == $regex1) {
            return false;
        } elseif ($mobile == $regex2) {
            return false;
        } elseif ($mobile == $regex3) {
            return false;
        } elseif (preg_match("/[^0-9]/", $mobile)) {
            return false;
        } else {
            return true;
        }
    }

}

?>
