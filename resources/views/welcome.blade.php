@extends('layouts.user')
@section('content')

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Banner dengan animasi zoom in -->
<div class="hero-slider">
    <div class="slides">
        <img src="{{ asset('user/images/es.png') }}" class="slide active">
        <img src="{{ asset('user/images/esi.jpg') }}" class="slide">
        <img src="{{ asset('user/images/esuy.jpeg') }}" class="slide">
    </div>
</div>

<style>
    /* ============================================ */
    /* HERO SLIDER STYLES */
    /* ============================================ */
    .hero-slider {
        width: 100%;
        height: 700px;
        position: relative;
        overflow: hidden;
        background-color: #000;
    }

    .hero-slider .slides {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .hero-slider .slide {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .hero-slider .slide.active {
        opacity: 1;
        animation: zoomIn 1.5s ease-out;
    }

    /* ============================================ */
    /* ANIMATIONS */
    /* ============================================ */
    
    /* Animasi Banner */
    @keyframes zoomIn {
        from {
            transform: scale(1.2);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Trophy Animation */
    @keyframes trophy-bounce {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        25% { transform: translateY(-10px) rotate(-5deg); }
        50% { transform: translateY(0) rotate(0deg); }
        75% { transform: translateY(-5px) rotate(5deg); }
    }

    .trophy-animate {
        animation: trophy-bounce 3s ease-in-out infinite;
    }

    /* Card Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Stats Counter */
    @keyframes countUp {
        from { opacity: 0; transform: scale(0.5); }
        to { opacity: 1; transform: scale(1); }
    }

    .stat-number {
        animation: countUp 0.8s ease-out;
    }

    /* Animasi untuk Section One */
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.8);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .flex-item.left {
        animation: slideInLeft 1s ease-out;
    }

    .flex-item.right {
        animation: slideInRight 1s ease-out;
    }

    .flex-item.image {
        animation: scaleIn 1s ease-out;
    }

    /* Animasi hover untuk gambar tengah */
    .flex-item.image img {
        transition: transform 0.3s ease;
    }

    .flex-item.image img:hover {
        transform: scale(1.05) rotate(2deg);
    }

    /* Animasi untuk card eskul */
    @keyframes fadeInUpCard {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .box {
        animation: fadeInUpCard 0.6s ease-out backwards;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .box:nth-child(1) { animation-delay: 0.1s; }
    .box:nth-child(2) { animation-delay: 0.2s; }
    .box:nth-child(3) { animation-delay: 0.3s; }
    .box:nth-child(4) { animation-delay: 0.4s; }
    .box:nth-child(5) { animation-delay: 0.5s; }
    .box:nth-child(6) { animation-delay: 0.6s; }
    .box:nth-child(7) { animation-delay: 0.7s; }
    .box:nth-child(8) { animation-delay: 0.8s; }

    .box:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    /* Animasi untuk gambar dalam card */
    .box .image img {
        transition: transform 0.4s ease;
    }

    .box:hover .image img {
        transform: scale(1.1);
    }

    /* Animasi untuk heading */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h2, h3 {
        animation: fadeInDown 0.8s ease-out;
    }

    /* Animasi pulse untuk notifikasi */
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.02);
        }
    }

    .alert-diterima, .alert-ditolak {
        animation: fadeSlideIn 0.8s ease-out forwards, pulse 2s ease-in-out infinite;
    }

    @keyframes fadeSlideIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animasi untuk tombol */
    @keyframes buttonGlow {
        0%, 100% {
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.5);
        }
        50% {
            box-shadow: 0 6px 20px rgba(11, 60, 93, 0.8);
        }
    }

    /* Animasi float untuk icon */
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    .icon-float {
        animation: float 2s ease-in-out infinite;
    }

    /* ============================================ */
    /* GENERAL STYLES */
    /* ============================================ */
    
    /* Background Pattern */
    .prestasi-hero {
        background: linear-gradient(135deg, #1e3039 0%, #55b0fc 100%);
        position: relative;
        overflow: hidden;
    }

    /* Medal Colors */
    .medal-gold { color: #FFD700; }
    .medal-silver { color: #C0C0C0; }
    .medal-bronze { color: #CD7F32; }

    header.major h2 {
        font-family: 'arsenal', sans-serif;
        font-weight: 700;
        font-size: 2.3rem;
    }   

    header.major p {
        font-family: 'Nunito', sans-serif;
        font-size: 1.1rem;
        color: #bdbdbd;
    }

    /* ============================================ */
    /* NOTIFICATION STYLES */
    /* ============================================ */
    
    .alert-diterima {
        background-color: #e8f5e9;
        border-left: 5px solid #2e7d32;
        padding: 20px;
        border-radius: 8px;
        color: #1b5e20;
        font-family: 'Nunito', sans-serif;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        opacity: 0;
        transform: translateY(30px);
    }

    .icon-pulse {
        display: inline-block;
        animation: pulseIcon 1.2s ease-in-out infinite;
        color: #43a047;
        margin-top: 5px;
    }

    @keyframes pulseIcon {
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.7;
        }
    }

    .alert-ditolak {
        background-color: #fff8e1;
        border-left: 5px solid #f9a825;
        padding: 20px;
        border-radius: 8px;
        color: #795548;
        font-family: 'Nunito', sans-serif;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        opacity: 0;
        transform: translateY(30px);
    }

    .icon-shake {
        display: inline-block;
        animation: shakeIcon 1s infinite;
        color: #e74c3c;
        margin-top: 5px;
    }

    @keyframes shakeIcon {
        0% { transform: rotate(0deg); }
        25% { transform: rotate(10deg); }
        50% { transform: rotate(-10deg); }
        75% { transform: rotate(10deg); }
        100% { transform: rotate(0deg); }
    }

    .btn-coba-lagi {
        margin-top: 15px;
        display: inline-block;
        background-color: #002147;
        color: #fff;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-coba-lagi:hover {
        background-color: #00472cff;
    }

    /* ============================================ */
    /* RESPONSIVE STYLES FOR MOBILE */
    /* ============================================ */
    
    @media screen and (max-width: 768px) {
        /* Hero Slider */
        .hero-slider {
            height: 300px !important;
        }

        /* Hero Section */
        .prestasi-hero {
            padding: 50px 20px !important;
        }

        .prestasi-hero h1 {
            font-size: 2em !important;
            margin-bottom: 15px !important;
        }

        .prestasi-hero p {
            font-size: 1em !important;
            padding: 0 10px;
        }

        .trophy-animate i {
            font-size: 3em !important;
        }

        /* Stats Counter - Stack vertically */
        .prestasi-hero .inner > div:last-of-type {
            flex-direction: column !important;
            gap: 30px !important;
            margin-top: 30px !important;
        }

        .stat-number div:first-child {
            font-size: 2em !important;
        }

        .stat-number div:last-child {
            font-size: 0.9em !important;
        }

        /* Section One - Stack vertically */
        #one .flex-3 {
            flex-direction: column !important;
            gap: 30px !important;
        }

        #one .flex-item h3 {
            font-size: 1.3em !important;
        }

        #one .flex-item p {
            font-size: 0.95em !important;
        }

        /* Logo tengah */
        #one img {
            width: 200px !important;
            max-height: 200px !important;
        }

        /* Section Two - Header */
        header.major h2 {
            font-size: 1.5rem !important;
            padding: 0 15px;
        }

        header.major p {
            font-size: 0.95rem !important;
            padding: 0 15px;
        }

        #two {
            padding: 30px 15px !important;
        }

        /* Eskul Grid - 1 column on mobile */
        #eskul .inner {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
            padding: 0 15px;
        }

        .box {
            margin-bottom: 0 !important;
        }

        .box .image {
            height: 250px !important;
        }

        .box h3 {
            font-size: 1.2em !important;
            min-height: auto !important;
        }

        .box p {
            font-size: 0.9em !important;
            min-height: auto !important;
        }

        /* Notifications */
        .alert-diterima, 
        .alert-ditolak,
        div[style*="background-color: #e0f7fa"],
        div[style*="background-color: #fff3e0"] {
            margin: 20px 15px !important;
            padding: 15px !important;
            font-size: 0.9em !important;
        }

        .alert-diterima p,
        .alert-ditolak p {
            font-size: 0.85em !important;
        }

        /* Cetak Kartu Button */
        a[href*="kartu.eskul"] {
            width: 120px !important;
            height: 40px !important;
            font-size: 14px !important;
        }

        .btn-coba-lagi {
            padding: 8px 16px !important;
            font-size: 0.9em !important;
        }

        /* Disable hover animations on mobile */
        .box:hover {
            transform: none !important;
        }

        .flex-item.image img:hover {
            transform: none !important;
        }
    }

    @media screen and (max-width: 480px) {
        /* Extra small devices */
        .hero-slider {
            height: 250px !important;
        }

        .prestasi-hero {
            padding: 40px 15px !important;
        }

        .prestasi-hero h1 {
            font-size: 1.5em !important;
        }

        .prestasi-hero p {
            font-size: 0.9em !important;
        }

        .trophy-animate i {
            font-size: 2.5em !important;
        }

        .stat-number div:first-child {
            font-size: 1.8em !important;
        }

        header.major h2 {
            font-size: 1.3rem !important;
        }

        #one img {
            width: 150px !important;
            max-height: 150px !important;
        }

        .box .image {
            height: 200px !important;
        }
    }

    /* Tablet Portrait */
    @media screen and (min-width: 769px) and (max-width: 1024px) {
        #eskul .inner {
            grid-template-columns: repeat(2, 1fr) !important;
        }

        .prestasi-hero h1 {
            font-size: 2.5em !important;
        }
    }
