<?php
require_once 'pendaftaran.php';

// SUBCLASS: PendaftaranKedinasan
class PendaftaranKedinasan extends Pendaftaran {
    // Properti Spesifik Anak (Private)
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($dataRow) {
        parent::__construct($dataRow);
        
        // Petakan data spesifik kedinasan dari kolom database
        $this->skIkatanDinas   = isset($dataRow['sk_ikatan_dinas']) ? $dataRow['sk_ikatan_dinas'] : '-';
        $this->instansiSponsor = isset($dataRow['instansi_sponsor']) ? $dataRow['instansi_sponsor'] : '-';
    }

    /**
     * Metode Query Spesifik untuk Jalur Kedinasan
     */
    public static function getDaftarKedinasan($db) {
        $query = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
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
     * [Tahap 5] Overriding: Menghitung total biaya untuk Jalur Kedinasan
     * Total Biaya = biayaPendaftaranDasar * 1.25
     */
    public function hitungTotalBiaya() {
        return $this->biayaPendaftaranDasar * 1.25;
    }

    /**
     * Overriding: Menampilkan karakteristik spesifik jalur Kedinasan
     */
    public function tampilkanInfoJalur() {
        echo "<strong>— Karakteristik Jalur Kedinasan —</strong><br>";
        echo "Nomor SK Dinas  : " . $this->skIkatanDinas . "<br>";
        echo "Instansi Sponsor: " . $this->instansiSponsor . "<br>";
    }
}