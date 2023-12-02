<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function sluggable(): array
    {
        // TODO: Implement sluggable() method.
        return [
            'slug' => [
                'source' => ['name', 'id']
            ]
        ];
    }

//     protected static function boot()
//     {
//         parent::boot();
//         static::created(function ($category) {
//             $category->slug = $category->generateSlug($category->name);
//             $category->save();
//         });
// //        static::updated(function ($category) {
// //            $category->slug = $category->generateSlug($category->name);
// //            $category->save();
// //        });
//     }

    // private function generateSlug($name)
    // {
    //     if (static::whereSlug($slug = Str::slug($name))->exists()) {
    //         $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
    //         if (isset($max[-1]) && is_numeric($max[-1])) {
    //             return preg_replace_callback('/(\d+)$/', function($mathces) {
    //                 return $mathces[1] + 1;
    //             }, $max);
    //         }
    //         return "{$slug}-2";
    //     }

    //     return $slug;
    // }
}
