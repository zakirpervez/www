<?php
ini_set('display_errors', 1);
spl_autoload_register(function ($class) {
    require "models/$class.php";
});
$article = new ArticleData();
var_dump($article);

