<?php

namespace App\Repositories;

use App\Models\Category;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Category::class;
    }

    public function searchCategory($data)
    {
        $result = $this->model
            ->with('products')
            ->when(isset($data['name']), function ($query) use ($data) {
                $query->where('name', 'like', '%' .$data['name'] . '%');
            })
            ->when(isset($data['slug']), function ($query) use ($data) {
                $query->where('slug', 'like', '%' .$data['slug'] . '%');
            })
            ->when(isset($data['description']), function ($query) use ($data) {
                $query->where('description', 'like', '%' .$data['description'] . '%');
            })
            ->when(isset($data['key']) && $data['sort'], function ($query) use ($data) {
                $query->orderBy($data['key'], $data['sort']);
            });
        return $result->paginate($data['number_record'] ?? MAX_RECORD);
    }
}
