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

                    <?php
                        $username = $_SESSION['userLoggedInName'];
                        $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
                        $userId = mysqli_fetch_assoc($result)['id'];

                        // Get all courses of current user
                        $courseQuery = "SELECT * FROM enrolled WHERE userId = '$userId'";
                        $result = mysqli_query($con,$courseQuery);

                        if(mysqli_num_rows($result) == 0){
                            echo "<h1>Congratulations for registering! Now Enroll in a course to get started</h1>";
                            echo "</br>";
                            echo "        
                            <div class='button'>
                                <a class='ui primary button' href='". ROOT_URL . "courses.php'>View Courses</a>
                            </div>";
                        }else {
                            while($row = mysqli_fetch_assoc($result)){

                                // Get course id
                                $courseId = $row['courseId'];

                                // Get course details
                                $result2 = mysqli_query($con, "SELECT * FROM course WHERE id = '$courseId'");
                                $course = mysqli_fetch_assoc($result2);

                                echo 
                                "<div class='link card'>
                                    <a class='image' href='lectures.php?id=".$course['id']."'>
                                        <img src='assets/courses/". $course['title'] ."/". $course['title'] .".jpg'>
                                    </a>
                                    <div class='content'>
                                        <div class='header'>". $course['title']. "</div>
                                        <div class='meta'>
                                            <a>". $course['category']. "</a>
                                        </div><br>
                                    </div>
                                    <div class='extra content'>
                                            Continue Learning
                                    </div>
                            </div>";
                            }
                        }
                        ?>
                    </div>
            </div>
        </div>
        </section>

    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <script>
        $('.ui.dropdown').dropdown();
    </script>
</body>
</html>