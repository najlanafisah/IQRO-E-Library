@extends('student.base')
@section('title', 'welcome Student')

@section('content')

<!-- Hero Section -->
<section class="py-5">
    <div class="container text-center py-5">
        <div class="row d-flex align-items-center py-5">
            <div class="col-lg-6">
                <img src="{{ asset('purple/assets/student-hero.svg') }}" alt="">
            </div>
            <div class="col-lg-6 text-start">
                <h1 class="fw-bold display-5">Selamat Datang di IQRA</h1>
                <p class="lead text-black fs-5 mt-3 mb-4">Temukan, baca, dan pinjam buku favoritmu dari genggamanmu.</p>
                <a href="#books" class="btn btn-line px-4 py-2">Lihat Buku Terbaru</a>
            </div>
        </div>
    </div>
</section>

<!-- Buku Terbaru -->
<section id="books" class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5 text-black">Buku Terbaru</h2>
        <div class="row">
            @foreach($books->take(6) as $book)
            <div class="col-md-2 mb-4">
                <div class="card h-100 border border-black rounded shadow-sm">
                    <img src="{{ asset($book->cover) }}" class="card-img-top" alt="img">
                    <div class="card-body">
                        <h6 class="card-title fw-semibold">{{ $book->title }}</h6>
                        <span class="badge border border-black rounded-5 px-4 text-black fw-normal">{{ $book->category->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('student.all.book') }}" class="btn btn-line px-4">Lihat Semua Buku</a>
        </div>
    </div>
</section>

<!-- Pencarian Buku -->
<section id="search" class="py-5">
    <div class="container">
        <h2 class="section-title text-center text-black mb-4">Cari Buku</h2>
        <form action="#" method="GET" class="d-flex justify-content-center">
            <input type="text" name="keyword" class="form-control w-50 rounded-end rounded-5 border border-black" placeholder="Cari berdasarkan judul, penulis...">
            <button type="submit" class="btn btn-line rounded-start px-4">Cari</button>
        </form>
    </div>
</section>

<!-- Semua Buku -->
<section id="all-books" class="py-5">
    <div class="container">
        <div class="row">
            @foreach($allBook as $book)
            <div class="col-md-2 mb-4">
                <div class="card h-100 border border-black rounded shadow-sm">
                    <a href="{{ route('student.book.show', $book->id) }}">
                        <img src="{{ asset($book->cover) }}" class="card-img-top" alt="img">
                    </a>
                    <div class="card-body">
                        <h6 class="card-title fw-semibold">{{ $book->title }}</h6>
                        <span class="badge border border-black rounded-5 px-4 mb-2 text-black fw-normal">{{ $book->category->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection