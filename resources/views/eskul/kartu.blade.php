@extends('layouts.user')

@section('content')
<div class="container kartu-wrapper">
    {{-- ================= DEPAN KARTU ================= --}}
    <div class="kartu-box">
        <br><br>
        <div class="label-kartu">DEPAN KARTU</div>
        <br>

        <div class="kartu">
            {{-- HEADER --}}
            <div class="header">
                <img src="{{ asset('user/images/salam.png') }}" class="logo-kiri">

                <div class="judul">
                    <b>KARTU ANGGOTA ESKUL</b>
                    <h4>{{ $daftar->eskul->nama_eskul }}</h4>
                </div>

                <img src="{{ asset('storage/' . $daftar->eskul->foto) }}"
                     alt="{{ $daftar->eskul->nama_eskul }}"
                     class="logo-kanan">
            </div>

            <hr class="line">

            {{-- ISI --}}
            <div class="isi">
                <b>Nama :</b> <b>{{ $daftar->user->name }}</b><br>
                <b>Kelas :</b> <b>{{ $daftar->kelas }}</b><br>
                <b>Tahun Ajaran :</b> <b>{{ $daftar->tahun_ajaran }}</b><br>
                @php
                    $barcode = 'ESC-' . substr(md5($daftar->eskul_id . $daftar->user_id . $daftar->tahun_ajaran), 0, 10);
                @endphp

                <b>Kode Eskul :</b>
                <b style="font-family: 'Courier New', monospace; letter-spacing: 2px;">
                    {{ strtoupper($barcode) }}
                </b><br>
            </div>
        </div>
    </div>

    {{-- ================= BELAKANG KARTU ================= --}}
    <div class="kartu-box">
        <br><br>
        <div class="label-kartu">BELAKANG KARTU</div>
        <br>

        <div class="kartu belakang">
            <h4>ATURAN ESKUL</h4>

            <hr class="line">

            <b>
            <ol>
                <li>Wajib hadir tepat waktu.</li>
                <li>Menjaga nama baik sekolah.</li>
                <li>Mengikuti latihan dengan disiplin.</li>
                <li>Dilarang membuat keributan.</li>
                <li>Kartu wajib dibawa saat kegiatan.</li>
            </ol>
            </b>
        </div>
    </div>

</div>
<br>


{{-- ================= TOMBOL CETAK ================= --}}
<div class="cetak-wrapper">
    <button onclick="window.print()" class="btn-cetak">
        <span>🖨</span> Cetak Kartu
    </button>
</div>




<style>

/* ANIMASI KEYFRAMES */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

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

@keyframes pulse {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
}

@keyframes shimmer {
    0% {
        background-position: -1000px 0;
    }
    100% {
        background-position: 1000px 0;
    }
}

/* BOX KARTU + LABEL */
.kartu-box{
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:8px;
    animation: fadeInUp 0.8s ease-out;
}

.kartu-box:first-child {
    animation: slideInLeft 0.8s ease-out;
}

.kartu-box:last-child {
    animation: slideInRight 0.8s ease-out;
}

/* TEKS DEPAN / BELAKANG */
.label-kartu{
    font-size:20px;
    font-weight:700;
    letter-spacing:1px;
    color:#002147;
    text-transform:uppercase;
    animation: fadeInDown 0.6s ease-out;
}


.cetak-wrapper{
    display:flex;
    justify-content:center;
    margin-top:25px;
    animation: fadeInUp 1s ease-out 0.3s both;
}

.btn-cetak{
    display:flex;
    align-items:center;
    gap:10px;
    padding:12px 28px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#ff712f,#ff9a4d);
    color:white;
    font-weight:600;
    letter-spacing:.5px;
    cursor:pointer;
    box-shadow:0 8px 20px rgba(0,0,0,.3);
    transition:all .3s ease;
}

.btn-cetak:hover{
    transform:translateY(-2px) scale(1.05);
    box-shadow:0 12px 28px rgba(0,0,0,.4);
    animation: pulse 0.6s ease-in-out infinite;
}

.btn-cetak:active {
    transform:translateY(0) scale(0.98);
}


/* WRAPPER */
.kartu-wrapper{
    margin-top:50px;
    display:flex;
    gap:30px;
    justify-content:center;
    flex-wrap:wrap;
    font-family:'Nunito', sans-serif;
}

