<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQRA | E-Library Anak IDNBSA</title>
    <link rel="shortcut icon" href="{{ asset('purple/assets/iqra-logo.svg') }}" type="image/x-icon">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- my css -->
    <link rel="stylesheet" href="{{ asset('mycss/style.css') }}">

</head>
<body>

    <!-- Header Navbar -->
    <header class="bg-white border-black border-bottom border-1 sticky-top">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <nav class="">
                <img class="me-5 text-black logo-mantul" src="{{ asset('purple/assets/iqra.svg') }}" alt="">
                <a href="{{ route('student.dashboard') }}" class="mx-4 text-black">Buku Terbaru</a>
                <a href="{{ route('student.all.book') }}" class="mx-4 text-black">Kategori</a>
                <a href="{{ route('student.borrow.all') }}" class="mx-4 text-black">Pinjam</a>
            </nav>
            <li class="nav-item"><a class="nav-link btn btn-auth mx-4 fw-normal" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Keluar</a></li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form> 
        </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="mt-5 border-top border-black bg-light">
        <div class="footer text-center">
            <h5 class="section-title"><ins>IQRA</ins></h5>
            <p class="medium">Perpustakaan digital SMK IDN Boarding School Akhwat, lengkap, modern, dan islami.</p>
        </div>
        <div class="text-center pb-5 small">
        © {{ date('Y') }} SMK IDN Boarding School Akhwat. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>