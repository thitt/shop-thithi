<?php

namespace App\Repositories;

use App\Models\ProductQuantity;
use Illuminate\Support\Facades\DB;
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

    public function updateMultipleQuantity($product_id, $data)
    {
        try {
            DB::beginTransaction();
            $productQuantitiesOld = $this->model->where('product_id', $product_id)
                ->pluck('id')->toArray();
            $dataCreate = [];
            $dataUpdate = [];
            $dataRemove = [];

            foreach ($data['stock_quantity'] as $key => $value) {
                if (empty($data['product_quantity_id'][$key])) {
                    $dataCreate[] = [
                        'product_id' => $product_id,
                        'stock_quantity' => $value,
                        'color_id' => $data['color'][$key],
                        'size_id' => $data['size'][$key],
                    ];
                } else if (in_array($data['product_quantity_id'][$key], $productQuantitiesOld)) {
                    $dataUpdate[$data['product_quantity_id'][$key]] = [
                        'product_id' => $product_id,
                        'stock_quantity' => $value,
                        'color_id' => $data['color'][$key],
                        'size_id' => $data['size'][$key],
                    ];
                }
                $dataRemove = array_diff($productQuantitiesOld, $data['product_quantity_id']);
            }
            $this->createMultiple($dataCreate);
            foreach ($dataUpdate as $key => $value) {
                $this->updateById($key, $value);
            }
            $this->deleteMultipleById($dataRemove);
            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function getDataByProductId($product_id)
    {
        return $this->model->where('product_id', $product_id)->get();
    }
}
