<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Course</title>

    <!-- Website icon -->
    <link rel="icon" href="assets/images/icon.png" />

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Navbar -->
    <link rel="stylesheet" href="assets/css/nav.css">

    <style>
    .ui.container form {
        margin-top: 45px;
    }

    .hidden {
        display: none;
    }

    .ui.container #courseForm {
        margin-top: 5%;
    }

    i.notched.circle.loading.icon {
        color: #29c32f;
        display: none;
    }

    i.check.icon {
        color: #29c32f;
        display: none;
    }

    #progressBar {
        display: none;
    }
    </style>

</head>

<body>
    <?php
        // Navbar
        include("includes/config.php");
        include("includes/components/navbar.php");
    ?>

    <div class="ui container">
        <form class="ui form" id="upload-form">
            <div class="ui four fields">

                <!-- Course title -->
                <!-- First name -->
                <div class="field">
                    <label>Title</label>
                    <div class="ui icon input">
                        <input type="text" name="title" placeholder="Title" id="title-input" required>
                        <i class="notched circle loading icon"></i>
                        <i class="check icon"></i>
                    </div>
                </div>

                <!-- Course category -->
                <div class="field">
                    <label>Category</label>
                    <div class="ui selection dropdown">
                        <input type="hidden" name="category">
                        <i class="dropdown icon"></i>
                        <div class="default text">Category</div>
                        <div class="menu">
                            <div class="item" data-value="photography">Photography</div>
                            <div class="item" data-value="computer-science">Computer Science</div>
                            <div class="item" data-value="music">Music</div>
                            <div class="item" data-value="health-and-fitness">Health & Fitness</div>
                        </div>
                    </div>
                </div>

                <!-- Course teaser -->
                <div class="field">
                    <label>Teaser</label>
                    <input type="text" name="teaser" placeholder="Teaser" required>
                </div>

                <!-- Course benefit -->
                <div class="field">
                    <label>Benefit</label>
                    <input type="text" name="benefit" placeholder="Benefit" required>
                </div>

            </div>

            <div class="ui three fields">

                <!-- Course requirements -->
                <div class="field">
                    <label>Requirements</label>
                    <textarea name="requirements" cols="30" rows="15" placeholder="Requirements" required></textarea>
                </div>

                <!-- Course description -->
                <div class="field">
                    <label>Description</label>
                    <textarea name="description" cols="30" rows="15" placeholder="Description" required></textarea>
                </div>

                <!-- Course target audience -->
                <div class="field">
                    <label>Target</label>
                    <textarea name="target" cols="30" rows="15" placeholder="Target" required></textarea>
                </div>

            </div>

            <div class="fields">
                <!-- Course image -->
                <div class="field">
                    <label>Image</label>
                    <input type="file" name="image" required>
                </div>
                <!-- course videos -->
                <div class="field">
                    <label>Videos</label>
                    <input id="videos-upload" type="file" name="videos[]" multiple required>
                </div>

            </div>

            <!-- Progress -->
            <div class="ui small progress" id="progressBar">
                <div class="bar">
                    <div class="progress"></div>
                </div>
                <div class="label">Uploading Files</div>
            </div>

            <!-- Messages -->
            <div id="messages"></div><br>

            <button class="ui primary button fluid" type="submit" name="submit">Save</button>
        </form>
    </div>

    <!-- Semantic ui -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>


    <script src="assets/js/upload.js"></script>
    <script>
    $(".ui.dropdown").dropdown();
    </script>

</body>

</html>