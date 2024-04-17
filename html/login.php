<?php
include("db.php");
//assign input to variables, while filtering them for special characters
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
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
    <h5>Log In</h5>
    <div class="main">
        <form method="post">
            <br><br>
            <label>Username: <br><input type="text" id="loginusername" name="username" required></label>
            <br><br>
            <label>Password: <br><input type="password" id="loginpassword" name="password" required></label>
            <br><br>
            <button type="button" class="button" id="loginbutton" name="LogIn">Log In</button>
            <p class="msgli"></p>
        </form>
    </div>
    </body>
    </html>
    <script src="./jquery/jquery.js"></script>
    <script>
        $(function () {
            $('#loginbutton').on('click', function () {
                var username = $('#loginusername').val();
                var password = $('#loginpassword').val();

                $.ajax({
                    type: 'POST',
                    url: './check.php',
                    data: {
                        username: username,
                        password: password,
                        form: 'login',
                    },
                    success: function (data) {
                        if(data==="\nnot exists"){
                            $(".msgli").html("This user does not exist");
                        }
                        else {
                            if(data==="wrong password") {
                                $(".msgli").html("Incorrect password");
                            }
                            else if(data === "empty") {
                                $(".msgli").html("Username can not be empty");
                            }
                            else if(data === "emptyp") {
                                $(".msgli").html("Password can not be empty");
                            }
                            else {
                                $(".msgli").html("Success");
                                setTimeout(function () {
                                    window.location.href = 'index.php';
                                }, 3000);
                            }
                        }
                    },
                    error: function () {
                        $(".msgli").html("Something went wrong!");
                    }
                });
            });
        });
    </script>
<?php
//if Log In button is pressed
/*if (isset($_POST["LogIn"])) {
    //give feedback if information is missing
    if (empty($username)) {
        echo "<br> Please enter a username";
    } elseif (empty($password)) {
        echo "<br> Please enter a password";
    } else {
        //hash the password
        $hash = hash('sha256', $password);
        $sql = "SELECT * FROM user WHERE username = '$username'";
        //save data from sql result in variable
        $usernameresult = mysqli_query($con, $sql);
        //if variable is not empty
        if (mysqli_num_rows($usernameresult) > 0) {
            //assign variable objects to array
            $row = mysqli_fetch_assoc($usernameresult);
            //compare password from db and input
            if ($row["password"] != $hash) {
                echo "<br> Wrong password!";
            } //if passwords are the same, forward to homepage
            else {
                ?>
                <script type="text/javascript">
                    window.location.href = 'index.php';
                </script>
                <?php
                //assign session variables
                $_SESSION["username"] = "$username";
                $_SESSION["password"] = "$password";
                $_SESSION["status"] = "started";
            }
        } //if variable is empty
        else {
            echo "<br> This user does not exist!";
        }
    }
}*/
mysqli_close($con);
?>