</style>

<!-- JavaScript untuk Hero Slider -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.hero-slider .slide');
        let currentSlide = 0;
        const slideInterval = 4000; // 4 detik

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (i === index) {
                    slide.classList.add('active');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        // Auto slide
        setInterval(nextSlide, slideInterval);

        // Inisialisasi slide pertama
        showSlide(0);
    });
</script>

<!-- Hero Section -->
<section class="prestasi-hero" style="padding: 100px 0; position: relative;">
    <div class="inner" style="text-align: center; color: white; position: relative; z-index: 1;">
        <div class="trophy-animate" style="display: inline-block; margin-bottom: 30px;">
            <i class="fas fa-trophy" style="font-size: 5em; color: #FFD700; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.3));"></i>
        </div>
        
        <h1 style="font-size: 3.5em; margin-bottom: 20px; color: white; font-weight: bold; text-shadow: 0 4px 10px rgba(0,0,0,0.3);">
            Hall of Fame – Champion of Champions
        </h1>
        <p style="font-size: 1.4em; opacity: 0.95; max-width: 700px; margin: 0 auto; line-height: 1.6;">
            Prestasi membanggakan yang telah diraih oleh siswa-siswi SMK Assalaam Bandung melalui berbagai ekstrakurikuler
        </p>

        <!-- Stats Counter -->
        <div style="display: flex; justify-content: center; gap: 60px; margin-top: 50px; flex-wrap: wrap;">
            <div class="stat-number">
                <div style="font-size: 3em; font-weight: bold; color: #FFD700;">{{ $totalPrestasi ?? 0 }}</div>
                <div style="font-size: 1.1em; opacity: 0.9;">Total Prestasi</div>
            </div>
            <div class="stat-number" style="animation-delay: 0.2s;">
                <div style="font-size: 3em; font-weight: bold; color: #FFD700;">{{ $totalEskul ?? 0 }}</div>
                <div style="font-size: 1.1em; opacity: 0.9;">Ekstrakurikuler</div>
            </div>
            <div class="stat-number" style="animation-delay: 0.4s;">
                <div style="font-size: 3em; font-weight: bold; color: #FFD700;">{{ $tahunAktif ?? date('Y') }}</div>
                <div style="font-size: 1.1em; opacity: 0.9;">Tahun Aktif</div>
            </div>
        </div>
    </div>

    <!-- Wave Divider -->
    <div style="position: absolute; bottom: -1px; left: 0; width: 100%; line-height: 0;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" style="display: block; width: 100%; height: 80px;">
            <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Notifikasi -->
