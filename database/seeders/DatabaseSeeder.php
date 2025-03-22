<?php
 
namespace Database\Seeders;
 
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
 
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
 
    public function run(): void
    {
        Member::factory(10)->create();
        Petugas::factory(10)->create();
        Buku::factory(10)->create();

        User::create([
            "name"=>"Sagita Putri Agustin",
            "email"=>"test@gmail.com",
            "password"=>bcrypt("12341234")
        ]);
    }
}