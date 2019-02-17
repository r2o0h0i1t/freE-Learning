<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>freE-Learning</title>

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Navbar -->
    <link rel="stylesheet" href="assets/css/nav.css">

    <!-- Login & register modal.css -->
    <link rel="stylesheet" href="assets/css/modals.css">

    <!-- Hero.css -->
    <link rel="stylesheet" href="assets/css/hero.css">

</head>
<body>
    <?php
        // Navbar
        include("includes/components/navbar.php");

        // Login Form
        include("includes/components/login-form.php");

        // Register form
        include("includes/components/register-form.php");

        // Hero area
        include("includes/components/hero-area.php");


    ?>

    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <!-- Typed.js -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>

    <!-- Modals -->
    <script src="assets/js/modals.js"></script>

    <!-- Easy http -->
    <script src="assets/js/classes/easyhttp.js"></script>

    <!-- Homepage -->
    <script src="assets/js/homepage.js"></script>

    <!-- Register form -->
    <script src="assets/js/register-handler.js"></script>

    <!-- Recaptia.js -->
    <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit'></script>
</body>
</html>