@php
    $daftar = \App\Models\DaftarEskul::where('user_id', Auth::id())->latest()->first();
@endphp

@if($daftar && $daftar->status == 'Diterima')
    <div style="margin: 30px auto; max-width: 800px;">
        <div class="alert-diterima">
            <strong>🎉 Selamat!</strong> {{ Auth::user()->name }}
            <i class="fas fa-check-circle fa-lg mb-2 icon-pulse"></i><br>

            Kamu telah <strong>DITERIMA</strong> sebagai anggota
            <strong>{{ $daftar->eskul->nama_eskul }}</strong>.

            <hr style="margin:12px 0; opacity:.1">

            <p style="font-size:14px; line-height:1.6;">
            Status pendaftaranmu telah disetujui oleh pembina ekstrakurikuler.
            Silakan mencetak kartu anggota sebagai bukti resmi keikutsertaan
            dalam kegiatan ekstrakurikuler di sekolah.
            </p>
        </div>

        <div style="margin-top:20px; text-align:center;">
            <a href="{{ route('kartu.eskul', $daftar->id) }}"
            title="Cetak Kartu Eskul"
            style="
                    display:inline-flex;
                    align-items:center;
                    justify-content:center;
                    width:140px;
                    height:45px;
                    background: linear-gradient(180deg, #0f1419 0%, #1a1f2e 50%, #0a0e17 100%);
                    color:white;
                    border-radius:5%;
                    text-decoration:none;
                    font-size:18px;
                    box-shadow:0 6px 10px rgba(0, 0, 0, 0.5);
                    transition:.3s;
                    animation: buttonGlow 2s ease-in-out infinite;
            "
            onmouseover="this.style.transform='scale(1.1)'"
            onmouseout="this.style.transform='scale(1)'"
            >
                <i class="fas fa-print icon-float"></i>
                &nbsp; Cetak Kartu
            </a>
        </div>
    </div>

@elseif($daftar && $daftar->status == 'Ditolak')
    <div style="margin: 30px auto; max-width: 800px;">
        <div class="alert-ditolak">
            <strong>⚠️ Pemberitahuan</strong> {{ Auth::user()->name }}
            <i class="fas fa-times-circle fa-lg mb-2 icon-shake"></i><br>

            Pendaftaran kamu pada
            <strong>{{ $daftar->eskul->nama_eskul ?? '' }}</strong>
            belum dapat diterima.

            <hr style="margin:12px 0; opacity:.3;">

            <p style="font-size:14px; line-height:1.6;">
            Hal ini dapat disebabkan oleh keterbatasan kuota,
            hasil seleksi, atau pertimbangan pembina.
            Jangan berkecil hati dan tetap semangat berprestasi.
            </p>

            <p style="font-size:15px;">
            Silakan mendaftar pada ekstrakurikuler lain
            yang sesuai dengan minat dan bakat kamu.
            </p>
            <a href="{{ route('daftar-eskul') }}" class="btn-coba-lagi">
                <i class="fas fa-redo"></i> Coba Daftar Lagi
            </a>
        </div>
    </div>

@elseif(session('status'))
    <div style="margin: 30px auto; max-width: 800px;">
        <div style="background-color: #e0f7fa; border-left: 5px solid #00acc1; padding: 20px; border-radius: 8px; color: #006064; font-family: 'Nunito', sans-serif; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; animation: fadeSlideIn 0.8s ease-out;">
            <strong>✔ Pendaftaran Terkirim!</strong><br>
            {!! session('status') !!}
        </div>
    </div>

@elseif($daftar && $daftar->status == 'Menunggu')
    <div style="margin: 30px auto; max-width: 800px;">
        <div style="background-color: #fff3e0; border-left: 5px solid #ff9800; padding: 20px; border-radius: 8px; color: #f57c00; font-family: 'Nunito', sans-serif; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; animation: fadeSlideIn 0.8s ease-out;">
            <strong>⏳ Pendaftaran Dalam Proses &nbsp;</strong>
            <i class="fas fa-hourglass-half fa-pulse fa-lg mb-2"></i><br>

            Pendaftaran kamu pada
            <strong>{{ $daftar->eskul->nama_eskul }}</strong>
            sedang dalam tahap <strong>verifikasi</strong>.

            <hr style="margin:12px 0; opacity:.3;">

            <p style="font-size:14px; line-height:1.6;">
            Mohon bersabar menunggu hasil seleksi dari pihak pembina.
            Informasi lanjutan akan ditampilkan pada halaman ini
            setelah proses seleksi selesai.
            </p>

            <p style="font-size:15px;">
            📌 Pastikan kamu rutin memeriksa status pendaftaran.
            </p>
        </div>
    </div>
@endif

<!-- Section One -->
<section id="one" class="wrapper">
    <div class="inner flex flex-3" style="align-items: center; gap: 20px;">
        <!-- Kiri -->
        <div class="flex-item left">
            <div>
                <h3>2 Mei 2009</h3>
                <p>Tanggal berdirinya SMK Assalaam Bandung, yang berkomitmen mencetak lulusan berkualitas dan berakhlak mulia.</p>
            </div>
            <div>
                <h3>H. Muhammad Luthfi Almanfaluthi, S.T., M.Pd</h3>
                <p>Kepala Sekolah SMK Assalaam Bandung yang visioner dan berpengalaman dalam dunia pendidikan.</p>
            </div>
        </div>

        <!-- Tengah -->
        <div style="display:flex; justify-content:center; align-items:center;">
            <img 
                src="{{ asset('user/images/salam.png') }}" 
                alt="logo sekolah"
                style="
                    width:300px;
                    height:auto;
                    max-height:300px;
                    object-fit:contain;
                ">
        </div>

        <!-- Kanan -->
        <div class="flex-item right">
            <div>
                <h3>SMK Assalaam Bandung</h3>
                <p>Sekolah Menengah Kejuruan berbasis islami yang berlokasi di Cibaduyut, Bandung, dengan berbagai jurusan unggulan.</p>
            </div>
            <div>
                <h3>Kabupaten Bandung</h3>
                <p>SMK Assalaam berada di wilayah strategis Kabupaten Bandung, memudahkan akses siswa dari berbagai daerah sekitar.</p>
            </div>
        </div>
    </div>
</section>

<!-- Section Two -->
<section id="two" class="wrapper style1 special" 
    style="text-align: center; padding: 50px 0; background: linear-gradient(180deg, #0c1829 100% , #6ebeff 50%);">
    
    <header class="major">
        <h2>Pendaftaran Ekstrakurikuler SMK Assalaam Bandung</h2>
        <p>Pilih ekstrakurikuler yang sesuai dengan minat dan bakatmu!</p>
    </header>

    <div class="inner">
        @guest
            {{-- Tidak menampilkan tombol jika belum login --}}
        @endguest

        @auth
        <a href="{{ route('daftar-eskul') }}"
            class="button"
            style="background-color:#FF5733; color:white; box-shadow:none; border:none;">
            <i class="fas fa-edit"></i>
            Daftar Eskul Disini
        </a>
        @endauth
    </div>
</section>

<!-- Section Three -->
<section id="eskul" class="wrapper">
    <div class="inner" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
        @foreach ($eskul as $data)
            <div class="box" style="display: flex; flex-direction: column; background: #f9f9f9; padding: 15px; border-radius: 8px;">
                
                <!-- FOTO -->
                <div class="image fit" 
                    style="width:100%; height:300px; overflow:hidden; border-radius:6px;">
                    <img src="{{ asset('storage/'.$data->foto) }}"
                        style="width:100%; height:100%; object-fit:cover;">
                </div>

                <!-- KONTEN -->
                <div class="content" style="margin-top: 10px; display: flex; flex-direction: column; flex-grow: 1;">

                    <!-- JUDUL -->
                    <h3 style="min-height: 48px; margin-bottom: 8px;
                        line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                        {{ $data->nama_eskul }}
                    </h3>

                    <!-- DESKRIPSI -->
                    <p style="
                        min-height: 110px;
                        line-height: 1.5;
                        display: -webkit-box;
                        -webkit-line-clamp: 3;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        margin-bottom: 15px;
                    ">
                        {{ $data->deskripsi }}
                    </p>

                    <!-- TOMBOL -->
                    @auth
                    <a href="{{ route('eskul.show', $data->id) }}" 
                        style="
                            margin-top: auto;
                            display: block;
                            text-align: center;
                            padding: 10px 15px; 
                            background-color: #FF7559; 
                            color: white; 
                            border-radius: 8px; 
                            text-decoration: none;
                            font-weight: 600;
                            transition: all 0.3s ease;
                            box-shadow: 0 3px 10px rgba(255, 117, 89, 0.3);
                        "
                        onmouseover="this.style.backgroundColor='#FF5733'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(255, 117, 89, 0.4)';"
                        onmouseout="this.style.backgroundColor='#FF7559'; this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 10px rgba(255, 117, 89, 0.3)';">
                        <i class="fas fa-info-circle"></i> Lihat Detail
                    </a>
                    @endauth

                </div>
            </div>
        @endforeach
    </div>
</section>

@endsection