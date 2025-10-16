<?php
class Rute {
    private $conn;
    private $table = "rute";

    public $id_rute;
    public $kota_asal;
    public $kota_tujuan;
    public $jarak_km;
    public $harga;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM $this->table";
        return $this->conn->query($sql);
    }
}
?>
