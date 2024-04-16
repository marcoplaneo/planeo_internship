<?php
include("db.php");
//assign input to variables, while filtering them for special characters
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        <title>Sign Up</title>
        <link href="css/style.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="/images/1176favicon.ico">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    </head>
    <body>
    <!--website heading-->
    <h5>Sign Up</h5>
    <div class="main">
        <form id="fupForm" method="post">
            <br><br>
            <label>First Name: <br><input type="text" id="firstname" name="firstname"></label>
            <br><br>
            <label>Username: <br><input type="text" id="username" name="username" required></label>
            <br><br>
            <label>Password: <br><input type="password" id="password" name="password" required></label>
            <br><br>
            <button type="button" class="button" id="signupbutton" name="SignUp">Sign Up</button>
            <p class="msg"></p>
        </form>
    </div>
    </body>
    </html>
    <script src="./jquery/jquery.js"></script>
    <script>
        $(function () {
            $('#signupbutton').on('click', function () {
                var firstname = $('#firstname').val();
                var username = $('#username').val();
                var password = $('#password').val();

                $.ajax({
                    type: 'POST',
                    data: {
                        firstname: firstname,
                        username: username,
                        password: password,
                    },
                    success: function () {
                        /*var dataResult = JSON.parse(data);
                        if(dataResult.statusCode==200){
                            alert("How to send?");
                        }
                        else if(dataResult.statusCode==201){
                            alert("Error!");
                        }*/

                        //Here has to be checked if the user already exists. If yes, throw error message. If no, show success message after adding the user.
                        //It is possible to add an 'empty' user. This has to be removed.

                        $(".msg").html("Success");
                        setTimeout(function(){
                            $("#signupmodal").hide()
                        }, 3000);
                    },
                    error: function () {
                        $(".msg").html("Something went wrong!");
                    }
                });
            });
        });
    </script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$hash = hash('sha256', $password);
$sql = "INSERT INTO user (firstname, username, password) VALUES ('$firstname', '$username', '$hash')";
if (mysqli_query($con, $sql)) {
    echo json_encode(array("statusCode" => 200));
}
else {
    echo json_encode(array("statusCode" => 201));
}}
//if Sign Up button is pressed
/*if (isset($_POST["SignUp"])) {
    //if necessary fields are filled
    if (!empty($username) && !empty($password)) {
        //hash the password
        $hash = hash('sha256', $password);
        $sql = "INSERT INTO user (firstname, username, password) VALUES ('$firstname', '$username', '$hash')";
        //try to create new account
        try {
            mysqli_query($con, $sql);
            echo "Account created successfully";
            $_ENV["signUpSuccess"] = "success";
        } //if it fails username is taken
        catch (mysqli_sql_exception $ex1) {
            echo "<br> That username is already taken";
            $_ENV["signUpSuccess"] = "failed";
        }
    }
}*/
mysqli_close($con);
?>