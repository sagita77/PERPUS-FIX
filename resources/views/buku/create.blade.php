@extends('layouts.home')

@section('title', 'Tambah Buku')

@section('content')
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Tambah Buku</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('buku.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="mb-3">
                <label class="form-label">Kategori</label>
               <select class="form-control" name="kategori_id" id="">
               @foreach ($kategori as $k )
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
               </select>
            </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
