<?php
require_once 'pendaftaran.php';

// SUBCLASS: PendaftaranPrestasi
class PendaftaranPrestasi extends Pendaftaran {
    // Properti Spesifik Anak (Private)
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($dataRow) {
        parent::__construct($dataRow);
        
        // Petakan data spesifik prestasi dari kolom database
        $this->jenisPrestasi   = isset($dataRow['jenis_prestasi']) ? $dataRow['jenis_prestasi'] : '-';
        $this->tingkatPrestasi = isset($dataRow['tingkat_prestasi']) ? $dataRow['tingkat_prestasi'] : '-';
    }

    /**
     * Metode Query Spesifik untuk Jalur Prestasi
     */
    public static function getDaftarPrestasi($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        $result = $db->query($query);
        
        $kumpulanObjek = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $kumpulanObjek[] = new self($row);
            }
        }
        return $kumpulanObjek;
    }

    /**
     * [Tahap 5] Overriding: Menghitung total biaya untuk Jalur Prestasi
     * Total Biaya = biayaPendaftaranDasar - 50000
     */
    public function hitungTotalBiaya() {
        $total = $this->biayaPendaftaranDasar - 50000;
        return $total > 0 ? $total : 0; // Mencegah nilai minus jika biaya dasar di bawah 50rb
    }

    /**
     * Overriding: Menampilkan karakteristik spesifik jalur Prestasi
     */
    public function tampilkanInfoJalur() {
        echo "<strong>— Karakteristik Jalur Prestasi —</strong><br>";
        echo "Jenis Prestasi  : " . $this->jenisPrestasi . "<br>";
        echo "Tingkat Wilayah : " . $this->tingkatPrestasi . "<br>";
    }
}