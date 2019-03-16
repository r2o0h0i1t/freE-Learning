const usernameInput = document.getElementById('username');

usernameInput.addEventListener("keyup", checkUsername);

function checkUsername(e) {
    const field = usernameInput.parentElement;

    const username = e.target.value;
    if (username.length > 0) {
        showLoadingIcon(field)
    } else {
        hideLoadingIcon(field);
    }

}

function showLoadingIcon(field) {
    // Load loading icon
    field.querySelector("i.check.icon").style.display = "none";
    field.querySelector("i.notched.circle.loading.icon").style.display = "block";
}

function hideLoadingIcon(field) {
    field.querySelector("i.notched.circle.loading.icon").style.display = "none";
}
function showCheckIcon(field) {
    // Load success icon
    field.querySelector("i.notched.circle.loading.icon").style.display = "none";
    field.querySelector("i.check.icon").style.display = "block";
}

