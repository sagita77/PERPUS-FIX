@extends('layouts.home')

@section('content')
    <div class="container mt-4">
        <h2>Edit kategori</h2>
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
            </div>

          

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
