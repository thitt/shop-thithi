<?php

namespace App\Repositories;

use App\Models\Product;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Product::class;
    }

    public function searchListProduct($data)
    {
        $result = $this->model
            ->with(['category' => function ($query) use ($data) {
                $query->with('parent');
            }])
            ->withSum('productQuantities', 'stock_quantity')
            ->withMax('category', 'name')
            ->when(isset($data['name']), function ($query) use ($data) {
                $query->where('name', 'like', '%' .$data['name'] . '%');
            })
            ->when(isset($data['category_id']), function ($query) use ($data) {
                $query->orWhereRelation('category', 'id', $data['category_id']);
            })
            ->when(isset($data['slug']), function ($query) use ($data) {
                $query->where('slug', 'like', '%' .$data['slug'] . '%');
            })
            ->when(isset($data['price_from']) && isset($data['price_to']), function ($query) use ($data) {
                $query->whereBetween('price', [$data['price_from'], $data['price_to']]);
            })
            ->when(isset($data['price_from']), function ($query) use ($data) {
                $query->where('price', '>=', $data['price_from']);
            })
            ->when(isset($data['price_to']), function ($query) use ($data) {
                $query->where('price', '<=', $data['price_to']);
            })
            //TODO:search stock_quantity
//            ->when(isset($data['quantity_from']), function ($query) use ($data) {
//                $query->whereHas('product_quantities', function ($q) use ($data) {
//                    $q->whereSum('stock_quantity', '>=', $data['quantity_from']);
//                });
//            })
            ->when(isset($data['key']) && isset($data['sort']), function ($query) use ($data) {
                $query->orderBy($data['key'], $data['sort']);
            })
            ->orderBy('created_at', 'desc');

        return $result->paginate($data['number_record'] ?? MAX_RECORD);
    }
}
