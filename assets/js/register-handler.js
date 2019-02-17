const http = new EasyHTTP();

let registerForm = document.getElementById('registerForm');

registerForm.addEventListener('submit', validate);


function validate(e) {

    if (captchaResponse()) {
        let fname = registerForm.querySelector('#fname').value;
        let lname = registerForm.querySelector('#lname').value;
        let username = registerForm.querySelector('#username').value;
        let email = registerForm.querySelector('#email').value;
        let pwd = registerForm.querySelector('#pwd').value;
        let pwd2 = registerForm.querySelector('#pwd2').value;

        let response = grecaptcha.getResponse();

        let data = 'fname=' + fname + '&lname=' + lname + '&username=' + username + '&email=' + email + '&pwd=' + pwd + '&pwd2=' + pwd2 + '&g-recaptcha-response=' + response;

        // var fd = new FormData(registerForm);
        // fd.append("g-recaptcha-response", response);

        http.post("includes/handlers/register-handler.php", data)
            .then(res => {

                if (res === "Success") {
                    hideMsg("msgError");
                    showMsg("Registration was successful", false);
                } else {
                    let msg = "";
                    res.forEach(e => {
                        msg += e + "</br>";
                    });

                    // Show Error msg
                    showMsg(msg, true);

                    // Reset recaptcha
                    grecaptcha.reset();
                }
                // console.log(res.text())
            })
            .catch(err => showMsg(err, true));


    } else {
        // Captcha not checked
        showMsg("Check captcha box", true);
    }
    e.preventDefault();

}

function onloadCallback() {
    grecaptcha.render('recaptcha', {
        'sitekey': '6LeKFY4UAAAAAK_wO_RC5UvJpq2xIYi3kQ7unzkx'
    });
}

function captchaResponse() {
    let res = grecaptcha.getResponse();

    if (res === '') {
        return false;
    } else {
        return true;
    }
}

function showMsg(msg, err) {
    let box;
    if (err) {
        box = document.getElementById('msgError');
    } else {
        box = document.getElementById('msgSuccess');
    }
    box.classList.remove('hidden');
    box.innerHTML = msg;
}

function hideMsg(id) {
    let box = document.getElementById(id);
    box.innerHTML = "";
    box.classList.add("hidden");
}