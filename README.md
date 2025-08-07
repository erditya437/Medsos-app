# Orbitalk 
_Aplikasi Media Sosial Interaktif dengan Laravel 11_



 
 <img width="936" height="442" alt="Cuplikan layar 2025-07-27 102309" src="https://github.com/user-attachments/assets/776c3161-22a5-4c9a-a4b5-72c21ededbdd" />




Orbitalk adalah aplikasi media sosial modern berbasis Laravel 11 yang dirancang untuk menciptakan ruang interaksi sosial yang fleksibel dan dinamis. Dengan kombinasi fitur-fitur khas media sosial masa kini seperti posting, story, komentar berjenjang, chat, tagar, notifikasi, hingga fitur follow dan daftar teman, Orbitalk memberi pengalaman bersosialisasi digital yang natural dan seru.
Orbitalk merupakan platform media sosial lengkap yang menggabungkan:
- ✅ Interaksi sosial (posting, komentar, story),
- ✅ Percakapan pribadi (chat),
- ✅ Koneksi sosial (follow dan teman),
- ✅ serta fitur engagement seperti like, share internal, dan tagar.
- ✅ Cocok dijadikan sebagai proyek portofolio besar atau bahan pengembangan startup sosial berbasis Laravel.



<img width="934" height="444" alt="Cuplikan layar 2025-07-27 102351" src="https://github.com/user-attachments/assets/928753b3-4e0d-4fca-9f0e-4fc85bd8ecfa" />


<img width="937" height="447" alt="Cuplikan layar 2025-07-27 102754" src="https://github.com/user-attachments/assets/9cb26c88-0ddb-459d-84c0-045a46b2b4b4" />


💡 Fitur-Fitur Utama :
   - ✅ Autentikasi & Pengelolaan Akun
   - ✅ Register & Login manual (tanpa Jetstream).
   - ✅ Postingan (Feed)
   - ✅ Pengguna dapat membuat postingan berupa teks, gambar, atau video.
   - ✅ Mendukung tagar seperti #UIUX, #Pemrograman, dll.
   - ✅ Bisa like postingan, komentar, dan balas komentar (nested replies).
   - ✅ Like komentar juga tersedia.
   - ✅ Postingan bisa di-share ke pengguna lain via chat internal.
   - ✅ Share masuk ke notifikasi dan chat penerima.

💬 Komentar:
   - ✅ Pengguna dapat mengirim komentar berupa foto dan vidio.
   - ✅ Pengguna dapat like komentar.
   - ✅ Pengguna dapat membalas komentar.

🖼️ Story :
   - ✅ Pengguna dapat membuat story, mirip Instagram.
   - ✅ Story hanya muncul jika sudah berteman.
   - ✅ Bisa like story, dan komen story.
   - ✅ Story bersifat sementara (misalnya 24 jam).
   - ✅ Tampil di bagian atas halaman (seperti carousel).
   - ✅ Sistem Pertemanan & Follow
   - ✅ Bisa follow / unfollow pengguna lain.
   - ✅ Ada juga fitur daftar teman (mutual).

👥 daftar teman bisa:
   - ✅ Hapus teman
   - ✅ Kirim pesan langsung (chat)
   - ✅ Lihat profil mereka


📨 Fitur Chat:
   - ✅ Chat personal antar pengguna yang sudah berteman.
   - ✅ Kirim teks, gambar, dan video.
   - ✅ Riwayat percakapan tersimpan.
      - Jika seseorang share postingan ke kamu, akan otomatis muncul di chat.


🔔 Notifikasi
  - Notifikasi muncul saat:
  -  ✅ Ada permintaan teman
  -  ✅ Like atau komentar di postingan
  -  ✅ like story/komentar story
  -  ✅ share postingan

🔁 Balasan komentar:
   - ✅ Like/komen di story
   - ✅ Postingan dibagikan oleh orang lain ke kamu
   - ✅ Notifikasi real-time (via refresh atau polling ringan)
   - ✅ Replies to replies
  

💻 Teknologi yang Digunakan:
   - ✅Framework: Laravel 11
   - ✅Frontend: Blade + HTML + CSS + JavaScript
   - ✅Database: MySQL (users, posts, comments, replies, stories, follows, chats, notifications, tags, likes)
   - ✅Penyimpanan media: Folder public
   - ✅Auth: Session manual
   - ✅Routing: Web route + middleware auth


## 🚀 Cara Menjalankan Orbitalk

Berikut langkah-langkah untuk menjalankan proyek ini secara lokal:

### 1.Install Dependency
### 2.Konfigurasi Database
### 3.Migrasi Tabel
### 4.jalankan
### 5.buka di browser

```bash
composer install
npm install
npm run build
```

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medsos_app
DB_USERNAME=root
DB_PASSWORD=
```


```bash
php artisan migrate
```
```bash
php artisan serve
```

```bash
 http://localhost:8000
```







