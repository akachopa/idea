# IDEA ERP - Enterprise Resource Planning

Sistem ERP berbasis Laravel 13 dan PostgreSQL untuk manajemen institusi pendidikan, pendaftaran siswa, keuangan, akademik, sertifikasi, penempatan kerja, kemitraan industri, dan pelacakan alumni.

## 🌟 Modul & Halaman

Sistem ini mengimplementasikan 9 modul lengkap:

1. **Dashboard Eksekutif** (`/`) - Ringkasan KPI eksekutif, tren pendaftaran & keuangan, pipeline seleksi, jadwal asesmen & interview, log aktivitas.
2. **Admission Management** (`/admission`) - Pipeline pendaftaran siswa, status seleksi (seleksi berkas, tes wawancara, tes kompetensi), dan pendaftaran siswa baru.
3. **Finance Overview** (`/finance`) - Ringkasan pendapatan per cabang, rincian metode pembayaran, tagihan jatuh tempo, dan pencatatan invoice.
4. **Student Management** (`/students`) - Direktori siswa aktif, status kesiapan penempatan, kehadiran, nilai rata-rata, dan penambahan data siswa.
5. **Assessment & Certification** (`/assessments`) - Hasil ujian, status sertifikasi BNSP/Industri, penerbitan sertifikat digital.
6. **Career & Placement** (`/placements`) - Manajemen lowongan kerja mitra global, pipeline kandidat, wawancara, dan proses visa keberangkatan.
7. **Industry Partners** (`/partners`) - Direktori mitra hotel, cruise line, maskapai, dan korporat, MoU / kontrak kerjasama.
8. **Alumni Tracking** (`/alumni`) - Tracer study alumni di dalam & luar negeri, sebaran negara kerja, bidang karier, dan jaringan mentor.
9. **Reports & Analytics** (`/reports`) - Analitik lintas modul, laporan terjadwal, dan ekspor CSV langsung dari database.

---

## 🗄️ Database PostgreSQL

Paket database PostgreSQL telah disediakan di folder [`database/sql/`](database/sql/):
- `idea_erp_postgresql_full.sql`: Skema lengkap (114 tabel + 6 database views) beserta data awal / seeder.
- `idea_erp_postgresql_schema.sql`: Skema DDL tabel dan views.
- `idea_erp_postgresql_seed.sql`: Data contoh untuk semua modul.

### Views Database:
- `v_executive_dashboard`
- `v_admission_pipeline`
- `v_finance_branch_summary`
- `v_student_progress_summary`
- `v_placement_dashboard`
- `v_partner_hiring_summary`

---

## 🚀 Panduan Instalasi & Menjalankan

### 1. Prasyarat
- PHP >= 8.2 (disarankan PHP 8.3/8.4)
- Composer
- PostgreSQL 14+
- Ekstensi PHP: `pdo_pgsql`, `pgsql`, `mbstring`, `openssl`, `curl`

### 2. Konfigurasi Database
Buat database di PostgreSQL:
```sql
CREATE DATABASE idea_erp;
```
Import skema & data:
```bash
psql -U postgres -d idea_erp -f database/sql/idea_erp_postgresql_full.sql
```

### 3. Konfigurasi Environment
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Sesuaikan konfigurasi koneksi PostgreSQL pada `.env`:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=idea_erp
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 4. Instalasi Dependensi & Setup Key
```bash
composer install
php artisan key:generate
php artisan migrate --seed
```

### 5. Jalankan Aplikasi
```bash
php artisan serve
```
Buka browser pada: `http://127.0.0.1:8000`

---

## 📂 Struktur Proyek
- `app/Http/Controllers/ErpController.php` - Controller utama untuk 9 modul & aksi formulir.
- `resources/views/erp/` - Template Blade untuk ke-9 modul IDEA ERP.
- `routes/web.php` - Rute aplikasi web & API export.
- `database/sql/` - File SQL dump PostgreSQL IDEA ERP.
