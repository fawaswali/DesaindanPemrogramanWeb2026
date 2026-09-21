<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Praktikum Pemrograman Web</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
      background: radial-gradient(circle at top, #142033, #0b111e);
      color: #e2e8f0;
      min-height: 100vh;
      padding: 2.5rem 1rem;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .container {
      max-width: 900px;
      width: 100%;
    }

    header {
      text-align: center;
      margin-bottom: 2.5rem;
    }

    header h1 {
      font-size: 2rem;
      font-weight: 700;
      color: #38bdf8;
      margin-bottom: 0.5rem;
      letter-spacing: -0.5px;
    }

    header p {
      color: #94a3b8;
      font-size: 0.95rem;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      gap: 1.25rem;
    }

    .card {
      background: rgba(30, 41, 59, 0.7);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 12px;
      padding: 1.25rem;
      text-decoration: none;
      color: inherit;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
      backdrop-filter: blur(8px);
    }

    .card:hover {
      transform: translateY(-4px);
      border-color: #38bdf8;
      box-shadow: 0 10px 25px -5px rgba(56, 189, 248, 0.15);
    }

    .card-badge {
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: #38bdf8;
      margin-bottom: 0.5rem;
    }

    .card-title {
      font-size: 1.1rem;
      font-weight: 600;
      color: #f8fafc;
      margin-bottom: 0.25rem;
    }

    .card-desc {
      font-size: 0.85rem;
      color: #94a3b8;
      margin-bottom: 1rem;
    }

    .card-footer {
      font-size: 0.8rem;
      font-weight: 500;
      color: #38bdf8;
      display: flex;
      align-items: center;
      gap: 0.25rem;
    }

    .card.featured {
      background: linear-gradient(145deg, rgba(30, 58, 138, 0.4), rgba(15, 23, 42, 0.8));
      border: 1px solid rgba(56, 189, 248, 0.35);
    }

    .card.featured .card-badge {
      color: #67e8f9;
    }

    footer {
      margin-top: 3rem;
      text-align: center;
      font-size: 0.85rem;
      color: #64748b;
    }
  </style>
</head>
<body>

  <div class="container">
    <header>
      <h1>Portal Praktikum</h1>
      <p>Kumpulan tugas Desain dan Pemrograman Web</p>
    </header>

    <div class="grid">
      <a href="jobsheet-01/index.html" class="card">
        <div>
          <span class="card-badge">Tugas 01</span>
          <div class="card-title">Jobsheet 1</div>
          <div class="card-desc">Pengenalan HTML dasar dan struktur dokumen.</div>
        </div>
        <div class="card-footer">Buka Halaman &rarr;</div>
      </a>

      <a href="jobsheet-02/index.html" class="card">
        <div>
          <span class="card-badge">Tugas 02</span>
          <div class="card-title">Jobsheet 2</div>
          <div class="card-desc">Format teks, tabel, list, dan hyperlink HTML.</div>
        </div>
        <div class="card-footer">Buka Halaman &rarr;</div>
      </a>

      <a href="jobsheet-03/index.html" class="card">
        <div>
          <span class="card-badge">Tugas 03</span>
          <div class="card-title">Jobsheet 3</div>
          <div class="card-desc">Styling antarmuka web menggunakan CSS dasar.</div>
        </div>
        <div class="card-footer">Buka Halaman &rarr;</div>
      </a>

      <a href="jobsheet-03-Bootstap/" class="card">
        <div>
          <span class="card-badge">Tugas 03B</span>
          <div class="card-title">Jobsheet 3 Bootstrap</div>
          <div class="card-desc">Implementasi framework CSS Bootstrap.</div>
        </div>
        <div class="card-footer">Buka Halaman &rarr;</div>
      </a>

      <a href="jobsheet-04/index.html" class="card">
        <div>
          <span class="card-badge">Tugas 04</span>
          <div class="card-title">Jobsheet 4</div>
          <div class="card-desc">Desain responsif dan manipulasi tata letak.</div>
        </div>
        <div class="card-footer">Buka Halaman &rarr;</div>
      </a>

      <a href="jobsheet-05/index.html" class="card">
        <div>
          <span class="card-badge">Tugas 05</span>
          <div class="card-title">Jobsheet 5</div>
          <div class="card-desc">Studi kasus dan layout lanjutan.</div>
        </div>
        <div class="card-footer">Buka Halaman &rarr;</div>
      </a>

      <a href="jobsheet-06/index.html" class="card">
        <div>
          <span class="card-badge">Tugas 06</span>
          <div class="card-title">Jobsheet 6</div>
          <div class="card-desc">Formulir interaktif dan input data.</div>
        </div>
        <div class="card-footer">Buka Halaman &rarr;</div>
      </a>

      <a href="jobsheet-07/index.php" class="card">
        <div>
          <span class="card-badge">Tugas 07</span>
          <div class="card-title">Jobsheet 7</div>
          <div class="card-desc">Pemrosesan data form dinamis menggunakan PHP.</div>
        </div>
        <div class="card-footer">Buka Halaman &rarr;</div>
      </a>

      <a href="jobsheet-08/index.php" class="card featured">
        <div>
          <span class="card-badge">Database &bull; PostgreSQL</span>
          <div class="card-title">Jobsheet 8 (Kost Papa)</div>
          <div class="card-desc">Sistem CRUD kamar dan penghuni terintegrasi Supabase.</div>
        </div>
        <div class="card-footer">Akses Sistem &rarr;</div>
      </a>
    </div>

    <footer>
      &copy; 2026 Praktikum Desain &amp; Pemrograman Web
    </footer>
  </div>

</body>
</html>