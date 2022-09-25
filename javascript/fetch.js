
    var contactUsFooter = document.getElementById('contact-us-footer');

    contactUsFooter.addEventListener('submit', function(e) {
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
                responseresultfooter(result)
            })


            .catch(error => console.log('error', error));


    })


    function responseresultfooter(e) {
        var rel = JSON.parse(e);
        console.log(rel);


        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        var name = jQuery('input[name="namef"]').val();
        var mobile = jQuery('input[name="mobilef"]').val();
        var email = jQuery('input[name="emailf"]').val();
        var desc = window.location.href;


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
