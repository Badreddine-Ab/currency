<?php
    class Model {
            
        private $HOST_NAME = "localhost";
        private $USER_NAME = 'root';
        private $PASSWORD = 'Badr@2001';
        private $DB_NAME = "devise";

        function __construct() {

            try {
                $this->conn = new PDO("mysql:host={$this->HOST_NAME};dbname={$this->DB_NAME}", $this->USER_NAME, $this->PASSWORD);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

        }

        function getCurrencies() {
            $query = "SELECT * FROM currencies";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        function getCurrencyById($id) {
            $query = "SELECT * FROM currencies WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $data = $stmt->fetch();
            return $data;
        }
    }