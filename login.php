<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Website icon -->
    <link rel="icon" href="assets/images/icon.png" />

    <!-- Semantic ui -->
    <link rel="stylesheet" href="assets/css/semantic.min.css" />

    <!-- Navbar -->
    <link rel="stylesheet" href="assets/css/nav.css">

    <!-- Login -->
    <link rel="stylesheet" href="assets/css/logins.css">

</head>

<body>
    <?php

        include("includes/config.php");
        include("includes/components/navbar.php");
        include("includes/classes/Constants.php");
        include("includes/classes/Account.php");
        include("includes/classes/Messages.php");
        
        if(isset($_POST['loginBtn'])){

            $username = $_POST['username'];
            $password =  $_POST['password'];

            $account = new Account($con);

            if(!isset($_POST["administrator"])){

                if(!$account->validateUserLogin($username,$password)){
                    // Display error message
                    Messages::setMsg($account->getErrors()[0],"error");
                }else{
                    $_SESSION['userLoggedInName'] = $username;
                    
                    // Go to dashboard
                    header("Location: dashboard.php");
                }
                
            }else{
                if(!$account->validateAdminLogin($username,$password)){
                    // Display error message
                    Messages::setMsg($account->getErrors()[0],"error");
                }else{
                    $_SESSION['adminLoggedInName'] = $username;
                    
                    // Go to dashboard
                    header("Location: adminpanel.php");
                }
            }
        }
    ?>

    <section id="login">

        <h2>Log in into your account</h2>

        <div class="ui card">

            <div class="content">

                <form method="POST" class="ui form" action="login.php">

                    <!-- Username -->
                    <div class="field">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>

                    <!-- Password -->
                    <div class="field">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>

                    <!-- Admin checkbox -->
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="administrator">
                            <label>Administrator</label>
                        </div>
                    </div>

                    <!-- Message -->
                    <?php echo Messages::display(); ?>

                    <!-- Submit btn -->
                    <button class="ui large button" type="submit" name="loginBtn">Login</button>

                </form>


                <div class="bottom">
                    Don't have an account? <a href="register.php">&nbsp;Sign up</a>
                </div>

            </div>

    </section>
    <script src="assets/js/search.js"></script>
</body>

</html>