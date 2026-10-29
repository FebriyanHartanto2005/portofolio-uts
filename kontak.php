<?php
// Inisialisasi variabel untuk pesan error dan sukses
$error = "";
$success = "";

// Cek apakah form sudah disubmit dengan method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Ambil data dari form dan bersihkan spasi (trim)
    $nama = trim($_POST["nama"]);
    $email = trim($_POST["email"]);
    $pesan = trim($_POST["pesan"]);

    // 2. Validasi: Cek apakah ada field yang kosong (empty)
    if (empty($nama) || empty($email) || empty($pesan)) {
        $error = "Semua field wajib diisi!";
    } 
    // 3. Validasi: Cek format email (filter_var)
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid!";
    } 
    // 4. Jika semua valid, proses data
    else {
        // Amankan data sebelum ditampilkan (htmlspecialchars)
        $nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $pesan = htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8');
        
        $success = "Halo $nama! Pesan Anda dari $email telah kami terima: <br><em>\"$pesan\"</em>";
        
        // Reset form setelah berhasil (opsional, biar field kosong lagi)
        $nama = $email = $pesan = "";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Saya</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- HEADER -->
    <header>
        <h1>Hubungi Saya</h1>
        <p>Punya pertanyaan atau ingin bekerja sama? Kirim pesan di sini!</p>
    </header>

    <!-- NAV -->
    <nav>
        <ul>
            <li><a href="index.html">Beranda</a></li>
            <li><a href="search.php">Pencarian</a></li>
            <li><a href="kontak.php">Kontak</a></li>
            <li><a href="https://www.linkedin.com/in/febriyan-hartanto-253331286" target="_blank">LinkedIn</a></li>
    </nav>

    <!-- MAIN: Form Kontak -->
    <main style="max-width: 600px; margin: 2rem auto; padding: 2rem; background: white; border-radius: 8px;">
        
        <!-- Tampilkan Pesan Error (Jika ada) -->
        <?php if (!empty($error)): ?>
            <div style="background: #ffdddd; color: red; padding: 1rem; border-radius: 6px; margin-bottom: 1rem;">
                ⚠️ <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Tampilkan Pesan Sukses (Jika ada) -->
        <?php if (!empty($success)): ?>
            <div style="background: #ddffdd; color: green; padding: 1rem; border-radius: 6px; margin-bottom: 1rem;">
                ✅ <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <!-- FORM KONTAK (Method POST) -->
        <form action="kontak.php" method="POST">
            <div style="margin-bottom: 1rem;">
                <label for="nama" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" value="<?php echo isset($nama) ? $nama : ''; ?>" style="width: 100%; padding: 0.7rem; border: 2px solid #ddd; border-radius: 6px;" required>
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Alamat Email:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" style="width: 100%; padding: 0.7rem; border: 2px solid #ddd; border-radius: 6px;" required>
            </div>

            <div style="margin-bottom: 1rem;">
                <label for="pesan" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Pesan Anda:</label>
                <textarea id="pesan" name="pesan" rows="5" style="width: 100%; padding: 0.7rem; border: 2px solid #ddd; border-radius: 6px;" required></textarea>
            </div>

            <button type="submit" style="width: 100%; padding: 0.8rem; background-color: #3498db; color: white; border: none; border-radius: 6px; font-size: 1rem; cursor: pointer;">Kirim Pesan</button>
        </form>

    </main>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 Portofolio Saya. Dibuat dengan HTML, CSS, dan PHP.</p>
    </footer>

</body>
</html>