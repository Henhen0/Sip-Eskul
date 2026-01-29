@extends('layouts.user')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
/* ===== GLOBAL ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* ===== ANIMATIONS ===== */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== HERO BANNER ===== */
.hero-banner-container {
    position: relative;
    height: 280px;
    overflow: hidden;
    background: url('{{ asset('user/images/uda.jpg') }}') center center/cover no-repeat;
}

.hero-banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 130%;
    background: url('{{ asset('user/images/uda.jpg') }}') center center/cover no-repeat;
}

/* ===== PROFILE SECTION ===== */
.profile-container {
    max-width: 1000px;
    margin: -80px auto 0;
    padding: 0 20px 60px;
    position: relative;
    z-index: 10;
}

.profile-header {
    background: white;
    border-radius: 20px;
    padding: 40px 30px 30px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    text-align: center;
    animation: slideDown 0.6s ease;
    margin-bottom: 30px;
}

.avatar-container {
    position: relative;
    display: inline-block;
    margin-bottom: 20px;
}

.avatar-profile {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid white;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.avatar-profile:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
}

.profile-name {
    font-size: 28px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 8px;
}

.profile-subtitle {
    font-size: 15px;
    color: #7f8c8d;
    font-weight: 400;
}

/* ===== INFO CARD ===== */
.info-card {
    background: white;
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.06);
    animation: fadeIn 0.8s ease;
    margin-bottom: 30px;
}

.card-title {
    font-size: 20px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-title i {
    color: #FF7559;
    font-size: 24px;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #f0f0f0;
    transition: all 0.3s ease;
}

.info-item:last-child {
    border-bottom: none;
}

.info-item:hover {
    padding-left: 10px;
    background: #f8f9fa;
    margin: 0 -10px;
    padding-right: 10px;
    border-radius: 8px;
}

.info-icon {
    width: 40px;
    height: 40px;
    background: #FF7559;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 16px;
    flex-shrink: 0;
}

.info-text {
    color: #555;
    font-size: 15px;
    font-weight: 500;
}

/* ===== HISTORY SECTION ===== */
.history-section {
    animation: fadeIn 1s ease;
}

.section-header {
    text-align: center;
    margin-bottom: 40px;
}

.section-header h2 {
    font-size: 28px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 10px;
}

.section-header p {
    font-size: 15px;
    color: #7f8c8d;
}

.history-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}

.history-card {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
    border-left: 4px solid #FF7559;
}

.history-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.history-card h3 {
    font-size: 18px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
}

.status-container {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
}

.status-label {
    font-size: 14px;
    color: #7f8c8d;
    font-weight: 600;
}

.badge {
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.badge-success { 
    background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    color: white;
}

.badge-warning { 
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}

.badge-danger  { 
    background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    color: white;
}

.history-date {
    font-size: 13px;
    color: #95a5a6;
    display: flex;
    align-items: center;
    gap: 6px;
}

.history-date i {
    font-size: 12px;
}

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #95a5a6;
}

.empty-state i {
    font-size: 64px;
    margin-bottom: 20px;
    opacity: 0.3;
}

.empty-state p {
    font-size: 16px;
    color: #7f8c8d;
}

/* ===== RESPONSIVE ===== */
@media(max-width: 768px) {
    .hero-banner-container {
        height: 200px;
    }
    
    .profile-container {
        margin-top: -60px;
        padding: 0 15px 40px;
    }
    
    .profile-header {
        padding: 30px 20px 25px;
    }
    
    .avatar-profile {
        width: 100px;
        height: 100px;
    }
    
    .profile-name {
        font-size: 24px;
    }
    
    .info-card {
        padding: 25px 20px;
    }
    
    .history-grid {
        grid-template-columns: 1fr;
    }
}

@media(max-width: 480px) {
    .card-title {
        font-size: 18px;
    }
    
    .info-item {
        flex-direction: row;
        align-items: flex-start;
    }
    
    .btn-edit {
        width: 100%;
        justify-content: center;
    }
}
</style>