/* KARTU */
.kartu{
    width:360px;
    height:210px;
    background:linear-gradient(
        135deg,
        #ffffff 0%,
        #f2f8ff 40%,
        #dbeeff 70%,
        #c7e3ff 100%
    );
    color:#002147;
    border-radius:18px;
    padding:18px 20px;
    box-shadow:0 12px 28px rgba(0,0,0,.18);
    transition: all 0.3s ease;
    animation: scaleIn 0.6s ease-out 0.2s both;
}

.kartu:hover {
    transform: translateY(-5px) scale(1.02);
    box-shadow:0 16px 35px rgba(0,0,0,.25);
}


/* HEADER */
.header{
    display:grid;
    grid-template-columns:50px 1fr 50px;
    align-items:center;
}

.logo-kiri,
.logo-kanan{
    width:50px;
    height:50px;
    object-fit:contain;
    transition: transform 0.3s ease;
}

.kartu:hover .logo-kiri {
    transform: rotate(-10deg) scale(1.1);
}

.kartu:hover .logo-kanan {
    transform: rotate(10deg) scale(1.1);
}

/* JUDUL */
.judul{
    text-align:center;
    line-height:1.2;
}

.judul small{
    font-size:11px;
    letter-spacing:1px;
    opacity:.85;
}

.judul h4{
    margin:2px 0 0;
    font-weight:700;
    transition: color 0.3s ease;
}

/* LINE */
.line{
    border:0;
    border-top:1px solid rgba(28, 28, 28, 0.5);
    margin:12px 0;
    transition: border-color 0.3s ease;
}

@media print{
    .line{
        border-top:1px solid #000000 !important;
    }

    /* sembunyikan semua layout selain kartu */
    header, nav, footer, .navbar, .sidebar {
        display: none !important;
    }
}


/* ISI DEPAN */
.isi{
    font-size:14px;
    line-height:1.9;
}

.isi div{
    display:flex;
    justify-content:space-between;
}

.isi span{
    opacity:.85;
}

/* BELAKANG */
.belakang{
    width:360px;
    height:210px;
    position:relative;
    overflow:hidden;
    background:
        linear-gradient(135deg,#ffffff,#edf4ff);
    color:#002147;
    border-radius:18px;
    padding:18px 20px;
    box-shadow:0 14px 30px rgba(0,0,0,.18);
}

.belakang::before{
    content:'';
    position:absolute;
    top:-60px;
    right:-60px;
    width:200px;
    height:200px;
    background:rgba(0,86,179,.08);
    border-radius:50%;
    transition: all 0.5s ease;
}

.belakang:hover::before {
    transform: scale(1.2);
    background:rgba(0,86,179,.12);
}

.belakang::after{
    content:'';
    position:absolute;
    bottom:-40px;
    left:-40px;
    width:160px;
    height:160px;
    background:rgba(77,163,255,.12);
    border-radius:50%;
    transition: all 0.5s ease;
}

.belakang:hover::after {
    transform: scale(1.2);
    background:rgba(77,163,255,.18);
}


.belakang h4{
    text-align:center;
    margin-bottom:8px;
    position: relative;
    z-index: 1;
}

.belakang ol{
    font-size:13px;
    line-height:1.6;
    padding-left:18px;
    position: relative;
    z-index: 1;
}

.belakang ol li {
    transition: transform 0.2s ease, color 0.2s ease;
}

.belakang:hover ol li {
    transform: translateX(3px);
}

/* CETAK */
.cetak-wrapper{
    text-align:center;
    margin-top:30px;
}

.btn-cetak{
    padding:10px 26px;
    border:none;
    border-radius:30px;
    background:#ff712f;
    color:white;
    font-weight:bold;
    cursor:pointer;
    box-shadow:0 6px 18px rgba(0,0,0,.3);
}

/* PRINT */
@media print{
    /* Nonaktifkan animasi saat print */
    *, *::before, *::after {
        animation: none !important;
        transition: none !important;
    }
    
    body *{
        visibility:hidden;
    }
    .kartu-wrapper,
    .kartu-wrapper *{
        visibility:visible;
    }
    .kartu-wrapper{
        position:absolute;
        left:0;
        top:0;
        width:100%;
    }
    .btn-cetak{
        display:none;
    }

    @media print {
    * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    .kartu,
    .belakang {
        background: linear-gradient(
            135deg,
            #ffffff 0%,
            #f2f8ff 40%,
            #dbeeff 70%,
            #c7e3ff 100%
        ) !important;
        color:#002147 !important;
        transform: none !important;
    }

    body {
        background:white !important;
    }
}


}
</style>

<br><br><br>
@endsection