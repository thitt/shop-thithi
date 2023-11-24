<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'weight',
        'active',
    ];

    public function sluggable(): array
    {
        // TODO: Implement sluggable() method.
        return [
            'slug' => [
                'source' => ['name', 'id']
            ]
        ];
    }
}
