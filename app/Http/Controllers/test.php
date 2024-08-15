<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class test extends Controller
{
    public function index()
    {
        // Hapus data di tabel pivot
        \DB::table('kategori_produk')->delete();

        // Hapus data dari tabel kategori dan produk
        Kategori::query()->delete();
        Product::query()->delete();

        // Buat 10 kategori
        $kategoriNames = [
            'Elektronik', 'Pakaian', 'Perabotan', 'Makanan', 'Kesehatan',
            'Olahraga', 'Buku', 'Hobi', 'Kecantikan', 'Kamera'
        ];

        foreach ($kategoriNames as $name) {
            Kategori::create(['name_kategori' => $name]);
        }

        // Buat 20 produk dengan slug unik
        $products = [
            ['Laptop', 'laptop-gaming', 'Laptop gaming'],
            ['Kaos', 'kaos-katun', 'Kaos katun'],
            ['Meja', 'meja-kayu', 'Meja kayu'],
            ['Roti', 'roti-tawar', 'Roti tawar'],
            ['Headphone', 'headphone-bluetooth', 'Headphone Bluetooth'],
            ['Smartphone', 'smartphone-android', 'Smartphone Android'],
            ['Kursi', 'kursi-kantor', 'Kursi kantor'],
            ['Jaket', 'jaket-winter', 'Jaket musim dingin'],
            ['Jam', 'jam-tangan', 'Jam tangan'],
            ['Sepatu', 'sepatu-olahraga', 'Sepatu olahraga'],
            ['Sofa', 'sofa-ruang-tamu', 'Sofa ruang tamu'],
            ['Kulkas', 'kulkas-dua-pintu', 'Kulkas dua pintu'],
            ['Buku', 'buku-fiksi', 'Buku fiksi'],
            ['Pel', 'pel-kelembapan', 'Pel kelembapan'],
            ['Tabung', 'tabung-gas', 'Tabung gas'],
            ['Tenda', 'tenda-kemping', 'Tenda kemping'],
            ['Tepung', 'tepung-terigu', 'Tepung terigu'],
            ['Sikat', 'sikat-gigi', 'Sikat gigi'],
            ['Panci', 'panci-teflon', 'Panci teflon'],
            ['Ranjang', 'ranjang-kasur', 'Ranjang kasur']
        ];

        foreach ($products as $product) {
            Product::create([
                'name_product' => $product[0],
                'slug' => $product[1],
                'description' => $product[2]
            ]);
        }

        // Ambil semua kategori dan produk
        $kategoris = Kategori::all();
        $products = Product::all();

        // Hubungkan beberapa produk ke kategori
        $kategoris->each(function ($kategori) use ($products) {
            $randomProducts = $products->random(5); // Ambil 5 produk acak untuk setiap kategori
            $kategori->products()->sync($randomProducts->pluck('id')->toArray());
        });

        // Hubungkan beberapa kategori ke produk
        $products->each(function ($product) use ($kategoris) {
            $randomKategoris = $kategoris->random(3); // Ambil 3 kategori acak untuk setiap produk
            $product->kategori_product()->sync($randomKategoris->pluck('id')->toArray());
        });

        // Periksa hasilnya
        $hasil1 = $products->first()->kategori_product; // Lihat kategori dari produk pertama
        $hasil2 = $kategoris->first()->products; // Lihat produk dari kategori pertama

        // Tampilkan hasilnya
        // dd($hasil1, $hasil2);
    }
}
