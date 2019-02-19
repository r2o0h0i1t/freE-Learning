<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>

    <!-- Website icon -->
    <link rel="icon" href="../assets/images/icon.png" />

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Nav.css -->
    <link rel="stylesheet" href="../assets/css/nav.css">

    <!-- Modals.css -->
    <link rel="stylesheet" href="../assets/css/modals.css">
    
    <!-- Courses.css -->
    <link rel="stylesheet" href="../assets/css/courses.css">
</head>

<body>
<!-- Navbar -->
<?php include('../includes/components/navbar.php'); ?>
<?php include('../includes/components/register-form.php'); ?>
<?php include('../includes/components/login-form.php'); ?>

          
    <!-- CS courses -->
    <section id="computer-science" class="courseSection">
        <div class="ui container">
            <div class="middle">
                <h1>Computer Science</h1>
                <div class="ui link cards" id="computer-science-cards">



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

                </div>
            </div>
        </div>
    </section>   
 
    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <script>
        $(".ui.dropdown").dropdown({});
    </script>

    <!-- Easyhttp -->
    <script src="../assets/js/classes/easyhttp.js"></script>

    <!-- Modals.js -->
    <script src="../assets/js/modals.js"></script>

    <!-- Register form -->
    <script src="../assets/js/register-handler.js"></script>

    <!-- Fetch course-->
    <script src="../assets/js/fetch-course.js"></script>

    <!-- Recaptia.js -->
    <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit'></script>

</body>
</html>