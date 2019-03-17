const registerForm = document.getElementById('register-form');

const fnameInput = document.getElementById('fname-input');
const lnameInput = document.getElementById('lname-input');
const unameInput = document.getElementById('uname-input');
const emailInput = document.getElementById('email-input');
const pwd1Input = document.getElementById('pwd1-input');
const pwd2Input = document.getElementById('pwd2-input');

const messageBox = document.getElementById('messages');

fnameInput.addEventListener("keyup", checkFirstName);
lnameInput.addEventListener("keyup", checkLastName);
unameInput.addEventListener("keyup", checkUsername);
emailInput.addEventListener("keyup", checkEmail);
pwd1Input.addEventListener("keyup", checkPassword1);
pwd2Input.addEventListener("keyup", checkPassword2);

// Recaptcha
setInterval(() => {
    checkRecaptcha()
}, 1000);

registerForm.addEventListener("submit", postDataToServer);


function postDataToServer(e) {
    let xml = new XMLHttpRequest();
    xml.open("POST", "includes/handlers/register-handler.php", true)
    xml.onload = () => {
        // console.log(xml.responseText);
        let response = JSON.parse(xml.responseText);
        // console.log(response);
        if (response === "success") {
            messageBox.innerHTML = '<div class="ui blue message">' + "Success" + '</div>';
        } else {
            messageBox.innerHTML = '<div class="ui red message">' + response + '</div>';
            grecaptcha.reset();
        }
    }

    let data = new FormData(registerForm);
    data.append("g-recaptcha-response", grecaptcha.getResponse());
    xml.send(data);

    e.preventDefault();
}

function checkFirstName(e) {
    validateInputField("fname", e.target.value, fnameInput.parentElement)
}

function checkLastName(e) {
    validateInputField("lname", e.target.value, lnameInput.parentElement)
}

function checkUsername(e) {
    validateInputField("uname", e.target.value, unameInput.parentElement)
}

function checkEmail(e) {
    validateInputField("email", e.target.value, emailInput.parentElement)
}

function checkPassword1(e) {
    validateInputField("pwd1", e.target.value, pwd1Input.parentElement)
    pwd2Input.value = "";
    hideCheckIcon(pwd2Input.parentElement)
}

function checkPassword2(e) {
    let field = e.target.parentElement;
    let pwd2 = e.target.value;

    showLoadingIcon(field);

    setTimeout(() => {
        if (e.target.value !== pwd1Input.value) {
            field.parentElement.classList.add("error");
            messageBox.innerHTML = "";
            messageBox.innerHTML = "<div class='ui red message'>Your passwords don't match.</div>";
            hideLoadingIcon(field);
            hideCheckIcon(field);
        } else {
            messageBox.innerHTML = "";
            field.parentElement.classList.remove("error");
            hideLoadingIcon(field);
            showCheckIcon(field);
        }
    }, 1500);
}

function checkRecaptcha() {
    let registerBtn = document.getElementById('registerBtn');
    if (grecaptcha.getResponse() !== "") {
        registerBtn.classList.remove("disabled")
    } else {
        if (Array.from(registerBtn.classList).indexOf("disabled") == -1) {
            registerBtn.classList.add("disabled")
        }
    }
}

function validateInputField(type, typeValue, field) {

    if (typeValue.length > 0) {
        // Errors in type
        showLoadingIcon(field);

        setTimeout(() => {
            let http = new XMLHttpRequest();
            http.open("POST", "includes/handlers/ajax/register-form-checks.php", true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            http.onload = () => {
                // console.log(http.responseText);
                let errors = JSON.parse(http.responseText);
                if (errors.length > 0) {
                    let output = ""
                    errors.forEach(error => {
                        output += '<div class="ui red message">' + error + '</div>';
                    });
                    field.parentElement.classList.add("error");
                    messageBox.innerHTML = "";
                    messageBox.innerHTML = output;
                    hideLoadingIcon(field);
                    hideCheckIcon(field);
                    errors = true;
                } else {
                    field.parentElement.classList.remove("error");
                    messageBox.innerHTML = "";
                    hideLoadingIcon(field);
                    showCheckIcon(field);
                }
            }
            let data = `${type}=` + typeValue;
            http.send(data);
        }, 1500);
    } else {
        field.parentElement.classList.remove("error");
        hideLoadingIcon(field);
        hideCheckIcon(field);
    }

    messageBox.innerHTML = "";
}


function showLoadingIcon(field) {
    field.querySelector("i.check.icon").style.display = "none";
    field.querySelector("i.notched.circle.loading.icon").style.display = "block";
}
function hideLoadingIcon(field) {
    field.querySelector("i.notched.circle.loading.icon").style.display = "none";
}
function showCheckIcon(field) {
    field.querySelector("i.check.icon").style.display = "block";
}
function hideCheckIcon(field) {
    field.querySelector("i.check.icon").style.display = "none";
}
