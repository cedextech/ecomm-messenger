<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\CategoryForm;
use App\Http\Requests\UploadCategoryPost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends BaseController
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
        $categories = Category::where('shop_id', '=', $this->shop->id)->get();

        return view('shop.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CategoryForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryForm $request)
    {
        $category = new Category;

        $category->shop_id = $this->shop->id;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status');
        $category->image = $request->input('image');

        $category->save();

        flash('Category created successfully.', 'success');

        return redirect('shop/categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $category = Category::where('shop_id', $this->shop->id)->findOrFail($id);

        return view('shop.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  CategoryForm $request [description]
     * @param  [type]       $id      [description]
     * @return [type]                [description]
     */
    public function update(CategoryForm $request, $id)
    {
        $category = Category::findorFail($id);

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status');

        if($request->input('image')) {
            $category->image = $request->input('image');
        }

        $category->save();

        flash('Category updated successfully.', 'success');

        return redirect('shop/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $this->shop->categories()
            ->findorFail($id)
            ->delete();

        flash('Category deleted successfully.', 'success');

        $response = ['status' => 1, 'message' => '', 'reload' => true];

        return response()->json($response);
    }

    /**
     * Upload the category image.
     * 
     * @param  UploadCategoryPost $request [description]
     * @return [type]                      [description]
     */
    public function upload(UploadCategoryPost $request) 
    {
        $image = $request->file('file')->store('shop/category');

        $data = [
            'status' => 'success',
            'image_url' => asset('storage/' . $image),
            'image' => $image
        ];

        return Response($data, 200);
    }
}
