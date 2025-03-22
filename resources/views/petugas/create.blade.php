@extends('layouts.home')

@section('title', 'Tambah Petugas')

@section('content')
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Daftar Petugas</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('petugas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Petugas</label>
                    <input type="text" name="nama" class="form-control" required>
                    @error('nama')
                        <small>
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">NIP</label>
                    <input type="number" name="nip" class="form-control" required>
                    @error('nip')
                        <small>
                            {{ $message }}
                        </small>
                    @enderror


                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                    @error('alamat')
                        <small>
                            {{ $message }}
                        </small>
                    @enderror


                </div>
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" required>

                    @error('jabatan')
                        <small>
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