{{-- ================= HERO BANNER ================= --}}
<div class="hero-banner-container">
    <div class="hero-banner-overlay"></div>
</div>

{{-- ================= PROFILE CONTAINER ================= --}}
<div class="profile-container">

    {{-- PROFILE HEADER --}}
    <div class="profile-header">
        <div class="avatar-container">
            <img src="{{ asset('user/images/foro.jpg') }}" class="avatar-profile" alt="Profile Avatar">
        </div>
        <h1 class="profile-name">{{ Auth::user()->name }}</h1>
        @php
        $data = \App\Models\DaftarEskul::where('user_id', Auth::id())
                    ->with('eskul')
                    ->latest()
                    ->first();
        @endphp

        <p class="profile-subtitle">
        @if($data)
            @if($data->status == 'Diterima')
                Anggota {{ $data->eskul->nama_eskul }}
            @elseif($data->status == 'Menunggu')
                Menunggu Persetujuan {{ $data->eskul->nama_eskul }}
            @elseif($data->status == 'Ditolak')
                Tidak diterima di {{ $data->eskul->nama_eskul }}
            @endif
        @else
            Belum Daftar Ekstrakurikuler
        @endif
        </p>
    </div>

    {{-- INFO AKUN --}}
    <div class="info-card">
        <h2 class="card-title">
            <i class="fas fa-user-circle"></i>
            Informasi Akun
        </h2>
    <div class="info-item">
        <div class="info-icon">
            <i class="fas fa-envelope"></i>
        </div>
        <span class="info-text">{{ Auth::user()->email }}</span>
    </div>

        <!-- NO HP dan STATUS ESKUL -->
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-phone"></i>
            </div>
            @php
            $telp = \App\Models\DaftarEskul::where('user_id', Auth::id())
                        ->latest()
                        ->value('no_telp');
            @endphp
            <span class="info-text">
                {{ $telp ?? 'Belum diisi' }}
            </span>
        </div>

        <!-- TANGGAL BERGABUNG -->
        <div class="info-item">
            <div class="info-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            @php
            $data = \App\Models\DaftarEskul::where('user_id', Auth::id())
                        ->latest()
                        ->first();
            @endphp
            <span class="info-text">
            @if($data)
                @if($data->status == 'Diterima')
                    Bergabung sejak {{ $data->created_at->format('d M Y') }}
                @elseif($data->status == 'Menunggu')
                    Pendaftaran sedang diproses
                @elseif($data->status == 'Ditolak')
                    Pendaftaran ditolak
                @endif
            @else
                Belum mendaftar ekstrakurikuler
            @endif
            </span>
        </div>
    </div>

    {{-- RIWAYAT ESKUL --}}
    <div class="history-section">
        <div class="section-header">
            <h2>Riwayat Pendaftaran</h2>
            <p>Status ekstrakurikuler yang pernah kamu daftar</p>
        </div>

        @php
        $riwayat = \App\Models\DaftarEskul::where('user_id', Auth::id())
                    ->with('eskul')
                    ->latest()
                    ->get();
        @endphp

        @if($riwayat->count() > 0)
            <div class="history-grid">
                @foreach($riwayat as $item)
                    <div class="history-card">
                        <h3>{{ $item->eskul->nama_eskul }}</h3>

                        <div class="status-container">
                            <span class="status-label">Status:</span>
                            @if($item->status == 'Diterima')
                                <span class="badge badge-success">Diterima</span>
                            @elseif($item->status == 'Ditolak')
                                <span class="badge badge-danger">Ditolak</span>
                            @else
                                <span class="badge badge-warning">Menunggu</span>
                            @endif
                        </div>

                        <div class="history-date">
                            <i class="fas fa-clock"></i>
                            {{ $item->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <p>Belum ada riwayat pendaftaran ekstrakurikuler</p>
            </div>
        @endif
    </div>

</div>

@endsection