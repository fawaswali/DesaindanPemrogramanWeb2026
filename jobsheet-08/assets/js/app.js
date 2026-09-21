// ===== Hamburger menu (JS-driven) =====
function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");
    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}

// ===== Konfirmasi hapus (front-end) =====
function initHapusConfirm() {
    document.addEventListener("click", function (e) {
        const btn = e.target.closest(".btn-hapus");
        if (!btn) return;

        const row = btn.closest("tr");
        const nama = row ? row.querySelector("td")?.textContent.trim() : "data ini";
        const yakin = confirm("Yakin ingin menghapus \"" + nama + "\"?");
        if (yakin && row) {
            row.remove();
        }
    });
}

// ===== Filter/pencarian tabel real-time =====
function initTableFilter() {
    const input = document.getElementById("search-input");
    const table = document.querySelector(".table-responsive table");
    if (!input || !table) return;

    input.addEventListener("keyup", function () {
        const keyword = input.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");
        rows.forEach(function (row) {
            const teks = row.textContent.toLowerCase();
            row.style.display = teks.includes(keyword) ? "" : "none";
        });
    });
}

// ===== Helper pesan error validasi =====
function tampilkanError(input, pesan) {
    hapusError(input);
    const span = document.createElement("span");
    span.className = "error";
    span.style.color = "#c53030";
    span.style.fontSize = "12px";
    span.style.display = "block";
    span.style.marginTop = "4px";
    span.textContent = pesan;
    input.insertAdjacentElement("afterend", span);
}

function hapusError(input) {
    const next = input.nextElementSibling;
    if (next && next.classList.contains("error")) {
        next.remove();
    }
}

// ===== Validasi form Kost Mini (Kamar & Penghuni) =====
function initValidasiForm() {
    // Menangani form tambah (baik id='form-tambah' maupun form standar di halaman)
    const form = document.getElementById("form-tambah") || document.querySelector("form");
    if (!form) return;

    form.addEventListener("submit", function (e) {
        let valid = true;

        // 1. Validasi Nomor Kamar (Jika ada di form)
        const nomorKamar = form.querySelector("[name='nomor_kamar']");
        if (nomorKamar) {
            if (nomorKamar.value.trim() === "") {
                tampilkanError(nomorKamar, "Nomor kamar wajib diisi.");
                valid = false;
            } else {
                hapusError(nomorKamar);
            }
        }

        // 2. Validasi Harga Bulanan (Kamar)
        const harga = form.querySelector("[name='harga_bulanan']");
        if (harga) {
            const nilai = parseInt(harga.value, 10);
            if (isNaN(nilai) || nilai <= 0) {
                tampilkanError(harga, "Harga bulanan harus angka positif.");
                valid = false;
            } else {
                hapusError(harga);
            }
        }

        // 3. Validasi NIK (Penghuni)
        const nik = form.querySelector("[name='nik']");
        if (nik) {
            if (nik.value.trim().length < 8) {
                tampilkanError(nik, "NIK minimal 8 digit.");
                valid = false;
            } else {
                hapusError(nik);
            }
        }

        // 4. Validasi Nama Lengkap (Penghuni)
        const nama = form.querySelector("[name='nama']");
        if (nama) {
            if (nama.value.trim() === "") {
                tampilkanError(nama, "Nama lengkap wajib diisi.");
                valid = false;
            } else {
                hapusError(nama);
            }
        }

        // 5. Validasi Nomor HP / WhatsApp
        const noHp = form.querySelector("[name='no_telepon']");
        if (noHp) {
            if (noHp.value.trim() === "") {
                tampilkanError(noHp, "Nomor kontak wajib diisi.");
                valid = false;
            } else {
                hapusError(noHp);
            }
        }

        if (!valid) {
            e.preventDefault();
        }
    });
}

// Inisialisasi semua script saat halaman selesai dimuat
document.addEventListener("DOMContentLoaded", function () {
    initNavToggle();
    initHapusConfirm();
    initTableFilter();
    initValidasiForm();
});