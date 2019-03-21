<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>

    <!-- Website icon -->
    <link rel="icon" href="assets/images/icon.png" />

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Nav.css -->
    <link rel="stylesheet" href="assets/css/nav.css">

    <!-- Courses.css -->
    <link rel="stylesheet" href="assets/css/courses.css">
</head>

<body>

    <?php
include 'includes/config.php';
include 'includes/components/navbar.php';

function fetchCourse($category)
{
    $query = "SELECT * FROM course WHERE category = '$category'";

    $result = mysqli_query($GLOBALS['con'], $query);

    $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (sizeof($courses) > 0) {

        $courseOutput = "";

        foreach ($courses as $row) {

            // Card template
            $courseOutput .= "
                <div class='ui link card'>
                <a class='image' href='details.php?id=" . $row['id'] . "'>
                <img  src='assets/courses/" . $row['title'] . "/" . $row['title'] . ".jpg'>
                </a>
                <div class='content'>
                <div class='header'>" . $row['title'] . "</div>
                <div class='meta'>
                <a>" . $row['category'] . "</a>
                </div>
                <div class='description'>" .
                $row['teaser'] . "
                        </div>
                        </div>
                <div class='extra content'>" .
                $row['numofvideos'] . " videos
                </div>
                </div>";
        }
        ;
        echo $courseOutput;
    }
}
?>

    <!-- CS courses -->
    <section id="computer-science" class="courseSection">
        <div class="ui container">
            <div class="middle">
                <h1>Computer Science</h1>
                <div class="ui link cards" id="computer-science-cards">
                    <?php
fetchCourse('computer-science');
?>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- Photography courses -->
    <section id="photography" class="courseSection">
        <div class="ui container">
            <div class="middle">
                <h1>Photography</h1>
                <div class="ui link cards" id="photography-cards">
                    <?php
fetchCourse('photography');
?>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- Music courses -->
    <section id="music" class="courseSection">
        <div class="ui container">
            <div class="middle">
                <h1>Music</h1>
                <div class="ui link cards" id="music-cards">
                    <?php
fetchCourse('music');
?>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!-- Health & fitness courses -->
    <section id="health" class="courseSection">
        <div class="ui container">
            <div class="middle">
                <h1>Health & Fitness</h1>
                <div class="ui link cards" id="health-and-fitness-cards">
                    <?php
fetchCourse('health-and-fitness');
?>
                </div>
            </div>
        </div>
    </section>

    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <script>
    $(".ui.dropdown").dropdown();
    </script>

</body>

</html>