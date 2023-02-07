<?php 
var_dump($_POST);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Html Label</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
       <form method="post">
       <fieldset>
            <legend>Articles</legend>    
            <div>
                <label for="title">Title:</label>
                <input id="title" type="text" name="title" readonly value="Zakir"/>
            </div>
            <div>
                <label for="content">Content:</label>
                <textarea autofocus ="content" rows="4" cols="40" id="content"></textarea>
            </div>
        </fieldset>
        <fieldset>
            <legend>Visible</legend>
            <div>
                <input type="checkbox" name="mcheck" id="mcheck"/> <label for="mcheck">Visible</label>
            </div>
        </fieldset>
       <fieldset>
            <legend>Radio:</legend>
            <div>
                <input type="radio" name="color" id="color_orange"/> <label for="color_orange">Orange</label>
                <input type="radio" name="color" id="color_white"/> <label for="color_white">White</label>
                <input type="radio" name="color" id="color_green"/> <label for="color_green">Green</label>
            </div>
       </fieldset>
       <fieldset>
        <legend>Cars</legend>
       <div>
            <select name="selectedcar" disabled>
                <optgroup label="First Choice">
                    <option>BMW</option>
                    <option disabled>Ford</option>
                    <option selected>TATA</option>
                </optgroup>
                <optgroup label="Second Choice">
                    <option disabled>Ferrari</option>
                    <option>Maruti</option>
                    <option>Kia</option>
                </optgroup>
            </select>
        </div>
       </fieldset>
        <div>
            <button>Send</button>
        </div>
       </form>
    </body>
</html>