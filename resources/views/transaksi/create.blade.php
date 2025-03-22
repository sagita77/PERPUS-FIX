@extends('layouts.home')

@section('title', 'Peminjaman Buku')

@section('content')
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <h4>Peminjaman Buku</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Member</label>
                    <select name="member_id" class="form-control" required>
                        <option value="">Pilih Member</option>
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <select name="buku_id" class="form-control" required>
                        <option value="">Pilih Buku</option>
                        @foreach ($buku as $item)
                            <option value="{{ $item->id }}">{{ $item->judul }} (Stok: {{ $item->stok }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
