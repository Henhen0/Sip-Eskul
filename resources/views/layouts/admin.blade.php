<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('/assets/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('/assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('layouts.admin.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
        @include('layouts.admin.navbar')  
            <!-- Navbar End -->


        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-lg border-0 mx-4 my-3" role="alert"
                style="background: linear-gradient(135deg, #28a745, #218838); color: #fff; border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle fa-lg me-3"></i>
                    <div>
                        <strong>Sukses!</strong> {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        {{-- Notifikasi update --}}
        @if(session('update'))
            <div class="alert alert-primary alert-dismissible fade show shadow-lg border-0 mx-4 my-3" role="alert"
                style="background: linear-gradient(135deg, #0d6efd, #0b5ed7); color: #fff; border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <i class="fas fa-pen fa-lg me-3"></i>
                    <div>
                        <strong>Diperbarui!</strong> {{ session('update') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        {{-- Notifikasi hapus --}}
        @if(session('delete'))
            <div class="alert alert-danger alert-dismissible fade show shadow-lg border-0 mx-4 my-3" role="alert"
                style="background: linear-gradient(135deg, #dc3545, #c82333); color: #fff; border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <i class="fas fa-trash-alt fa-lg me-3"></i>
                    <div>
                        <strong>Dihapus!</strong> {{ session('delete') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        {{-- Notifikasi tolak --}}
        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show shadow-lg border-0 mx-4 my-3" role="alert"
                style="background: linear-gradient(135deg, #ffc107, #e0a800); color: #212529; border-radius: 1rem;">
                <div class="d-flex align-items-center">
                    <i class="fas fa-exclamation-triangle fa-lg me-3"></i>
                    <div>
                        <strong>Ditolak!</strong> {{ session('warning') }}
                    </div>
                    <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif




        @yield('content')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/assets/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('/assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/assets/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('/assets/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/assets/js/main.js')}}"></script>
</body>

</html>