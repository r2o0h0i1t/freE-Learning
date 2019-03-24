<?php
    require("includes/classes/Header.php");

    $header = new Header("Dashboard","dashboard.css");
    $header->output();
?>

<body>
    <?php
    include "includes/config.php";
    include "includes/components/navbar.php";

    // check if user is logged in
    if(!isset($_SESSION["userLoggedInName"])){
        header("Location: homepage.php");
    }
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

                <?php
                $username = $_SESSION['userLoggedInName'];
                $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
                $userId = mysqli_fetch_assoc($result)['id'];

                // Get all courses of current user
                $courseQuery = "SELECT * FROM enrolled WHERE userId = '$userId'";
                $courseResult = mysqli_query($con, $courseQuery);

                if (mysqli_num_rows($courseResult) == 0) {
                    echo "<h1>Congratulations for registering! Now Enroll in a course and start learning.</h1></br>";
                    echo "
                                            <div class='button'>
                                            <a class='ui primary button' id='view-courses-btn' href='" . ROOT_URL . "courses.php'>View Courses</a>
                                            </div>";
                } else {
                    // User has enrolled in some courses
                    while ($course = mysqli_fetch_assoc($courseResult)) {

                        // Get course id
                        $courseId = $course['courseId'];

                        // Get course details
                        $myCourseResult = mysqli_query($con, "SELECT * FROM course WHERE id = '$courseId'");
                        $myCourse = mysqli_fetch_assoc($myCourseResult);

                        echo "<div class='ui link cards' id='myCoursesCards'>" .
                            "<div class='link card'>
                                <a class='image' href='lectures.php?id=" . $myCourse['id'] . "'>
                                    <img src='assets/courses/" . $myCourse['title'] . "/" . $myCourse['title'] . ".jpg'>
                                </a>
                                <div class='content'>
                                    <div class='header'>" . $myCourse['title'] . "</div>
                                    <div class='meta'>
                                        <a>" . $myCourse['category'] . "</a>
                                    </div><br>
                                </div>
                                <div class='extra content'>
                                        Continue Learning
                                </div>
                        </div>
                        </div>";
                    }
                }
                ?>
            </div>
        </div>
    </section>



    <?php 
        require("includes/classes/FooterLinks.php");

        $footerLinks = new FooterLinks("");
        $footerLinks->output();
    ?>

</body>

</html>