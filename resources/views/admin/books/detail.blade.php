@extends('template.base')

@section('title', 'Detail Buku')

@section('content')

@if(session('message'))
<div class="alert alert-warning">
  {{session('message')}}
</div>
@endif

<div class="page-header  mt-5 mx-4">
    <h3 class="page-title">Detail Buku</h3>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card ms-5 mb-5">
            <img src="{{ asset($book->cover) }}" class="card-img-top" alt="{{ $book->title }}">
        </div>
    </div>

    <div class="col-md-8">
        <div class="card p-4">
            <h4 class="mb-3">{{ $book->title }}</h4>
            <p><strong>Penulis:</strong> {{ $book->author }} </p>
            <p><strong>Penerbit:</strong> {{ $book->publisher }} </p>
            <p><strong>Tahun Cetak:</strong> {{ $book->year }} </p>
            <p><strong>Kategori:</strong> {{ $book->category->name }} </p>
            <p><strong>Stok:</strong>
                @if($book->stock > 0)
                <span class="badge bg-success border-black border text-black rounded-5 ms-2">Tersedia ({{ $book->stock }})</span>
                 @else 
                <span class="badge bg-danger">Tidak Tersedia</span>
                @endif
            </p>

            <div class="mt-3">
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning border-black border text-black rounded-5 mx-1">Edit</a>
                <button class="btn btn-danger border-black border text-black rounded-5 mx-1" onclick="confirmDelete({{ $book->id }})">Hapus</button>
                <a href="{{ route('book') }}" class="btn btn-secondary border-black border text-black rounded-5 mx-1">Kembali</a>
                <form id="delete-form-{{ $book->id }}" action="{{ route('book.destroy', $book->id) }}" method="post" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(bookId) {
        Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Data buku akan dihapus permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus"
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + bookId).submit();
        }
        });
   }
</script>

@endsection