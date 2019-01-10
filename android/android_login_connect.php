<?php
class android_login_connect {
    private $conn;
 
    // Connecting to database
    public function connect() {
        require_once 'android_login_config.php';
 
        // Connecting to mysql database
        $this->conn = new mysqli($servername, $username, $password, $database);
        // return database object
        return $this->conn;
    }
}
?>