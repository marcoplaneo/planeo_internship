<div id="profile">
    <?php
    if (!empty($_SESSION["status"]) && $_SESSION["status"] == "started") {
        $username = $_SESSION["username"];
        if (is_file("./images/users/$username.jpg") || is_file("./images/users/$username.jpeg") || is_file("./images/users/$username.png")) {
            ?>
            <a id="profilepic"><img
                    src="./images/users/<?php
                    if (file_exists("./images/users/$username.png")) {
                        echo "$username.png";
                    } elseif (file_exists("./images/users/$username.jpg")) {
                        echo "$username.jpg";
                    } elseif (file_exists("./images/users/$username.jpeg")) {
                        echo "$username.jpeg";
                    } ?>"
                    alt="profile pic" style="width: 75px; height: 75px"></a>
            <?php
        } else {
            ?>
            <a id="profilepic"><img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png"
                    alt="default" style="width: 75px; height: 75px"></a>
            <?php
        }
    } else {
        ?>
        <a id="profilepic"><img
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png"
                alt="default" style="width: 75px; height: 75px"></a>
        <?php
    }
    if (!empty($_SESSION["status"]) && $_SESSION["status"] == "started") {
        ?>
        <style>
            #profilepic {
                visibility: visible;
            }
        </style>
        <?php
    } else {
        ?>
        <style>
            #profilepic {
                visibility: hidden;
            }
        </style>
        <?php
    }
    ?>
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