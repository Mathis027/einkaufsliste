<html>
<center><h3>Du hast dich erfolgreich registriert! Du wirst automatisch weitergeleitet.</h3>
    <script>
            function startTimer(duration, display) {
            var timer = duration, seconds;
            setInterval(function () {
            seconds = parseInt(timer % 60, 10);


            display.textContent = seconds;

            if (--timer < 0) {
            timer = duration;
            }
            }, 1000);

            }

            window.onload = function () {
            var fiveSeconds = 2,
            display = document.querySelector('#time');
            startTimer(fiveSeconds, display);
            return display;
            };
            setInterval(function () {
                window.location.href="index.php";
            }, 3000);
    </script>
    <body>
    <div>Weiterleitung in <span id="time">3</span> !</div>
    </body>