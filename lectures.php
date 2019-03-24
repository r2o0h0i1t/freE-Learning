<?php
    require("includes/classes/Header.php");

    $header = new Header("Lectures","lectures.css");
    $header->output();
?>

<body>
    <?php 
        include("includes/config.php"); 
        include("includes/components/navbar.php");

        // check if user is logged in
        if(!isset($_SESSION["userLoggedInName"])){
            header("Location: homepage.php");
        }
    ?>

    <div class="left">
        <!-- Course title -->
        <div class="title">
            <?php       
                // Fetch course title  
                $courseId = $_GET['id'];
                $courseIdQuery = "SELECT title FROM course WHERE id = '$courseId'"; 
                $courseIdResult = mysqli_query($con,$courseIdQuery);
                $course = mysqli_fetch_assoc($courseIdResult);

                echo "<h1 id='courseName'>". $course['title'] ."</h1>";
             ?>
        </div>



        <hr><br>
        <!-- video titles -->
        <div class="ui small divided vertical list">

            <?php 
                // Fetch all videos titles
                $courseId = $_GET['id'];
                $videosQuery = "SELECT * FROM videos WHERE courseId = '$courseId'";

                $videosResult = mysqli_query($con,$videosQuery);
                while($video = mysqli_fetch_assoc($videosResult)){
                    echo "<a class='item'>".$video['videoTitle'] . "</a>";
                }
            ?>
        </div>

    </div>

    <!-- Video -->
    <div class="right">
        <video src="" controls id="video">

        </video>
    </div>

    <!-- Clear float -->
    <div class="clearfix">
    </div>

    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Semantic ui -->
    <script src="assets/js/semantic.min.js"></script>

    <script>
    $('.ui.dropdown').dropdown();


    let videoLinks = document.querySelectorAll('a.item');

    videoLinks.forEach(videoLink => {
        videoLink.addEventListener('click', changeVideo)
    });

    function changeVideo(e) {
        let courseName = document.getElementById('courseName').textContent;
        let videoPlayer = document.getElementById('video');
        let videoTitle = e.target.textContent;

        // Change source of video
        videoPlayer.setAttribute("src", `assets/courses/${courseName}/` + videoTitle + ".mp4")
    }
    </script>
    <script src="assets/js/search.js"></script>
</body>

</html>