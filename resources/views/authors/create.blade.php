@extends('layouts.master')

@section('nama', 'Add New Author')

@section('content')
    <h2>Add New Author</h2>
    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    id="nama" value="{{ old('nama') }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="asal">Asal Kota</label>
                <input type="text" class="form-control @error('asal') is-invalid @enderror" name="asal"
                    id="asal" value="{{ old('asal') }}">
                @error('asal')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="telepon">No Telepon</label>
                <input type="number" class="form-control @error('telepon') is-invalid @enderror" name="telepon"
                    id="telepon" value="{{ old('telepon') }}">
                @error('telepon')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
    </form>
@endsection
