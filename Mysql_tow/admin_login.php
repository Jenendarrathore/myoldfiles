<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);






require 'send_mail.php';



if(isset($_POST['adminLogin'])){
   
  
    adminLogin();
  
    
  }
  else {
  
    echo "error";
  
  }


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
    #icon {
        width: 60px;
    }

    :root {
        --primary-color: #fff;
        --secondary-color: #000;
    }

    .dark-theme {
        --primary-color: #000;
        --secondary-color: #fff;
    }

    .div1 {
        background-color: var(--primary-color);
        color: var(--secondary-color);
    }
</style>

<body>

    <div class="div1">


        <form method="post" action="" onsubmit="">
            <input type="text" class="form-control" name="name" placeholder="Name*" required>

            <input type="tel" class="form-control" name="phoneno" maxlength="15" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="Phone Number*" required>
            <input type="text" class="form-control" name="password" placeholder="password" required>




            <button type="submit" name="adminLogin" class="knowmorebutlink"><span></span><span></span><span></span><span></span>Submit</button>

        </form>
        <p> <?php echo $error_text ?></p>

        
   


    </div>




   



    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>



</html>