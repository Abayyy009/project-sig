# GeoKost Bogor 🏡
**Sistem Informasi Geografis Pemetaan Kost untuk Mahasiswa & Pekerja di Kabupaten Bogor**

## 📌 Deskripsi
GeoKost Bogor adalah aplikasi web berbasis PHP dan MySQL yang menampilkan daftar kost di wilayah Kabupaten Bogor dalam bentuk peta dan daftar. Aplikasi ini dibuat untuk membantu mahasiswa dan pekerja dalam mencari kost dengan lebih mudah dan cepat melalui fitur pencarian dan sistem pemetaan berbasis web.

## 🛠️ Fitur
- 🔍 Pencarian kost berdasarkan nama dan deskripsi
- 📄 Tampilan daftar kost dengan gambar dan lokasi
- 📍 Integrasi dengan sistem pemetaan (Google Maps)
- 📑 Detail kost dengan informasi lengkap
- 📦 Pagination untuk navigasi daftar kost
- 🎨 Desain responsif menggunakan Tailwind CSS

## 💻 Teknologi yang Digunakan
- **Frontend**: HTML, Tailwind CSS
- **Backend**: PHP (Native)
- **Database**: MySQL
- **Pemetaan**: Google Maps
- **Web Server**: Laragon (untuk development lokal)


## ⚙️ Cara Menjalankan
1. Clone atau download project ini.
2. Jalankan web server lokal menggunakan Laragon / XAMPP.
3. Import file database (`database.sql`) ke phpMyAdmin.
4. Ubah konfigurasi koneksi database di file `db/koneksi.php` sesuai setting lokal.
5. Akses project melalui browser:


## 🧠 Catatan
- Pastikan gambar kost tersimpan di folder `assets/images/maps/`.
- Nama file gambar harus sesuai dengan nama yang ada di database kolom `image`.

## 👨‍💻 Author
Akbar (Informatika 2021)  
Proyek Tugas Akhir - Sistem Informasi Geografis
