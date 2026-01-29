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
                <label for="nama" style="color: white;">Nama Kamu <span style="color: red;">*</span></label>
                <input type="text" name="nama" id="nama" class="form-control" 
                    value="{{ Auth::user()->name }}" readonly 
                    style="color: black; background-color: #ffffffff;">
            </div>

          <div class="field">
            <label style="color:white;">Kelas <span style="color: red;">*</span></label>
            <select id="kelas_select" class="form-control" required style="color: black; background-color: #ffffffff;">
                <option disabled selected hidden>Pilih Jurusan</option>
            </select>

            <!-- INI YANG DIKIRIM KE DATABASE -->
            <input type="hidden" name="kelas" id="kelas" required>
            <small class="error-message" id="error-kelas" style="color: #ff6b6b; display: none; margin-top: 5px;">Kelas wajib dipilih!</small>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const select = document.getElementById("kelas_select");
            const input  = document.getElementById("kelas");

            const jurusan = ["RPL", "TBSM", "TKRO"];
            const tingkat = ["X", "XI", "XII"];
            const nomor   = ["1", "2", "3"];

            let step = 1;
            let data = {};

            window.resetKelas = function () {
                step = 1;
                data = {};
                input.value = "";
                loadOptions("Pilih Jurusan", jurusan);
            };

            function loadOptions(placeholder, arr) {
                select.innerHTML = `<option disabled selected hidden>${placeholder}</option>`;
                arr.forEach(v => {
                    let o = document.createElement("option");
                    o.value = v;
                    o.textContent = v;
                    select.appendChild(o);
                });
            }

            // init awal
            resetKelas();

            select.addEventListener("change", function () {
                if (step === 1) {
                    data.jurusan = this.value;
                    step = 2;
                    loadOptions("Pilih Kelas", tingkat);
                } 
                else if (step === 2) {
                    data.tingkat = this.value;
                    step = 3;
                    loadOptions("Pilih Nomor Kelas", nomor);
                } 
                else if (step === 3) {
                    data.nomor = this.value;

                    const hasil = `${data.tingkat} ${data.jurusan} ${data.nomor}`;

                    select.innerHTML = `<option selected>${hasil}</option>`;
                    input.value = hasil;
                    
                    // Hide error when filled
                    document.getElementById('error-kelas').style.display = 'none';
                }
            });
        });
        </script>

            @php
                $tahun = date('Y');
            @endphp

            <div class="field">
                <label for="tahun_ajaran" style="color: white;">Tahun Ajaran <span style="color: red;">*</span></label>

                <input type="text"
                    name="tahun_ajaran"
                    id="tahun_ajaran"
                    value="{{ $tahun }}"
                    readonly
                    class="form-control"
                    style="color:black; background:#ffff;">
            </div>

            <div class="field"> 
                <label for="no_telp" style="color: white;">Nomor Telepon <span style="color: red;">*</span></label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" 
                style="color: black; background-color: #ffffffff;" 
                placeholder="Contoh: 081234567890"
                required>
                <small class="error-message" id="error-no_telp" style="color: #ff6b6b; display: none; margin-top: 5px;">Nomor telepon wajib diisi!</small>
            </div>

        <div class="field">
            <label for="eskul_id" style="color: white;">Pilih Ekstrakurikuler <span style="color: red;">*</span></label>
            <select name="eskul_id"
                id="eskul_id"
                class="form-control"
                style="color:black; background-color: #ffffffff;"
                {{ isset($eskulId) ? 'disabled' : '' }}
                required>
                <option value="" disabled selected hidden>Pilih Ekstrakurikuler</option>
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

            <small class="error-message" id="error-eskul_id" style="color: #ff6b6b; display: none; margin-top: 5px;">Ekstrakurikuler wajib dipilih!</small>

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
                <label for="alasan" style="color: white;">Alasan Bergabung <span style="color: red;">*</span></label>
                <textarea name="alasan" id="alasan" rows="4" class="form-control"
                style="color: black; background-color: #ffffffff;" 
                placeholder="Tuliskan alasan kamu ingin bergabung..."
                required></textarea>
                <small class="error-message" id="error-alasan" style="color: #ff6b6b; display: none; margin-top: 5px;">Alasan bergabung wajib diisi!</small>   
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

    /* Validation Styles */
    .form-control.is-invalid {
        border: 2px solid #ff6b6b !important;
        background-color: #fff5f5 !important;
    }

    .form-control.is-valid {
        border: 2px solid #51cf66 !important;
    }

    .error-message {
        font-size: 0.875rem;
        font-weight: 500;
        display: block;
        margin-top: 5px;
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

        // Reset logic kelas
        if (typeof resetKelas === "function") {
            resetKelas();
        }

        // Reset all validation states
        document.querySelectorAll('.form-control').forEach(function(input) {
            input.classList.remove('is-invalid', 'is-valid');
        });

        document.querySelectorAll('.error-message').forEach(function(error) {
            error.style.display = 'none';
        });
    }

    // Real-time validation
    $(document).ready(function () {
        // Validate on input/change
        $('#no_telp').on('input', function() {
            const val = $(this).val().trim();
            if (val === '') {
                $(this).addClass('is-invalid').removeClass('is-valid');
                $('#error-no_telp').show();
            } else {
                $(this).addClass('is-valid').removeClass('is-invalid');
                $('#error-no_telp').hide();
            }
        });

        $('#eskul_id').on('change', function() {
            const val = $(this).val();
            if (!val || val === '') {
                $(this).addClass('is-invalid').removeClass('is-valid');
                $('#error-eskul_id').show();
            } else {
                $(this).addClass('is-valid').removeClass('is-invalid');
                $('#error-eskul_id').hide();
            }
        });

        $('#alasan').on('input', function() {
            const val = $(this).val().trim();
            if (val === '') {
                $(this).addClass('is-invalid').removeClass('is-valid');
                $('#error-alasan').show();
            } else {
                $(this).addClass('is-valid').removeClass('is-invalid');
                $('#error-alasan').hide();
            }
        });

        // Form submission validation
        $('#formDaftarEskul').on('submit', function (e) {
            e.preventDefault();

            let isValid = true;

            // Validate Kelas
            const kelasVal = $('#kelas').val();
            if (!kelasVal || kelasVal.trim() === '') {
                $('#kelas_select').addClass('is-invalid').removeClass('is-valid');
                $('#error-kelas').show();
                isValid = false;
            } else {
                $('#kelas_select').addClass('is-valid').removeClass('is-invalid');
                $('#error-kelas').hide();
            }

            // Validate No Telp
            const noTelpVal = $('#no_telp').val().trim();
            if (noTelpVal === '') {
                $('#no_telp').addClass('is-invalid').removeClass('is-valid');
                $('#error-no_telp').show();
                isValid = false;
            } else {
                $('#no_telp').addClass('is-valid').removeClass('is-invalid');
                $('#error-no_telp').hide();
            }

            // Validate Eskul
            const eskulVal = $('#eskul_id').val();
            if (!eskulVal || eskulVal === '') {
                $('#eskul_id').addClass('is-invalid').removeClass('is-valid');
                $('#error-eskul_id').show();
                isValid = false;
            } else {
                $('#eskul_id').addClass('is-valid').removeClass('is-invalid');
                $('#error-eskul_id').hide();
            }

            // Validate Alasan
            const alasanVal = $('#alasan').val().trim();
            if (alasanVal === '') {
                $('#alasan').addClass('is-invalid').removeClass('is-valid');
                $('#error-alasan').show();
                isValid = false;
            } else {
                $('#alasan').addClass('is-valid').removeClass('is-invalid');
                $('#error-alasan').hide();
            }

            // If validation fails, show error alert
            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'OHH NO!',
                    text: 'Ada beberapa kesalahan dalam formulir Anda. Silakan periksa kembali.',
                    confirmButtonColor: '#d33'
                });
                return false;
            }

            // If validation passes, show success message
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data anda sudah dikirim!',
                showConfirmButton: false,
                timer: 1500
            });

            const form = this;
            setTimeout(() => {
                form.submit(); // Submit form after notification
            }, 1500);
        });
    });
</script>
@endsection