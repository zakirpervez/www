<?php

/**
 * Database
 * 
 * A connection to the database
 */
class Database
{
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_password;

    public function __construct($db_host, $db_name, $db_user, $db_password)
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
    }

    /**
     * Get the database connection.
     * 
     * @return PDO objet connection to the database server.
     */
    public function getDatabaseConnection()
    {
        $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8';
        try {
            $pdo_connection = new PDO($dsn, $this->db_user, $this->db_password);
            $pdo_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo_connection;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
