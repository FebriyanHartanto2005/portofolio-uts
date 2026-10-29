# Proyek UTS Pemrograman Web - Portofolio Febriyan Hartanto

## Identitas Mahasiswa
- **Nama:** Febriyan Hartanto
- **NIM:** 202501251009
- **Email:** andagorii@gmail.com
- **Kelas:** [Isi Kelas Lu, misal: TI-2A]

## Tautan Publik (Vercel)
🔗 [https://portofolio-uts-lu.vercel.app](https://portofolio-uts-lu.vercel.app)
*(Catatan: Fitur PHP tidak berjalan di Vercel karena batasan hosting statis. Demo PHP tersedia di bawah.)*

---

## Deskripsi Proyek
Website portofolio pribadi yang dibangun menggunakan HTML5 semantik, CSS3 dengan Flexbox, dan PHP dasar. Website ini menampilkan profil, pengalaman kerja, serta dilengkapi dengan fitur pencarian proyek (Method GET) dan formulir kontak (Method POST) yang aman dan tervalidasi.

## Fitur & Kriteria yang Diterapkan
Proyek ini telah memenuhi seluruh 8 kriteria wajib dari instruksi UTS:
- [x] **Struktur Semantik:** Menggunakan `<header>`, `<nav>`, `<main>`, `<article>`, `<aside>`, dan `<footer>` di `index.html`.
- [x] **Navigasi LinkedIn:** Tautan profil LinkedIn tersedia di dalam elemen `<nav>`.
- [x] **Foto di Aside:** Foto profil dan biodata ditampilkan di dalam elemen `<aside>`.
- [x] **Layout Flexbox:** Tata letak halaman disusun menggunakan CSS Flexbox (tanpa `float`).
- [x] **Pemrosesan PHP:** `search.php` memproses `$_GET` dan `kontak.php` memproses `$_POST`.
- [x] **Validasi & Keamanan Input:** Menggunakan `trim()`, `empty()`, `filter_var()` (untuk email), dan `htmlspecialchars()` untuk mencegah XSS.
- [x] **Pesan Error Jelas:** Pencarian yang tidak menemukan hasil menampilkan pesan yang informatif.
- [x] **Publikasi Vercel:** Tampilan website telah di-deploy di Vercel.

## Saran Peningkatan yang Diterapkan (Untuk Nilai Bintang 4/5)
1. Memisahkan kode styling ke dalam berkas `css/style.css` tersendiri.
2. Memberikan teks alternatif (`alt`) pada semua gambar untuk aksesibilitas.
3. Menerapkan hierarki heading dengan benar (hanya satu `<h1>`, tidak melompati level).
4. Menampilkan konten dinamis dari array PHP menggunakan `foreach`.

---

## Bukti Demo PHP (Lokal via XAMPP)
Berikut adalah tangkapan layar yang membuktikan fitur PHP berjalan dengan baik di lingkungan lokal:

### 1. Fitur Pencarian (Method GET)
**Hasil Ditemukan (Kata kunci: "web"):**
![Demo Search Berhasil](bukti-demo/search-berhasil.png)

**Hasil Tidak Ditemukan (Kata kunci: "game"):**
![Demo Search Gagal](bukti-demo/search-gagal.png)

### 2. Formulir Kontak (Method POST)
**Validasi Sukses (Data valid):**
![Demo Kontak Sukses](bukti-demo/kontak-sukses.png)

**Validasi Error (Form kosong / Email salah):**
![Demo Kontak Error](bukti-demo/kontak-error.png)