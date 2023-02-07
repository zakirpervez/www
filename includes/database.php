<?php

/**
 * Get the data connection for you.
 */
function connect_database() {
    $db_host = "localhost";
    $db_name ="zakir_cms";
    $db_user ="zakir_cms_www";
        $db_password = "Tr4j84IhYC/bbKtb";

    $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if(mysqli_connect_error()) {
        echo mysqli_connect_error();
        var_dump( mysqli_connect_error());
        exit;
    }

    return $connection;
}