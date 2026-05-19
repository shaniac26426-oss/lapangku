# RentSport - Sistem Pemesanan Lapangan Olahraga

**RentSport** adalah aplikasi berbasis web yang memungkinkan pengguna untuk melakukan **pemesanan lapangan olahraga** (seperti futsal, badminton, dan tenis) dengan sistem yang terintegrasi. Aplikasi ini memungkinkan pengguna untuk **melakukan reservasi lapangan**, melakukan **pembayaran online**, serta memberi **rating dan review** lapangan yang mereka sewa.

## Fitur Utama

### 1. **Login dan Registrasi**
   - Pengguna dapat **login** menggunakan akun yang terdaftar atau melakukan **registrasi** untuk membuat akun baru.
   - Terdapat dua jenis akun: **Pengguna** (penyewa lapangan) dan **Admin** (pemilik lapangan yang mengelola lapangan).

### 2. **Dashboard Pengguna**
   - Pengguna dapat memilih **jenis lapangan** yang tersedia (futsal, badminton, tenis).
   - Melakukan **pemeriksaan ketersediaan lapangan** berdasarkan waktu dan tanggal.
   - Melakukan **reservasi lapangan** dan **pembayaran online** untuk konfirmasi pemesanan.
   - Mendapatkan **notifikasi otomatis** jika pemesanan berhasil atau ada perubahan jadwal.

### 3. **Dashboard Admin**
   - Admin dapat **mengelola jadwal lapangan**, menambah atau mengubah lapangan yang tersedia.
   - Admin dapat **melihat reservasi yang masuk**, serta **mengonfirmasi atau menolak pemesanan**.
   - Admin juga dapat melihat **laporan transaksi** terkait pemesanan lapangan.

### 4. **Backup Database**
   - Sistem melakukan **backup database otomatis** secara berkala, termasuk data pemesanan, transaksi, dan review lapangan.
   - **Script backup otomatis** menggunakan timestamp untuk menyimpan file backup dengan nama yang berbeda setiap kali.

---

## Teknologi yang Digunakan

- **Backend**: PHP, MySQL
- **Frontend**: HTML, CSS (Bootstrap), JavaScript.
- **Database**: MySQL
- **Fitur Lain**:
  - **Stored Procedures**: Untuk transaksi pemesanan dan konfirmasi.
  - **Stored Functions**: Untuk perhitungan biaya sewa lapangan.
  - **Triggers**: Untuk mengirimkan notifikasi atau memperbarui status secara otomatis.

---

## Instalasi

### 1. **Clone Repository**
   - Clone repositori ini ke komputer lokal:
     ```bash
     git clone https://github.com/Putraa70/rentsport.git
     ```

### 2. **Masuk ke Direktori Proyek**
   ```bash
   cd rentsport
   ```


## Fitur-fitur dan Penjelasan

### 1. **Fitur Booking Lapangan**
   - Pengguna dapat memilih **lapangan** yang tersedia, memeriksa **jadwal kosong**, dan melakukan **pemesanan** dengan pilihan waktu yang diinginkan.
   - Pemesanan dilakukan melalui **stored procedure** `ReservasiLapangan` yang memastikan integritas data dan transaksi yang konsisten menggunakan **transaction**.

### 2. **Perhitungan Biaya**
   - Biaya sewa lapangan dihitung melalui **stored function** `HitungTotalBiaya`, yang memanfaatkan harga per jam lapangan dan durasi pemesanan.

### 3. **Konfirmasi Reservasi oleh Admin**
   - **Admin** dapat mengonfirmasi atau menolak pemesanan dengan mengubah status pemesanan melalui **stored procedure** `ConfirmReservation`.

### 4. **Backup dan Restore Database**
   - Database secara otomatis dibackup dengan nama file yang berbeda-beda menggunakan **timestamp**. Kamu dapat mengelola dan mengatur backup database secara manual atau menggunakan **script** yang telah disediakan.

---

## Struktur Database

### **Tabel-tabel Utama**

1. **users**
   - Menyimpan data pengguna (penyewa dan admin).
   
2. **fields**
   - Menyimpan data lapangan olahraga (futsal, badminton, tenis).
   
3. **reservations**
   - Menyimpan data pemesanan lapangan.
   
4. **transactions**
   - Menyimpan data transaksi pembayaran pemesanan.
   
5. **reviews**
   - Menyimpan data review dan rating dari pengguna.

---

### **Stored Procedures**

- **ConfirmReservation**: Digunakan oleh admin untuk mengonfirmasi pemesanan.
- **ReservasiLapangan**: Digunakan untuk membuat pemesanan lapangan dengan transaksi atomik.

---

### **Stored Functions**

- **HitungTotalBiaya**: Digunakan untuk menghitung biaya sewa lapangan berdasarkan harga per jam dan durasi.

---

### **Triggers**

- **PembatalanOtomatisReservasi**: Secara otomatis membatalkan reservasi yang statusnya "pending" lebih dari 10 menit.
- **PerbaruiStatusLapanganSetelahPembayaran**: Memperbarui status lapangan menjadi "terpesan" setelah pembayaran berhasil.


