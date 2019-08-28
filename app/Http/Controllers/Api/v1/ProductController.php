<?php

namespace App\Http\Controllers\Api\v1;

use Request;
use App\Models\Product;
use App\Models\Category;
use App\Transformers\ProductTransformer;

class ProductController extends APIController
{
    /**
     * @var App\Transformers\ProductTransformer
     */
    protected $productTransformer;

    public function __construct (ProductTransformer $productTransformer)
    {
        parent::__construct();
        
        $this->productTransformer = $productTransformer;
    }

    /**
     * Get products by keyword.
     * 
     * @return [type] [description]
     */
    public function index()
    {   
        $keyword = Request::get('keyword');

        if(!isset($keyword)) {
            abort(404);
        }

        $products = $this->shop->products()
                        ->filter($keyword)
                        ->get()->toArray();

        if(empty($products)) {
            $response = [
                'status' => 'error',
                'message' => 'I couldn\'t find any such products.',
                'data' => []
            ];

            return $this->response($response);
        }
        
        $response = [
            'status' => 'success',
            'data' => $this->productTransformer->transformCollection($products)
        ];

        return $this->response($response);
    }

    /**
     * Show the product.
     * 
     * @param  [type] $productId [description]
     * @return [type]            [description]
     */
    public function show($productId)
    {
        $products = $this->shop->products()->findOrFail($productId);

        $response = [
            'status' => 'success',
            'data' => $this->productTransformer->transform($products)
        ];
                  
        return $this->response($response);
    }

    /**
     * Get products by a category.
     * 
     * @param  [type] $categoryId [description]
     * @return [type]             [description]
     */
    public function category($categoryId)
    {   
        $category = $this->shop->categories()->findOrFail($categoryId);

        $products = $category->products->toArray();

        if(empty($products)) {
            $response = [
                'status' => 'error',
                'message' => 'No products found in ' . $category->name,
                'data' => []
            ];

            return $this->response($response);
        }

        $response = [
            'status' => 'success',
            'data' => $this->productTransformer->transformCollection($products)
        ];

        return $this->response($response);
    }
}