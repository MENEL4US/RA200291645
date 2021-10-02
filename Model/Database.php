<?php 
    class Database {
        private $user ;
        private $host;
        private $pass ;
        private $db;

        public function __construct() {
            $this->user = "root";
            $this->host = "localhost";
            $this->pass = "";
            $this->db = "ra200291645";
        }

        public function connect() {
            try {
                $conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false );
            } catch ( PDOException $Exception ) {
                print_r ($Exception);
                die('Erro ao conectar na base de dados');
            }
            return $conn;
        }
    }
?>