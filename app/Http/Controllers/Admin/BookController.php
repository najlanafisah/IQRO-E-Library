<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //validasi data
        $this->validateBook($request);
        //nyimpen cover
        $coverImage = $request->file('cover');
        $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
        $coverImage->move(public_path('cover_images'), $coverImageName);

        Book::create([
            'title'      => $request->title,
            'author'     => $request->author,
            'year'       => $request->year,
            'category_id' => $request->category_id,
            'publisher'  => $request->publisher,
            'stock'      => $request->stock,
            'cover'      => 'cover_images/' . $coverImageName
        ]);

        return redirect()->route('book')->with('message', 'Berhasil menambahkan data buku');
    }

    //Detail Buku
    public function detail($id)
    {
        $book = Book::find($id);
        // return $book->id;
        return view('admin.books.detail', compact('book'));
    }

    //edit
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        return view('admin.books.edit', compact('categories', 'book'));
    }

    //update
    public function update(Request $request, $id)
    {
        $this->validateBook($request);

        //ambil data yang akan di update
        $book = Book::findOrFail($id);

        // Jika ada Cover baru, upload dan hapus yang lama
        if ($request->hasFile('cover')) {
            //hapus yang lama
            if ($book->cover && file_exists(public_path($book->cover))) {
                unlink(public_path($book->cover));
            }

            //upload cover yang baru 
            $coverImage = $request->file('cover');
            $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('cover_images'), $coverImageName);

            //set path baru
            $book->cover = 'cover_images/' . $coverImageName;
            }
        $book->update([
            'title'      => $request->title,
            'author'     => $request->author,
            'year'       => $request->year,
            'category_id' => $request->category_id,
            'publisher'  => $request->publisher,
            'stock'      => $request->stock,
        ]);

        return redirect()->route('book')->with('message', 'Berhasil melakukan perubahan data buku');
    }

    // hapus data
    public function destroy($id) {
        $book = Book::findOrFail($id);

    //    menghapus cover
        if($book->cover && file_exists(public_path($book->cover))) {
        unlink(public_path($book->cover));
        }
    //    menghapus data buku
        $book->delete();

        return redirect()->route('book')->with('message', 'Buku berhasil dihapus');
    }

    public function validateBook(Request $request)
    {
        //syarat validasi
        $rules = [
            'title'           => 'required|string|max:255',
            'author'          => 'required|string|max:255',
            'year'            => 'required|numeric',
            'category_id'     => 'required|numeric',
            'publisher'       => 'required|string|max:255',
            'stock'           => 'required|numeric',
        ];
        if ($request->isMethod('post')) {
            //create data
            $rules['cover'] = 'required|image|mimes:jpeg,png,jpg,webp|max:2048';
        } else {
            //saat update
            $rules['cover'] = 'nullable|required|image|mimes:jpeg,png,jpg,webp|max:2048';
        }

        $request->validate($rules);
    }
}