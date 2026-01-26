 <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown">

                        <!-- WRAPPER FOTO -->
                        <div class="position-relative" style="width:40px; height:40px;">
                            <img 
                                class="rounded-circle w-100 h-100" 
                                src="{{ asset('/assets/img/1.png') }}" 
                                alt="Profile">

                            <!-- STATUS ONLINE -->
                            <span 
                                class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle"
                                style="width:12px; height:12px;">
                            </span>
                        </div>

                        <span class="d-none d-lg-inline-flex">
                            {{ Auth::user()->name }}
                        </span>
                    </a>

    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-fw"></i> Keluar
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

                </div>
            </nav>