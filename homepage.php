<?php
    require("includes/classes/Header.php");

    $header = new Header("freE-Learning","hero.css");
    $header->output();
?>

<body>

    <?php
        include "includes/config.php";
        include "includes/components/navbar.php";
    ?>

    <section id="heroArea">
        <div class="ui container">
            <div class="mainTitle">

                <!-- Website Motto -->
                <h1><span>Free</span>&nbsp; Education for Everyone</h1>

                <!-- Typing effect text -->
                <div class="subTitle">
                    <span>Learn &nbsp;</span>
                    <span id="type-string"></span>
                </div>

                <!-- View courses btn -->
                <div class="button">
                    <!-- Link to course.php -->
                    <a class="ui primary button" href="<?php echo ROOT_URL ?>courses.php">View Courses</a>
                </div>

            </div>
        </div>
    </section>

    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Semantic ui -->
    <script src="assets/js/semantic.min.js"></script>

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

    <script src="assets/js/search.js"></script>

</body>

</html>