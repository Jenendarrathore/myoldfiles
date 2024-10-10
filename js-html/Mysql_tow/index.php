<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$url_data = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


require 'send_mail.php';



if (isset($_POST['regiration'])) {


    registration();
} else {

    // echo "error";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Animate on scroll -->
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>


<body>




    <section>

        <div class="div1">

            <div class="login-box">

                <img src="moon.png" id="icon" alt="">


                <!-- <form class="contact-footer-form" id="contact_form" name="contact_form" method="POST" onsubmit="return save_response(event)" > -->

                <form method="post" id="step1" action="" class="fadeInUp" onsubmit="registration()">
                    <div class="user-box">
                        <input type="text" name="name" required>
                        <label>Username</label>
                    </div>
                    <div class="user-box">
                        <input type="email" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        <label>Password</label>
                    </div>
                    <div class="user-box">
                        <input type="tel" name="phoneno" maxlength="15" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                        <label>Password</label>
                    </div>
                    <button type="submit" name="regiration" class="knowmorebutlink"><span></span><span></span><span></span><span></span>Submit</button>

                </form>


                <a href="admin_login.php">Admin Login </a>
                <a href="userLogin.php">User Login </a>

            </div>
        </div>
    </section>


    <section class="section1">

        <div class="layer1">
            <img src="assets/images/Layer1.png" data-aos="fade-up" data-aos-delay="1000" alt="">
        </div>
        <div class="layer2">
            <img src="assets/images/Layer3.png" data-aos="fade-up" data-aos-delay="500" alt="">
        </div>

    </section>



    <section>

        <p id="demo" class="demo">Old Text</p>
        <p id="demo1" class="demo">Old Text</p>

        <button onclick="trigger()">Click</button>

        <script>
            function trigger() {

                // var demo_div = document.getElementById("demo");
                var demo_div = document.getElementsByClassName("demo");
                

                demo_div.innerHTML = "Hello World!";

            }
        </script>


    </section>



    <!-- Animate on scroll -->
    <script src="script/aos.js"></script>
    <script src="script.js"></script>

</body>



</html>