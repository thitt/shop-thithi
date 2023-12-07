<?php

namespace App\Repositories;

use App\Models\ProductImage;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class ProductImageRepository.
 */
class ProductImageRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return ProductImage::class;
    }

    public function createMultipleImage($product_id, $data)
    {
        $dataProductImages[] = [
            'product_id' => $product_id,
            'image' => convertBase64ToFileImage($data['image_base']),
            'role' => ROLE_IMAGE['image_base'],
        ];
        if (isset($data['image_small'])) {
            $dataProductImages[] = [
                'product_id' => $product_id,
                'image' => convertBase64ToFileImage($data['image_small']),
                'role' => ROLE_IMAGE['image_small'],
            ];
        }
        if (isset($data['image_thumbnail'])) {
            $dataProductImages[] = [
                'product_id' => $product_id,
                'image' => convertBase64ToFileImage($data['image_thumbnail']),
                'role' => ROLE_IMAGE['image_thumbnail'],
            ];
        }
        if (isset($data['image_swatch'])) {
            $dataProductImages[] = [
                'product_id' => $product_id,
                'image' => convertBase64ToFileImage($data['image_swatch']),
                'role' => ROLE_IMAGE['image_swatch'],
            ];
        }
        return parent::createMultiple($dataProductImages);
    }

    public function updateMultipleImage($product_id, $data)
    {
        $productImageOld = $this->model->where('product_id', $product_id)->get();
        $this->updateOrCreateImage($product_id, $data, $productImageOld, 'image_base');
        $this->updateOrCreateImage($product_id, $data, $productImageOld, 'image_small');
        $this->updateOrCreateImage($product_id, $data, $productImageOld, 'image_thumbnail');
        $this->updateOrCreateImage($product_id, $data, $productImageOld, 'image_swatch');
    }

    public function updateOrCreateImage($product_id, $data, $dataOld, $type)
    {
        if (isset($data[$type])) {
            $dataImage = [
                'product_id' => $product_id,
                'image' => convertBase64ToFileImage($data[$type]),
                'role' => ROLE_IMAGE[$type],
            ];
            $id = $dataOld->where('role', ROLE_IMAGE[$type])->first()->id ?? null;
            $this->model->updateOrCreate(['id' => $id], $dataImage);
        }
    }

    public function getDataByProductId($product_id)
    {
        return $this->model->where('product_id', $product_id)->get();
    }
}
