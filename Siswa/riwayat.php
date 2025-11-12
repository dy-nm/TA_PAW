<?php
session_start();
require_once '../conn.php';
require_once 'database.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

$username = $_SESSION['username'];

// Ambil data pendaftaran + berkas
$data = getPendaftaranByUser($username);
$berkas = $data ? getBerkasByPendaftaran($data['ID_DAFTAR']) : [];


$username = $_SESSION['username'];
$user = getUserByUsername($username);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Riwayat Pendaftaran - PPDB Online</title>
    <link rel="stylesheet" href="../assets/css/siswa.css">
    <link rel="stylesheet" href="../assets/css/riwayat.css">
</head>

<body>

    <header class="navbar">
        <div class="logo">
            <span><strong>PPDB</strong> Online <strong>Pesantren</strong></span>
        </div>
        <nav class="menu">
            <a href="index.php">Home</a>
            <a href="riwayat.php" class="active">Riwayat Pendaftaran</a>
            <a href="pendaftaran.php">Pendaftaran</a>
            <a href="edit_profil.php" class="btn">Edit Profil</a>
            <a href="../logout.php" class="logout">Logout</a>
        </nav>
        <div class="user">
            <a href="profil.php">
                <?php if (!empty($user['FOTO_SISWA'])): ?>
                    <img src="../assets/uploads/<?= ($user['FOTO_SISWA']); ?>" alt="Foto Profil">
                <?php else: ?>
                    <img src="../assets/default.jpg" alt="Foto Default">
                <?php endif; ?>
            </a>
        </div>
    </header>

    <div class="riwayat-container">
        <div class="riwayat-box">
            <h2>Riwayat Pendaftaran</h2>

            <?php if (!$data): ?>
                <p class="belum-daftar">Anda belum melakukan pendaftaran.</p>
            <?php else: ?>

                <!-- Tabs Navigasi -->
                <div class="tabs">
                    <input type="radio" id="tab1" name="tab" checked>
                    <label for="tab1">Status Pendaftaran</label>
                    <input type="radio" id="tab2" name="tab">
                    <label for="tab2">Data Pendaftaran</label>

                    <!-- TAB 1: STATUS -->
                    <div class="tab-content" id="content1">
                        <?php
                        if ($data['STATUS_DAFTAR'] == '1') {
                            echo "<div class='status status-diterima'>🎉 Selamat! Anda <strong>Diterima</strong> di Pesantren.</div>";
                        } elseif ($data['STATUS_DAFTAR'] == '2') {
                            echo "<div class='status status-ditolak'>❌ Maaf, Anda <strong>Belum Diterima</strong>. Silakan hubungi panitia untuk informasi lebih lanjut.</div>";
                        } else {
                            echo "<div class='status status-menunggu'>⌛ Pendaftaran Anda masih dalam proses verifikasi.</div>";
                        }
                        ?>

                        <div class="status-info">
                            <p><strong>Nama:</strong> <?= htmlspecialchars($data['NAMA']); ?></p>
                            <?php if ($data['STATUS_DAFTAR'] == '1'): ?>
                                <p><strong>Jurusan:</strong> <?= htmlspecialchars($data['NAMA_JURUSAN']); ?></p>
                                <p><strong>Kamar:</strong> <?= htmlspecialchars($data['KAMAR']); ?></p>
                            <?php else: ?>
                                <p><strong>Jurusan:</strong> -</p>
                                <p><strong>Kamar:</strong> -</p>
                            <?php endif; ?>
                            <p><strong>Tanggal Daftar:</strong> <?= htmlspecialchars($data['CREATED_AT']); ?></p>
                        </div>
                    </div>

                    <!-- TAB 2: DATA PENDAFTARAN -->
                    <div class="tab-content" id="content2">
                        <div class="foto-siswa">
                            <?php if (!empty($data['FOTO_SISWA'])): ?>
                                <img src="../assets/uploads/<?= htmlspecialchars($data['FOTO_SISWA']); ?>" alt="Foto Profil">
                            <?php else: ?>
                                <img src="../assets/default.jpg" alt="Foto Default">
                            <?php endif; ?>
                        </div>

                        <h3>📋 Data Pendaftaran</h3>
                        <div class="info">
                            <p><span>Nama Lengkap:</span> <?= htmlspecialchars($data['NAMA']); ?></p>
                            <p><span>Username:</span> <?= htmlspecialchars($data['USERNAME']); ?></p>
                            <p><span>NISN:</span> <?= htmlspecialchars($data['NISN']); ?></p>
                            <p><span>Alamat:</span> <?= htmlspecialchars($data['ALAMAT']); ?></p>
                            <p><span>Jenis Kelamin:</span> <?= ($data['JENIS_KELAMIN'] == 'L' ? 'Laki-laki' : 'Perempuan'); ?></p>
                            <p><span>Asal Sekolah:</span> <?= htmlspecialchars($data['ASAL_SEKOLAH']); ?></p>
                            <p><span>Tempat, Tanggal Lahir:</span> <?= htmlspecialchars($data['TEMPAT_LAHIR']); ?>, <?= htmlspecialchars($data['TANGGAL_LAHIR']); ?></p>
                            <p><span>Nama Ayah:</span> <?= htmlspecialchars($data['NAMA_AYAH']); ?></p>
                            <p><span>Nama Ibu:</span> <?= htmlspecialchars($data['NAMA_IBU']); ?></p>
                            <p><span>No. HP Siswa:</span> <?= htmlspecialchars($data['TELP']); ?></p>
                            <p><span>No. HP Ortu:</span> <?= htmlspecialchars($data['TELP_ORTU']); ?></p>
                            <p><span>Jurusan:</span> <?= htmlspecialchars($data['NAMA_JURUSAN']); ?></p>
                        </div>

                        <h3>📎 Berkas yang Telah Diupload</h3>
                        <?php if ($berkas): ?>
                            <ul class="berkas-list">
                                <?php foreach ($berkas as $b): ?>
                                    <li><?= htmlspecialchars($b['NAMA_BERKAS']); ?>:
                                        <a href="../assets/uploads/<?= htmlspecialchars($b['BERKAS']); ?>" target="_blank">Lihat</a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p style="color:#888;">Belum ada berkas yang diupload.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>