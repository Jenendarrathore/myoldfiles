<!-- PHP code to establish connection with the localserver -->
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//  display registered users



$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "demo";

$mysqli = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
        $mysqli->connect_errno . ') ' .
        $mysqli->connect_error);
}

// SQL query to select data from database
$sql = " SELECT * FROM userRegistration ORDER BY id DESC ";
$result = $mysqli->query($sql);
$mysqli->close();

//  display registered users end



// approve users


require 'send_mail.php';



if(isset($_POST['approvedUser'])){
   
  
    approvedUser();
      
  }
  else {
  
    echo "error";
  
  }


  if(isset($_POST['delteapprovedUser'])){
   
  
    delteapprovedUser();
  
    
  }
  else {
  
    echo "error";
  
  }

  
// approve users end


  //     session for avoiding page access on reload


  session_start();


  $name = $_SESSION['name'];
  $adminpassword = $_SESSION['password'];
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
                  header("Location:./admin_login.php");
                  echo "You must enter your email address.";
                  } else {
  //                 $sql = "INSERT INTO admin_db(name, mobile, password)
  // VALUES ('$name', '$phoneno', '$adminpassword')";
  $sql = "SELECT * FROM admin_db WHERE name = '$name' AND mobile = '$phoneno' AND adminpassword = '$adminpassword'";
  
                  $querySQL = mysqli_query($conn,$sql);
  
                  echo mysqli_num_rows($querySQL);
                  
                  if(mysqli_num_rows($querySQL) > 0){
  
                  } else {
                      header("Location:./admin_login.php");
  
                  }
              }           
          }
  $conn->close();
  
  


  if(isset($_POST['logout'])){

    session_destroy();
    header("Location:./admin_login.php");

  }
  else{}

    //     session for avoiding page access on reload end

?>

<?php
//  display aprprovde users

$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "demo";

$mysqli = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
);

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
        $mysqli->connect_errno . ') ' .
        $mysqli->connect_error);
}

// SQL query to select data from database

$sql2 = " SELECT * FROM approvedData ORDER BY id DESC ";
$result2 = $mysqli->query($sql2);
$mysqli->close();

//  display aprprovde users end

?>


<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GFG User Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
                ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>



<body>

<style>
    .approved_btn{
        background-color: green;
    }
</style>

<section>

<form action="" method="post">
<button type="submit" name="logout" class="">Logout</button>
</form>

<!-- Registered user list -->

        <h1>Registered</h1>
    


        <?php
        while ($rows = $result->fetch_assoc()) {
        ?>

            <form action="" method="post" onsubmit="">


                <input type="text" name="name" value="<?php echo $rows['name']; ?>">
                <td><input type="text" name="phoneno" value="<?php echo $rows['mobile']; ?>" readonly>
                <td><input type="text" name="email" value="<?php echo $rows['email']; ?>" readonly>
      
                <button type="submit" name="approvedUser" onclick ="approved_color()" class="aprrove_btn"><span></span><span></span><span></span><span></span>Submit</button>


            </form>

        <?php

        }
        ?>

    </section>

<!-- Registered user list -->



<!-- Approved user list -->

    <section>
        <h1>Approved</h1>
       
        <?php
        while ($rows2 = $result2->fetch_assoc()) {
        ?>

            <form action="" method="post" >


                <input type="text" name="name" value="<?php echo $rows2['name']; ?>">
                <td><input type="text" name="phoneno" value="<?php echo $rows2['mobile']; ?>" readonly>
                <td><input type="text" name="email" value="<?php echo $rows2['email']; ?>" readonly>
      
                <button type="submit" name="delteapprovedUser"  class="aprrove_btn"><span></span><span></span><span></span><span></span>Delete</button>


            </form>

        <?php

        }
        ?>

    </section>

    <!-- Approved user list end -->

    <script>
        function getInputValue() {
            // Selecting the input element and get its value 
            var inputVal = document.getElementById("userName").value;
            var inputMob = document.getElementById("userMobile").value;

            var inputMail = document.getElementById("userMail").value;
            // Displaying the value
            alert(inputVal, inputMob, inputMail);
        }
    </script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


<script>

function approved_color(){
console.log(this);
}


</script>



</body>

</html>