@extends('layouts.home')

@section('content')
    <div class="container mt-4">
        <h2>Edit Petugas</h2>
        <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $petugas->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="number" name="nip" class="form-control" value="{{ $petugas->nip }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $petugas->alamat }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">jabatan</label>
                <input type="text" name="jabatan" class="form-control" value="{{ $petugas->jabatan }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
