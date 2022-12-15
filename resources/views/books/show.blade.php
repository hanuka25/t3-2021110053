@extends('layouts.master')

@section('judul', $book->judul)

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-8">
                <h2>Judul buku : {{ $book->judul }}</h2>
            </div>
            <div class="col-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action={{ route('books.destroy', $book->id) }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-3">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h5>
            <span class="badge badge-primary">
                <i class="fa fa-star fa-fw"></i>
                <em>Jumlah halaman : {{ $book->halaman }}</em>
            </span>
        </h5>
        <p>
            <div>
        <ul class="list-inline">
            <li class="list-inline-item">
                <i class="fa fa-th-large fa-fw"></i>
                <em>Kategori : {{ $book->kategori }}</em>
            </li>
        </div>
            <li class="list-inline-item">
                <i class="fa fa-calendar fa-fw"></i>
                Penerbit : {{ $book->penerbit }}
            </li>
            <div>
                <li class="list-inline-item">
                    <i class="fa fa-calendar fa-fw"></i>
                    Author : {{ $book->author->nama }}
                </li>
            </div>
        </ul>
        </p>
    </div>
@endsection
