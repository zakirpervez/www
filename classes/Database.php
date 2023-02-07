<?php

/**
 * Database
 * 
 * A connection to the database
 */
class Database
{
    /**
     * Get the database connection.
     * 
     * @return PDO objet connection to the database server.
     */
    public function getDatabaseConnection()
    {
        $db_host = "localhost";
        $db_name = "zakir_cms";
        $db_user = "zakir_cms_www";
        $db_password = "Tr4j84IhYC/bbKtb";

        $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';
        try {
            $pdo_connection = new PDO($dsn, $db_user, $db_password);
            $pdo_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo_connection;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
