 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 <div class="sidebar pe-4 pb-3">
            <br><nav class="navbar bg-secondary navbar-dark">
                <a href="{{ url('/') }}" 
                class="navbar-brand mx-4 mb-3 fw-bold text-white px-3 py-2 d-inline-flex align-items-center"
                style="background-color:#000; border-radius:8px; font-size:20px; letter-spacing:0.5px;">

                    <img src="{{ asset('/assets/img/up.png') }}" alt="SIP-Eskul Logo" style="height:60px; margin-right:10px;">
                    SIP-Eskul
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('/assets/img/1.png')}}" alt="" style="width: 40px; height: 40px;">
                    </div>
                        <div class="ms-3">
                            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                            <div class="d-flex align-items-center" style="gap: 5px; font-size: 12px; color: limegreen;">
                            <i class="fas fa-check-circle"></i>
                            <span>Akses Berhasil</span>
                        </div>
                    </div>

                </div>
                <div class="navbar-nav w-100">
                <a href="{{ route('home') }}" 
                class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}">
                    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                </a>

                <a href="{{ route('eskul.index') }}" 
                class="nav-item nav-link {{ Route::is('eskul.*') ? 'active' : '' }}">
                    <i class="fa fa-th me-2"></i>Eskul
                </a>

                <a href="{{ route('jadwal.index') }}" 
                class="nav-item nav-link {{ Route::is('jadwal.*') ? 'active' : '' }}">
                    <i class="fa fa-clock me-2"></i>Jadwal
                </a>

                <a href="{{ route('daftar.index') }}" 
                class="nav-item nav-link {{ Route::is('daftar.*') ? 'active' : '' }}">
                    <i class="fa fa-table me-2"></i>Pendaftaran Eskul
                </a>

                <a href="{{ route('penerimaan.index') }}" 
                class="nav-item nav-link {{ Route::is('penerimaan.*') ? 'active' : '' }}">
                    <i class="fa fa-laptop me-2"></i>Penerimaan
                </a>

                <a href="{{ route('admin.users.index') }}" 
                class="nav-item nav-link {{ Route::is('admin.users.*') ? 'active' : '' }}">
                    <i class="fa fa-users me-2"></i>Manajemen User
                </a>
                </div>

            </nav>
        </div>