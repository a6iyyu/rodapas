<h1 align="center">RODAPAS</h1>
<p align="center">
<em>Robot untuk Sistem Pembayaran Berbasis Suara</em>
</p>

## Deskripsi

**RODAPAS** (Robot Pembayaran Suara) adalah sebuah sistem inovatif yang menggabungkan teknologi pengenalan suara, antarmuka web, dan integrasi dengan bot Telegram untuk mencatat dan mengelola transaksi penjualan secara otomatis. Sistem ini dirancang untuk digunakan oleh usaha kecil menengah (UMKM) seperti kedai atau restoran, di mana pelanggan dapat memesan hanya dengan mengucapkan nama menu yang tersedia.

Sistem terdiri dari dua komponen utama: mikrokontroler dengan mikrofon untuk menangkap perintah suara pelanggan, serta website berbasis Laravel yang mencatat dan merekap transaksi harian. Setiap malam, rekap transaksi akan dikirim secara otomatis ke pemilik usaha melalui bot Telegram.

## Fitur

- Melihat dan mengelola data menu (tambah, ubah, hapus).
- Mencatat pengeluaran operasional harian.
- Menerima data pesanan secara otomatis dari perangkat mikrofon ESP32.
- Melihat rekap pemasukan dan pengeluaran harian.
- Mengakses laporan bulanan dalam bentuk grafik.
- Menerima rekap transaksi otomatis dari bot Telegram setiap kali toko tutup.

## Teknologi yang Digunakan

- **_Frontend_** — Blade dan TypeScript
- **_Backend_** — Laravel 12
- **_Database_** — MySQL
- **_Microcontroller_** — ESP32 dengan sensor suara dan LCD display
- **_Komunikasi_** — HTTP Client (ESP32 ke Laravel), Telegram Bot API
- **_Speech-to-Text_** — Pemrosesan suara dari ESP32 ke Laravel untuk diubah menjadi teks (rencana ekstensi fitur)

## Harapan

Dengan RODAPAS, proses transaksi di UMKM diharapkan menjadi lebih modern, efisien, dan tanpa sentuhan fisik. Sistem ini mampu mengurangi antrean, mempermudah pencatatan keuangan, serta membantu pemilik usaha dalam memantau performa harian secara real-time dari perangkat mana pun.

## Lisensi

Proyek ini dilisensikan di bawah [Apache-2.0 License](https://github.com/a6iyyu/rodapas/blob/main/LICENSE) — atau disesuaikan sesuai kebutuhan proyek Anda.