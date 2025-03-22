@extends('layouts.home')

@section('content')
    <div class="container mt-4">
        <h2>Edit Buku</h2>
        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ $buku->stok }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
               <select class="form-control" name="kategori_id" id="">
               @foreach ($kategori as $k )
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach
               </select>
                <input type="number" name="stok" class="form-control" value="{{ $buku->stok }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
