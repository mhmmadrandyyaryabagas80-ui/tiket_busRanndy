<?php
class Tiket {
    private $conn;
    private $table = "tiket";

    public $id_tiket;
    public $id_penumpang;
    public $id_jadwal;
    public $nomor_kursi;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT t.id_tiket, p.nama_penumpang, b.nama_bus, r.kota_asal, r.kota_tujuan,
                       j.tanggal_berangkat, t.nomor_kursi, t.status
                FROM tiket t
                JOIN penumpang p ON t.id_penumpang = p.id_penumpang
                JOIN jadwal j ON t.id_jadwal = j.id_jadwal
                JOIN bus b ON j.id_bus = b.id_bus
                JOIN rute r ON j.id_rute = r.id_rute";
        return $this->conn->query($sql);
    }

    public function create() {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (id_penumpang, id_jadwal, nomor_kursi, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $this->id_penumpang, $this->id_jadwal, $this->nomor_kursi, $this->status);
        return $stmt->execute();
    }
}
?>
