<!-- Login  -->
<div class="ui small modal" id="loginModal">
    <div class="content">
    
        <!-- Login form -->
        <div class="ui middle aligned center aligned grid">
            <div class="column">
                <h2 class="ui image header">
                    <div class="content">
                        Login to your account
                    </div>
                </h2>
                <form method="get" class="ui large form">
                    <div class="ui stacked secondary  segment">

                        <!-- Email address -->
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="user icon"></i>
                                <input type="text" name="email" placeholder="E-mail address" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="field">
                            <div class="ui left icon input">
                                <i class="lock icon"></i>
                                <input type="password" name="password" placeholder="Password" required>
                            </div>
                        </div>
                            <div class="ui fluid large teal submit button" type="submit">Login</div>
                    </div>

                    <div  class="ui error message"></div>

                </form>

                <div class="ui message">
                    Don't have an account? <a href="#" id="noAccount">&nbsp;Sign up</a>
                </div>
                    </div>
        </div>
    </div>
</div>
