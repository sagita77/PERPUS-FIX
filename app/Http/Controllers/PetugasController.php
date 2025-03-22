<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Petugas;
class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|max:100|unique:petugas,nip',
            'alamat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:225'
        ]);

        Petugas::create($validated);
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|max:100|unique:petugas,nip,' . $id,
            'alamat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:225'
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->update($validated);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus');
    }
}
