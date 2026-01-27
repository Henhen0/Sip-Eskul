<!-- Header -->
    <header id="header" style="background-color: #fff; box-shadow: 0 2px 6px rgba(0,0,0,0.1); padding: 10px 30px; position: fixed; width: 100%; top: 0; z-index: 1000;">
        <nav class="left">
            <a href="#menu"><span>Menu</span></a>
        </nav>
        <a href="{{ url('/') }}" class="logo">Pendaftaran Eskul</a>
        <nav class="right">

        @guest
            <!-- Kalau belum login -->
            <a href="{{ route('login') }}" class="button alt-danger">Masuk</a>
        @endguest

        @auth
            <!-- Kalau user sudah login -->
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn alt-danger">
                    Keluar
                </button>
            </form>
        @endauth

        </nav>
    </header>
    <!-- Header -->


    <nav id="menu">
    <ul class="links">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/') }}#eskul">Eskul</a></li>
        <li><a href="https://wa.me/6281234567890" target="_blank">Kontak</a></li>
    </ul>
</nav>

<style>
    /* ===== MENU SIDEBAR ===== */
    #menu {
        background: linear-gradient(135deg, #0c1829 0%, #1a2a3a 100%);
        height: 100vh;
        padding: 30px 20px;
        animation: slideInLeft 0.4s ease-out;
    }

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

    /* List animation */
    #menu .links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    /* Item dengan stagger animation */
    #menu .links li {
        margin-bottom: 18px;
        opacity: 0;
        animation: fadeInUp 0.5s ease-out forwards;
    }

    #menu .links li:nth-child(1) { animation-delay: 0.1s; }
    #menu .links li:nth-child(2) { animation-delay: 0.2s; }
    #menu .links li:nth-child(3) { animation-delay: 0.3s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Link dengan efek glow */
    #menu .links a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        font-weight: 500;
        display: block;
        padding: 10px 14px;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    /* Shine effect */
    #menu .links a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s ease;
    }

    #menu .links a:hover::before {
        left: 100%;
    }

    /* Hover effect dengan scale dan glow */
    #menu .links a:hover {
        background: rgba(255, 255, 255, 0.15);
        padding-left: 24px;
        transform: translateX(5px);
        box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
    }

    /* Active/focus effect */
    #menu .links a:active {
        transform: translateX(5px) scale(0.98);
    }

    /* Icon animation (jika ada icon) */
    #menu .links a::after {
        content: '→';
        position: absolute;
        right: 14px;
        opacity: 0;
        transition: all 0.3s ease;
    }

    #menu .links a:hover::after {
        opacity: 1;
        right: 10px;
    }

    /* Ripple effect on click */
    #menu .links a {
        position: relative;
    }

    #menu .links li:active a::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        transform: translate(-50%, -50%);
        animation: ripple 0.6s ease-out;
    }

    @keyframes ripple {
        to {
            width: 200px;
            height: 200px;
            opacity: 0;
        }
    }

    /* Pulse animation untuk item aktif */
    #menu .links li.active a {
        background: rgba(255, 255, 255, 0.2);
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
        }
        50% {
            box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
        }
    }
</style>