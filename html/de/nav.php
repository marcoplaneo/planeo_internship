<!--navigation-->
<div class="navbar">
    <div class="burger">
        <button class="dropbtn">
            <span class="material-symbols-outlined">menu</span>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="burger-content">
            <a href="index.php">Home</a>
            <a href="anfahrt.php">Anfahrt</a>
            <a href="team.php">Team</a>
            <div class="tools">
                <button class="dropdwn">Tools
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="tools-content">
                    <a href="tools.php">Tools</a>
                </div>
            </div>
            <div class="help">
                <button class="dropdwn">Hilfe
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="help-content">
                    <a href="hilfe.php">Hilfe</a>
                    <a href="impressum.php">Impressum</a>
                    <a href="feedback.php">Feedback</a>
                    <a href="kontakt.php">Kontakt</a>
                </div>
            </div>
            <?php
            if (!empty($_SESSION["status"])) {
                if ($_SESSION["status"] == "started") {
                    ?>
                    <a href="einstellungen.php">Einstellungen</a>
                    <style>
                        .help-content {
                            width: 17.65%;
                        }

                        .tools-content {
                            width: 17.7%;
                        }

                        @media screen and (min-width: 1000px) {
                            .burger-content {
                                width: 60%;
                            }
                        }
                    </style>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="account">
        <!--<button type="submit" class="navbutton" name="SignUp">Sign Up</button>
        <button type="submit" class="navbutton" name="LogIn">Log In</button>-->
        <form method="post">
            <?php
            if (isset($_POST["LogOut"])) {
                $_SESSION["status"] = "stopped";
                session_destroy();
                ?>
                <script type="text/javascript">
                    window.location.href = 'index.php';
                </script>
                <?php
            }
            if (empty($_SESSION["status"]) || $_SESSION["status"] == "stopped") {
                ?>
                <!-- Trigger/Open The Modal -->
                <button type="button" class="navbutton" id="signup">Registrieren</button>
                <button type="button" class="navbutton" id="login">Einloggen</button>

                <!-- The Modal -->
                <div id="signupmodal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="closesignup">&times;</span>
                        <?php
                        include("signup.php");
                        ?>
                    </div>

                </div>

                <div id="loginmodal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="closelogin">&times;</span>
                        <?php
                        include("login.php");
                        ?>
                    </div>

                </div>

                <script>
                    // Get the modal
                    var signupmodal = document.getElementById("signupmodal");
                    var loginmodal = document.getElementById("loginmodal");

                    // Get the button that opens the modal
                    var signup = document.getElementById("signup");
                    var login = document.getElementById("login");

                    // Get the <span> element that closes the modal
                    var spansignup = document.getElementsByClassName("closesignup")[0];
                    var spanlogin = document.getElementsByClassName("closelogin")[0];

                    // When the user clicks the button, open the modal
                    signup.onclick = function () {
                        signupmodal.style.display = "block";
                    }

                    login.onclick = function () {
                        loginmodal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    spansignup.onclick = function () {
                        signupmodal.style.display = "none";
                    }

                    spanlogin.onclick = function () {
                        loginmodal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function (event) {
                        if (event.target == signupmodal) {
                            signupmodal.style.display = "none";
                        } else if (event.target == loginmodal) {
                            loginmodal.style.display = "none";
                        }
                    }
                </script>
            <?php
            } elseif ($_SESSION["status"] == "started") {
            ?>
            <input type="submit" class="navbutton" name="LogOut" value="Ausloggen">
                <?php
            }
            ?>
            <!--<?php
            /*if (isset($_POST["LogOut"])) {
                $_SESSION["status"] = "stopped";
                session_destroy();
            }
            if (empty($_SESSION["status"]) || $_SESSION["status"] == "stopped") {
                ?>
                <input type="submit" class="navbutton" name="SignUp" value="Sign Up" formaction="signup.php"
                       formmethod="get">
                <input type="submit" class="navbutton" name="LogIn" value="Log In" formaction="login.php"
                       formmethod="get">
                <?php
            } elseif ($_SESSION["status"] == "started") {
                ?>
                <input type="submit" class="navbutton" name="LogOut" value="Log Out">
                <?php
            }*/
            ?>-->
        </form>
    </div>
</div>
<!--language switch button-->
<div class="lang">
    <button id="language" class="dropbtn">
        <span class="material-symbols-outlined">
            language
        </span>
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="lang-content">
        <a onclick="changeLanguage('en')">Englisch</a>
        <a onclick="changeLanguage('de')">Deutsch</a>
    </div>
</div>