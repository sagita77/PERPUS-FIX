<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku'; // Nama tabel di database
    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'stok',
        "kategori_id"
    ];
}
