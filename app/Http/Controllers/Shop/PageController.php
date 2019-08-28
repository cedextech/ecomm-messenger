<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\PageForm;
use Illuminate\Support\Facades\Auth;

class PageController extends BaseController
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
     * Show all the pages.
     * 
     * @return [type] [description]
     */
    public function index() 
    {
        $pages = $this->shop->pages;

        return view('shop.pages.index', compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) 
    {
        $page = $this->shop->pages()->findOrFail($id);

        return view('shop.pages.edit', compact('page'));
    }

    /**
     * Update the page.
     * 
     * @param  PageForm $form [description]
     * @return [type]         [description]
     */
    public function update(PageForm $form) 
    {
        $form->persist();

        flash('Page updated successfully.', 'success');

        return redirect('shop/pages');
    }
}
