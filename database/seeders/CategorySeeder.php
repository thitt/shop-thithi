<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Sluggable, SluggableEngine, SluggableScopeHelpers;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();
        $categories = [
            ['name' => 'Women Coats'],
            ['name' => 'Women Jackets'],
            ['name' => 'Women Dresses'],
            ['name' => 'Women Shirts'],
            ['name' => 'Women T-shirts'],
            ['name' => 'Women Jeans'],
            ['name' => 'Men Coats'],
            ['name' => 'Men Jackets'],
            ['name' => 'Men Dresses'],
            ['name' => 'Men Shirts'],
            ['name' => 'Men T-shirts'],
            ['name' => 'Men Jeans'],
            ['name' => 'Kids Coats'],
            ['name' => 'Kids Jackets'],
            ['name' => 'Kids Dresses'],
            ['name' => 'Kids Shirts'],
            ['name' => 'Kids T-shirts'],
            ['name' => 'Kids Jeans'],
            ['name' => 'Accessories'],
            ['name' => 'Cosmetic'],
        ];

        collect($categories)->each(function ($category) {
            $category['slug'] = SlugService::createSlug(Category::class, 'slug', $category['name']);
            Category::create($category);
        });
    }
}
