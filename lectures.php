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
    <link rel="stylesheet" href="assets/css/lectures.css">
</head>
<body>
    <?php 
        include("includes/config.php"); 
        include("includes/components/navbar.php");
    ?>

<div class="left">
    <!-- Course title -->
    <div class="title">
    <?php         
        $id = $_GET['id'];
        $qr = "SELECT title FROM course WHERE id = '$id'"; 
        $result = mysqli_query($con,$qr);
        $row = mysqli_fetch_assoc($result);

        echo "<h1 id='courseName'>". $row['title'] ."</h1>";
        ?>
    </div>



    <hr><br>
    <!-- video titles -->
    <div class="ui small divided vertical list">
        
        <?php 
            $id = $_GET['id'];
            $query = "SELECT * FROM videos WHERE courseId = '$id'";

            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($result)){
                echo "<a class='item'>".$row['videoTitle'] . "</a>";
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <!-- Easyhttp -->
    <script src="assets/js/classes/easyhttp.js"></script>
    <script>
        $('.ui.dropdown').dropdown();
        let links = document.querySelectorAll('a.item');

        links.forEach(link => {
            link.addEventListener('click', changeVideo)
        });

        function changeVideo(e) {
            let course = document.getElementById('courseName').textContent;
            let video = document.getElementById('video');
            video.setAttribute("src", `assets/courses/${course}/` + e.target.textContent + ".mp4")
        }
    </script>

</body>
</html>