<?php

class Db_conn {

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'TheBookShop';
    
    public $connection;
    private $error;    

    public function __construct() {
        $link = "mysql:host=" . $this->db_host . "; dbname=" . $this->db_name;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //Create new PDO
        try {
            $this->connection = new PDO($link, $this->db_user, $this->db_pass, $options);
        } catch (PDOEception $e) {
            $this->error = $e->getMessage();
        }        
    }

//    private $db_host = "localhost";
//    private $db_user = "root";
//    private $db_pass = "";
//    private $db_name = "TheBookShop";
//    public $pdo;
//
//    public function __construct() {
//        if (!isset($this->pdo)) {
//            try {
//                $link = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass);
//                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                $link->exec("SET CHARACTER SET utf8");
//                $this->pdo = $link;
//            } catch (PDOException $e) {
//                die("Failed to connect with Database" . $e->getMessage());
//            }
//        }
//    }

}
