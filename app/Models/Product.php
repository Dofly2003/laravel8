<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    public function kategori():BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    protected $fillable = [
        'name', 'price', 'kategori_id', 'description',
    ];
}
