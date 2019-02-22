
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
                <span class="text" id="user"><?php echo $_SESSION['userLoggedInName']; ?></span>
                <i class="dropdown icon"></i>
                <div class="menu" tabindex="-1">
                    <a class="item" href="http://localhost/E-Learning-2/index.php">Log out</a>
                    <a class="item" href="#">Edit Profile</a>
                </div>
        </div>
    </div>
</nav>

