<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>freE-Learning</title>

    <!-- Website icon -->
    <link rel="icon" href="assets/images/icon.png" />

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Navbar -->
    <link rel="stylesheet" href="assets/css/nav.css">

    <!-- Hero.css -->
    <link rel="stylesheet" href="assets/css/hero.css">

</head>

<body>
    <?php
        include("includes/config.php");
        include("includes/components/navbar.php");
    ?>

    <!-- Hero area -->
    <section id="heroArea">
        <div class="ui container">
            <div class="mainTitle">

                <h1><span>Free</span>&nbsp; Education for Everyone</h1>

                <!-- Typing effect text -->
                <div class="subTitle">
                    <span>Learn &nbsp;</span>
                    <span id="type-string"></span>
                </div>

                <!-- View courses btn -->
                <div class="button">
                    <a class="ui primary button" href="<?php echo ROOT_URL ?>courses.php">View Courses</a>
                </div>

            </div>
        </div>
    </section>

    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <!-- Typed.js -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>

    <!-- Hero area -->
    <script>
    var typed = new Typed('#type-string', {
        strings: [' <i>Anything.</i>', ' <i>Anytime.</i>', ' <i>Anywhere</i>.'],
        typeSpeed: 40,
        backSpeed: 15,
        smartBackspace: false, // this is a default
        loop: true,
        showCursor: false
    });

    $('.ui.dropdown').dropdown();
    </script>

</body>

</html>