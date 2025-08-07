 Orbitalk — Aplikasi Media Sosial Interaktif dengan Laravel 11
 
 <img width="936" height="442" alt="Cuplikan layar 2025-07-27 102309" src="https://github.com/user-attachments/assets/776c3161-22a5-4c9a-a4b5-72c21ededbdd" />

Orbitalk adalah aplikasi media sosial modern berbasis Laravel 11 yang dirancang untuk menciptakan ruang interaksi sosial yang fleksibel dan dinamis. Dengan kombinasi fitur-fitur khas media sosial masa kini seperti posting, story, komentar berjenjang, chat, tagar, notifikasi, hingga fitur follow dan daftar teman, Orbitalk memberi pengalaman bersosialisasi digital yang natural dan seru.


Fitur-Fitur 
Autentikasi & Pengelolaan Akun
Register & Login manual (tanpa Jetstream).


<img width="934" height="444" alt="Cuplikan layar 2025-07-27 102351" src="https://github.com/user-attachments/assets/928753b3-4e0d-4fca-9f0e-4fc85bd8ecfa" />

Postingan (Feed)
Pengguna dapat membuat postingan berupa teks, gambar, atau video.

Mendukung tagar seperti #UIUX, #Pemrograman, dll.

Bisa like postingan, komentar, dan balas komentar (nested replies).

Like komentar juga tersedia.

Postingan bisa di-share ke pengguna lain via chat internal.

Share masuk ke notifikasi dan chat penerima.

 Story 
Pengguna dapat membuat story, mirip Instagram.

Story hanya muncul jika sudah berteman.

Bisa like story, dan komen story.

Story bersifat sementara (misalnya 24 jam).

Tampil di bagian atas halaman (seperti carousel).

Sistem Pertemanan & Follow
Bisa follow / unfollow pengguna lain.

Ada juga fitur daftar teman (mutual).

Di daftar teman bisa:

Hapus teman

Kirim pesan langsung (chat)

Lihat profil mereka


Fitur Chat
Chat personal antar pengguna yang sudah berteman.

Kirim teks, gambar, dan video.

Riwayat percakapan tersimpan.

Jika seseorang share postingan ke kamu, akan otomatis muncul di chat.


Notifikasi
Notifikasi muncul saat:

Ada permintaan teman

Like atau komentar di postingan

Balasan komentar

Like/komen di story

Postingan dibagikan oleh orang lain ke kamu

Notifikasi real-time (via refresh atau polling ringan)

Tagar & Inspirasi
Saat membuat postingan, pengguna bisa menambahkan tagar (#).

Tagar berguna untuk kategori dan inspirasi, misalnya:

#UIUX

#Coding

#Laravel

#Motivasi



Teknologi yang Digunakan
Framework: Laravel 11

Frontend: Blade + HTML + CSS + JavaScript

Database: MySQL (users, posts, comments, replies, stories, follows, chats, notifications, tags, likes)

Penyimpanan media: Folder public

Auth: Session manual

Routing: Web route + middleware auth


Orbitalk merupakan platform media sosial lengkap yang menggabungkan:

Interaksi sosial (posting, komentar, story),

Percakapan pribadi (chat),

Koneksi sosial (follow dan teman),

serta fitur engagement seperti like, share internal, dan tagar.

Cocok dijadikan sebagai proyek portofolio besar atau bahan pengembangan startup sosial berbasis Laravel.
