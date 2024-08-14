<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Support\Facades\Faker;
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'name' => fake()->sentence(5),
                'kategori_id' => Kategori::factory(), // Menggunakan factory kategori untuk memastikan kategori_id valid dan mengambil dari model
                'slug' => Str::slug(fake()->sentence()),
                'type' => fake()->sentence(),
                'image' => fake()->sentence(),
                'harga' => fake()->randomFloat(1, 20, 30)
        ];
    }
}
