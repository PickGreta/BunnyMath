<?php
    include("server.php");
    if(!isset($_SESSION['username'])) {
        $bejelentkezve = false;
    } else {
        $bejelentkezve = true;
    }
    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: logout.php');
    }
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

    <button id="night-mode" onclick="DarkMode()"><img src="./kepek/nm-icon.png" alt="night mode icon"></button>

    <?php if ($bejelentkezve) : ?>
        <div id="logout">
            <a href="index.php?logout='1'"><button id="logout-button" >Kijelentkezés</button></a>
        </div>
    <?php endif ?>

    <div id="welcome">
        <h1>Szia!</h1>
        <p>Ez egy szorzást gyakorló oldal. Egy kicsit mesélnék a használatáról!</p>
        <p>Szóval először kapsz 2 véletlenszerű számot, amiknek a szorzatát kell megadnod az üres mezőbe!
            Ha a válaszod helyes, az alul található pontszámod nő kettővel. 
            Törekedj a helyes válaszra!</p>
            <center><img src="./kepek/bunny-welcome.png" class="nyuszi" id="nyuszi" alt="nyuszi"></center>

            <?php if ($bejelentkezve) : ?>
                <center><p>Üdv, <?= $_SESSION['username'] ?>!</p></center>
                <button id="button-hide">Vágjunk bele!</button>
            <?php else: ?>
                <a href="login.php"><button id="button-hide">Bejelentkezés</button></a>
            <?php endif ?>

    <script>
        $(document).ready(function(){
            $("#button-hide").click(function(){
            $("#welcome").hide();
            $("div.quiz").show();
            });
        });
    </script>
    </div>

    <div class="quiz" style="display:none">
        <div id="leaderboard">
            <button id="leaderboard_b" onclick="leaderboardModal()"><img src="./kepek/trofea.png" alt=""></button>
        </div>
        <br>
        <br>
        <div>Mennyi</div>
        <div id="question"></div>
        <div>
            <input type="number" name="answer" id="answer">
        </div>
        <div class="next">
            <button id="button-next" onclick="quiz()">Tovább</button>
        </div>
        <div class="score-text">Pontszám:</div> 
        <div id="score">0</div>
    </div>

    <script src="alert.js" defer></script>
    <script src="index.js" defer></script>

</body>
</html>