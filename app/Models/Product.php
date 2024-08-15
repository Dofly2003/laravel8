<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    public function kategori_product()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_produk', 'product_id', 'kategori_id');
    }
    protected $fillable = [
        'name_product', 'slug', 'description',
    ];
    protected $guarded = [
        'id',
    ];
}
