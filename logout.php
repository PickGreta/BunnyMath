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

        <center><img src="./kepek/bunny-welcome.png" class="nyuszi" id="nyuszi" alt="nyuszi köszön"></center>

        <script>
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            var end =setInterval(function () {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    window.location.href = "index.php";
                    clearInterval(end);
                }
            }, 1000);
        }

        window.onload = function () {
            var fiveSeconds = 5,
                display = document.querySelector('#time');
            startTimer(fiveSeconds, display);
        };
    </script>

    <div>
        <center><span id="time"></span></center>
    </div>

    </div>

</body>