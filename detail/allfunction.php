<?php

// connect to database and get data from a table.
class Databasec {
    private $host = 'localhost';
    private $db_name = 'project_resa';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        return $this->conn;
    }

    public function disconnect() {
        $this->conn = null;
    }

    public function getTableData($tableName) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $tableName");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUserDetails($userID) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE id = :userID");
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}

// Gestion des session

// class SessionHandler {
//     public function __construct() {
//         // Start the session if it hasn't been started yet
//         if (session_status() === PHP_SESSION_NONE) {
//             session_start();
//         }
//     }

//     // session definition 
//     public function setSessionValue($key, $value) {
//         $_SESSION[$key] = $value;
//     }

//     // get the key info if ok
//     public function getSessionValue($key) {
//         if (isset($_SESSION[$key])) {
//             return $_SESSION[$key];
//         } else {
//             return null;
//         }
//     }

//     // session déconnect
//     public function unsetSessionValue($key) {
//         if (isset($_SESSION[$key])) {
//             unset($_SESSION[$key]);
//         }
//     }

//     // trow the session and all data
//     public function destroySession() {
//         session_destroy();
//     }
// }

?>
