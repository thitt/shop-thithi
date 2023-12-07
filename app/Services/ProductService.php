<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Repositories\ColorRepository;
use App\Repositories\ProductImageRepository;
use App\Repositories\ProductQuantityRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SizeRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductService.
 */
class ProductService
{
    protected $productRepository;
    protected $colorRepository;
    protected $sizeRepository;
    protected $categoryRepository;
    protected $productQuantityRepository;
    protected $productImageRepository;

    public function __construct(
        ProductRepository $productRepository,
        ColorRepository $colorRepository,
        SizeRepository $sizeRepository,
        CategoryRepository $categoryRepository,
        ProductQuantityRepository $productQuantityRepository,
        ProductImageRepository $productImageRepository
    ) {
        $this->productRepository = $productRepository;
        $this->colorRepository = $colorRepository;
        $this->sizeRepository = $sizeRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productQuantityRepository = $productQuantityRepository;
        $this->productImageRepository = $productImageRepository;
    }

    public function getListProduct($data)
    {
        return $this->productRepository->searchListProduct($data);
    }

    public function getAllColor()
    {
        return $this->colorRepository->all();
    }

    public function getAllSize()
    {
        return $this->sizeRepository->all();
    }

    public function getAllCategory()
    {
        return $this->categoryRepository->getAllCategory();
    }

    public function storeProduct($request)
    {
        try {
            DB::beginTransaction();
            $dataCategory = $request->only('category_id', 'name', 'description', 'price', 'weight');
            $product = $this->productRepository->create($dataCategory);

            $dataQuantities = $request->only('stock_quantity', 'color', 'size');
            $this->productQuantityRepository->createMultipleQuantity($product->id, $dataQuantities);

            $dataImages = $request->only('image_base', 'image_small', 'image_thumbnail', 'image_swatch');
            $this->productImageRepository->createMultipleImage($product->id, $dataImages);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function deleteProduct($id)
    {
        try {
            DB::beginTransaction();
            $product = $this->productRepository->getById($id);
            if ($product) {
                $product_quantities = $this->productQuantityRepository
                    ->getDataByProductId($product->id)->pluck('id')->toArray();
                $product_images = $this->productImageRepository
                    ->getDataByProductId($product->id)->pluck('id')->toArray();

                $this->productRepository->deleteById($id);
                $this->productQuantityRepository->deleteMultipleById($product_quantities);
                $this->productImageRepository->deleteMultipleById($product_images);
                DB::commit();
                return true;
            }

            DB::rollBack();
            return false;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
