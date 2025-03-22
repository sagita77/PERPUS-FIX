<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BukuControllerApi extends Controller
{
    // GET: Ambil semua buku
    public function index()
{
    $buku = Buku::all();
    return response()->json($buku);
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


        $buku = Buku::create($validated);
        return response()->json([
            'message' => 'Buku berhasil ditambahkan',
            'buku' => $buku
        ], Response::HTTP_CREATED);
    }

    // GET: Ambil satu buku berdasarkan ID
    public function show($id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($buku, Response::HTTP_OK);
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
            return response()->json(['message' => 'Buku tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }

        $buku->update($validated);
        return response()->json([
            'message' => 'Buku berhasil diperbarui',
            'buku' => $buku
        ], Response::HTTP_OK);
    }

    // DELETE: Hapus buku berdasarkan ID
    public function destroy($id)
    {

        $buku = Buku::find($id);
        if (!$buku) {
            return response()->json(['message' => 'Buku tidak ditemukan'], Response::HTTP_NOT_FOUND);
        }

        $buku->delete();
        return response()->json(['message' => 'Buku berhasil dihapus'], Response::HTTP_OK);
    }
}
