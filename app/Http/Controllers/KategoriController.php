<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $kategori = Kategori::all();
        return view('kategori/index',compact('kategori'));

}

public function create(){
    return view('kategori.create');

}

public function store(Request $request)
{
    // dd(request()->all());
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
    ]);

    Kategori::create($validated);
    return redirect()->route('kategori.index')->with('success', 'kategori berhasil ditambahkan');
}


public function edit($id){
    $kategori = Kategori::findOrFail($id);
    return view('kategori.edit',compact('kategori'));
}

public function update (Request $request,$id){
    $validated = $request->validate([
    'nama' => 'required|string|max:255',
]);

    $kategori = Kategori::findOrFail($id);
    $kategori->update($validated);

    return redirect()->route('kategori.index')->with('success', 'kategori berhasil di edit');
}

public function destroy($id){

    $kategori = Kategori::findOrFail($id);
    $kategori-> delete();
    return redirect()->route('kategori.index')->with('success', 'kategori berhasil dihapus');
}
}
