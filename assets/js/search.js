const searchbar = document.getElementById('searchField');

searchbar.addEventListener("keyup", fetchResult);

function fetchResult(e) {
    let target = e.target.value;
    if (target !== "") {
        let http = new XMLHttpRequest();
        http.open("POST", "includes/handlers/search-course.php", true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
        http.onload = () => {
            let result = JSON.parse(http.responseText);
            if (result.length > 0) {
                console.log(result);
            }
        }
        let data = "search-value=" + target;
        http.send(data);
    }
}