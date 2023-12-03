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
    const WOMEN = 1;
    const MEN = 2;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();
        $categories = [
            ['id' => self::WOMEN, 'name' => 'Women', 'parent_id' => 0],
            ['id' => self::MEN, 'name' => 'Men', 'parent_id' => 0],
            ['id' => 3, 'name' => 'Kids', 'parent_id' => 0],
            ['id' => 4, 'name' => 'Accessories', 'parent_id' => 0],
            ['id' => 5, 'name' => 'Cosmetic', 'parent_id' => 0],
            ['name' => 'Coats', 'parent_id' => self::WOMEN],
            ['name' => 'Jackets', 'parent_id' => self::WOMEN],
            ['name' => 'Dresses', 'parent_id' => self::WOMEN],
            ['name' => 'Shirts', 'parent_id' => self::WOMEN],
            ['name' => 'T-shirts', 'parent_id' => self::WOMEN],
            ['name' => 'Jeans', 'parent_id' => self::WOMEN],
            ['name' => 'Coats', 'parent_id' => self::WOMEN],
            ['name' => 'Jackets', 'parent_id' => self::WOMEN],
            ['name' => 'Dresses', 'parent_id' => self::MEN],
            ['name' => 'Shirts', 'parent_id' => self::MEN],
            ['name' => 'T-shirts', 'parent_id' => self::MEN],
            ['name' => 'Jeans', 'parent_id' => self::MEN],
        ];

        collect($categories)->each(function ($category) {
            $category['slug'] = SlugService::createSlug(Category::class, 'slug', $category['name']);
            Category::create($category);
        });
    }
}
