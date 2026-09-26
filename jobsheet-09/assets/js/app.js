document.addEventListener('DOMContentLoaded', () => {
    // 1. Toggle Menu Navigasi Mobile
    const toggleBtn = document.getElementById('nav-toggle-btn');
    const nav = document.querySelector('nav');

    if (toggleBtn && nav) {
        toggleBtn.addEventListener('click', () => {
            nav.classList.toggle('active');
        });
    }

    // 2. Konfirmasi Hapus via Event submit form (sesuai materi Jobsheet 9)
    const formHapusList = document.querySelectorAll('.form-hapus');
    formHapusList.forEach(form => {
        form.addEventListener('submit', (e) => {
            const yakin = confirm('Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.');
            if (!yakin) {
                e.preventDefault(); // Batalkan pengiriman form jika memilih Cancel
            }
        });
    });
});