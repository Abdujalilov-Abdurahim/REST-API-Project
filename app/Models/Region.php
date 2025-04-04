<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'address'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
