<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KategoriSeeder::class);
        Product::factory(57)->recycle([
            Kategori::all(),
        ])->create();
    }
}
