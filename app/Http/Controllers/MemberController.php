<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Member;
class MemberController extends Controller
{
    public function index(){
        $member = Member::all();
        return view('member/index',compact('member'));

}

public function create(){
    return view('member.create');

}

public function store(Request $request)
{
    // dd(request()->all());
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'no_telp' => 'required|max:100']);

    Member::create($validated);
    return redirect()->route('member.index')->with('success', 'member berhasil ditambahkan');
}


public function edit($id){
    $member = Member::findOrFail($id);
    return view('member.edit',compact('member'));
}

public function update (Request $request,$id){
    $validated = $request->validate([
    'nama' => 'required|string|max:255',
    'email' => 'required|string|max:255',
    'alamat' => 'required|string|max:255',
    'no_telp' => 'required|max:100']);

    $member = Member::findOrFail($id);
    $member->update($validated);

    return redirect()->route('member.index')->with('success', 'member berhasil di edit');
}

public function destroy($id){

    $member = Member::findOrFail($id);
    $member-> delete();
    return redirect()->route('member.index')->with('success', 'Member berhasil dihapus');
}
}

