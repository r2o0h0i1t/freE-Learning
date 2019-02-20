// Fetch Library
const http = new EasyHTTP();

let registerForm = document.getElementById('registerForm');

registerForm.addEventListener('submit', validate);


function validate(e) {

    if (captchaResponse()) { // Check if captcha is checked

        // Captcha response
        let response = grecaptcha.getResponse();

        var fd = new FormData(registerForm);
        fd.append("g-recaptcha-response", response);

        http.post("http://localhost/E-Learning-2/includes/handlers/register-handler.php", fd)
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