<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    use HasFactory;

    protected $table = 'videos';
    use HasFactory;
    protected $fillable = [
        'title',
        'youtube_url',
        'is_publish',
    ];
}
