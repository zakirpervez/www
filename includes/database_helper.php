<?php
require 'init.php';
$database = new Database();
return $database->getDatabaseConnection();