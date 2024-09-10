<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['name', 'img', 'is_publish'];
    protected $table = 'brands';
}
