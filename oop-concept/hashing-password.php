<?php
$pass = "ZakirSecret";
$hash = password_hash($pass, PASSWORD_DEFAULT);
echo $hash. "<br/>"; 
$isPasswordMatch = password_verify($pass, $hash);
echo $isPasswordMatch;

