<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Course</title>

    <!-- Website icon -->
    <link rel="icon" href="../assets/images/icon.png" />

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Navbar -->
    <link rel="stylesheet" href="../assets/css/nav.css">

</head>
<body>
    <?php
        // Navbar
        include("../includes/components/navbar.php");
    ?>

    <div class="ui container">
        <form class="ui form" id="courseForm">
            <div class="ui four fields">

                <!-- Course title -->
                <div class="field">
                    <input type="text" name="title" placeholder="Title">
                </div>

                <!-- Course category -->
                <div class="field">
                    <input type="text" name="category" placeholder="Category">
                </div>

                <!-- Course teaser -->
                <div class="field">
                    <input type="text" name="teaser" placeholder="Teaser">
                </div>

                <!-- Course benefit -->
                <div class="field">
                    <input type="text" name="benefit" placeholder="Benefit">
                </div>

            </div>

            <div class="ui three fields">

                <!-- Course requirements -->
                <div class="field">
                    <textarea id="requirements" cols="30" rows="15" placeholder="Requirements"></textarea>
                </div>

                <!-- Course description -->
                <div class="field">
                    <textarea id="description" cols="30" rows="15" placeholder="Description"></textarea>
                </div>

                <!-- Course target audience -->
                <div class="field">
                    <textarea id="target" cols="30" rows="15" placeholder="Target"></textarea>
                </div>

            </div>

            <div class="field">
                <input type="file" name="videos[]" multiple>
            </div>

            <button class="ui button" type="submit">Save</button>
        </form>
    </div>

    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>

    <!-- Easy http -->
    <script src="../assets/js/classes/easyhttp.js"></script>

    <!-- Course handler -->
    <script src="../assets/js/course-handler.js"></script>

</body>
</html>