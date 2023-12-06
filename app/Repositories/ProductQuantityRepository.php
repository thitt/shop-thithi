<?php

namespace App\Repositories;

use App\Models\ProductQuantity;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ProductQuantityRepository.
 */
class ProductQuantityRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ProductQuantity::class;
    }

    public function createMultipleQuantity($product_id, $data)
    {
        $dataProductQuantities = [];
        foreach ($data['stock_quantity'] as $key => $value) {
            $dataProductQuantities[$key] = [
                'product_id' => $product_id,
                'stock_quantity' => $value,
                'color_id' => $data['color'][$key],
                'size_id' => $data['size'][$key],
            ];
        }
        return parent::createMultiple($dataProductQuantities);
    }
}
