<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/images/1176favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
</head>
<body>
<div id="profile">
    <a id="profilepic" href="profile.html"><img
                src="https://pyxis.nymag.com/v1/imgs/5d4/f6e/c6aeaba039ba41d69a9dbce8c3523ec471-11-gollum.rsquare.w700.jpg"
                alt="Gollum" style="width: 75px; height: 75px"></a>
</div>
<div class="dm">
    <button id="darkmode" class="button" onclick="darkMode()">
            <span class="material-symbols-outlined">
                radio_button_partial
            </span>
    </button>
    <script>
        function darkMode() {
            let element = document.body;
            element.classList.toggle("dark-mode");
        }
    </script>
</div>
<!--website heading-->
<h1>Shop</h1>
<!--navigation-->
<div class="navbar">
    <div class="burger">
        <button class="dropbtn">
            <span class="material-symbols-outlined">menu</span>
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="burger-content">
            <a href="index.html">Home</a>
            <a href="location.html">Location</a>
            <a href="team.html">Team</a>
            <div class="tools">
                <button class="dropdwn">Tools
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="tools-content">
                    <a href="shop.html">Tools</a>
                </div>
            </div>
            <div class="help">
                <button class="dropdwn">Help
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="help-content">
                    <a href="help.html">Help</a>
                    <a href="imprint.html">Imprint</a>
                    <a href="feedback.html">Feedback</a>
                    <a href="contact.html">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <div class="account">
        <!--<button type="submit" class="navbutton" name="SignUp">Sign Up</button>
        <button type="submit" class="navbutton" name="LogIn">Log In</button>-->
        <form method="post">
            <!-- Trigger/Open The Modal -->
            <button type="button" class="navbutton" id="signup">Sign Up</button>
            <button type="button" class="navbutton" id="login">Log In</button>

            <!-- The Modal -->
            <div id="signupmodal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="closesignup">&times;</span>
                    <p>Some text in the Modal..</p>
                </div>

            </div>

            <div id="loginmodal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="closelogin">&times;</span>
                    <p>Some text in the Modal..</p>
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
        <a onclick="changeLanguage('en')">English</a>
        <a onclick="changeLanguage('de')">German</a>
    </div>
</div>
<!--right side of the website-->
<div class="opening">
    <table>
        <caption><h2>Opening times</h2></caption>
        <tbody>
        <tr>
            <th>Day</th>
            <th>Opening time</th>
        </tr>
        <tr>
            <td>Monday</td>
            <td style="float: right">7am - 9pm</td>
        </tr>
        <tr>
            <td>Tuesday</td>
            <td style="float: right">7am - 9pm</td>
        </tr>
        <tr>
            <td>Wednesday</td>
            <td style="float: right">7am - 9pm</td>
        </tr>
        <tr>
            <td>Thursday</td>
            <td style="float: right">7am - 9pm</td>
        </tr>
        <tr>
            <td>Friday</td>
            <td style="float: right">7am - 9pm</td>
        </tr>
        <tr>
            <td>Saturday</td>
            <td style="float: right">2pm - 5pm</td>
        </tr>
        <tr>
            <td>Sunday</td>
            <td style="float: right">closed</td>
        </tr>
        </tbody>
    </table>
