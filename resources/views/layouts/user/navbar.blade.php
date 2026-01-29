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

        @auth
            <li>
                <a href="{{ route('profile') }}">
                    Profile
                </a>
            </li>
        @endauth

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

    /* ============================================ */
    /* RESPONSIVE STYLES FOR MOBILE - OPTIMIZED */
    /* ============================================ */
    
    @media screen and (max-width: 768px) {
        /* Header adjustments */
        #header {
            padding: 10px 15px !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            box-sizing: border-box;
        }

        /* Left navigation (hamburger) */
        #header nav.left {
            flex: 0 0 auto;
        }

        #header nav.left a {
            padding: 10px 12px;
            font-size: 14px;
            display: inline-block;
            min-width: 60px;
        }

        #header nav.left span {
            font-size: 14px;
        }

        /* Logo text - center */
        #header .logo {
            flex: 1 1 auto;
            text-align: center;
            font-size: 15px !important;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 0 10px;
            min-width: 0;
        }

        /* Right navigation (login/logout) */
        #header nav.right {
            flex: 0 0 auto;
        }

        #header nav.right .button,
        #header nav.right .btn {
            padding: 10px 16px !important;
            font-size: 13px !important;
            white-space: nowrap;
            border: none;
            border-radius: 6px;
        }

        #header nav.right form {
            margin: 0;
        }

        /* Sidebar menu */
        #menu {
            padding: 25px 18px;
            width: 280px;
            max-width: 85vw;
            overflow-y: auto;
        }

        #menu .links {
            margin-top: 10px;
        }

        #menu .links li {
            margin-bottom: 16px;
        }

        #menu .links a {
            font-size: 15px;
            padding: 14px 16px;
            word-wrap: break-word;
        }

        /* Adjust hover effects for touch devices */
        #menu .links a:hover {
            padding-left: 16px;
            transform: none;
        }

        #menu .links a::after {
            display: none;
        }

        /* Active state for better feedback */
        #menu .links a:active {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(0.98);
        }
    }

    @media screen and (max-width: 480px) {
        /* Extra small devices */
        #header {
            padding: 8px 12px !important;
            gap: 8px;
        }

        #header nav.left a {
            padding: 8px 10px;
            font-size: 13px;
            min-width: 55px;
        }

        #header .logo {
            font-size: 14px !important;
            padding: 0 8px;
        }

        #header nav.right .button,
        #header nav.right .btn {
            padding: 8px 14px !important;
            font-size: 12px !important;
        }

        /* Sidebar menu lebih kecil */
        #menu {
            width: 260px;
            max-width: 82vw;
            padding: 20px 15px;
        }

        #menu .links a {
            font-size: 14px;
            padding: 13px 14px;
        }

        #menu .links li {
            margin-bottom: 14px;
        }
    }

    @media screen and (max-width: 360px) {
        /* Very small devices */
        #header {
            padding: 8px 10px !important;
            gap: 6px;
        }

        #header nav.left a {
            padding: 7px 9px;
            font-size: 12px;
            min-width: 52px;
        }

        #header .logo {
            font-size: 13px !important;
            padding: 0 6px;
        }

        #header nav.right .button,
        #header nav.right .btn {
            padding: 7px 12px !important;
            font-size: 11px !important;
        }

        #menu {
            width: 240px;
            max-width: 80vw;
            padding: 18px 12px;
        }

        #menu .links a {
            font-size: 13px;
            padding: 12px 13px;
        }
    }

    /* Landscape mode for mobile */
    @media screen and (max-width: 768px) and (orientation: landscape) {
        #header {
            padding: 6px 12px !important;
        }

        #header .logo {
            font-size: 13px !important;
        }

        #header nav.left a,
        #header nav.right .button,
        #header nav.right .btn {
            padding: 7px 12px !important;
            font-size: 12px !important;
        }

        #menu {
            padding: 20px 15px;
        }

        #menu .links a {
            padding: 11px 14px;
        }
    }

    /* Touch device optimizations */
    @media (hover: none) and (pointer: coarse) {
        /* Disable hover effects on touch devices */
        #menu .links a:hover {
            background: rgba(255, 255, 255, 0.15);
            padding-left: 16px;
            transform: none;
        }

        #menu .links a:hover::before {
            left: -100%;
        }

        /* Make touch targets bigger */
        #menu .links a {
            padding: 15px 18px;
            margin: 2px 0;
            min-height: 48px;
            display: flex;
            align-items: center;
        }

        /* Active state for touch */
        #menu .links a:active {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(0.98);
        }

        /* Header buttons touch optimization */
        #header nav.left a,
        #header nav.right .button,
        #header nav.right .btn {
            min-height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    }

    /* Prevent text selection on buttons for better mobile UX */
    @media screen and (max-width: 768px) {
        #header nav.left a,
        #header nav.right .button,
        #header nav.right .btn,
        #menu .links a {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
        }

        /* Prevent accidental zoom on double tap */
        #header,
        #menu {
            touch-action: manipulation;
        }
    }

    /* Smooth scroll untuk anchor links di mobile */
    @media screen and (max-width: 768px) {
        html {
            scroll-behavior: smooth;
        }
    }

    /* Fix untuk fixed header di iOS */
    @supports (-webkit-overflow-scrolling: touch) {
        #header {
            position: -webkit-sticky;
            position: sticky;
        }
    }

    /* Better scrollbar for menu on mobile */
    @media screen and (max-width: 768px) {
        #menu::-webkit-scrollbar {
            width: 4px;
        }

        #menu::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        #menu::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
        }

        #menu::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }
    }

    /* Ensure proper spacing for header elements */
    @media screen and (max-width: 768px) {
        #header * {
            box-sizing: border-box;
        }

        /* Fix for form inside nav */
        #header nav.right form {
            display: inline-flex;
            align-items: center;
        }

        #header nav.right form button {
            margin: 0;
        }
    }

    /* Better focus states for accessibility */
    @media screen and (max-width: 768px) {
        #header nav.left a:focus,
        #header nav.right .button:focus,
        #header nav.right .btn:focus,
        #menu .links a:focus {
            outline: 2px solid rgba(255, 255, 255, 0.5);
            outline-offset: 2px;
        }

        #header nav.left a:focus,
        #header nav.right .button:focus,
        #header nav.right .btn:focus {
            outline-color: rgba(0, 0, 0, 0.3);
        }
    }

    /* Prevent layout shift */
    @media screen and (max-width: 768px) {
        #header {
            min-height: 56px;
        }
    }

    @media screen and (max-width: 480px) {
        #header {
            min-height: 52px;
        }
    }

    @media screen and (max-width: 360px) {
        #header {
            min-height: 50px;
        }
    }

    /* Better typography scaling */
    @media screen and (max-width: 768px) {
        #header,
        #menu {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    }

    /* Safe area for notched devices (iPhone X, etc) */
    @supports (padding: max(0px)) {
        @media screen and (max-width: 768px) {
            #header {
                padding-left: max(15px, env(safe-area-inset-left));
                padding-right: max(15px, env(safe-area-inset-right));
            }

            #menu {
                padding-left: max(18px, env(safe-area-inset-left));
                padding-right: max(18px, env(safe-area-inset-right));
            }
        }
    }
    
</style>