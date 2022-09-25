<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--  mobiel Input    -->

    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 
</head>
<body>


<div>
<form class="popup-form" id="contact-us" name="contact-us" method="POST" onsubmit="return save_response(event);">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="name">Name</label>
                                        <input class="phone-input" id="name" name="name" type="text" aria-label="default input example" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="mobile">Contact Number</label>
                                        <input class="phone-input" id="mobile" name="mobile" type="text" pattern="[0-9]{10}"  max-length="15" aria-label="default input example" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="email">Email Address</label>
                                        <input class="phone-input" id="email" name="email" type="email" aria-label="default input example" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-pink form-btn" id="submit">GET STARTED</button>
                                        <input type="hidden" value="Popup Form" id="formname">
                                        <input type="hidden" value="<?php echo $utm_source ?>" id="utm_source">
                                        <input type="hidden" value="<?php echo $utm_medium ?>" id="utm_medium">
                                        <input type="hidden" value="<?php echo $utm_campaign ?>" id="utm_campaign">
                                        <input type="hidden" value="<?php echo $url ?>" id="url">
                                    </div>
                                </div>
                            </form>
</div>
    



<script>

// intializing the input 

const phoneInputField = document.querySelector("#mobile");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });



// forom subnmit function 


    function save_response(event) {
        event.preventDefault();
        var name = $('#name').val();
        //code to get the cuntry code 
        var country_code = document.querySelector(".iti__selected-flag").attributes.title.value;

var mobile_num = $('#mobile').val();
var mobile = country_code + " " + mobile_num;

        // var mobile = $('#mobile').val();

        var email = $('#email').val();
        var formname = $('#formname').val();
        var source = $('#utm_source').val();
        var medium = $('#utm_medium').val();
        var campaign = $('#utm_campaign').val();
        var url = $('#url').val();
        $.ajax({
            type: 'POST',
            url: "https://docs.google.com/forms/d/e/1FAIpQLSf8YCBnmMBd4aQU0ufIoinaQKNQpO4i6KRDmndVX2OXJdfAFg/formResponse",
            data: {
                "entry.660550676": name,
                "entry.923525488": mobile,
                "entry.1944120990": email,
                "entry.114738207": formname,
                "entry.340110579": source,
                "entry.1304899094": medium,
                "entry.1204373618": campaign,
                "entry.61333276": url,
            },
            statusCode: {
                0: function(data) {
                    console.log(data);
                    console.log('CROS Error');
                    window.location.href = "https://www.logicloopdigital.com/thank-you"
                },
                200: function(data) {
                    console.log('Excelsheet Success');
                    window.location.href = "https://www.logicloopdigital.com/thank-you"
                },
                403: function(data) {
                    console.log('403 Error');
                }
            },
        })
        return false;
    }


    //ERP data entry

    var contactUs = document.getElementById('contact-us');
    contactUs.addEventListener('submit', function(e) {
        e.preventDefault();
        var myHeaders = new Headers();

        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "params": {
                "login": "apiadmin",
                "password": "1Admin@123",
                "db": "logicloop_erp"
            }
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch("https://erp.logicloop.io/auth", requestOptions)
            .then(response => response.text())
            .then(result => {
                responseresult(result)
            })

            .catch(error => console.log('error', error));


    })


    function responseresult(e) {
        var rel = JSON.parse(e);
        console.log(rel);


        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        var name = jQuery('input[name="name"]').val();
        var country_code = document.querySelector(".iti__selected-flag").attributes.title.value;
        var mobile_num = $('#mobile').val();
        var mobile = country_code + " " + mobile_num;
        // var mobile = jQuery('input[name="mobile"]').val();
        var email = jQuery('input[name="email"]').val();
        var desc = window.location.href;

        console.log(desc);

        var raw = JSON.stringify({
            "params": {
                "context": {},
                "data": {
                    "name": name,
                    "email_from": email,
                    "phone": mobile,
                    "company_id": 1,
                    "description": desc
                }
            }
        });
        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch("https://erp.logicloop.io/api/create/one/crm.lead?session_id=" + rel['result']['session_id'], requestOptions)
            .then(response => response.text())
            .then(location.href = "/thank-you")
            .catch(error => console.log('error', error));
    }

</script>

</body>
</html>