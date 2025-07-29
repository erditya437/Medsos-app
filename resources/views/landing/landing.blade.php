<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Elegant Scroll Transition</title>
  <link rel="stylesheet" href="/css/landing.css" />
</head>
<body>
  <!-- Navbar -->
  <header id="navbar" class="navbar">
  <nav class="nav-container">
    <div class="nav-left">
      <a href="#">Home</a>
      <a href="#">About</a>
    </div>
    <div class="nav-center" id="brand-navbar">
      <img src="{{ asset('logo.jpg') }}" alt="Logo" class="logo-navbar">
      <span class="brand-text">Orbitalk</span>
    </div>
    <div class="nav-right">
      <a href="/login">Login</a>
     <a href="/register">Register</a>
    </div>
  </nav>
</header>

<section class="hero">
  <div id="brand-hero" class="brand-hero">
    <img src="{{ asset('logo.jpg') }}" alt="Logo" class="logo-hero">
    <h1>Orbitalk</h1>
  </div>
</section>




  <!-- gallery -->

<section class="brand-gallery">
  <div class="gallery-header">
    <div>
      <h2>Apa Yang Ada Di "Orbitalk"</h2>
      <p>Gaya terbaru, kualitas terbaik, cocok untuk segala suasana.</p>
    </div>
    <div class="gallery-controls">
      <button class="scroll-left">←</button>
      <button class="scroll-right">→</button>
    </div>
  </div>

  <div class="gallery-track" id="galleryTrack">
    <div class="gallery-item">
     <img src="{{ asset('landing-gallery/Cuplikan layar 2025-07-17 204609.png') }}" alt="Outfit 1">
      <p>Like dan komentar Postingan</p>
    </div>
    <div class="gallery-item">
     <img src="{{ asset('landing-gallery/Cuplikan layar 2025-07-17 204651.png') }}" alt="Outfit 1">
      <p>Follow</p>
    </div>
    <div class="gallery-item">
     <img src="{{ asset('landing-gallery/Cuplikan layar 2025-07-17 204909.png') }}" alt="Outfit 1">
      <p>Chat antar pengguna</p>
    </div>
    <div class="gallery-item">
     <img src="{{ asset('landing-gallery/Cuplikan layar 2025-07-17 205104.png') }}" alt="Outfit 1">
      <p>Tmpilan Ui yang menarik</p>
    </div>
    <div class="gallery-item">
     <img src="{{ asset('landing-gallery/Cuplikan layar 2025-07-17 205320.png') }}" alt="Outfit 1">
      <p>Beragam Fitur</p>
    </div>
    <div class="gallery-item">
      <img src="{{ asset('landing-gallery/Cuplikan layar 2025-07-17 205355.png') }}" alt="Outfit 1">
      <p>Mudah</p>
    </div>
  </div>
</section>


<!-- testimony -->

<section class="testimoni">
  <p class="subtitle">Apa kata mereka tentang Orbitalk?</p>

  <div class="testimoni-container">
    <!-- Testimoni 1 -->
    <div class="testimoni-card">
      <img src="{{ asset('landing-gallery/啵子汽水.jpg') }}" alt="Outfit 1" class="user-img">
      <p class="quote">“Orbitalk bikin sosialisasi online jauh lebih nyaman dan simpel!”</p>
      <h4>Dinda</h4>
      <span class="alamat">Jakarta</span>
      <div class="stars">⭐⭐⭐⭐⭐</div>
    </div>

    <!-- Testimoni 2 -->
    <div class="testimoni-card">
       <img src="{{ asset('landing-gallery/𝗣𝘁𝗿𝗮𝗻𝗴.jpg') }}" alt="Outfit 1" class="user-img">
      <p class="quote">“Pokoknya mantap aku bisa saling berteman dengan orang lain”</p>
      <h4>celsi</h4>
      <span class="alamat">Bandung</span>
      <div class="stars">⭐⭐⭐⭐</div>
    </div>

    <!-- Testimoni 3 -->
    <div class="testimoni-card">
      <img src="{{ asset('landing-gallery/download.jpg') }}" alt="Outfit 1" class="user-img">
      <p class="quote">“woo Amazing!!! mantap Keren”</p>
      <h4>Lia</h4>
      <span class="alamat">Surabaya</span>
      <div class="stars">⭐⭐⭐⭐⭐</div>
    </div>
  </div>
