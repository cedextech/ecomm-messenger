<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Category;
use App\Transformers\CategoryTransformer;

class CategoryController extends APIController
{   
    /**
     * @var App\Transformers\CategoryTransformer
     */
    protected $categoryTransformer;

    public function __construct(CategoryTransformer $categoryTransformer)
    {   
        parent::__construct();
        
        $this->categoryTransformer = $categoryTransformer;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =  $this->shop->categories->toArray();

        $response = [
            'status' => 'success',
            'data' => $this->categoryTransformer->transformCollection($categories)
        ];

        return $this->response($response);
    }

     /**
     * Show the category.
     *
     * @param  [type]      $categoryId  [description]
     * @return [type]                   [description]
     */
    public function show( $categoryId)
    {
        $category = $this->shop->categories()->findOrFail($categoryId);
        
        $response = [
            'status' => 'success',
            'data' => $this->categoryTransformer->transform($category)
        ];

        return $this->response($response);
    }
}