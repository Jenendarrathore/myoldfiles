<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);










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

<script>
  function step1() {

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "demo";

    //Create connection

    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else {

      if (empty($email)) {

        echo "You must enter your email address.";
      } else {

        $sql = "INSERT INTO demotable(name, mobile, email, url_data)
                VALUES ('$name', '$phoneno', '$email', '$url_data')";

        if ($conn->query($sql) === TRUE) {
          $result = "New record created successfully";
      

        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
    $conn->close();

?>




  }



  function step2() {

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "demo";

    //Create connection

    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else {


      $sql = "UPDATE demotable SET city = '$City', country= '$country', product_type = '$product_type', quantity = '$quantity', messages = '$message', url_data = '$url_data' WHERE mobile = $phoneno;";



      if ($conn->query($sql) === TRUE) {
        $result = "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    $conn->close();

    ?>

  }
</script>