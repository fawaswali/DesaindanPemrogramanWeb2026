# Laporan Jobsheet 5 Desain Pemrograman Web 2026
## Nama: Fawas Saqif Abdullohil Wali
## NIM: 254107020037
## Kelas: TI-2D
## No Absen: 07

## Percobaan

### Buka index.html, perkecil layar ke mode mobile (DevTools responsif, ingat caranya dari dokumentasi jobsheet-03 §5.6), lalu klik ikon hamburger — bandingkan rasanya dengan versi checkbox hack di jobsheet-03 (secara visual identik, tapi mekanismenya berbeda total di balik layar).
<img width="406" height="725" alt="image" src="https://github.com/user-attachments/assets/3152e031-a48d-4f14-be67-526da5dae9c6" />
<img width="448" height="725" alt="image" src="https://github.com/user-attachments/assets/23f33d02-a5f8-4101-ba11-a481307585ca" />

### Buka buku/list.html, ketik sebagian judul buku (misalnya "bumi") di kolom cari, amati baris lain otomatis hilang. Hapus teksnya lagi, amati semua baris muncul kembali.
<img width="1489" height="442" alt="image" src="https://github.com/user-attachments/assets/f487cba8-7a85-4436-9626-62165690e363" />
<img width="1511" height="682" alt="image" src="https://github.com/user-attachments/assets/90cde029-d0b4-4917-bad4-ba7dda073792" />

### Klik tombol "Hapus" di salah satu baris — muncul dialog konfirmasi. Klik "Cancel", baris tetap ada. Coba lagi dan klik "OK", baris hilang. Refresh halaman — perhatikan baris itu muncul kembali (ingat catatan di bab 5 §5.6).
<img width="1493" height="673" alt="image" src="https://github.com/user-attachments/assets/0633d34d-e568-4b9e-94a6-722863129813" />
<img width="1499" height="899" alt="image" src="https://github.com/user-attachments/assets/9b77259c-9840-4648-9e91-3ad2e9942bda" />
<img width="1564" height="651" alt="image" src="https://github.com/user-attachments/assets/c7ae8cf2-6cc3-462c-bcac-eb2b13e717e3" />

### Buka buku/tambah.html, langsung klik "Simpan" tanpa mengisi apa pun — amati pesan error merah muncul di bawah field yang wajib diisi. Isi salah satu field yang error, klik "Simpan" lagi — amati pesan error field itu hilang, sementara field lain yang masih kosong tetap menampilkan errornya.
<img width="650" height="356" alt="image" src="https://github.com/user-attachments/assets/2f24113d-3cc7-47b0-a828-a6ffb259c230" />
<img width="678" height="492" alt="image" src="https://github.com/user-attachments/assets/04578399-124d-4ff2-8ddb-ca693cef2a21" />


### Modifikasi

### Tambah validasi field baru — misalnya field ISBN di form Tambah Buku (yang saat ini tidak wajib diisi, ingat dari dokumentasi jobsheet-01 §4.4) validasi supaya hanya menerima angka dan tanda hubung.
<img width="841" height="314" alt="image" src="https://github.com/user-attachments/assets/daebf087-5012-46e9-ab9a-08071174c25b" />

<img width="661" height="651" alt="image" src="https://github.com/user-attachments/assets/409ae738-436d-4cb6-80d4-80a90e21f1c8" />

### Tambah animasi sederhana pada initNavToggle — misalnya tambahkan class CSS transition pada header nav di style.css supaya menu terbuka/tertutup dengan efek geser halus, alih-alih langsung muncul/hilang seketika.
<img width="925" height="399" alt="image" src="https://github.com/user-attachments/assets/284d52ee-898a-494d-9c97-c8dcb371debd" />

### Perluas initTableFilter supaya pencarian bisa dibatasi ke satu kolom saja (misalnya hanya kolom "Judul"), bukan mencari di seluruh teks baris — petunjuk: gunakan row.querySelector("td") seperti pola yang sudah dipakai di bab 5 §5.4, alih-alih row.textContent.
<img width="848" height="499" alt="image" src="https://github.com/user-attachments/assets/af6b8aa6-535d-458b-958b-9360747cc835" />
<img width="1177" height="282" alt="image" src="https://github.com/user-attachments/assets/b80e69b4-2ab0-4259-a4c1-f3a1a4ef963f" />


