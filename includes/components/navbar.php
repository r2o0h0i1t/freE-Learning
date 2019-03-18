<!-- Navbar -->
<nav class="ui menu">
    <div class="ui container">

        <!-- Logo -->
        <div class="logo">
            <a href="<?php echo ROOT_URL ?>"><span id="subLogo">fre&nbsp;</span>E-Learning</a>
        </div>

        <!-- Courses dropdown -->
        <div class="ui pointing dropdown">
            <span class="text">Courses</span>
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="<?php echo ROOT_URL ?>courses.php#photography">Photography</a>
                <a class="item" href="<?php echo ROOT_URL ?>courses.php#cs">Computer Science</a>
                <a class="item" href="<?php echo ROOT_URL ?>courses.php#music">Music</a>
                <a class="item" href="<?php echo ROOT_URL ?>courses.php#health">Health & Fitness</a>
            </div>
        </div>

        <!-- Search field -->
        <div class="ui search">
            <div class="ui icon input">
                <input class="prompt" type="text" placeholder="Search for courses" id="searchField">
                <i class="search icon"></i>
            </div>
            <div class="results"></div>
        </div>

        <!-- User Space -->

        <?php 
            // Check if user is logged in
            if(!isset($_SESSION['userLoggedInName'])){
                
                // Display login button
                echo "<a class='ui basic grey button' id='loginBtn' href='login.php'>Log In</a>";
                
            }else{
                
                echo "<a class='ui basic button' href='upload.php' id='uploadBtn'>Upload</a>";
                //Display dropdown with options..
                echo
                "<div class='ui pointing dropdown' id='userDrop' tabindex='0'>
                    <div class='text'>
                        <img class='ui avatar image' src='assets/images/profilePictures/". $_SESSION['userLoggedInName'] .".jpg'>".
                        $_SESSION['userLoggedInName'].
                    "</div>
                    <i class='dropdown icon'></i>
                    <div class='menu' tabindex='-1'>
                        <span class='text' id='user'></span>
                        <a class='item' href='dashboard.php'>My Courses</a>
                        <a class='item' href='#'>Edit Profile</a>
                        <a class='item' href='includes/handlers/logout-handler.php'>Log out</a>
                    </div>
                </div>";
            }
        ?>
    </div>
</nav>