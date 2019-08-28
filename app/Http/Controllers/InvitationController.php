<?php

namespace App\Http\Controllers;

use App\Locales;
use App\Models\Invite;
use App\Services\InviteService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InvitationController extends Controller
{   
    /**
     * InviteService
     * 
     * @var [type]
     */
    public $invitation;

    public function __construct(InviteService $invitation) 
    {
        $this->invitation = $invitation;
    }

    /**
     * Show the signup form.
     * 
     * @param  [type] $token [description]
     * @return [type]        [description]
     */
    public function index($token) 
    {
        $locales = Locales::all();

        Invite::where('token', $token)->firstOrFail();

        return view('auth.invitation', compact('token', 'locales'));
    }

    /**
     * Create the user account.
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function create(Request $request) 
    {   
        // TODO
        // Add form request class

        $locales = Locales::all();

        $token = $request->input('token');

        $this->validate($request, [
            'token'     => 'required|invitation_token',
            'name'      => 'required|max:191',
            'shop_name' => 'required|max:191',
            'password'  => 'required|min:6|max:25',
            'locale'    => [
                'required',
                Rule::in(array_keys($locales))
            ]
        ]);

        // Create account
        if($this->invitation->create($request->all())) {
            return redirect('/login');
        }
    }
}