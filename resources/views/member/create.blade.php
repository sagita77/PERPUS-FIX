@extends('layouts.home')

@section('title', 'Tambah Member')

@section('content')
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Daftar Member</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('member.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Member</label>
                    <input type="text" name="nama" class="form-control" required>
                    @error('nama')
                        <small>
                            {{ $message }}
                        </small>
                    @enderror

                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" required>
                    @error('email')
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
                    <label class="form-label">No Telfon</label>
                    <input type="number" name="no_telp" class="form-control" required>

                    @error('no_telp')
                        <small>
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('member.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
