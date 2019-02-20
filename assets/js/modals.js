// Show login modal
document.getElementById("loginBtn").addEventListener('click', function() {
    $("#loginModal").modal("show");
});
// Show registermodal
document.getElementById("registerBtn").addEventListener('click', function() {
    $("#registerModal").modal("show");
});
// Show login modal 2
document.getElementById("alreadyLogIn").addEventListener('click', function() {
    $("#registerModal").modal("hide");
    $("#loginModal").modal("show");
});
// Show register modal 2
document.getElementById("noAccount").addEventListener('click', function() {
    $("#loginModal").modal("hide");
    $("#registerModal").modal("show");
});
$(".ui.dropdown").dropdown({});