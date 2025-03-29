<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\QueryFilter\QueryFilter;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'region_id',
        'title',
        'body',
        'price',
        'phone',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function scopeFilter(Builder $query, QueryFilter $queryFilter)
    {
        return $queryFilter->apply($query);
    }
}
