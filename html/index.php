<?php
session_start();
//include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./images/1176favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<?php
include("profile.php");
?>
<!--website heading-->
<h1>Shop</h1>
<?php
include("nav.php");
if(isset($_GET['page']) === true){
   if(file_exists($_GET['page'] . '.html') === true) {
       include($_GET['page'] . '.html');

   } else {
       echo 'Page not found';
       exit;
    }
} else {
   include('index.html');
}
?>
<!--footer-->
<div class="footer">
    <p>Give us <a href="?page=feedback">Feedback</a>! | If you have any questions, feel free to <a href="?page=contact">contact</a>
        us!
        <br>
        <a href="?page=aboutUs">About us</a> | <a id="imprints" href="?page=imprint">Imprint</a>
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
            location.href = "./de/index.php";
        }
    </script>
</div>
</body>
</html>