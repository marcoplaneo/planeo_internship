<?php
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
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
<!--website heading-->
<h1>About Us</h1>
<?php
include("nav.php");
?>
<!--main part of the subsite-->
<h2>Why?</h2>
<p>
    A few years ago I wanted to buy a few things like a smartphone and a country.
    <br>
    But somehow you can not buy everything on one single website.
</p>
<h2>The Solution!</h2>
<p>
    So we came up with the idea of making our own website for you to buy everything on.
    <br>
    It may sound surreal and like a dream, but it's not. As long as it is a real thing you want, you can buy it here.
    <br>
    And the best part is: it does not need to be sold by someone. We're just going to sell it to you and afterward we
    will deliver it right to your door, if it is possible.
</p>
<h2>Let's go!</h2>
<p>
    So what are you waiting for and order your stuff now.
    <br>
    We are all set and ready to get your order.
</p>
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
            location.href = "./de/ueberUns.php";
        }
    </script>
</div>
</body>
</html>