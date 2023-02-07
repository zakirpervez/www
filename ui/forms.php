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
            <h4>Password: </h4>
            <input name="password" type="password" />
        </div>
        <div>
            <h4>Tel: </h4>
            <input name="telphone" type="tel" />
        </div>
        <div>
            <h4>Url: </h4>
            <input name="url" type="url" />
        </div>
        <div>
            <h4>Date: </h4>
            <input name="date" type="date" />
        </div>
        <div>
            <h4>Time: </h4>
            <input type="time" name="time" />
        </div>
        <div>
            <h4>Week: </h4>
            <input type="week" name="week"/>
        </div>
        <div>
            <h4>Color: </h4>
            <input type="color" name="color"/>
        </div>
        <div>
            <h4>Email: </h4>
            <input type="email" name="email"/>
        </div>
        <div>
            <h4>Month: </h4>
            <input type="month" name="month"/>
        </div>
        <div>
            <h4>Range: </h4>
            <input type="range" name="range"/>
        </div>
        <div>
            <h4>Hidden: </h4>
            <input type="hidden" name="hidden"/>
        </div>
        <div>
            <h4>Number: </h4>
            <input type="number" />
        </div>
        <div>
            <h4>Search: </h4>
            <input type="search" name="search"/>
        </div>
        <div>
            <h4>DateTime Local: </h4>
            <input type="datatime-local" name="localdatetime"/>
        </div>
        <div>
            <button>Submit</button>
        </div>
    </form>
</body>
</html>