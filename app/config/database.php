<?php
class Database {
    private $host = "localhost";
    private $db_name = "european_restaurant";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            
            // ÉP PDO PHẢI BÁO LỖI CHI TIẾT NẾU TRÙNG LẶP HOẶC SAI KHÓA NGOẠI
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $exception) {
            echo "Lỗi kết nối dữ liệu: " . $exception->getMessage();
        }
        return $this->conn;
    }
}