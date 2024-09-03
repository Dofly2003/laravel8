<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestZone extends Model
{
    protected $table = 'sliders';
    use HasFactory;
    protected $fillable = [
        'name',
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
