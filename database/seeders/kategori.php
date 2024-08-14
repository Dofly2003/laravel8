<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class kategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create([
            'name' => 'Moco',
        ]);
        Kategori::create([
            'name' => 'Multimedia',

        ]);
        Kategori::create([
            'name' => 'Meubelair',

        ]);
        Kategori::create([
            'name' => 'Alat Praktik'
        ]);
        Kategori::create([
            'name' => 'Alat Kesehatan'
        ]);
        Kategori::create([
            'name' => 'Alat Tulis Kantor'
        ]);
    }
}