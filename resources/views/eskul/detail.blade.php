@extends('layouts.user')

@section('content')

<section class="wrapper style1">
    <div class="inner" style="max-width: 800px; margin: auto; font-family: 'Nunito', sans-serif;">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="
            display: inline-block;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #00796b, #004d40);
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
       <div style="text-align:center; margin-bottom:30px;">
            <div style="background:#fff; padding:12px; border-radius:12px; display:inline-block;">
                <img src="{{ asset('storage/' . $eskul->foto) }}"
                    alt="{{ $eskul->nama_eskul }}"
                    style="max-width:250px; height:auto;">
            </div>
        </div>


        <!-- Info Box -->
        <div style="background-color: #f8f9fa; padding: 25px; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

            <h3 style="color: #00796b; margin-bottom: 15px;">{{ $eskul->nama_eskul }}</h3>

            <p><strong>📝 Deskripsi:</strong><br>
                <span style="color: #444;">{{ $eskul->deskripsi }}</span>
            </p>

            @if($eskul->nama_pembina)
                <p><strong>👨‍🏫 Pembina:</strong> <span style="color: #333;">{{ $eskul->nama_pembina }}</span></p>
            @endif

            @if($eskul->no_hp)
                <p><strong>📞 Kontak Pembina:</strong> <span style="color: #333;">{{ $eskul->no_hp }}</span></p>
            @endif

            @if($eskul->alamat)
                <p><strong>📍 Lokasi:</strong> <span style="color: #333;">{{ $eskul->alamat }}</span></p>
            @endif

            @if($eskul->jadwals->count())
                <p><strong>🗓 Jadwal Pertemuan:</strong></p>
                <div style="display: flex; flex-direction: column; gap: 15px; margin-top: 10px;">
                    @foreach($eskul->jadwals as $jadwal)
                        <div style="display: flex; align-items: center; background-color: #e3fcef; border-left: 5px solid #43a047; padding: 15px 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
                            <div style="flex: 1;">
                                <strong style="color: #2e7d32;">🗓 {{ strtoupper($jadwal->hari) }}</strong>
                            </div>
                            <div style="text-align: right; font-weight: bold; color: #1b5e20;">
                                {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}
                                –
                                {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                WIB
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p><strong>🗓 Jadwal Pertemuan:</strong></p>
                <div style="margin-top: 10px;">
                    <div style="display: flex; align-items: center; background-color: #fff3cd; border-left: 5px solid #ff9800; padding: 15px 20px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.05);">
                        <div style="flex: 1;">
                            <strong style="color: #ff6f00;">⚠️ Jadwal belum tersedia</strong>
                        </div>
                    </div>
                </div>
            @endif
            
        </div>

        <!-- Tombol Kembali -->
        <div style="margin-top: 30px; text-align: center;">
            <a href="{{ url('/') }}" 
               style="padding: 10px 25px; background-color: #00796b; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;">
                ← Kembali ke Halaman Utama
            </a>
        </div>

        <!-- Tombol Daftar Sekarang -->
        <div style="margin-top: 15px; text-align: center;">
            @auth
                <a href="{{ route('daftar-eskul', ['eskul_id' => $eskul->id]) }}"

                style="padding: 10px 25px; background-color: #43a047; color: white; text-decoration: none; border-radius: 6px; font-weight: bold;">
                    📝 Daftar Sekarang
                </a>
            @else
                <p style="margin-top: 10px; color: #c62828;">*Silakan login terlebih dahulu untuk mendaftar.</p>
            @endauth
        </div>

    </div>
</section>
@endsection
