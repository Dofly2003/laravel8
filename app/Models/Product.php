<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeFilter(Builder $query, array $filters): void
    {
        // Apply search filter
        $query->when(isset($filters['search']) && $filters['search'], function ($query) use ($filters) {
            $query->where('name_product', 'like', '%' . $filters['search'] . '%');
        });

        // Apply category filter
        $query->when(isset($filters['kategori']) && $filters['kategori'], function ($query) use ($filters) {
            $query->whereHas('kategori_product', function ($query) use ($filters) {
                $query->where('slug', $filters['kategori']);
            });
        });
    }
}
