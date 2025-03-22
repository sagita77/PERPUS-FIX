<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BukuController extends Controller
{
    // GET: Ambil semua buku
    public function index()
        {
        
            $buku = Buku::all();
            return view("buku.index",compact("buku"));
        }
    public function create ()
        {
            $kategori  = Kategori::all();
                return view('buku.create',compact("kategori"));
        }

    // POST: Tambah buku baru
    public function store(Request $request)
    {
    
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'stok' => 'required|integer|min:1|max:100',
            'kategori_id' => 'required|exists:kategori,id',
        ]);


       Buku::create($validated);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
        }
    
    public function show($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($buku, Response::HTTP_OK);
    }

    public function edit ($id)
        {
            $buku = Buku::find($id);
            $kategori  = Kategori::all();
            return view('buku.edit',compact("kategori","buku"));
        }

    // PUT: Update buku berdasarkan ID
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'stok' => 'required|integer|min:1|max:100',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $buku = Buku::find($id);
        if (!$buku) {
            
            return abort('404');

        }

        Buku::update($validated);
        return redirect()->route('buku.update')->with('success', 'Buku berhasil ditambahkan');
        
    }

    // DELETE: Hapus buku berdasarkan ID
    public function destroy($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
