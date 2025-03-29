<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\QueryFilter\ProductFilter;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->all();
        $products = Product::filter(new ProductFilter(Product::query(), $filters))->paginate(10);
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, ProductService $productService)
    {
        $product = $productService->createProduct($request->validated());
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product, ProductService $productService)
    {
        $product = $productService->updateProduct($request->validated(), $product);
        return new ProductResource($product);        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, ProductService $productService)
    {
        $productService->deleteProduct($product);
        return response()->json([
            'message' => 'Product deleted'
        ]);
    }
    
}
