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
    <script>
        var loginlogic = function() {
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
                    if (data === "not exists") {
                        $(".msgli").html("This user does not exist");
                    } else {
                        if (data === "wrong password") {
                            $(".msgli").html("Incorrect password");
                        } else if (data === "empty") {
                            $(".msgli").html("Username can not be empty");
                        } else if (data === "emptyp\n") {
                            $(".msgli").html("Password can not be empty");
                        } else {
                            $(".msgli").html("Success");
                            setTimeout(function () {
                                window.location.href = 'index.php';
                            }, 2000);
                        }
                    }
                },
                error: function () {
                    $(".msgli").html("Something went wrong!");
                }
            });
        }
        $(function () {
            $('#loginbutton').on('click', function () {
                loginlogic();
            });
            $(document).keypress(function(event) {
                if(event.which === 13) {
                    loginlogic();
                }
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