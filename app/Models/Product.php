<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    public function kategori_product()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_produk', 'product_id', 'kategori_id');
    }
    protected $fillable = [
        'name',
        'slug',
        'description',
        'img',
    ];
    protected $guarded = [
        'id',
    ];

    public function scopeFilter(Builder $query, array $filters): void
    {
        // Apply search filter
        $query->when(isset($filters['search']) && $filters['search'], function ($query) use ($filters) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        });

        // Apply category filter
        $query->when(isset($filters['kategori']) && $filters['kategori'], function ($query) use ($filters) {
            $query->whereHas('kategori', function ($query) use ($filters) {
                $query->where('slug', $filters['kategori']);
            });
        });
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $slug = Str::slug($value);
        $originalSlug = $slug;
        $count = 1;

        // Loop untuk memastikan slug unik
        while (self::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}_{$count}";
            $count++;
        }

        $this->attributes['slug'] = $slug;
    }
}
