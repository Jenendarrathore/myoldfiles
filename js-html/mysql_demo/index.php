

<?php





session_start();




$utm_source = $_REQUEST['utm_source'];
$utm_medium = $_REQUEST['utm_medium'];
$utm_campaign = $_REQUEST['utm_campaign'];
$url_data = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


$_SESSION['name'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['phoneno'] = $_POST['phoneno'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['country'] = $_POST['country'];
$_SESSION['product_type'] = $_POST['product_type'];
$_SESSION['quantity'] = $_POST['quantity'];
$_SESSION['message'] = $_POST['message'];
$_SESSION['url'] = $url_data;




require 'send_mail.php';



// $_SESSION['url'] = $url;

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


#icon{
    width: 60px;
}

:root {
    --primary-color: #fff;
    --secondary-color: #000;
}

.dark-theme{
    --primary-color: #000;
    --secondary-color: #fff;
}

.div1{
    background-color: var(--primary-color);
    color: var(--secondary-color);
}



</style>

<body>

<div class="div1">

<img src="moon.png" id="icon" alt="">


    <!-- <form class="contact-footer-form" id="contact_form" name="contact_form" method="POST" onsubmit="return save_response(event)" > -->
    <form method="post" id="step1" action="" onsubmit="step1()">
				<input type="hidden" name="mail" value="SMB Cu 250">
        <p class="widget-title">Contact Us</p>
        <div class="row">
            <div class="twoformfeild">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name*" required>
                    <p id="error_name" class="error-txt"></p>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email ID*" required>
                    <p id="error_email" class="error-txt"></p>
                </div>
            </div>
            <div class="twoformfeild">
                <div class="form-group">
                    <input type="tel" class="form-control" name="phoneno" maxlength="15"  placeholder="Phone Number*" required>
                    <p id="error_phoneno" class="error-txt"></p>
                </div>
           
            </div>
            
            

            <input type="hidden" value="Contact Us - Footer" id="formname_footer">
                <input type="hidden" name="utm_source" value="<?php echo $utm_source ?>" >
                <input type="hidden" name="utm_medium" value="<?php echo $utm_medium ?>" >
                <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign ?>">
                <input type="hidden" name="url_data" value="<?php echo $url_data ?>" id="url_data">

            <div class="form-group form-feild-full">
                <button type="submit" name="contact" class="knowmorebutlink"><span></span><span></span><span></span><span></span>Submit</button>
            </div>


            <!-- <div class="col-lg-6">
                                    <input class="form-control" id="working_company" name="working_company" type="text" placeholder="Company" aria-label="default input example" required>
                                </div> -->
          
        </div>
    </form>


    <form method="post" id="step2" class="step2_form" action="" onsubmit="step2()">
				<input type="hidden" name="mail" value="SMB Cu 250">
        <p class="widget-title">Contact Us</p>
        <div class="row">
            
            <div class="twoformfeild">
                <div class="form-group">
                    <input type="tel" class="form-control" name="phoneno" value="<?php echo $phoneno ?>" maxlength="15" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Phone Number*" required>
                    <p id="error_phoneno" class="error-txt"></p>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="city" placeholder="City*" required>
                    <p id="error_city" class="error-txt"></p>
                </div>
            </div>
            <div class="twoformfeild">
                <div class="form-group">
                    <input type="text" class="form-control" name="country" placeholder="Country*" required>
                    <p id="error_country" class="error-txt"></p>
                </div>
                <div class="select-product form-group icon-down-open">
                    <select class="select form-control" name="product_type" id="product_type" required>
                        <option value="Product Type">Product Type</option>
                        <option value="SMB Copper T 380A">SMB Copper T 380A</option>
                        <option value="SMB Copper T 380A Loading Devices">SMB Copper T 380A Loading Devices</option>
                        <option value="SMB TCu 380A">SMB TCu 380A</option>
                        <option value="SMB TCu 380Ag">SMB Silver IUD TCu 380Ag</option>
                        <option value="SMB TCu 380 Plus">SMB TCu 380 Plus</option>
                        <option value="SMB Cu 375">SMB Cu 375</option>
                        <option value="SMB IUD TCu 380A">SMB IUD TCu 380A</option>
                        <option value="IUD Kit">IUD Kit</option>
                        <option value="Probe Hysterometer">Probe Hysterometer</option>
                        <option value="IUD Thread Retriever">IUD Thread Retriever</option>
                        <option value="Luer Lock Disposable Syringe">Luer Lock Disposable Syringe</option>
                        <option value="Umbilical Cotton Tape">Umbilical Cotton Tape</option>
                        <option value="Tubal Rring">Tubal Rring</option>
                        <option value="Cytokit">Cytokit</option>
                    </select>
                </div>
            </div>
            <div class="twoformfeild">
                <div class="form-group">
                    <input type="text" class="form-control" name="quantity" placeholder="Quantity*" required>
                    <p id="error_quantity" class="error-txt"></p>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" id="productFormTextarea" rows="1" placeholder="Message"></textarea>
                    <p id="error_message" class="error-txt"></p>
                </div>
            </div>
            <input type="hidden" name="url" value="<?php echo $url_data ?>" id="url_footer">
            <input type="hidden" value="Contact Us - Footer" id="formname_footer">
                <input type="hidden" name="utm_source" value="<?php echo $utm_source ?>" id="utm_source_footer">
                <input type="hidden" name="utm_medium" value="<?php echo $utm_medium ?>" id="utm_medium_footer">
                <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign ?>" id="utm_campaign_footer">
                <input type="hidden" name="url_data" value="<?php echo $url_data ?>" id="url_data">
            <div class="form-group form-feild-full">
                <button type="submit" name="contact" class="knowmorebutlink"><span></span><span></span><span></span><span></span>Submit</button>
            </div>


            <!-- <div class="col-lg-6">
                                    <input class="form-control" id="working_company" name="working_company" type="text" placeholder="Company" aria-label="default input example" required>
                                </div> -->
            <div class="col-lg-12">
               
            </div>
        </div>
    </form>


    


    <a href="new.php">click </a>

    <!-- 
<script>
      function save_response(event) {
            event.preventDefault();
            var name = jQuery('input[name="name"]').val();
            var email = jQuery('input[name="email"]').val();
            var mobile = jQuery('input[name="phone"]').val();
            var formname = jQuery('input[name="formname"]').val();
            var source = jQuery('input[name="source"]').val();
            var medium = jQuery('input[name="medium"]').val();
            var campaign = jQuery('input[name="campaign"]').val();

            var url = jQuery('input[name="url"]').val();
            $.ajax({
                type: 'POST',
                url: "https://docs.google.com/forms/d/e/1FAIpQLSfL9uqq4Ez7ozkAc0bj1LkJ_-0HE44n7a7XuOfdnp9MD5aX-w/formResponse",
                data: {
                    "entry.1690268218": name,
                    "entry.1142860077": mobile,
                    "entry.1375985021": email,
                    "entry.1285382629": formname,
                    "entry.160040182": source,
                    "entry.933498217": medium,
                    "entry.488640570": campaign,
                    "entry.384201858": url,
                },
                statusCode: {
                    0: function(data) {
                        console.log(data);
                        console.log('CROS Error');
                        location.href = "./thank-you.php";
                    },
                    200: function(data) {
                        console.log('Excelsheet Success');
                        location.href = "./thank-you.php"
                    },
                    403: function(data) {
                        console.log('403 Error');
                    }
                },
            })
            return false;
        }
</script> -->

</div>

<!-- light and dark mode -->
<script>

var icon = document.getElementById("icon");

if (localStorage.getItem("theme") == null) {

    localStorage.setItem("theme", "light");

}

// create a local sotrage and crate a variable theme and its value light we wiill then change this value 


let localdata = localStorage.getItem("theme");

if (localdata == "light"){
    icon.src = "moon.png";
    document.body.classList.remove("dark-theme");
} else if (localdata == "dark"){
    icon.src="sun.png";
    document.body.classList.add("dark-theme");

}

icon.onclick = function(){
    document.body.classList.toggle("dark-theme");

    if(document.body.classList.contains("dark-theme")){
        icon.src="sun.png";
        localStorage.setItem("theme", "dark");

    }
    else{
        icon.src="moon.png";
        localStorage.setItem("theme", "light");

    }
}

</script>



<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

</body>



</html>