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
    <body>
    <!--website heading-->
    <h5>Sign Up</h5>
    <div class="main">
        <form id="fupForm" method="post">
            <br><br>
            <label>First Name: <br><input type="text" id="firstname" name="firstname"></label>
            <br><br>
            <label>Username: <br><input type="text" id="signupusername" name="username" required></label>
            <br><br>
            <label>Password: <br><input type="password" id="signuppassword" name="password" required></label>
            <br><br>
            <button type="button" class="button" id="signupbutton" name="SignUp">Sign Up</button>
            <p class="msgsu"></p>
        </form>
    </div>
    </body>
    </html>
    <script>
        var signuplogic = function () {
            var firstname = $('#firstname').val();
            var username = $('#signupusername').val();
            var password = $('#signuppassword').val();

            $.ajax({
                type: 'POST',
                url: './check.php',
                data: {
                    firstname: firstname,
                    username: username,
                    password: password,
                    form: 'signup',
                },
                success: function (data) {
                    /*var dataResult = JSON.parse(data);
                    if(dataResult.statusCode==200){
                        alert("How to send?");
                    }
                    else if(dataResult.statusCode==201){
                        alert("Error!");
                    }*/

                    //Here has to be checked if the user already exists. If yes, throw error message. If no, show success message after adding the user.
                    //It is possible to add an 'empty' user. This has to be removed.

                    //Maybe create file in which the logic is done
                    //in this file return echo
                    //print the echo in this file
                    //and check what is returned. Based on that decide if modal should be closed.

                    if (data === "not exists") {
                        $(".msgsu").html("Success");
                        setTimeout(function () {
                            $("#signupmodal").hide();
                            $('#firstname').val("");
                            $('#signupusername').val("");
                            $('#signuppassword').val("");
                        }, 2000);
                    } else if (data === "empty") {
                        $(".msgsu").html("Username can not be empty");
                    } else if (data === "emptyp\nnot exists") {
                        $(".msgsu").html("Password can not be empty");
                    } else {
                        $(".msgsu").html("Username is already taken");
                    }
                },
                error: function () {
                    $(".msgsu").html("Something went wrong!");
                }
            });
        }
        $(function () {
            $('#signupbutton').on('click', function () {
                signuplogic();
            });
            $(document).keypress(function(event) {
                if(event.which == 13) {
                    signuplogic();
                }
            });
        });
    </script>
<?php
/*if ($_SERVER["REQUEST_METHOD"] == "POST"){
$hash = hash('sha256', $password);
$sql = "INSERT INTO user (firstname, username, password) VALUES ('$firstname', '$username', '$hash')";
if (mysqli_query($con, $sql)) {
    echo json_encode(array("statusCode" => 200));
}
else {
    echo json_encode(array("statusCode" => 201));
}}*/
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