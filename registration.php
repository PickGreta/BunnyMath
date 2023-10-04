<?php
    include("server.php");
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BunnyMath</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <div id="welcome">

        <div>
            <form method="post" action="registration.php">
                <?php
                include("errors.php");
                ?>
                <div>
                    <label for="username">Felhasználónév: </label>
                    <input id="username" name="username" type="text" placeholder="Felhasználónév">
                </div>

                <div>
                    <button id="button-hide" type="submit" name="registration">Regisztráció</button>
                </div>
            </form>
        </div>

    </div>

</body>