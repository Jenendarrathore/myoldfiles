<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);













function registration()
{


  $name = $_POST['name'];
  $email = $_POST['email'];
  $phoneno = $_POST['phoneno'];




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

      $sql = "INSERT INTO userRegistration(name, mobile, email)
                VALUES ('$name', '$phoneno', '$email')";

      if ($conn->query($sql) === TRUE) {
        header("Location:./thankyou.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
  $conn->close();
}



function adminLogin()
{


  $name = $_POST['name'];
  $adminpassword = $_POST['password'];
  $phoneno = $_POST['phoneno'];


  $servername = "localhost";
  $username = "root";
  $password = "12345678";
  $dbname = "demo";



  session_start();



  $_SESSION['name'] = $_POST['name'];
  $_SESSION['phoneno'] = $_POST['phoneno'];
  $_SESSION['password'] = $_POST['password'];

  $conn = new mysqli($servername, $username, $password, $dbname);
  //Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {

    if (empty($name)) {

      echo "You must enter your email address.";
    } else {
      //                 $sql = "INSERT INTO admin_db(name, mobile, password)
      // VALUES ('$name', '$phoneno', '$adminpassword')";
      $sql = "SELECT * FROM admin_db WHERE name = '$name' AND mobile = '$phoneno' AND adminpassword = '$adminpassword'";

      $querySQL = mysqli_query($conn, $sql);

      echo mysqli_num_rows($querySQL);

      if (mysqli_num_rows($querySQL) > 0) {
        header("Location:./dashboard.php");
      } else {
        $error_text = "Wrong PAssword";
      }
    }
  }
  $conn->close();
}




function approvedUser()
{


  $name = $_POST['name'];
  $email = $_POST['email'];
  $phoneno = $_POST['phoneno'];




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


    if (empty($name)) {

      echo "";
    } else {


      $sql = "SELECT * FROM approvedData WHERE name = '$name' AND mobile = '$phoneno' AND email = '$email'";

      $querySQL = mysqli_query($conn, $sql);

      echo mysqli_num_rows($querySQL);

      if (mysqli_num_rows($querySQL) > 0) {
      } else {

        $sql = "INSERT INTO approvedData(name, mobile, email)
            VALUES ('$name', '$phoneno', '$email')";


        if ($conn->query($sql) === TRUE) {
          $result = "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
  }
  $conn->close();
}






// delter already approved user

function delteapprovedUser()
{

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phoneno = $_POST['phoneno'];




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


    if (empty($name)) {

      echo "";
    } else {


      $sql = "DELETE FROM approvedData WHERE name = '$name' AND mobile = '$phoneno' AND email = '$email'";

      if ($conn->query($sql) === TRUE) {
        echo "dleeted from userregistreTION";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
  $conn->close();
}






function watchVideo()
{

  $name = $_POST['name'];
  $email = $_POST['email'];
  $phoneno = $_POST['phoneno'];

  $servername = "localhost";
  $username = "root";
  $password = "12345678";
  $dbname = "demo";


  session_start();



  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['phoneno'] = $_POST['phoneno'];

  $conn = new mysqli($servername, $username, $password, $dbname);
  //Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {

    if (empty($name)) {

      echo "PLease Login.";
    } else {
      //                 $sql = "INSERT INTO admin_db(name, mobile, password)
      // VALUES ('$name', '$phoneno', '$adminpassword')";
      $sql = "SELECT * FROM approvedData WHERE name = '$name' AND mobile = '$phoneno' AND email = '$email'";

      $querySQL = mysqli_query($conn, $sql);

      echo mysqli_num_rows($querySQL);

      if (mysqli_num_rows($querySQL) > 0) {

        header("Location:./video.php?");
      } else {

        echo "pls login ";
      }
    }
  }
  $conn->close();
}
