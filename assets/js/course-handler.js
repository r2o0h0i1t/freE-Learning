// Fetch Library
const http = new EasyHTTP();

$(".ui.dropdown").dropdown({});


let courseForm = document.getElementById('courseForm');
courseForm.addEventListener('submit', sendCourse);

function sendCourse(e) {
    var data = new FormData(courseForm);

    http.post("../includes/handlers/upload-course-handler.php", data)
        .then(res => {
            console.log(res);

            if (res === "Success") {
                hideMsg("msgError");
                showMsg("Course upload was successful", false);


            } else {
                let msg = "";
                res.forEach(e => {
                    msg += e + "</br>";
                });
                // Show Error msg
                showMsg(msg, true);
            }
        })
        .catch(err => showMsg(err, true));

    e.preventDefault();
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