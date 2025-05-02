<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQRA | E-Library Anak IDNBSA</title>
    <link rel="shortcut icon" href="{{ asset('purple/assets/iqra-logo.svg') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mycss/style.css') }}">
</head>


<body>
    <header class="bg-white border-black border-bottom border-1 sticky-top">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <nav class="">
                <img class="me-5 text-black" src="{{ asset('purple/assets/iqra.svg') }}" alt="">
                <a href="#books" class="mx-4 text-black">Buku Terbaru</a>
                <a href="#categories" class="mx-4 text-black">Kategori</a>
                <a href="#testimonials" class="mx-4 text-black">Testimoni</a>
            </nav>
            <a href="{{ route('login') }}" class="btn btn-auth mx-4 fw-normal">Masuk</a>
        </div>
    </header>


    <section class="hero text-center pt-3 pb-5">
        <div class="container">
            <img src="{{ asset('purple/assets/hero-img.svg') }}" alt="hero image">
            <a href="#books" class="btn-lihat-buku d-flex align-items-center">
                <span class="text">Lihat Buku</span>
                <span class="icon-circle">&#8594;</span>
            </a>
        </div>
    </section>


    <section id="features" class="py-5">
        <div class="container text-center py-5">
            <h2 class="section-title mb-4">Kenapa IQRA?</h2>
            <div class="row text-black d-flex justify-content-center mt-5">
                <div class="col-md-3 mx-3 p-4 border border-black rounded shadow-sm">
                    <i class="fs-1"></i>
                    <h5 class="mt-2 fw-medium">Koleksi Lengkap</h5>
                    <p>Buku pelajaran, fiksi, agama, teknologi, dan masih banyak lagi.</p>
                </div>
                <div class="col-md-3 mx-3 p-4 border border-black rounded shadow-sm">
                    <i class="fs-1"></i>
                    <h5 class="mt-2 fw-medium">Akses Mudah</h5>
                    <p>Buka perpustakaan dari perangkat manapun, kapanpun.</p>
                </div>
                <div class="col-md-3 mx-3 p-4 border border-black rounded shadow-sm">
                    <i class="fs-1"></i>
                    <h5 class="mt-2 fw-medium">Untuk Semua</h5>
                    <p>Siswa dan guru bisa mengakses sesuai kebutuhan masing-masing.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="books" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Buku Terbaru</h2>
            <div class="row">
                @foreach($books->take(4) as $book)
                <div class="col-md-3 mb-3">
                    <div class="card h-100 border border-black shadow-sm">
                        <img src="{{ asset($book->cover) }}" class="card-img-top" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">{{ $book->title }}</h5>
                            <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                            <span class="badge bg-white border border-black rounded-5 text-black px-4 fw-normal">{{ $book->category->name }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('book') }}" class="btn btn-line px-4">Lihat Semua Buku</a>
            </div>
        </div>
    </section>


    <section id="categories" class="py-5">
        <div class="container py-5">
            <h2 class="section-title text-center mb-5">Kategori Buku</h2>
            <div class="row justify-content-center">
                @foreach ($categories as $category)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card shadow-sm border-0 h-100 category-card text-center">
                        <div class="card-body border border-black rounded">
                            <div class="category-icon mb-3">
                                <i class="bi bi-bookmarks-fill text-black fs-1"></i>
                            </div>
                            <h5 class="card-title text-black">{{ $category->name }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <section id="testimonials" class="py-5">
        <div class="container text-center py-5">
            <h2 class="section-title mb-5">Apa Kata Mereka?</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-md-3 mx-4 p-3 border border-black rounded">
                    <blockquote class="blockquote">
                        <p class="fs-5 my-4">“IQRA sangat membantu saya dalam belajar!”</p>
                        <footer class="blockquote-footer fs-6">Aisyah, Siswi RPL</footer>
                    </blockquote>
                </div>
                <div class="col-md-3 mx-4 p-3 border border-black rounded">
                    <blockquote class="blockquote">
                        <p class="fs-5 my-4">“Akses cepat dan koleksi bukunya luar biasa!”</p>
                        <footer class="blockquote-footer fs-6">Fatimah, Guru Bahasa</footer>
                    </blockquote>
                </div>
                <div class="col-md-3 mx-4 p-3 border border-black rounded">
                    <blockquote class="blockquote">
                        <p class="fs-5 my-4">“Modern, islami, dan sangat berguna. Terbaik!”</p>
                        <footer class="blockquote-footer">Khadijah, Siswi DKV</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

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

