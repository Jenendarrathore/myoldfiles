<?php

session_start();

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phoneno = $_SESSION['phoneno'];

echo $name;

$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "demo";




$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

            if (empty($name)) {
                header("Location:./userLogin.php");
                echo "You must enter your email address.";
                } else {
//                 $sql = "INSERT INTO admin_db(name, mobile, password)
// VALUES ('$name', '$phoneno', '$adminpassword')";
$sql = "SELECT * FROM approvedData WHERE name = '$name' AND mobile = '$phoneno' AND email = '$email'";

                $querySQL = mysqli_query($conn,$sql);

                echo mysqli_num_rows($querySQL);
                
                if(mysqli_num_rows($querySQL) > 0){

                } else {
                    header("Location:./userLogin.php");

                }
            }           
        }
$conn->close();


if(isset($_POST['logout'])){

    session_destroy();
    header("Location:./userLogin.php");

  

  }
  else{}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style> 

.disaprroved_user{
    display: none;
}
.aprroved_user{
    display: block;
}
</style>

<body class =" <?php echo $body_class; ?>">

<form action="" method="post">
<button type="submit" name="logout" class="">Logout</button>
</form>
<iframe width="858" height="483" src="https://www.youtube.com/embed/f02mOEt11OQ" title="code-fi / lofi beats to code/relax to" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


</body>
</html>