</div>
<!--main part of the website-->
<div class="core">
    <h2 id="info">General information</h2>
    <br>
    <p>
        <?php
        if (!empty($_SESSION["status"])) {
            if ($_SESSION["status"] == "started") {
                $user = $_SESSION["username"];
                ?><strong><?php echo "Hello {$user},"; ?></strong><?php
            }
        }
        ?>
    </p>
    <p id="mainpart">On this website you can shop what you like.</p>
    <p>There will be at least one time in our lives when we receive a present of someone does something that we are
        meant to be grateful for. (If no-one has ever given you a gift or done something nice for you then you must
        either smell real bad or you look like this.) See image aside.

        Most of us normal people accept these gifts and move on with our lives, but amoung them are a few who possess a
        sad incapability to do so. These people instead choose to write "Thank You" Letters...

        WHY!??!?!? What is the reasoning behind that?!

        Let's face it, the likely-hood is that the "thoughtful" gift is a mismatched scarf or an over-sized jumper
        knitted by a lonely aunt who everyone dreads going to see because she has since lost control over her bowel
        movements and her house reeks of cat litter (although, no cat.. strangely). And most meaningful gestures will
        generally inconvenience our lives more than they better them. So what do people do about it?


        They go and write a long-winded "Thank You" Letter!</p>
    <h3>The First "Thank You" Letter</h3>
    <br>
    <p id="finding">You can find anything here, from clothes to houses. Everything you could want, we have it.</p>
    <p>The first ever "Thank You" Letter takes us way back to times of cavemen. Written by a disgruntled divorce-ee to
        her ex-husband. The original carving is shown below.
        This roughly translates as "Dear Tosser, Thanks for the rock". Fortunately the woman was trampled on by a
        mammoth a few days later, however by this time the message had been received and the FOOLISH tradition of "Thank
        You" Letters had begun. Since then letters have become more and more sophisticated and more unnecessary twaddle
        is often added to bulk out these letters and make them more appetising to the expectant reader. The development
        of "Thank You" Letters is something that should have been stopped a long time ago and now only drastic action
        may put an end to it (See "People Who Write "Thank You" Letters")
    </p>
    <h3>The Defacing of "Thank You" Letters</h3>
    <p>Some FOOLISH people argue that "Thank You" Letters are necessary as they show they are grateful for the gift they
        have received and in a small way returns the favour...

        B*LLOCKS Nobody cares! The only reason for "Thank You" Letters is to make old people feel a little less lonely,
        and take up some of their time.

        I wouldn't mind so much if this was kept within a small clan who simply write to each other but the problem is
        the practice has spread and now innocent people (such as myself) are being forced against our will to write
        these letters of lies and deception that ensure only that we get the same crappy presents the next year. I see
        encouragement to send a "Thank You" Letter as a minor crime and enforcement upon children to write one as abuse.
    </p>
    <h3>People Who Write "Thank You" Letters</h3>
    <p>
        I find it hard to talk about these people, such is the digust I feel for them. However if we want to put a stop
        to this insane tradition it is absolutely necessary to kidnap all those who write thank you letters and force
        them to consume every letter they have ever written. In extreme cases they and their houses may be stripped of
        all writing materials (e.g pens, paper) and all fingers on their writing hand, broken.

        Once this is done we can all finally sleep peacefully, in the knowledge that "Thank You" Letters are simply a
        FOOLISH mistake in the past of the human race.
    </p>
    <h3>
        Example's of "Thank You" Letters
    </h3>
    <p>
        DEAR ________
        <br>
        Cheers
        <br>
        LOVE FROM *insert name here*
        <br>
        <br>
        Note: this style is generally adopted by children with extended family who cannot be f*cked to write out every
        tiny piece of sh*t they received for their birthday to every b*stard that sent the piece of sh*t, so the reader
        is expected to fill in their name on arrival.
        <br>
        A relative of the thank you letter - The Annual Christmas Letter.
        Always written by mothers to other mothers each trying to boast more than the other about their and most
        importantly, their offsprings' achievements. For example:
        <br>
        <br>
        Dear Naomi,
        <br>
        This year has been a thoroughly successful one for the Johnstones. In January, Trevor got promoted from peasant
        crusher to hobo executioner, this means half the work, twice the pay and besides killing all those nasty hobos
        that sponge of the rest of society (he gets a bonus of £3,000,000,000 per annum as well). Zara finished Eton
        (all A*s) and also managed to give up that nasty coke habit. Horrington inherited another Earlship. I bought two
        yachts, a New York apartment (for shopping reasons of course, I can't stand that ghastly city), and 10 horses
        this year (the horses are just a hobby, you understand). Sarah's boyfriend got the MPship, as you've probably
        heard.
        <br>
        Oh and do tell us about your year
        <br>
        Lots of love,Heather.
        <br>
        PS: I also got voted No.12 in FHM's 50 over 50: sexiest women
        <br>
        <br>
        The mother on the receiving end will have a constant hope that this is followed some time later by one saying:
        <br>
        <br>
        Dear Naomi,
        <br>
        Not so good this year, Trevor in prison for BIGGEST FRAUD IN HISTORY house burnt down, Zara on the game and
        Sarah's boyfriend assassinated. Can't talk now; in court in half an hour.
        <br>
        From Heather.
        <br>
        <br>
        NB: This rarely happens...
    </p>
</div>
<!--footer-->
<div class="footer">
    <p>Give us <a href="feedback.html">Feedback</a>! | If you have any questions, feel free to <a href="contact.html">contact</a>
        us!
        <br>
        <a href="aboutUs.html">About us</a> | <a id="imprints" href="imprint.html">Imprint</a>
        <br>
        <span id="datetime"></span></p>
    <script>
        const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const day = ["", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
        const dt = new Date();
        document.getElementById("datetime").innerHTML = day[dt.getDay()] + " " + (("0" + (dt.getDate())).slice(-2)) + "." + month[dt.getMonth()] + "." + (("0" + (dt.getFullYear())).slice(-4));
    </script>
    <script>
        function changeLanguage(lang) {
            location.hash = lang;
            location.href = "/./de/index.html";
        }
    </script>
</div>
</body>
</html>