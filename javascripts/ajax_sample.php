<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
<h1>Ajax Example</h1>
<p>Time is <time id="current_time"><?= date('g:i:s'); ?></time></p>
<button id="refresh_button">Refresh</button>

<script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>

<script>
    $('#refresh_button').on("click", function () {
        $.ajax('get_time.php')
            .done(function (data) {
                $('#current_time').html(data);
            });
    })
</script>
</body>
</html>