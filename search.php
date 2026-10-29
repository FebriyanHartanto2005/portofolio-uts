<?php
// 1. Siapkan data proyek (array asosiatif) - disesuaikan dengan pengalaman lu
$proyek = [
    [
        'judul' => 'Website Portofolio Pribadi',
        'deskripsi' => 'Membuat website portofolio responsif dengan HTML semantik, CSS Flexbox, dan PHP dasar.',
        'kategori' => 'web'
    ],
    [
        'judul' => 'Sistem Pengarsipan Digital',
        'deskripsi' => 'Mengelola dan merapikan lebih dari 100+ dokumen kantor secara sistematis di BAPPEDA.',
        'kategori' => 'administrasi'
    ],
    [
        'judul' => 'Manajemen Display Produk',
        'deskripsi' => 'Penataan dan restock lebih dari 50 jenis produk setiap hari di INDOGROSIR.',
        'kategori' => 'ritel'
    ],
    [
        'judul' => 'Aplikasi Kasir Sederhana',
        'deskripsi' => 'Sistem Point of Sale untuk transaksi pembayaran pelanggan di Caffe.',
        'kategori' => 'web'
    ],
    [
        'judul' => 'Desain Logo UMKM',
        'deskripsi' => 'Membuat desain logo untuk usaha mikro kecil menengah.',
        'kategori' => 'desain'
    ]
];

// 2. Baca input dari URL (method GET)
$kata = isset($_GET['kata']) ? $_GET['kata'] : '';

// 3. Validasi dan amankan input (sesuai kriteria nomor 7)
$kata = trim($kata); // Hapus spasi di awal dan akhir
$kata = htmlspecialchars($kata, ENT_QUOTES, 'UTF-8'); // Cegah XSS

// 4. Proses pencarian
$hasil = [];
if (!empty($kata)) {
    // Filter proyek yang judul/deskripsi/kategori mengandung kata kunci
    foreach ($proyek as $p) {
        if (
            stripos($p['judul'], $kata) !== false ||
            stripos($p['deskripsi'], $kata) !== false ||
            stripos($p['kategori'], $kata) !== false
        ) {
            $hasil[] = $p;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Proyek - Febriyan Hartanto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- HEADER -->
    <header>
        <h1>Pencarian Proyek</h1>
        <p>Cari proyek berdasarkan kata kunci</p>
    </header>

    <!-- NAV -->
    <nav>
        <ul>
            <li><a href="index.html">Beranda</a></li>
            <li><a href="search.php">Pencarian</a></li>
            <li><a href="kontak.php">Kontak</a></li>
            <li><a href="https://www.linkedin.com/in/febriyan-hartanto-253331286" target="_blank">LinkedIn</a></li>
    </nav>

    <!-- MAIN: Form Pencarian + Hasil -->
    <main style="max-width: 800px; margin: 2rem auto; padding: 2rem; background: white; border-radius: 8px;">
        
        <!-- FORM PENCARIAN (Method GET) -->
        <form action="search.php" method="GET">
            <label for="kata" style="font-weight: bold; margin-right: 1rem;">Cari proyek:</label>
            <input type="text" id="kata" name="kata" value="<?php echo $kata; ?>" placeholder="Contoh: web, administrasi, ritel" required style="padding: 0.7rem; border: 2px solid #ddd; border-radius: 6px; width: 300px;">
            <button type="submit" style="padding: 0.7rem 1.5rem; background-color: #3498db; color: white; border: none; border-radius: 6px; cursor: pointer;">Cari</button>
        </form>

        <hr style="margin: 2rem 0;">

        <!-- HASIL PENCARIAN -->
        <?php if (!empty($kata)): ?>
            <h2>Hasil Pencarian untuk: "<?php echo $kata; ?>"</h2>
            
            <?php if (count($hasil) > 0): ?>
                <p>Ditemukan <?php echo count($hasil); ?> proyek.</p>
                <ul style="list-style: none; padding: 0;">
                    <?php foreach ($hasil as $h): ?>
                        <li style="background: #f4f4f4; padding: 1rem; margin-bottom: 1rem; border-radius: 8px;">
                            <h3><?php echo htmlspecialchars($h['judul']); ?></h3>
                            <p><?php echo htmlspecialchars($h['deskripsi']); ?></p>
                            <small>Kategori: <?php echo htmlspecialchars($h['kategori']); ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="color: red; font-weight: bold;">⚠️ Maaf, tidak ada proyek yang cocok dengan kata kunci "<?php echo $kata; ?>".</p>
                <p>Coba kata kunci lain seperti: <em>web, administrasi, ritel, desain</em></p>
            <?php endif; ?>
        <?php else: ?>
            <h2>Selamat Datang di Fitur Pencarian</h2>
            <p>Silakan masukkan kata kunci di form atas untuk mencari proyek.</p>
            <p>Contoh kata kunci: <em>web, administrasi, ritel, desain</em></p>
        <?php endif; ?>

    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 Febriyan Hartanto. Dibuat dengan HTML, CSS, dan PHP.</p>
    </footer>

</body>
</html>