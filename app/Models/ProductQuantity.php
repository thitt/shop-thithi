<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuantity extends Model
{
    use HasFactory;

    protected $table = 'product_quantities';

    protected $fillable = [
        'product_id',
        'stock_quantity',
        'color_id',
        'size_id',
    ];

    public $timestamps;
}
