<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PdfController extends Controller
{
    public function generatePDF()
    {
$data = [
'title' => 'Laporan Pegawai',
'tanggal' => date('d-m-Y'),
'pegawai' => [
['nama' => 'Sagita Putri Agustin', 'jabatan' => 'Manager'],
['nama' => 'Wahyu Ananda', 'jabatan' => 'Staff'],
]
];
$pdf = PDF::loadView('buku.pegawai', $data);
return $pdf->download('laporan-pegawai.pdf'); 
// Atau ->stream() untuk tampil di browser

}
    }
