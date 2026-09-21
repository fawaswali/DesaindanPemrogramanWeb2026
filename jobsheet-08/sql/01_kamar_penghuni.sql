CREATE TABLE IF NOT EXISTS kamar (
    id SERIAL PRIMARY KEY,
    nomor_kamar VARCHAR(10) UNIQUE NOT NULL,
    tipe_kamar VARCHAR(50) NOT NULL,
    fasilitas TEXT NOT NULL,
    harga_bulanan INT NOT NULL,
    status VARCHAR(20) DEFAULT 'Tersedia',
    tanggal_ditambahkan TIMESTAMP DEFAULT NOW()
);

CREATE TABLE IF NOT EXISTS penghuni (
    id SERIAL PRIMARY KEY,
    nik VARCHAR(20) UNIQUE NOT NULL,
    nama VARCHAR(100) NOT NULL,
    no_telepon VARCHAR(20) NOT NULL,
    pekerjaan VARCHAR(50) NOT NULL,
    tanggal_daftar TIMESTAMP DEFAULT NOW()
);