<?php 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Forms</title>
    <meta charset="utf-8" />
</head>
<body>
    <form method="post">
        <div>
            <h4>Text: </h4>
            <input name="username" type="text" />
        </div>
        <div>
            <h4>TextArea: </h4>
            <textarea name="areatext"></textarea>
        </div>

        <div>
            <button>Send</button>
        </div>
    </form>
</body>
</html>