<?php

namespace App\Http\Controllers;

use Artisan;
use Newsletter;
use Illuminate\Http\Request;

class SignupController extends Controller
{   
    /**
     * Create the mailchimp subscription
     * 
     * @return [type] [description]
     */
    public function store(Request $request) 
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        Newsletter::subscribe($request->input('email'), [], '', ['status' => 'pending']);

        $response = [
            'status' => 'success',
            'message' => 'Thanks for the signup. We have sent an email with a signup link to your email address.'
        ];

        return response()->json($response, 200);
    }

    /**
     * Mailchimp webhook endpoint for new subscription event.
     * 
     * @return [type] [description]
     */
    public function subscribed(Request $request) 
    {   
        if(!$request->input('data')) {
            return response()->json(['status' => 200], 200);
        }

        $data = $request->input('data');

        $exitCode = Artisan::call('invite:user', [
            'email' => $data['email']
        ]);
    }
}
