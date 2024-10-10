

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



session_start();


$name = $_POST['name'];
$email = $_POST['email'];
$phoneno = $_POST['phoneno'];
$City = $_POST['city'];
$country = $_POST['country'];
$product_type = $_POST['product_type'];
$quantity = $_POST['quantity'];
$message = $_POST['message'];
$url_data = $_POST['url'];







// $_SESSION['name'] = $_POST['name'];
// $_SESSION['mobile'] = $_POST['mobile'];

// $_SESSION['email'] = $_POST['email'];

// $_SESSION['utm_source'] = $_POST['utm_source'];

// $_SESSION['utm_medium'] = $_POST['utm_medium'];

// $_SESSION['utm_campaign'] = $_POST['utm_campaign'];

// $_SESSION['url'] = $_POST['url'];


// $name = $_SESSION['name'];

// $mobile = $_SESSION['mobile'];

// $email = $_SESSION['email'];

// $utm_source = $_SESSION['utm_source'];

// $utm_medium = $_SESSION['utm_medium'];

// $utm_campaign = $_SESSION['utm_campaign'];

// $url = $_SESSION['url'];

?>

<?php
// $servername = "localhost";
// $username = "root";
// $password = "12345678";
 // $dbname = "demo";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
//  die("Connection failed: " . $conn->connect_error);
// }




// $sql = "INSERT INTO demotable (name, mobile, email)
// VALUES ('John', '2', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully";
// } else {
//  echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
// ?>


<?php

require_once 'emailClass.php';


if(!empty($name)){
  

  sendMail();


}
else {
  echo "pls fille the form ";


}

//var_dump($_REQUEST['mobile']);
//die();

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

   <p> Hi my name is   <?php echo $name;    ?>    </p>
   <!-- <p> but you can me on  <?php echo $mobile;    ?>    </p>
   <p> And pls share memes striclty on   <?php echo $email;    ?>    </p>


   <p> And pls share memes striclty on   <?php echo $url;    ?>    </p> -->






  <a href="./new.php">a</a>


</body>

</html>