<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $author = Author::all();
        return view('books.index', compact('books','author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = Author::all();
        return view('books.create', compact('author'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'id' => 'required|min:13|max:13',
            'judul' => 'required',
            'halaman' => 'required|integer',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'author_id' => 'required',
        ];
        $validated = $request->validate($rules);

        Book::create($validated);

        $request->session()->flash('success', "Berhasil menambahkan buku baru yang berjudul {$validated['judul']}");
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        // $book = Book::all();
        // $book = Book::findOrFail($book);
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
        dd($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'id' => 'required|min:13|max:13',
            'judul' => 'required|max:255',
            'halaman' => 'required|integer',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'author_id' => 'required',
        ];

        $validated = $request->validate($rules);

        $book->update($validated);

        $request->session()->flash('success', "Berhasil memperbarui data buku yang berjudul {$validated['judul']}");
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', "Berhasil menghapus data buku {$book['judul']}");
    }
}
