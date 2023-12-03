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
            $dataCategory = $data->all('name', 'description', 'type_category', 'parent_id');
            if ($dataCategory['type_category'] == IS_PARENT_CATEGORY) {
                $dataCategory['parent_id'] = IS_PARENT_CATEGORY;
            }
            unset($dataCategory['type_category']);
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
        $category = $this->categoryRepository->getById($id);
        if ($category->products->count() == 0) {
            return $this->categoryRepository->deleteById($id);
        }
        return false;
    }

    public function getCategoryParent()
    {
        return $this->categoryRepository->getCategoryParent();
    }
}
