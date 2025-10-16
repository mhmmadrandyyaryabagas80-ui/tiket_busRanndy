<?php
class Bus {
    private $conn;
    private $table = "bus";

    public $id_bus;
    public $nama_bus;
    public $nomor_plat;
    public $kapasitas;
    public $kelas;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM $this->table";
        return $this->conn->query($sql);
    }

    public function create() {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (nama_bus, nomor_plat, kapasitas, kelas) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $this->nama_bus, $this->nomor_plat, $this->kapasitas, $this->kelas);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_bus = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
