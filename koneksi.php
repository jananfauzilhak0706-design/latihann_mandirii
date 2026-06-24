<?php

class Koneksi {
    // Properti konfigurasi database
    private $host     = "localhost";
    private $username = "root";
    private $password = "";
    // Perbaikan: Nama database disesuaikan dengan nama baru Anda
    private $database = "db_uasss_latihan"; 
    protected $conn;

    /**
     * Constructor otomatis berjalan saat objek dibuat (new Koneksi())
     * Berfungsi untuk membuka koneksi langsung ke MySQL
     */
    public function __construct() {
        // Menginisialisasi koneksi MySQLi Driver dengan mode Objek
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Memeriksa apakah terjadi kegagalan koneksi
        if ($this->conn->connect_error) {
            die("<div style='color:red; padding:20px; background:#ffe4e6; border-radius:8px; margin:20px; font-family:sans-serif;'>
                    <strong>Koneksi Database Gagal:</strong> " . $this->conn->connect_error . "
                 </div>");
        }
    }

    /**
     * Method Getter untuk mengambil objek koneksi internal jika diperlukan di luar class
     * @return mysqli
     */
    public function getConnObjek() {
        return $this->conn;
    }
}