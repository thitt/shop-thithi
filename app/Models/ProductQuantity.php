<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductQuantity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'product_quantities';

    protected $fillable = [
        'product_id',
        'stock_quantity',
        'color_id',
        'size_id',
    ];

    public $timestamps;
}
