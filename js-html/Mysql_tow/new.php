<?php

session_start();

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phoneno = $_SESSION['phoneno'];
$City = $_SESSION['city'];
$country = $_SESSION['country'];
$product_type = $_SESSION['product_type'];
$quantity = $_SESSION['quantity'];
$message = $_SESSION['message'];
$url_data = $_SESSION['url'];






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p> Hi my name is   <?php echo $email; 
echo $phoneno; 
echo $City ;
echo $name ;
echo $country ;
echo $product_type;
echo $quantity_;
echo $message ;
echo $url_data;   ?>    </p>
   
    

</body>
</html>