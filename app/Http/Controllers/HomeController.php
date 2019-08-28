<?php

namespace App\Http\Controllers;

use File;

class HomeController extends Controller
{   
    /**
     * Home page.
     * 
     * @return [type] [description]
     */
    public function index() 
    {
    	$path = public_path() . '/blog.json';

    	$posts = json_decode(File::get($path));
		$posts = collect($posts)->splice(0, 3)->all();

        return view('website.home', compact('posts'));
    }
}