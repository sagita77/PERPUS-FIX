<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['member_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',

];
public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);

    }

}
