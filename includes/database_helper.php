<?php
require 'init.php';
$database = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
return $database->getDatabaseConnection();