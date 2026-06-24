<?php
// 1. Mengaktifkan pelacak error agar mempermudah debugging jika ada kendala
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Memanggil file koneksi dan seluruh komponen arsitektur OOP Pendaftaran
require_once 'koneksi.php';
require_once 'pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 3. Instansiasi koneksi database dan mengambil objek koneksi internalnya
$database = new Koneksi();
$dbConnection = $database->getConnObjek(); 

// 4. Memanfaatkan Metode Query Spesifik dari Tahap 4 untuk mengambil data terkelompok
$listReguler   = PendaftaranReguler::getDaftarReguler($dbConnection);
$listPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($dbConnection);
$listKedinasan = PendaftaranKedinasan::getDaftarKedinasan($dbConnection);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard PMB - Universitas Terpusat</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { display: flex; height: 100vh; background-color: #f8fafc; color: #1e293b; }
        
        /* --- SIDEBAR STYLE --- */
        .sidebar { width: 260px; background-color: #0f172a; color: #fff; display: flex; flex-direction: column; }
        .sidebar .brand { padding: 24px 20px; text-align: center; font-size: 20px; font-weight: bold; background-color: #020617; letter-spacing: 1px; }
        .sidebar .brand span { color: #3b82f6; }
        .sidebar .menu { list-style: none; padding: 20px 0; flex-grow: 1; }
        .sidebar .menu li a { display: block; padding: 15px 25px; color: #94a3b8; text-decoration: none; font-size: 15px; border-left: 4px solid transparent; }
        .sidebar .menu li a:hover, .sidebar .menu li a.active { background-color: #1e293b; color: #fff; border-left-color: #3b82f6; }

        /* --- MAIN CONTENT --- */
        .main-content { flex-grow: 1; display: flex; flex-direction: column; overflow-y: auto; }
        .header { background-color: #fff; padding: 20px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
        .content-body { padding: 40px; }
        
        /* --- KATEGORI JALUR TITLE --- */
        .section-title { font-size: 18px; font-weight: bold; margin: 35px 0 15px 0; padding-bottom: 8px; border-bottom: 2px solid #e2e8f0; display: flex; align-items: center; gap: 10px; }
        .title-reguler { color: #10b981; }
        .title-prestasi { color: #2563eb; }
        .title-kedinasan { color: #8b5cf6; }

        /* --- CARD INTERFACE VIEW --- */
        .grid-pendaftaran { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px; }
        .card-pendaftar { background-color: #fff; padding: 22px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02); border-top: 5px solid #3b82f6; display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.2s, box-shadow 0.2s; }
        .card-pendaftar:hover { transform: translateY(-3px); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); }
        
        .card-reguler { border-top-color: #10b981; }
        .card-prestasi { border-top-color: #2563eb; }
        .card-kedinasan { border-top-color: #8b5cf6; }

        .info-block { font-size: 14px; line-height: 1.7; margin-bottom: 14px; color: #334155; }
        .spesifik-box { background-color: #f8fafc; padding: 12px; border-radius: 8px; border: 1px solid #e2e8f0; font-size: 13px; color: #475569; margin-bottom: 15px; line-height: 1.6; }
        .harga-total { font-size: 15px; font-weight: bold; color: #0f172a; padding-top: 12px; border-top: 1px dashed #e2e8f0; display: flex; justify-content: space-between; align-items: center; }
        .harga-total span { color: #ef4444; font-size: 16px; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="brand">PANEL<span>PMB</span></div>
        <ul class="menu">
            <li><a href="index.php" class="active">🏠 Dashboard Pendaftar</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header class="header">
            <h1>Daftar Pendaftaran Mahasiswa Baru</h1>
            <div style="font-weight: 600; color: #64748b; font-size: 14px;">Tahun Akademik 2026/2027</div>
        </header>

        <div class="content-body">

            <div class="section-title title-reguler">🟢 Jalur Reguler (Seleksi Nilai Murni)</div>
            <div class="grid-pendaftaran">
                <?php if (empty($listReguler)): ?>
                    <p style="color: #94a3b8; font-style: italic;">Belum ada pendaftar pada Jalur Reguler.</p>
                <?php else: ?>
                    <?php foreach ($listReguler as $pendaftar): ?>
                        <div class="card-pendaftar card-reguler">
                            <div class="info-block">
                                <?php $pendaftar->infoDasarPendaftar(); ?>
                            </div>
                            <div class="spesifik-box">
                                <?php $pendaftar->tampilkanInfoJalur(); ?>
                            </div>
                            <div class="harga-total">
                                Total Biaya: <span>Rp <?php echo number_format($pendaftar->hitungTotalBiaya(), 0, ',', '.'); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="section-title title-prestasi">🔵 Jalur Prestasi (Apresiasi Potongan Rp50.000)</div>
            <div class="grid-pendaftaran">
                <?php if (empty($listPrestasi)): ?>
                    <p style="color: #94a3b8; font-style: italic;">Belum ada pendaftar pada Jalur Prestasi.</p>
                <?php else: ?>
                    <?php foreach ($listPrestasi as $pendaftar): ?>
                        <div class="card-pendaftar card-prestasi">
                            <div class="info-block">
                                <?php $pendaftar->infoDasarPendaftar(); ?>
                            </div>
                            <div class="spesifik-box">
                                <?php $pendaftar->tampilkanInfoJalur(); ?>
                            </div>
                            <div class="harga-total">
                                Total Biaya: <span>Rp <?php echo number_format($pendaftar->hitungTotalBiaya(), 0, ',', '.'); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="section-title title-kedinasan">🟣 Jalur Kedinasan (Surcharge Administrasi 25%)</div>
            <div class="grid-pendaftaran">
                <?php if (empty($listKedinasan)): ?>
                    <p style="color: #94a3b8; font-style: italic;">Belum ada pendaftar pada Jalur Kedinasan.</p>
                <?php else: ?>
                    <?php foreach ($listKedinasan as $pendaftar): ?>
                        <div class="card-pendaftar card-kedinasan">
                            <div class="info-block">
                                <?php $pendaftar->infoDasarPendaftar(); ?>
                            </div>
                            <div class="spesifik-box">
                                <?php $pendaftar->tampilkanInfoJalur(); ?>
                            </div>
                            <div class="harga-total">
                                Total Biaya: <span>Rp <?php echo number_format($pendaftar->hitungTotalBiaya(), 0, ',', '.'); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </main>

</body>
</html>