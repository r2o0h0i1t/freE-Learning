<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- Website icon -->
    <link rel="icon" href="assets/images/icon.png" />

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Navbar -->
    <link rel="stylesheet" href="assets/css/nav.css">

    <!-- dashboard.css -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <?php 
        include("includes/config.php"); 
        include("includes/components/navbar.php");
    ?>

        <section id="head">
            <div class="ui container">
                <div class="middle">
                    <h1>My courses</h1><br>
                </div>
            </div>
        </section>
        <section id="myCourses">
        <div class="ui container">
            <div class="middle">
                    <div class="ui link cards" id="myCoursesCards">
                    </div>
            </div>
        </div>
        </section>

    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <!-- Easyhttp -->
    <script src="assets/js/classes/easyhttp.js"></script>
    <script>
        $('.ui.dropdown').dropdown();

        const http = new EasyHTTP();
        http.get("includes/handlers/fetch-my-courses.php").then(res => {
            res.forEach(function(r) {
                document.getElementById('myCoursesCards').innerHTML +=
                `<div class="link card">
                        <a class="image" href="lectures.php?id=${r['id']}">
                            <img src="assets/courses/${r['title']}/${r['title']}.jpg">
                        </a>
                        <div class="content">
                            <div class="header">${r['title']}</div>
                            <div class="meta">
                                <a>${r['category']}</a>
                            </div><br>
                            <div class="description">
                                <div class="ui small progress green" id="musicTheoryProgress">
                                    <div class="bar">
                                        <div class="progress" ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="extra content">
                                Continue Learning
                        </div>
                </div>`;
            });
        });
    </script>
</body>
</html>