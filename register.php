<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Website icon -->
    <link rel="icon" href="assets/images/icon.png" />

    <!-- Semantic ui cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css" />

    <!-- Navbar -->
    <link rel="stylesheet" href="assets/css/nav.css">

    <!-- Register -->
    <link rel="stylesheet" href="assets/css/logins.css">

</head>
<body>
    <?php

        include("includes/handlers/register-handler.php");
        include("includes/components/navbar.php");
        

        // Auto fill values if errors
        function set($value){
            if(isset($_POST[$value])){
                echo $_POST[$value];
            }
        }

    ?>

    <section id="register">
            
        <div class="right">

            <h2>Create a new account</h2>
            
            <div class="ui card">
                
                <div class="content">
                    
                    <form class="ui large form" method="POST" action="register.php" enctype="multipart/form-data">
                        
                            <div class="two fields">
                                
                                <!-- First name -->
                                <div class="field">
                                    <label>First Name</label>
                                    <input type="text" name="fname" placeholder="Full Name" id="fname" value="<?php set("fname"); ?>" required >
                                </div>

                                <!-- Last name -->
                                <div class="field">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" placeholder="Last name" id="lname" value="<?php set("lname"); ?>" required >
                                </div>
                                
                            </div>

                            <div class="two fields">
                                
                                <!-- Username -->
                                <div class="field">
                                    <label>Username</label>
                                    <input type="text" name="username" placeholder="Username" id="username" value="<?php set("username"); ?>" required >
                                </div>
                                
                                <!-- Email address -->
                                <div class="field">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="E-mail address" id="email" value="<?php set("email"); ?>" required >
                                </div>
                                
                            </div>
                            
                            <div class="two fields">
                                
                                <!-- Password -->
                                <div class="field">
                                    <label>Password</label>
                                    <input type="password" name="pwd" id="pwd" placeholder="Password" value="<?php set("pwd"); ?>" required>
                                </div>
                                
                                <!-- Confirm password -->
                                <div class="field">
                                    <label>Confirm Password</label>
                                    <input type="password" name="pwd2" id="pwd2" placeholder="Confirm password" value="<?php set("pwd2"); ?>" required>
                                </div>

                            </div>

                            <div class="two fields">
                                
                                <!-- Image input -->
                                <div class="field">
                                    <div class="ui field">
                                        <label>Upload Profile Picture</label>
                                        <input type="file" id="img" name="img" required>
                                    </div>
                                </div>
                                
                                <!-- Recaptcha -->
                                <div class="field">
                                    <div id="recaptcha" name="recaptcha"></div>
                                    <div class="g-recaptcha" data-sitekey="6LeKFY4UAAAAAK_wO_RC5UvJpq2xIYi3kQ7unzkx"></div>
                                </div>
                            </div>

                            <!-- Message -->
                            <?php echo Messages::display(); ?>

                            <!-- Submit  -->
                            <button class="ui fluid large submit button green" type="submit" name="registerBtn">Sign up</button>
                            
                    </form>
                    
                    <div class="bottom">
                        Already have an account? <a href="login.php">&nbsp;Log In</a>
                    </div>
                    
                </div>

            </div>
        
        </div>
        
    </section>

    <!-- Recaptia.js -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

</body>
</html>