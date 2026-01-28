@extends('layouts.user')

@section('content')
<section class="wrapper style1">
    <div class="inner" style="max-width: 600px; margin: auto;">
        <h2 style="text-align: center; font-family: 'Nunito', sans-serif; margin-bottom: 30px;">
            Formulir Pendaftaran Ekstrakurikuler
        </h2>
        
        <form id="formDaftarEskul" action="{{ route('daftar-eskul.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf

            <div class="field">
                <label for="nama" style="color: white;">Nama Kamu</label>
                <input type="text" name="nama" id="nama" class="form-control" 
                    value="{{ Auth::user()->name }}" readonly 
                    style="color: black; background-color: #ffffffff;">
            </div>

           <!-- Tingkat -->
            <div class="field">
                <label style="color:white;">Tingkat</label>
                <select id="tingkat" class="form-control"  required style="color:black; background-color: #ffffffff;">
                    <option value="" disabled selected hidden>Pilih Tingkat</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>

            <!-- Jurusan -->
            <div class="field">
                <label style="color:white;">Jurusan</label>
                <select id="jurusan" class="form-control" required disabled style="color:black; background-color: #ffffffff;">
                    <option value="" disabled selected hidden>Pilih jurusan</option>
                    <option value="RPL">RPL</option>
                    <option value="TBSM">TBSM</option>
                    <option value="TKRO">TKRO</option>
                </select>
            </div>

            <!-- Kelas -->
            <div class="field">
                <label style="color:white;">Kelas</label>
                <select name="kelas" id="kelas" class="form-control" required disabled style="color:black; background-color: #ffffffff;">
                    <option value="" disabled selected hidden>Pilih kelas</option>
                </select>
            </div>

            <script>
            document.addEventListener("DOMContentLoaded", function () {
                const tingkat = document.getElementById("tingkat");
                const jurusan = document.getElementById("jurusan");
                const kelas = document.getElementById("kelas");

                // Step 1 → aktifkan jurusan
                tingkat.addEventListener("change", function () {
                    jurusan.disabled = false;
                    jurusan.selectedIndex = 0;

                    kelas.disabled = true;
                    kelas.innerHTML = '<option value="" disabled selected hidden>Pilih kelas</option>';
                });

                // Step 2 → isi kelas
                jurusan.addEventListener("change", function () {
                    const t = tingkat.value;
                    const j = jurusan.value;

                    kelas.disabled = false;
                    kelas.innerHTML = '<option value="" disabled selected hidden>Pilih kelas</option>';

                    for (let i = 1; i <= 3; i++) {
                        let option = document.createElement("option");
                        option.value = `${t} ${j} ${i}`;
                        option.textContent = `${t} ${j} ${i}`;
                        kelas.appendChild(option);
                    }
                });
            });
            </script>

            @php
                $tahun = date('Y');
            @endphp

            <div class="field">
                <label for="tahun_ajaran" style="color: white;">Tahun Ajaran</label>

                <input type="text"
                    name="tahun_ajaran"
                    id="tahun_ajaran"
                    value="{{ $tahun }}"
                    readonly
                    class="form-control"
                    style="color:black; background:#ffff;">
            </div>

            <div class="field"> 
                <label for="no_telp" style="color: white;">Nomor Telepon</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" 
                style="color: black; background-color: #ffffffff;" required>
            </div>

        <div class="field">
            <label for="eskul_id" style="color: white;">Pilih Ekstrakurikuler</label>
            <select name="eskul_id"
                class="form-control"
                style="color:black; background-color: #ffffffff;"
                {{ isset($eskulId) ? 'disabled' : '' }}
                required>

                @foreach($eskul as $e)
                    <option value="{{ $e->id }}"
                        {{ (isset($eskulId) && $eskulId == $e->id) ? 'selected' : '' }}>
                        {{ $e->nama_eskul }}
                    </option>
                @endforeach
            </select>

            {{-- kirim value kalau disabled --}}
            @if(isset($eskulId))
                <input type="hidden" name="eskul_id" value="{{ $eskulId }}">
            @endif

            <style>
                .form-control:disabled,
                .form-control[disabled]{
                    background-color: #ffffff !important;
                    color: #000 !important;
                    opacity: 1 !important;
                }
            </style>
        </div>

            <div class="field">
                <label for="alasan" style="color: white;">Alasan Bergabung</label>
                <textarea name="alasan" id="alasan" rows="4" class="form-control"
                style="color: black; background-color: #ffffffff;" required></textarea>   
            </div>

           <div class="button-container mt-4">
                <button type="submit" class="btn btn-success px-4 py-3 fw-bold shadow-sm w-100" style="border-radius: 8px;">
                    <i class="fa fa-paper-plane me-1"></i> Kirim Pendaftaran
                </button>
                
                <button type="button" onclick="resetForm()" class="btn btn-warning px-4 py-3 fw-bold shadow-sm w-100" style="border-radius: 8px;">
                    <i class="fa fa-eraser me-1"></i> Kosongkan Formulir
                </button>
           </div>
        </form>
    </div>
