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
            <select name="selectedcar">
                <optgroup label="First Choice">
                    <option>BMW</option>
                    <option>Ford</option>
                    <option selected>TATA</option>
                </optgroup>
                <optgroup label="Second Choice">
                    <option>Ferrari</option>
                    <option>Maruti</option>
                    <option>Kia</option>
                </optgroup>
            </select>
        </div>
        <div>
            <h3><label>Checkbox:</label> </h3>
            <input type="checkbox" name="orange" value="orange"/> Orange
            <input type="checkbox" name="white" value="white"/> White
            <input type="checkbox" name="green" value="green"/> Green
        </div>
        <div>
            <h3><label>Radio:</label> </h3>
            <input type="radio" name="color" /> Orange
            <input type="radio" name="color" /> White
            <input type="radio" name="color" /> Green
        </div>
        <div>
            <button>Send</button>
        </div>
    </form>
</body>
</html>