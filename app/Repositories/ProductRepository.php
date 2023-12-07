<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
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
        $sql_quantity = '(select sum(`product_quantities`.`stock_quantity`)
                    from `product_quantities`
                    where `products`.`id` = `product_quantities`.`product_id`
                      and `product_quantities`.`deleted_at` is null) ';
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
            ->when(isset($data['quantity_from']) && isset($data['quantity_to']), function ($query) use ($data, $sql_quantity) {
                $query->whereRaw(DB::raw(
                    $sql_quantity .'between ? and ?'), [$data['quantity_from'], $data['quantity_to']]);
            })
            ->when(isset($data['quantity_from']), function ($query) use ($data, $sql_quantity) {
                $query->whereRaw(DB::raw(
                    $sql_quantity. '>= ?'), [$data['quantity_from']]);
            })
            ->when(isset($data['quantity_to']), function ($query) use ($data, $sql_quantity) {
                $query->whereRaw(DB::raw(
                    $sql_quantity .'<= ?'), [$data['quantity_to']]);
            })
            ->when(isset($data['key']) && isset($data['sort']), function ($query) use ($data) {
                $query->orderBy($data['key'], $data['sort']);
            })
            ->orderBy('created_at', 'desc');

        return $result->paginate($data['number_record'] ?? MAX_RECORD);
    }

    public function getProductById($id)
    {
        return $this->model
            ->where('id', $id)
            ->with('category', 'productQuantities', 'productImages')
            ->first();
    }
}
