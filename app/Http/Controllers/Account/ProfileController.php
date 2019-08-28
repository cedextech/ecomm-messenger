<?php

namespace App\Http\Controllers\Account;

use Auth;
use App\Http\Requests\ProfilePost;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {   
        $user = Auth::user();

        return view('account.profile', compact('user'));
    }

    /**
     * Update profile of a user.
     *
     * @param  $request [<description>]
     * @return \Illuminate\Http\Response
     */
    public function update(ProfilePost $request)
    {
        $request = $request->except('email');
        $user = Auth::user();

        if($user->update($request)){
            flash('Profile updated successfully!', 'success');
            
            return back();
        }
    }
}