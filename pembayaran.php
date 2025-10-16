<?php
class Pembayaran {
    private $conn;
    private $table = "pembayaran";

    public $id_pembayaran;
    public $id_tiket;
    public $metode_pembayaran;
    public $total_bayar;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (id_tiket, metode_pembayaran, total_bayar) VALUES (?, ?, ?)");
        $stmt->bind_param("isd", $this->id_tiket, $this->metode_pembayaran, $this->total_bayar);
        return $stmt->execute();
    }
}
?>
