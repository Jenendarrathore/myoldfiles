<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




$name = $_POST['name'];
$email = $_POST['email'];

	header('Content-Type: application/json');
	$name = $_POST['name'];
	$email = $_POST['email'];
	
	$subject = '';
	// $message = $_POST['ucomment'];
	$to = "jenendar2@gmail.com";
	if(!$subject){
		$subject = "Dealer request from Milltec India";
	}
	$message = "
	<p>Below is the contacted Query</p>
	<table>
		<tr>
			<td><b>Name</b> : ".$name."</td> 
		</tr>
		<tr>
			<td><b>Email</b> : ".$email."</td>
		</tr>
		
	</table>
	";
// Always set content-type when sending HTML email
	$headers = 'From:'.$email. "\r\n";

	$headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
	$headers .= 'From:'.$email. "\r\n";
	$mail = mail($to,$subject,$message,$headers);
	if($mail){
		echo json_encode(array(
			'success'=> true,
			'message'=> 'Email Sent successfully'
		));
	}else{
		echo json_encode(array(
			'error'=> true,
			'message'=> 'Something went wrong!'
		));
	}
?>