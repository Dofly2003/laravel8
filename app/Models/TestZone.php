<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestZone extends Model
{
    protected $table = 'brands';
    use HasFactory;
    protected $fillable = [
        'name_img',
        'img',
        'is_publish',
    ];

    /**
     * Method ini opsional jika kamu ingin menambahkan accessor atau mutator.
     * Contoh accessor untuk is_publish
     */
    public function getIsPublishAttribute($value)
    {
        return $value ? 'Published' : 'Not Published';
    }
}
