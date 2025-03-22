@extends('layouts.home')

@section('content')
    <div class="container mt-4">
        <h2>Edit member</h2>
        <form action="{{ route('member.update', $member->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $member->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $member->email }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $member->alamat }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">No Telfon</label>
                <input type="number" name="no_telp" class="form-control" value="{{ $member->no_telp }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
