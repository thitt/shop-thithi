<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCategoryStoreRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
         $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function indexAdmin(Request $request)
    {
        $data = $request->all();
        $listCategory = $this->categoryService->getListCategory($data);
        return view(VIEW_ADMIN_CATEGORY_LIST)->with([
            'list_category' => $listCategory,
        ]);
    }

    public function createAdmin()
    {
        return view(VIEW_ADMIN_CATEGORY_CREATE);
    }

    public function storeAdmin(AdminCategoryStoreRequest $request)
    {
        if ($this->categoryService->storeAdmin($request)) {
            Session::flash('success', __('message.category.create_success'));
            return redirect()->route(ROUTE_ADMIN_CATEGORY_LIST);
        }

        Session::flash('error', __('message.category.create_error'));
        return redirect()->route(ROUTE_ADMIN_CATEGORY_CREATE)->withInput();
    }

    public function editAdmin($id)
    {
        $dataCategory = $this->categoryService->getCategoryById($id);
        return view(VIEW_ADMIN_CATEGORY_EDIT)->with([
            'data_category' => $dataCategory,
        ]);
    }

    public function updateAdmin(AdminCategoryStoreRequest $request, $id)
    {
        if ($this->categoryService->updateAdmin($request, $id)) {
            Session::flash('success', __('message.category.edit_success'));
            return redirect()->route(ROUTE_ADMIN_CATEGORY_LIST);
        }

        Session::flash('error', __('message.category.edit_error'));
        return redirect()->route(ROUTE_ADMIN_CATEGORY_EDIT)->withInput();
    }

    public function deleteAdmin($id)
    {
        if ($this->categoryService->deleteCategory($id)) {
            Session::flash('success', __('message.category.delete_success'));
        } else {
            Session::flash('error', __('message.category.delete_error'));
        }
        return redirect()->back();
    }
}
