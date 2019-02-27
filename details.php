<?php
include("includes/config.php");

// Get Course id from url
$id = $_GET['id'];

$query = "SELECT * FROM course WHERE id = '$id'";

$result = mysqli_query($con,$query);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title = course name -->
    <title><?php echo $row['title'] ?></title>

    <!-- Website icon -->
    <link rel="icon" href="assets/images/icon.png" />

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Nav.css -->
    <link rel="stylesheet" href="assets/css/nav.css">
    
    <!-- Coursesdetails.css -->
    <link rel="stylesheet" href="assets/css/course-details.css">
</head>

<body>
<!-- includes -->
<?php include('includes/components/navbar.php'); ?>
         
<div class="main">
        <div class="ui container">
            <div class="left">
                <div class="ui fluid styled accordion">
                    <div class="title">
                        <i class="dropdown icon"></i>
                        Requirements 
                    </div>
                    <div class="content">
                        <p class="transition hidden">
                            <ul>
                                <?php 
                                // Explode string to array with . as delimiter
                                    $arr = explode(".",$row['requirements']);
                                    for ($i=0; $i < sizeof($arr)-1; $i++) { 
                                        echo "<li>".$arr[$i]."</li>";
                                    }
                                ?>
                            </ul>
                        </p>
                    </div>
                    <div class="title">
                        <i class="dropdown icon"></i>
                        Description                   
                    </div>
                    <div class="content">
                        <p class="transition hidden">
                            <ul>
                            <?php
                                // Explode string to array with . as delimiter
                                $arr2 = explode(".",$row['description']);
                                for ($i=0; $i < sizeof($arr2)-1; $i++) { 
                                    echo "<li>".$arr2[$i]."</li>";
                                }
                            ?>
                            </ul>
                        </p>
                    </div>
                    <div class="title">
                        <i class="dropdown icon"></i>
                        Target audience
                    </div>
                    <div class="content">
                        <p class="transition hidden">
                            <ul>
                                <?php 
                                // Explode string to array with . as delimiter
                                    $arr3 = explode(".",$row['target']);
                                    for ($i=0; $i < sizeof($arr3)-1; $i++) { 
                                        echo "<li>".$arr3[$i]."</li>";
                                    }
                                ?>
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
    
            <aside>
                <h1 class="title"><?php echo $row['title'] ?></h1>

                <!-- Image -->
                <!-- Path of image -->
               <img src="assets/courses/<?php $path = $row['title'] .'//'.$row['title'].'.jpg'; echo $path;?>" alt="">
    
                <div class="ui vertical steps">
                    <div class="completed step">
                        <i class="truck icon"></i>
                        <div class="content">
                        <div class="title">Enrolments</div>
                        <div class="description">4000 enrolments</div>
                        </div>
                    </div>
                    <div class="completed step">
                        <i class="credit card icon"></i>
                        <div class="content">
                        <div class="title">Duration</div>
                        <div class="description">30 Hours</div>
                        </div>
                    </div>
                    <div class="completed step">
                        <i class="info icon"></i>
                        <div class="content">
                        <div class="title">Benefits</div>
                        <div class="description"><?php echo $row['benefit'] ?></div>
                        </div>
                    </div>
                    <div class="completed step">
                        <i class="truck icon"></i>
                        <div class="content">
                        <div class="title">Videos</div>
                        <div class="description"><?php echo $row['numofvideos'] ?></div>
                        </div>
                    </div>
                </div>
        
                <form action="includes/handlers/enroll-course.php" method="POST">

                <?php 
                    // check if user is already enrolled in course
                    if(isset($_SESSION['userLoggedInName'])){

                        $username = $_SESSION['userLoggedInName'];
                        $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
                        $userId = mysqli_fetch_assoc($result)['id'];
                        $courseId = $_GET['id'];

                        $q = "SELECT * FROM enrolled WHERE userId = '$userId' AND courseId = '$courseId'";
                        $result = mysqli_query($con,$q);

                        if(mysqli_num_rows($result) == 0 ){
                            // User is not enrolled
                            echo " <button class='positive ui button' type='submit' name='enrollBtn' value='". $id ."'>Enroll Now</button>";
                        }else {
                            echo " <button class='ui disabled button'>Enroll Now</button>";
                        }
                    }else{
                        echo" <button class='positive ui positive button' type='submit' name='enrollBtn' value='". $id ."'>Enroll Now</button>";
                    }
                ?>
                </form>
            </aside>
        </div>
        <div class="clearfix"></div>
    </div>
 
    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <script>
        $(".ui.dropdown").dropdown();
        $('.ui.accordion').accordion('open',1);
    </script>

</body>
</html>