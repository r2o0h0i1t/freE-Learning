<?php
    require("includes/classes/Header.php");

    $header = new Header("Admin","adminpanel.css");
    $header->output();
?>

<body>
    <?php
    include "includes/config.php";
    include "includes/components/navbar.php";
    include "includes/classes/Course.php";

    // check if admin is logged in
        if(!isset($_SESSION["adminLoggedInName"])){
            header("Location: homepage.php");
        }

        if(isset($_GET["deleteid"])){

            $course = new Course($con);
            
            $courseIdToDelete = $_GET["deleteid"];
            
            $courseNameResult = mysqli_query($con,"SELECT title FROM course WHERE id = '$courseIdToDelete'");
            $courseName = mysqli_fetch_assoc($courseNameResult)["title"];

            $wasDeleted = $course->deleteCourseFromDatabase($courseIdToDelete,$courseName);
        
        if(!$wasDeleted){
            echo "Course not deleted";            
        }else{
            
            // Remove directory from xammp
            $course->deleteDirectoryWithFiles("assets/courses/".$courseName);
            
            header("Refresh:0; url=adminpanel.php");
        }
    }


    ?>
    <section id="adminpanel">
        <div class="ui container">
            <div class="ui divided items">
                <h2>All courses</h2>

                <?php 
                $coursesResult = mysqli_query($con,"SELECT * FROM course");
                
                if($coursesResult){
                    
                    while($course = mysqli_fetch_assoc($coursesResult)){
                        echo 
                        "<div class='item'>
                        <div class='ui grid'>
                        <div class='two wide column '>
                        <div class='ui tiny image'>
                        <img src='assets/courses/".$course["title"]."/" .$course["title"].".jpg' alt=''>
                        </div>
                        </div>
                        <div class='eight wide column '>
                        <h3>".$course["title"]."</h3>
                        
                        </div>
                        <div class='two wide column '>
                        <div class='button'>
                        <a class='ui primary button' href='". ROOT_URL ."details.php?id=".$course["id"]."'>View</a>
                        </div>
                        </div>
                        <div class='two wide column '>
                        <form action='adminpanel.php' method='GET'>
                        <button class='ui red button' type='submit' name='deleteid' value='". $course["id"] ."'>Delete</button>
                        </form>
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