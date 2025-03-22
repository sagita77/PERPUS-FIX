@extends('layouts.home')

@section('title', 'Daftar Transaksi')

@section('content')
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <h4>Daftar Transaksi Peminjaman = (Ilham Nur Isnaini)</h4>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('transaksi.create') }}" class="btn btn-success mb-3">Tambah Peminjaman</a>

            <table class="table table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama Member</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->member->nama }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $item->status == 'Dipinjam' ? 'bg-warning' : 'bg-success' }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                @if ($item->status == 'Dipinjam')
                                    <form action="{{ route('transaksi.pengembalian', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">Kembalikan</button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-secondary" disabled>Sudah Dikembalikan</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
