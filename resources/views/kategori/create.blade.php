@extends('layouts.home')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Tambah Buku</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
