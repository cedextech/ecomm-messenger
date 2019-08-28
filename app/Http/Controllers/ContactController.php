<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Recipients\AdminRecipient;
use App\Notifications\ContactFormSubmitted;

class ContactController extends Controller
{   
    /**
     * Contact form.
     * 
     * @return [type] [description]
     */
    public function index() 
    {
        return view('website.contact');
    }

    /**
     * Send email to Kiran.
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request) 
    {	
    	$this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:5000'
        ]);

        $admin = User::where('email', 'kiran@cedextech.com')->first();

    	$admin->notify(new ContactFormSubmitted($request->all()));

		flash('Message has been submitted successfully.', 'success');

		return back();
    }
}