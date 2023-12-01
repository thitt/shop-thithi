<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

/**
 * Class CategoryService.
 */
class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function storeAdmin($data)
    {
        try {
            $dataCategory = $data->only('name', 'description');
            $this->categoryRepository->create($dataCategory);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updateAdmin($data, $id)
    {
        try {
            $dataCategory = $data->only('id', 'name', 'description');
            $this->categoryRepository->updateById($id, $dataCategory);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getListCategory($data)
    {
        return $this->categoryRepository->searchCategory($data);
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->deleteById($id);
    }
}
