<?php

namespace App\Http\Controllers\Account;

use Auth;
use Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePassword;

class PasswordController extends Controller
{
	/**
     * Update user password.
     *
     * @param $request
     * @return void.
     */
    public function update(UpdatePassword $request)
    {
    	$currentPassword = Auth::user()->getAuthPassword();
        
        if (Hash::check($request->current_password, $currentPassword)) {
            $request->user()->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
            
            flash('Password updated successfully!','success');

        	return back();
        }
        
        flash('Password Mismatched.Try Again!','danger');

        return back(); 
    }
}
