<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
public function showForm()
{
    return view('registrasi');
}
public function processForm(Request$request)
{
    dd(request()->all());
    $rules = [
        'username' => 'required|min:10',
            'password' => 'required|min:10',
            'email' => 'required|email|regex:/@gmail\.com$/',
            'nama_lengkap' => 'required',
            'no_tlp' => 'required|numeric',
            'gaji_pokok' => 'required|numeric',
            'pinjaman' => 'required|numeric',

    ];
    $messages = [
        'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username minimal 10 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 10 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.regex' => 'Email harus menggunakan domain @gmail.com.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'no_tlp.required' => 'No Telepon wajib diisi.',
            'no_tlp.numeric' => 'No Telepon harus berupa angka.',
            'gaji_pokok.required' => 'Gaji Pokok wajib diisi.',
            'gaji_pokok.numeric' => 'Gaji Pokok harus berupa angka.',
            'pinjaman.required' => 'Pinjaman wajib diisi.',
            'pinjaman.numeric' => 'Pinjaman harus berupa angka.',

    ] ;
    $validator = Validator::make($request->all(), $rules, $messages);

    User::create(request()->all());
    if($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();

    }
    return redirect()->back()->with('succes', 'Selamat ! Registrasi berhasil');
}
    //
}
