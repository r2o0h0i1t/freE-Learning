// Fetch Library
const http = new EasyHTTP();

$(".ui.dropdown").dropdown({});


let courseForm = document.getElementById('courseForm');
courseForm.addEventListener('submit', sendCourse);

function sendCourse(e) {
    var data = new FormData(courseForm);

    http.post("../includes/handlers/upload-course-handler.php", data)
        .then(res => console.log(res))
        .catch(err => console.log(err));

    e.preventDefault();
}