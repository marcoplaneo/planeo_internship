<?php
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/1176favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
</head>
<body>
<?php
include("profile.php");
?>
<h1>Feedback</h1>
<?php
include("nav.php");
?>
<br><br>
<div class="main">
    <div class="required">
        Fields with a star(*) are required.
    </div>
    <br>
    <form>
        Name
        <br>
        <label><input type="text" id="name" name="Name" placeholder="Name"></label>
        <br><br>
        E-Mail*
        <br>
        <label><input type="email" id="mail" name="Mail" required placeholder="name@example.com"></label>
        <br><br>
        Feedback*
        <br>
        <label><textarea id="feedback" name="Feedback" class="form-feedback" required rows="20" cols="100"
                         placeholder="Your Feedback! (exp.: Cool website, but Darkmode could be improved)"></textarea></label>
    </form>
    <br><br>
    <button type="submit" class="button" name="Feedback">Send Feedback</button>
</div>
<!--footer-->
<div class="footer">
    <p>Give us <a href="feedback.php">Feedback</a>! | If you have any questions, feel free to <a href="contact.php">contact</a>
        us!
        <br>
        <a href="aboutUs.php">About us</a> | <a id="imprints" href="imprint.php">Imprint</a>
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
            location.href = "./de/feedback.php";
        }
    </script>
</div>
</body>
</html>