@extends('layouts.user')

@section('content')

<section class="wrapper style1">
    <div class="inner detail-container" style="max-width: 800px; margin: auto; font-family: 'Nunito', sans-serif;">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <div class="detail-header" style="text-align: center; margin-bottom: 40px;">
        <h1 class="detail-title" style="
            display: inline-block;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #0c1829);
            color: #ffffff;
            padding: 15px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            font-weight: 600;
            font-size: 30px;
            letter-spacing: 1px;
            text-transform: uppercase;
        ">
            📋 Detail Ekstrakurikuler
        </h1>
    </div>


        <!-- Gambar -->
       <div class="image-wrapper" style="text-align:center; margin-bottom:30px;">
            <div style="background:#fff; padding:12px; border-radius:12px; display:inline-block;">
                <img src="{{ asset('storage/' . $eskul->foto) }}"
                    alt="{{ $eskul->nama_eskul }}"
                    class="eskul-image"
                    style="max-width:250px; height:auto;">
            </div>
        </div>


        <!-- Info Box -->
        <div class="info-box" style="background-color: #f8f9fa; padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

            <h3 class="eskul-name" style="color: #00796b; margin-bottom: 15px;">{{ $eskul->nama_eskul }}</h3>

            <p class="eskul-desc"><strong>📝 Deskripsi:</strong><br>
                <span style="color: #444;">{{ $eskul->deskripsi }}</span>
            </p>

            @if($eskul->nama_pembina)
                <p class="eskul-info"><strong>👨‍🏫 Pembina:</strong> <span style="color: #333;">{{ $eskul->nama_pembina }}</span></p>
            @endif

            @if($eskul->no_hp)
                <p class="eskul-info"><strong>📞 Kontak Pembina:</strong> <span style="color: #333;">{{ $eskul->no_hp }}</span></p>
            @endif

            @if($eskul->alamat)
                <p class="eskul-info"><strong>📍 Lokasi:</strong> <span style="color: #333;">{{ $eskul->alamat }}</span></p>
            @endif

            @if($eskul->jadwals->count())
                <p class="jadwal-title"><strong>🗓 Jadwal Pertemuan:</strong></p>
                <div class="jadwal-container" style="display: flex; flex-direction: column; gap: 15px; margin-top: 10px;">
                    @foreach($eskul->jadwals as $jadwal)
                        <div class="jadwal-item" style="display: flex; align-items: center; background-color: #e3fcef; border-left: 5px solid #43a047; padding: 15px 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
                            <div style="flex: 1;">
                                <strong style="color: #2e7d32;">🗓 {{ strtoupper($jadwal->hari) }}</strong>
                            </div>
                            <div class="jadwal-time" style="text-align: right; font-weight: bold; color: #1b5e20;">
                                {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}
                                –
                                {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                WIB
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="jadwal-title"><strong>🗓 Jadwal Pertemuan:</strong></p>
                <div style="margin-top: 10px;">
                    <div class="jadwal-empty" style="display: flex; align-items: center; background-color: #fff3cd; border-left: 5px solid #ff9800; padding: 15px 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
                        <div style="flex: 1;">
                            <strong style="color: #ff6f00;">⚠️ Jadwal belum tersedia</strong>
                        </div>
                    </div>
                </div>
            @endif
            
        </div>

        <!-- Tombol Kembali -->
        <div class="button-container" style="margin-top: 30px; text-align: center;">
            <a href="{{ url('/') }}" 
               class="btn-back"
               style="padding: 10px 25px; background-color: #00796b; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;">
                ← Kembali ke Halaman Utama
            </a>
        </div>

        <!-- Tombol Daftar Sekarang -->
        <div class="button-container" style="margin-top: 15px; text-align: center;">
            @auth
                <a href="{{ route('daftar-eskul', ['eskul_id' => $eskul->id]) }}"
                class="btn-register"
                style="padding: 10px 25px; background-color: #43a047; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;">
                    📝 Daftar Sekarang
                </a>
            @else
                <p class="login-notice" style="margin-top: 10px; color: #c62828;">*Silakan login terlebih dahulu untuk mendaftar.</p>
            @endauth
        </div>

    </div>
</section>

<style>
    /* ============================================ */
    /* RESPONSIVE STYLES FOR MOBILE */
    /* ============================================ */
    
    @media screen and (max-width: 768px) {
        /* Container */
        .detail-container {
            max-width: 100% !important;
            padding: 0 15px !important;
            margin: 20px auto !important;
        }

        /* Section wrapper */
        .wrapper.style1 {
            padding: 20px 10px !important;
        }

        /* Header title */
        .detail-header {
            margin-bottom: 25px !important;
        }

        .detail-title {
            font-size: 20px !important;
            padding: 12px 20px !important;
            letter-spacing: 0.5px !important;
            display: block !important;
            margin: 0 10px !important;
        }

        /* Image */
        .image-wrapper {
            margin-bottom: 20px !important;
        }

        .image-wrapper > div {
            padding: 8px !important;
            width: 100%;
            box-sizing: border-box;
        }

        .eskul-image {
            max-width: 100% !important;
            width: 200px !important;
            height: auto !important;
        }

        /* Info box */
        .info-box {
            padding: 20px 15px !important;
            margin: 0 !important;
        }

        .eskul-name {
            font-size: 1.5rem !important;
            margin-bottom: 12px !important;
            line-height: 1.3;
        }

        .eskul-desc,
        .eskul-info,
        .jadwal-title {
            font-size: 14px !important;
            line-height: 1.6;
            margin-bottom: 12px !important;
        }

        .eskul-desc strong,
        .eskul-info strong,
        .jadwal-title strong {
            font-size: 14px !important;
        }

        .eskul-desc span,
        .eskul-info span {
            display: block;
            margin-top: 5px;
        }

        /* Jadwal container */
        .jadwal-container {
            gap: 10px !important;
            margin-top: 8px !important;
        }

        .jadwal-item,
        .jadwal-empty {
            flex-direction: column !important;
            align-items: flex-start !important;
            padding: 12px 15px !important;
            gap: 8px;
        }

        .jadwal-item > div:first-child {
            flex: none !important;
        }

        .jadwal-time {
            text-align: left !important;
            width: 100%;
            font-size: 14px !important;
        }

        /* Buttons */
        .button-container {
            margin-top: 20px !important;
        }

        .btn-back,
        .btn-register {
            display: inline-block !important;
            width: 90% !important;
            max-width: 300px !important;
            padding: 12px 20px !important;
            font-size: 14px !important;
            box-sizing: border-box;
            text-align: center;
        }

        .login-notice {
            font-size: 13px !important;
            padding: 0 15px;
        }
    }

    @media screen and (max-width: 480px) {
        /* Extra small devices */
        .detail-container {
            padding: 0 10px !important;
            margin: 15px auto !important;
        }

        .wrapper.style1 {
            padding: 15px 5px !important;
        }

        .detail-header {
            margin-bottom: 20px !important;
        }

        .detail-title {
            font-size: 18px !important;
            padding: 10px 15px !important;
            margin: 0 5px !important;
        }

        .eskul-image {
            width: 180px !important;
        }

        .info-box {
            padding: 15px 12px !important;
            border-radius: 10px !important;
        }

        .eskul-name {
            font-size: 1.3rem !important;
            margin-bottom: 10px !important;
        }

        .eskul-desc,
        .eskul-info,
        .jadwal-title {
            font-size: 13px !important;
            margin-bottom: 10px !important;
        }

        .jadwal-item,
        .jadwal-empty {
            padding: 10px 12px !important;
        }

        .jadwal-time {
            font-size: 13px !important;
        }

        .btn-back,
        .btn-register {
            width: 95% !important;
            padding: 10px 16px !important;
            font-size: 13px !important;
        }

        .button-container {
            margin-top: 15px !important;
        }

        .login-notice {
            font-size: 12px !important;
        }
    }

    @media screen and (max-width: 360px) {
        /* Very small devices */
        .detail-title {
            font-size: 16px !important;
            padding: 8px 12px !important;
        }

        .eskul-image {
            width: 150px !important;
        }

        .info-box {
            padding: 12px 10px !important;
        }

        .eskul-name {
            font-size: 1.2rem !important;
        }

        .eskul-desc,
        .eskul-info,
        .jadwal-title {
            font-size: 12px !important;
        }

        .jadwal-item,
        .jadwal-empty {
            padding: 8px 10px !important;
        }

        .jadwal-time {
            font-size: 12px !important;
        }

        .btn-back,
        .btn-register {
            padding: 8px 14px !important;
            font-size: 12px !important;
        }
    }

    /* Tablet Portrait */
    @media screen and (min-width: 769px) and (max-width: 1024px) {
        .detail-container {
            max-width: 700px !important;
            padding: 0 20px !important;
        }

        .detail-title {
            font-size: 26px !important;
        }

        .eskul-image {
            max-width: 230px !important;
        }

        .info-box {
            padding: 22px !important;
        }

        .eskul-name {
            font-size: 1.7rem !important;
        }
    }

    /* Landscape mode for mobile */
    @media screen and (max-width: 768px) and (orientation: landscape) {
        .wrapper.style1 {
            padding: 15px 10px !important;
        }

        .detail-header {
            margin-bottom: 15px !important;
        }

        .detail-title {
            font-size: 18px !important;
            padding: 10px 18px !important;
        }

        .image-wrapper {
            margin-bottom: 15px !important;
        }

        .eskul-image {
            width: 150px !important;
        }

        .info-box {
            padding: 15px !important;
        }

        .jadwal-container {
            gap: 8px !important;
        }

        .button-container {
            margin-top: 15px !important;
        }
    }

    /* Touch device optimizations */
    @media (hover: none) and (pointer: coarse) {
        /* Larger touch targets */
        .btn-back,
        .btn-register {
            min-height: 44px !important;
        }

        /* Remove tap highlight */
        .btn-back,
        .btn-register {
            -webkit-tap-highlight-color: transparent;
            -webkit-user-select: none;
            user-select: none;
        }

        /* Active state for better feedback */
        .btn-back:active {
            background-color: #00695c !important;
            transform: scale(0.98);
        }

        .btn-register:active {
            background-color: #388e3c !important;
            transform: scale(0.98);
        }
    }

    /* Hover effects for desktop only */
    @media (hover: hover) and (pointer: fine) {
        .btn-back:hover {
            background-color: #00695c;
            box-shadow: 0 4px 12px rgba(0, 121, 107, 0.3);
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background-color: #388e3c;
            box-shadow: 0 4px 12px rgba(67, 160, 71, 0.3);
            transition: all 0.3s ease;
        }
    }

    /* Better text wrapping */
    @media screen and (max-width: 768px) {
        .eskul-name,
        .eskul-desc,
        .eskul-info,
        .jadwal-title {
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
        }
    }

    /* Smooth scrolling */
    @media screen and (max-width: 768px) {
        html {
            scroll-behavior: smooth;
        }
    }

    /* Print styles */
    @media print {
        .button-container {
            display: none;
        }

        .detail-container {
            max-width: 100% !important;
        }
    }
</style>

@endsection