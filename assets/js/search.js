const searchbar = document.getElementById('searchField');

searchbar.addEventListener("keyup", fetchResult);

function fetchResult(e) {
    let target = e.target.value;
    if (target !== "") {
        let http = new XMLHttpRequest();
        http.open("POST", "includes/handlers/search-course.php", true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        http.onload = () => {
            let results = JSON.parse(http.responseText);
            if (results.length > 0) {
                let content = [];
                results.forEach(result => {
                    let title = { title: result.title, url: `details.php?id=${result.id}` }
                    content.push(title)
                });

                $('.ui.search').search({
                    source: content
                });
            }
        }
        let data = "search-value=" + target;
        http.send(data);
    }
}