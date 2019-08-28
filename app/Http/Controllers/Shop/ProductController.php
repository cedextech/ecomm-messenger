<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\ProductForm;
use App\Http\Requests\UploadProductPost;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends BaseController
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = $this->shop->products()->with('category')->get();

        return view('shop.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = $this->shop->categories;

        return view('shop.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  ProductForm $request [description]
     * @return [type]               [description]
     */
    public function store(ProductForm $request)
    {   
        $product = new Product;

        $product->shop_id = $this->shop->id;
        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->price_discount = $request->input('price_discount');
        $product->status = $request->input('status');
        $product->image = $request->input('image');

        $product->save();

        flash('Product created successfully.', 'success');

        return redirect('shop/products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $categories = $this->shop->categories;

        $product = $this->shop->products()->findOrFail($id);

        return view('shop.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  ProductForm $request [description]
     * @param  [type]      $id      [description]
     * @return [type]               [description]
     */
    public function update(ProductForm $request, $id)
    {   
        $product = $this->shop->products()->findOrFail($id);

        $product->category_id = $request->input('category_id');
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->price_discount = $request->input('price_discount');
        $product->status = $request->input('status');

        if($request->input('image')) {
            $product->image = $request->input('image');
        }

        $product->save();

        flash('Product updated successfully.', 'success');

        return redirect('shop/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->shop->products()
            ->findOrFail($id)
            ->delete();

        flash('Product deleted successfully.', 'success');

        $response = ['status' => 1, 'message' => '', 'reload' => true];

        return response()->json($response);
    }

    /**
     * Upload the product image.
     * 
     * @param  App\Http\Requests\ProductForm $request
     * @return [type] [description]
     */
    public function upload(UploadProductPost $request) 
    {
        $image = $request->file('file')->store('shop/product');

        $data = [
            'status' => 'success',
            'image_url' => asset('storage/' . $image),
            'image' => $image
        ];

        return Response($data, 200);
    }
}
