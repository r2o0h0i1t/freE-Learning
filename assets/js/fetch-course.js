const http2 = new EasyHTTP();

http2.get("http://localhost/E-Learning-2/includes/handlers/fetch-course-handler.php")
    .then(res => displayCourses(res));

function displayCourses(res) {

    res.forEach(function(r) {
        // Area to insert course details
        let area = document.getElementById(r['category'] + "-cards");

        // Append card with details
        area.innerHTML +=

            `<div class="ui link card">
            <a class="image" href="">
                <img  src="../assets/courses/${r['title']}/${r['title']}.jpg">
            </a>
            <div class="content">
                <div class="header">${r['title']}</div>
                <div class="meta">
                    <a>${r['category']}</a>
                </div>
                <div class="description">
                    ${r['teaser']}
                </div>
            </div>
            <div class="extra content">
                ${r['numofvideos']} videos
            </div>
        </div>`
    });
}