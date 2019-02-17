<!-- Sign up -->
<div class="ui small modal" id="registerModal">
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui image header">
                <div class="content">
                    Create an account
                </div>
            </h2>
            <form class="ui large form" id="registerForm">
                <div class="ui stacked secondary  segment">
                    <div class="two fields">
                        <!-- First name -->
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="fname" placeholder="Full name" id="fname" required>
                            </div>
                        </div>
                        <!-- Last name -->
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="lname" placeholder="Last name" id="lname" required>
                            </div>
                        </div>
                    </div>

                    <div class="two fields">
                        <!-- Username -->
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="username" placeholder="Username" id="username" required>
                            </div>
                        </div>

                        <!-- Email address -->
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="envelope outline icon"></i>
                                <input type="email" name="email" placeholder="E-mail address" id="email" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="two fields">
                        <!-- Password -->
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="pwd" id="pwd" placeholder="Password" required>
                            </div>
                        </div>

                        <!-- Confirm password -->
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="pwd2" id="pwd2" placeholder="Confirm password" required>
                            </div>
                        </div>
                    </div>

                    <div class="two fields">
                        <!-- Image input -->
                        <div class="field">
                            <div class="ui field">
                                <input type="file" id="img" name="img" required>
                            </div>
                        </div>

                        <!-- Recaptcha -->
                        <div class="field">
                            <div id="recaptcha"></div>
                        </div>
                    </div>

                    <!-- Submit  -->
                    <button class="ui fluid large teal submit button green" type="submit">Sign up</button>
                    
                    <!-- Message area -->
                    <div id="msgError" class="ui message red hidden"></div>
                    <div id="msgSuccess" class="ui message blue hidden"></div>
                </div>


            </form>

            <div class="ui message">
                Already have an account? <a href="#" id="alreadyLogIn">&nbsp;Log in</a>
            </div>
        </div>
    </div>
</div>