<?php
$pass = "Password@123";
echo $pass. '<br>';
$hash = password_hash($pass, PASSWORD_DEFAULT);
echo $hash. "<br/>"; 
$isPasswordMatch = password_verify($pass, $hash);
echo $isPasswordMatch;

