@extends('layouts.master')

@section('nama', $author->nama)

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-8">
                <h2>Nama : {{ $author->nama }}</h2>
            </div>
            <div class="col-4">
                <div class="float-right">
                    <div class="btn-group" role="group">
                        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary ml-3">Edit</a>
                        <form action={{ route('authors.destroy', $author->id) }} method="POST">
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
                <em>Asal Kota : {{ $author->asal }}</em>
            </span>
        </h5>
        <p>
            <div>
        <ul class="list-inline">
            <li class="list-inline-item">
                <i class="fa fa-th-large fa-fw"></i>
                <em>No Telepon : {{ $author->telepon }}</em>
            </li>
        </div>
            <li class="list-inline-item">
                <i class="fa fa-calendar fa-fw"></i>
                Email : {{ $author->email }}
            </li>
        </ul>
        </p>
    </div>
@endsection
