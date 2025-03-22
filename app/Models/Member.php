<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
        use HasFactory;
        protected $table = 'members';
        protected $fillable = [
            'nama',
            'email',
            'alamat',
            'no_telp',
        ];

    }





