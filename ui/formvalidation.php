<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    var_dump($_POST);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Form Validation</title>
        <meta charset="utf-8"/>
    </head>

    <body>
        <form method="post">
            <fieldset>
                <legend>Form Validation</legend>
                <div>
                    <label for="email">Email:</label>
                    <input id="email" type="email" name="email" required/>
                </div>
                <div>
                    <label for="url">Url:</label>
                    <input id="url" type="url" name="url"/>
                </div>
                <div>
                    <label for="number">Number:</label>
                    <input id="number" type="number" name="number"/>
                </div>
                <div>
                    <label for="post_code">Post Code:</label>
                    <input id="post_code" type="postcode" name="post_code" pattern="[0-9]{5}" title="Please enter a valid zipcode"/>
                </div>
            </fieldset>
            <button>Send</button>
        </form>
    </body>
</html>