<?php
session_start();
$db_server = "mysql";
$db_user = "root";
$db_pass = "root";
$db_name = "internship";
$con = "";
try{
    $con = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
}
catch(mysqli_sql_exception $ex){
    echo"Could not connect to database <br>";
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
}
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Log In</title>
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
    <h1>Log In</h1>
    <!--navigation-->
    <div class="navbar">
        <div class="burger">
            <button class="dropbtn">
                <span class="material-symbols-outlined">menu</span>
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="burger-content">
                <a href="index.php">Home</a>
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
    <div class="main">
        <form method="post">
            <br><br>
            <label>Username: <br><input type="text" id="username" name="username"></label>
            <br><br>
            <label>Password: <br><input type="password" id="password" name="password"></label>
            <br><br>
            <input type="submit" class="button" name="LogIn" value="Log In">
            <br><br>
            Don't have an account? <a href="signup.php">Sign Up</a> here!
        </form>
    </div>
    <!--footer-->
    <div class="footer2">
        <p>Give us <a href="feedback.html">Feedback</a>! | If you have any questions, feel free to <a href="contact.html">contact</a> us!
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
<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($username))
    {
        echo"<br> Please enter a username";
    }
    elseif(empty($password))
    {
        echo"<br> Please enter a password";
    }
    else {
        $hash = hash('sha256', $password);
        $sql = "SELECT * FROM user WHERE username = '$username'"; //is an object
        try{
            mysqli_query($con, "SELECT * FROM user");
        }
        catch (mysqli_sql_exception $ex2){
            mysqli_query($con, "CREATE TABLE `internship`.`user` (`uid` INT NOT NULL AUTO_INCREMENT , `firstname` TEXT NOT NULL , `username` VARCHAR(50) NOT NULL , `password` CHAR(255) NOT NULL , PRIMARY KEY (`uid`), UNIQUE (`username`)) ENGINE = InnoDB;");
        }
        $usernameresult = mysqli_query($con, $sql);
        if(mysqli_num_rows($usernameresult) > 0){
            $row = mysqli_fetch_assoc($usernameresult);
            if($row["password"] != $hash){
                echo"<br> Wrong password!";
            }
            else{
            ?>
            <script type="text/javascript">
                window.location.href = 'index.php';
            </script>
            <?php
                $_SESSION["name"] = "$firstname";
                $_SESSION["username"] = "$username";
                $_SESSION["password"] = "$password";
                $_SESSION["status"] = "started";
            }
        }
        else{
            echo"<br> This user does not exist!";
        }
        // compare SELECT with input
        // if true login & redirect
        // else echo"This user does not exist!";
        // IDEA: Want to create this user?
    }
}
mysqli_close($con);
?>