</section>



  <!-- About Section -->
 <section class="about">
  <div class="about-container">
    <!-- Kiri: Foto -->
    <div class="about-left">
      <img src="{{ asset('landing-gallery/Cuplikan layar 2025-07-18 193216.png') }}" alt="Outfit 1">
    </div>

    <!-- Kanan: Info + Statistik -->
    <div class="about-right">
      <h2>About Orbitalk</h2>
     <p>Orbitalk adalah platform sosial media modern yang memungkinkan kamu berinteraksi, berbagi momen, dan membangun komunitas positif. Diluncurkan sejak 2025, Orbitalk telah menjadi ruang aman untuk bersosialisasi secara digital dengan pengalaman pengguna yang cepat dan ringan.</p>

    <div class="stats">
    <div class="stat">
        <h3><span class="counter" data-target="10000">0</span>+</h3>
        <p>Pelanggan Puas</p>
    </div>
    <div class="stat">
        <h3><span class="counter" data-target="50000">0</span>+</h3>
        <p>Produk Terjual</p>
    </div>
    <div class="stat">
        <h3><span class="counter" data-target="4.8">0</span>/5⭐</h3>
        <p>Rating Pelanggan</p>
    </div>
    </div>

    </div>
  </div>
</section>



<section class="location">
  <div class="location-container">
    <!-- Map -->
    <div class="map-container">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.9846326815043!2d106.822743!3d-6.183763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3eac5e2f679%3A0x50474a2b0e0b1c45!2sMonumen%20Nasional!5e0!3m2!1sen!2sid!4v1623333333333!5m2!1sen!2sid" 
        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
      </iframe>
    </div>

    <!-- Info -->
    <div class="info-container">
      <h3>Lokasi Kami</h3>
      <p>Monumen Nasional<br>Jakarta Pusat, Indonesia</p>
      <p><strong>Jam Buka:</strong><br>Senin - Jumat: 08.00 - 17.00</p>
      <p><strong>Telepon:</strong><br>+62 812 3456 7890</p>
    </div>
  </div>
</section>

 <!-- kontak -->


<section class="contact">
  <div class="contact-container">
    <h2>Hubungi Kami Langsung</h2>
    <p>Kamu bisa kirim pertanyaan langsung ke WhatsApp atau hubungi kami lewat media sosial berikut:</p>

    <form id="waForm">
      <input type="text" id="name" placeholder="Nama kamu..." required>
      <textarea id="message" rows="4" placeholder="Tulis pesan kamu di sini..." required></textarea>
      <button type="submit">Kirim ke WhatsApp</button>
    </form>
  </div>
</section>


<footer class="main-footer">
  <div class="footer-container">
    <!-- Brand & Deskripsi -->
    <div class="footer-brand">
      <h2>Orbitalk by Erditya<span>.</span></h2>
      <p>Temukan gaya terbaikmu di sini.  yang menghadirkan koneksi.</p>
    </div>

    <!-- Navigasi -->
    <div class="footer-nav">
      <h4>Menu</h4>
      <ul>
        <li><a href="#beranda">Beranda</a></li>
        <li><a href="#about">Tentang Kami</a></li>
        <li><a href="#produk">Produk</a></li>
        <li><a href="#kontak">Kontak</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div class="footer-contact">
      <h4>Hubungi Kami</h4>
      <p><strong>Alamat:</strong><br>Jl. Bandung Street No.12, Jakarta</p>
      <p><strong>Email:</strong><br>support@outfit.com</p>
      <p><strong>Telepon:</strong><br>+62 812 3456 7890</p>
    </div>

    <!-- Sosial Media -->
    <div class="footer-social">
      <h4>Ikuti Kami</h4>
      <div class="social-icons">
        <a href="#"><img src="icon/facebook.png" alt="Facebook" /></a>
        <a href="#"><img src="icon/instagram.png" alt="Instagram" /></a>
        <a href="#"><img src="icon/twitter.png" alt="Twitter" /></a>
        <a href="#"><img src="icon/youtube.png" alt="YouTube" /></a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>Orbitalk hadir untuk kamu yang ingin terhubung, berbagi cerita, dan membangun komunitas tanpa batas. Gratis, cepat, dan aman.</p>
  </div>
</footer>




<script src="/landing/landing.js"></script>
<script src="/landing/outfit.js"></script>
<script src="/landing/about.js"></script>
</body>
</html>
