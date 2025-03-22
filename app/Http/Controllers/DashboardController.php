<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Petugas;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalMember = Member::count();
        $totalPeminjaman = Transaksi::count();
        $totalPetugas = Petugas::count();
        return view('dashboard', compact('totalBuku', 'totalMember','totalPetugas','totalPeminjaman'));
    }
}