</section>

<style>
    body,
    input.form-control,
    select.form-control,
    textarea.form-control,
    label,
    button {
        font-family: 'Nunito', sans-serif;
    }

    /* Button Container Styling */
    .button-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 25px;
    }

    button.btn-success {
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    button.btn-success:hover {
        background-color: #218838;
    }

    button.btn-warning {
        background-color: #ffc107;
        color: white;
        border: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    button.btn-warning:hover {
        background-color: #e0a800;
    }

    /* ========================================
       RESPONSIVE STYLES FOR MOBILE
       ======================================== */
    
    /* Tablets and smaller devices */
    @media screen and (max-width: 768px) {
        .wrapper.style1 .inner {
            padding: 20px 15px !important;
        }

        h2 {
            font-size: 1.5rem !important;
            margin-bottom: 20px !important;
        }

        .field {
            margin-bottom: 15px;
        }

        .field label {
            font-size: 0.95rem;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            font-size: 16px !important; /* Prevents zoom on iOS */
            padding: 12px !important;
            width: 100% !important;
        }

        select.form-control {
            height: auto !important;
            min-height: 45px;
        }

        textarea.form-control {
            min-height: 100px;
        }

        .button-container {
            gap: 12px;
            margin-top: 20px;
        }

        .btn {
            font-size: 0.95rem !important;
            padding: 12px 20px !important;
            width: 100% !important;
        }
    }

    /* Mobile phones */
    @media screen and (max-width: 480px) {
        .wrapper.style1 .inner {
            padding: 15px 10px !important;
            max-width: 100% !important;
            margin: 0 !important;
        }

        section.wrapper.style1 {
            padding: 15px 10px !important;
        }

        h2 {
            font-size: 1.3rem !important;
            margin-bottom: 15px !important;
            padding: 0 10px;
        }

        form {
            gap: 15px !important;
        }

        .field {
            margin-bottom: 12px;
        }

        .field label {
            font-size: 0.9rem;
            margin-bottom: 6px;
        }

        .form-control {
            font-size: 16px !important; /* Prevents auto-zoom on focus */
            padding: 10px !important;
        }

        select.form-control {
            min-height: 42px;
            background-position: right 10px center;
            background-size: 12px;
        }

        textarea.form-control {
            min-height: 90px;
            resize: vertical;
        }

        .button-container {
            gap: 10px;
            margin-top: 15px;
        }

        .btn {
            font-size: 0.9rem !important;
            padding: 10px 15px !important;
        }

        .btn i {
            font-size: 0.85rem;
        }
    }

    /* Extra small devices */
    @media screen and (max-width: 360px) {
        h2 {
            font-size: 1.1rem !important;
        }

        .field label {
            font-size: 0.85rem;
        }

        .form-control {
            font-size: 14px !important;
            padding: 8px !important;
        }

        .btn {
            font-size: 0.85rem !important;
            padding: 10px !important;
        }
    }

    /* Improve touch targets for mobile */
    @media (hover: none) and (pointer: coarse) {
        .form-control,
        .btn {
            min-height: 44px; /* Apple's recommended minimum touch target */
        }
    }

    /* Landscape orientation on mobile */
    @media screen and (max-width: 768px) and (orientation: landscape) {
        h2 {
            font-size: 1.2rem !important;
            margin-bottom: 15px !important;
        }

        .field {
            margin-bottom: 10px;
        }

        form {
            gap: 12px !important;
        }
    }
</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function resetForm() {
        document.getElementById('formDaftarEskul').reset();
    }

    $(document).ready(function () {
        $('#formDaftarEskul').on('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data anda sudah dikirim!',
                showConfirmButton: false,
                timer: 1500
            });

            setTimeout(() => {
                this.submit(); // Kirim form setelah notifikasi
            }, 1500);
        });
    });
</script>
@endsection