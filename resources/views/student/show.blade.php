@extends('student.base')
@section('title', 'Detail')

@section('content')

<section class="py-5 min-vh-100">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-4">
                <img src="{{ asset($book->cover) }}" alt="" class="img-fluid rounded shadow-sm border border-black" style="min-height: 550px; object-fit: cover;">
            </div>
            <div class="col-md-7">
                <h2 class="text-black mb-4"><strong>{{ $book->title }}</strong></h2>
                <p class="text-black mb-2">Penulis: <strong>{{ $book->author }}</strong></p>
                <p class="text-black mb-2">Tahun: {{ $book->year }}</p>
                <p class="text-black mb-2">Penerbit: {{ $book->publisher }}</p>
                <p class="text-black mb-2">Kategori: <span class="badge border border-black text-black fw-normal bg-blue p-2">{{ $book->category->name }}</span></p>
                <p class="text-black mb-2">Stok Tersedia: {{ $book->stock }}</p>


                <hr>
                <p class="mb-4 text-muted small">Tidak ada deskripsi untuk buku ini</p>

                @if($book->stock > 0)
                @if($isAlreadyBorrowed)
                <!-- kondisi ketika sudah dipinjam dan stock masih tersedia -->
                <button type="submit" class="sudah-pinjam px-5 py-2 fw-normal">
                    <i class="bi bi-check-circle me-2"></i> Buku Sudah Dipinjam
                </button>
                @else
                <!-- kondisi buku belom dipinjam dan stock buku masih ada -->
                    <form action="{{ route('student.borrow', $book->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <button type="submit" class="btn btn-pinjam">
                            <i class="bi bi-journal-arrow-down me-3"></i> Pinjam Buku
                        </button>
                    </form>
                @endif
                @else
                <!-- stock tidak tersedia -->
                <div class="alert alert-danger">Buku tidak tersedia</div>
                @endif

            </div>
        </div>
    </div>
</section>

@endsection