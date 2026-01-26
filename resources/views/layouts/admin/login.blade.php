<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login - Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts & Icon Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Nunito', sans-serif;
        height: 100vh;
        overflow: hidden;
        background: #000;
    }

    .login-container {
        display: flex;
        height: 100vh;
        box-shadow: 0 10px 40px rgba(229, 57, 53, 0.3);
        position: relative;
    }

    /* ENTRANCE ANIMATIONS */
    @keyframes slideInLeft {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes fadeInScale {
        from {
            transform: scale(0.8);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes bounceIn {
        0% {
            transform: scale(0.3);
            opacity: 0;
        }
        50% {
            transform: scale(1.05);
        }
        70% {
            transform: scale(0.9);
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* TOGGLE BUTTON */
    .panel-toggle {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        background: rgba(229, 57, 53, 0.9);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 25px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 600;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(229, 57, 53, 0.4);
        animation: fadeInScale 0.6s ease-out 1s both;
    }

    .panel-toggle:hover {
        background: rgba(211, 47, 47, 1);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(229, 57, 53, 0.6);
    }

    .panel-toggle i {
        font-size: 16px;
    }

    /* LEFT SIDE - BRANDING */
    .left-side {
        flex: 1;
        background: linear-gradient(135deg, #e53935 0%, #b71c1c 100%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 60px;
        color: white;
        position: relative;
        overflow: hidden;
        transition: all 0.5s ease;
        animation: slideInLeft 0.8s ease-out;
    }

    .left-side.hidden {
        flex: 0;
        padding: 0;
        opacity: 0;
        width: 0;
        min-width: 0;
    }

    .left-side::before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(0, 0, 0, 0.1);
        border-radius: 50%;
        top: -100px;
        right: -100px;
    }

    .left-side::after {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        background: rgba(0, 0, 0, 0.1);
        border-radius: 50%;
        bottom: -50px;
        left: -50px;
    }

    .logo-section {
        text-align: center;
        z-index: 1;
        transition: all 0.5s ease;
    }

    .left-side.hidden .logo-section {
        transform: translateX(-100%);
    }

    .logo-placeholder {
        width: 200px;
        height: 200px;
        margin: 0 auto 30px;
        background: rgba(0, 0, 0, 0.2);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px dashed rgba(255, 255, 255, 0.3);
        animation: bounceIn 1s ease-out 0.3s both;
    }

    .logo-placeholder i {
        font-size: 80px;
        color: rgba(255, 255, 255, 0.8);
    }

    .welcome-text h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        animation: fadeInScale 0.8s ease-out 0.5s both;
    }

    .welcome-text p {
        font-size: 1.1rem;
        opacity: 0.95;
        line-height: 1.6;
        animation: fadeInScale 0.8s ease-out 0.7s both;
    }

    /* RIGHT SIDE - FORM */
    .right-side {
        flex: 1;
        background: #0a0a0a;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px;
        transition: all 0.5s ease;
        animation: slideInRight 0.8s ease-out;
    }

    .right-side.expanded {
        flex: 1;
    }

    .form-wrapper {
        width: 100%;
        max-width: 450px;
        transition: all 0.5s ease;
    }

    .left-side.hidden ~ .right-side .form-wrapper {
        max-width: 550px;
    }

    .form-header {
        margin-bottom: 40px;
        animation: fadeInScale 0.8s ease-out 0.4s both;
    }

    .form-header h3 {
        color: #e53935;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .form-header p {
        color: #999;
        font-size: 0.95rem;
    }

    .form-floating input {
        background-color: #111 !important;
        border: 1px solid #e53935;
        height: 60px;
        color: #fff !important;
        animation: fadeInScale 0.6s ease-out 0.6s both;
    }

    .form-floating label {
        color: #aaa;
    }

    .form-floating input:focus {
        border-color: #ff5252;
        box-shadow: 0 0 0 0.2rem rgba(229, 57, 53, 0.25);
        background-color: #111 !important;
        color: #fff !important;
    }

    .form-floating input::placeholder {
        color: #666;
    }

    .btn-danger {
        background-color: #e53935;
        border-color: #e53935;
        height: 55px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #d32f2f;
        border-color: #d32f2f;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(229, 57, 53, 0.4);
    }

    .btn-outline-warning {
        border-color: #ff9800;
        color: #ff9800;
    }

    .btn-outline-warning:hover {
        background-color: #ff9800;
        color: #fff;
    }

    .btn-outline-dark {
        transition: all 0.3s;
        color: #fff;
        border-color: #888;
    }

    .btn-outline-dark:hover {
        background-color: #444;
        border-color: #666;
        transform: translateY(-2px);
    }

    .form-check-input:checked {
        background-color: #e53935;
        border-color: #e53935;
    }

    .form-check-input {
        background-color: #000;
        border: 2px solid #e53935;
        cursor: pointer;
        width: 1.15em;
        height: 1.15em;
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 0.15rem rgba(229, 57, 53, 0.4);
    }

    .form-check-label {
        color: #ccc;
        font-size: 14px;
        cursor: pointer;
    }

    .whatsapp-link {
        color: #25D366;
        text-decoration: none;
        transition: all 0.3s;
        font-size: 14px;
    }

    .whatsapp-link:hover {
        color: #128C7E;
    }

    .text-danger {
        color: #e53935 !important;
    }

    .alert-danger {
        background-color: rgba(229, 57, 53, 0.1);
        border: 1px solid #e53935;
        color: #ff5252;
    }

    /* RESPONSIVE */
    @media (max-width: 992px) {
        .login-container {
            flex-direction: column;
        }

        .left-side {
            padding: 40px;
            min-height: 300px;
        }

        .left-side.hidden {
            min-height: 0;
            height: 0;
        }

        .welcome-text h2 {
            font-size: 2rem;
        }

        .logo-placeholder {
            width: 150px;
            height: 150px;
        }

        .logo-placeholder i {
            font-size: 60px;
        }

        .right-side {
            padding: 40px 30px;
        }

        .panel-toggle {
            padding: 10px 16px;
            font-size: 13px;
        }
    }

    @media (max-width: 576px) {
        .left-side {
            padding: 30px 20px;
        }

        .welcome-text h2 {
            font-size: 1.5rem;
        }

        .form-header h3 {
            font-size: 1.5rem;
        }

        .right-side {
            padding: 30px 20px;
        }

        .panel-toggle {
            top: 15px;
            left: 15px;
            padding: 8px 14px;
            font-size: 12px;
        }

        .panel-toggle i {
            font-size: 14px;
        }
    }
    </style>
</head>
<body>
    <!-- TOGGLE BUTTON -->
    <button class="panel-toggle" id="toggleBtn" title="Toggle Branding Panel">
        <i class="fas fa-eye-slash"></i>
        <span id="toggleText">Sembunyikan Panel</span>
    </button>

    <div class="login-container">
        <!-- LEFT SIDE - BRANDING -->
        <div class="left-side" id="leftPanel">
            <div class="logo-section">
                <!-- PLACEHOLDER UNTUK LOGO - Ganti dengan logo Anda -->
                <div class="logo-placeholder">
                    <i class="fas fa-shield-alt"></i>
                </div>
                
                <div class="welcome-text">
                    <h2>ADMIN ACCESS</h2>
                    <p>Masuk ke Bagian admin untuk mengelola sistem dan mengakses kontrol penuh</p>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE - FORM -->
        <div class="right-side">
            <div class="form-wrapper">
                <div class="form-header text-center">
                    <h3><i class="fas fa-user-shield me-2"></i>Login Admin</h3>
                    <p>Silakan masukkan data login administrator</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <div>{{ session('error') }}</div>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Masukan Email</label>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-floating mb-4">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Masukan Password</label>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Remember & Contact -->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Ingat saya</label>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-danger w-100 mb-3">Masuk</button>

                    <!-- Siswa Button -->
                    <div class="text-center">
                        <a href="{{ route('login') }}" class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-user-graduate me-1"></i> Masuk sebagai Siswa
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle Panel Function
        const toggleBtn = document.getElementById('toggleBtn');
        const leftPanel = document.getElementById('leftPanel');
        const toggleText = document.getElementById('toggleText');
        const icon = toggleBtn.querySelector('i');
        
        let isPanelVisible = true;
        
        toggleBtn.addEventListener('click', function() {
            if (isPanelVisible) {
                // Hide panel
                leftPanel.classList.add('hidden');
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                toggleText.textContent = 'Tampilkan Panel';
                isPanelVisible = false;
            } else {
                // Show panel
                leftPanel.classList.remove('hidden');
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                toggleText.textContent = 'Sembunyikan Panel';
                isPanelVisible = true;
            }
        });
    </script>
</body>
</html>