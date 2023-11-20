<?php
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team</title>
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
<h1>Our Team</h1>
<?php
include("nav.php");
?>
<!--main part of the website-->
<p>This is our team:</p>
<a id="founder">
    <figure><img
            src="./images/micha.png"
            alt="Micha" id="founderpic" style="width: 150px; height: 150px">
        <figcaption id="Micha">Micha, our founder</figcaption>
    </figure>
</a>
<a id="co-founder">
    <figure><img
            src="./images/marco.png"
            alt="Marco" id="co-founderpic" style="width: 150px; height: 150px">
        <figcaption id="Marco">Marco, our co-founder</figcaption>
    </figure>
</a>
<a id="marketing">
    <figure>
        <img
                src="./images/aaron.png"
                alt="Aaron" id="marketingpic" style="width: 150px; height: 150px">
        <figcaption id="Aaron">Aaron, our marketing head</figcaption>
    </figure>
</a>
<!--footer-->
<div class="footer2">
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
            location.href = "./de/team.php";
        }
    </script>
</div>
</body>
</html>
