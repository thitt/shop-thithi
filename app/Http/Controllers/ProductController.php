<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProductStoreRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(VIEW_PRODUCT_LIST);
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
        return view(VIEW_PRODUCT_DETAIL);
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
        $listProduct = $this->productService->getListProduct($data);
        $listCategory = $this->productService->getAllCategory();
        return view(VIEW_ADMIN_PRODUCT_LIST)->with([
            'list_product' => $listProduct,
            'list_category' => $listCategory,
        ]);
    }

    public function createAdmin()
    {
        $listCategory = $this->productService->getAllCategory();
        $listColor = $this->productService->getAllColor();
        $listSize = $this->productService->getAllSize();
        return view(VIEW_ADMIN_PRODUCT_CREATE)->with([
            'list_category' => $listCategory,
            'list_color' => $listColor,
            'list_size' => $listSize,
        ]);
    }

    public function storeAdmin(AdminProductStoreRequest $request)
    {
        if ($this->productService->storeProduct($request)) {
            Session::flash('success', __('message.product.create_success'));
            return redirect()->route(ROUTE_ADMIN_PRODUCT_LIST);
        }

        Session::flash('error', __('message.product.create_error'));
        return redirect()->route(ROUTE_ADMIN_PRODUCT_CREATE)->withInput();
    }

    public function editAdmin($id)
    {
        $listCategory = $this->productService->getAllCategory();
        $listColor = $this->productService->getAllColor();
        $listSize = $this->productService->getAllSize();
        $product = $this->productService->getProduct($id);
        return view(VIEW_ADMIN_PRODUCT_EDIT)->with([
            'list_category' => $listCategory,
            'list_color' => $listColor,
            'list_size' => $listSize,
            'product' => $product,
        ]);
    }

    public function updateAdmin(AdminProductStoreRequest $request, $id)
    {
        if ($this->productService->updateProduct($request, $id)) {
            Session::flash('success', __('message.product.edit_success'));
            return redirect()->route(ROUTE_ADMIN_PRODUCT_LIST);
        }

        Session::flash('error', __('message.product.edit_error'));
        return redirect()->route(ROUTE_ADMIN_PRODUCT_EDIT, $id)->withInput();
    }

    public function deleteAdmin($id)
    {
        if ($this->productService->deleteProduct($id)) {
            Session::flash('success', __('message.product.delete_success'));
        } else {
            Session::flash('error', __('message.product.delete_error'));
        }
        return redirect()->back();
    }
}
