<?php

namespace App\Database;

use PDO;
use PDOException;

class DbConnection {

    private string $localhost;
    private string $dbname;
    private string $user;
    private string $password;

    public function __construct()
    {
        try {
            require_once('dataConnexion.php');
            $this->setDataConnection();
            $this->dbConnection();
        }
        catch (PDOException $ex) {
            echo 'Error de conexión: ' . $ex->getMessage();
            die();
        }

    }

    public function dbConnection() {

        $charset = "utf-8";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

        $dsn = "mysql:host={$this->localhost};dbname={$this->dbname};".$charset.";";

        $pdo = new PDO($dsn, $this->user, $this->password, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $mdn = $pdo->query('SELECT * FROM movies');
        var_dump($mdn->fetchAll());
        
        return $pdo;
    }

    private function setDataConnection()
    {
        $this->localhost = DB_HOST;
        $this->dbname = DB_NAME;
        $this->user = DB_USER;
        $this->password = DB_PASSWORD;
    }

}