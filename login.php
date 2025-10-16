<?php
class Penumpang {
    private $conn;
    private $table = "penumpang";

    public $id_penumpang;
    public $nama_penumpang;
    public $no_ktp;
    public $no_hp;
    public $alamat;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (nama_penumpang, no_ktp, no_hp, alamat) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $this->nama_penumpang, $this->no_ktp, $this->no_hp, $this->alamat);
        return $stmt->execute();
    }

    public function getAll() {
        $sql = "SELECT * FROM $this->table";
        return $this->conn->query($sql);
    }
}
?>
