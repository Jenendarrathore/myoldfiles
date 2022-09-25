<?php

session_start();

$name = $_SESSION['name'];
$mobile = $_SESSION['mobile'];

$email = $_SESSION['email'];

$utm_source = $_SESSION['utm_source'];

$utm_medium = $_SESSION['utm_medium'];

$utm_campaign = $_SESSION['utm_campaign'];

$url = $_SESSION['url'];



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
   <p> but you can me on  <?php echo $mobile;    ?>    </p>
   <p> And pls share memes striclty on   <?php echo $email;    ?>    </p>
   <p> And pls share memes striclty on   <?php echo $utm_source;    ?>    </p>

   <p> And pls share memes striclty on   <?php echo $utm_medium;    ?>    </p>

   <p> And pls share memes striclty on   <?php echo $utm_campaign;    ?>    </p>

   <p> And pls share memes striclty on   <?php echo $url;    ?>    </p>

    

</body>
</html>