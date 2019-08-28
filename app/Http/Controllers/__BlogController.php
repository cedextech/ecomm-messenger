<?php

namespace App\Http\Controllers;

use File;

class BlogController extends Controller
{   
    /**
     * Blog page.
     * 
     * @return [type] [description]
     */
    public function index() 
    {
    	$path = public_path() . '/blog.json';

    	$posts = json_decode(File::get($path));

        return view('website.blog', compact('posts'));
    }
}