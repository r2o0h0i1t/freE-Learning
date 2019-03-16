const usernameInput = document.getElementById('username');
const messageBox = document.getElementById('messages');

usernameInput.addEventListener("keyup", checkUsername);

function checkUsername(e) {
    const field = usernameInput.parentElement;

    const username = e.target.value;
    messageBox.innerHTML = "";

    if (username.length > 0) {
        // Errors in username
        showLoadingIcon(field);

        setTimeout(() => {
            let http = new XMLHttpRequest();
            http.open("POST", "includes/handlers/ajax/check-username.php", true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
            http.onload = () => {
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
                } else {
                    field.parentElement.classList.remove("error");
                    messageBox.innerHTML = "";
                    hideLoadingIcon(field);
                    showCheckIcon(field);
                }
            }
            let data = "username=" + username;
            http.send(data);
        }, 1500);
    } else {
        field.parentElement.classList.remove("error");
        hideLoadingIcon(field);
        hideCheckIcon(field);
    }

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
