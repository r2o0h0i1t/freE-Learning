
<!-- Navbar -->
<nav class="ui menu">
    <div class="ui container">

        <!-- Logo -->
        <div class="logo">
            <a href="http://localhost/E-Learning-2/pages/dashboard.php"><span id="subLogo">fre&nbsp;</span>E-Learning</a>
        </div>

        <!-- Search field -->
        <form class="ui search icon input" id="searchForm" >
            <input class="prompt" type="text" placeholder="Search posts by sector" id="searchField">
            <i class="search icon" id="searchIcon"></i>
            <div class="results"></div>
        </form>
            
        <!-- User Space -->
        <div class="ui pointing dropdown" id="userDrop" tabindex="0">
                <!-- User image -->
                <div class="text">
                    <img class="ui avatar image" src="assets/images/profilePictures/<?php echo $_SESSION['userLoggedInName']; ?>.jpg">
                    <?php echo $_SESSION['userLoggedInName']; ?>
                </div>
                <i class="dropdown icon"></i>
                <div class="menu" tabindex="-1">
                    <span class="text" id="user"></span>
                    <a class="item" href="#">Log out</a>
                    <a class="item" href="#">Edit Profile</a>
                </div>
        </div>
    </div>
</nav>

