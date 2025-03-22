@extends('layouts.home')

@section('title')
@section('content')
    @if (session('debug'))
        <p>Debug: Total Buku = {{ session('debug') }}</p>
        <p>Debug: Total Member = {{ session('debug') }}</p>
    @endif

    <H1> Dashboard</H1>
    <br>
    <br>
    <div class="row text-white">
        <!-- Card Total Buku -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary mb-4">
                <div class="card-body">
                    <h5>Total Buku</h5>
                    <h3>{{ $totalBuku }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Total Member -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success mb-4">
                <div class="card-body">
                    <h5>Total Member</h5>
                    <h3>{{ $totalMember }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Total Petugas -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning mb-4">
                <div class="card-body">
                    <h5>Total Petugas</h5>
                    <h3>{{ $totalPetugas }}</h3>
                </div>
            </div>
        </div>

        <!-- Card Total Peminjaman -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger mb-4">
                <div class="card-body">
                    <h5>Total Peminjaman</h5>
                    <h3>{{ $totalPeminjaman }}</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
