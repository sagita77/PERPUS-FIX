<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Member;
use App\Models\Buku;
class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::with('member', 'buku')->get();
        return view('transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $members = Member::all();
        $buku = Buku::where('stok', '>', 0)->get();
        return view('transaksi.create', compact('members', 'buku'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
            'buku_id' => 'required|exists:buku,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);

        // Kurangi stok buku
        $buku = Buku::findOrFail($request->buku_id);
        if ($buku->stok < 1) {
            return back()->with('error', 'Stok buku tidak tersedia');
        }
        $buku->stok -= 1;
        $buku->save();

        // Simpan transaksi
        Transaksi::create([
            'member_id' => $request->member_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'Dipinjam',
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function pengembalian($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'status' => 'Dikembalikan',
            'tanggal_kembali' => now(),
        ]);

        // Tambah stok buku kembali
        $buku = Buku::findOrFail($transaksi->buku_id);
        $buku->stok += 1;
        $buku->save();

        return redirect()->route('transaksi.index')->with('success', 'Buku berhasil dikembalikan');
    }
}   //

