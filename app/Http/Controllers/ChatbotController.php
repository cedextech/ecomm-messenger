<?php

namespace App\Http\Controllers;

use File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\ProjectFormSubmitted;

class ChatbotController extends Controller
{
	/**
	 * Chatbots list.
	 *
	 * @return [type] [description]
	 */
	public function index()
	{
		$chatbots = [
            [
                'title' => 'Quiz Master Chatbot',
                'description' => 'Learn using Messenger. Improve your knowledge in different topics like History, Science, Sports etc.',
                'demo_url' => 'https://m.me/quizmasterbot',
                'learn_more_url' => url('chatbots/chatbot-for-book-store'),
                'video_url' => 'https://www.youtube.com/watch?v=ODW5dtAfb9s'
            ],

    		[
    			'title' => 'Recipe Chatbot',
    			'description' => 'By recipe chatbot you can search recipes by ingredient, food emojis, send your customers daily recipes content.',
    			'demo_url' => 'https://m.me/recipebotDemo',
    			'learn_more_url' => url('chatbots/recipe-chatbot'),
    			'video_url' => 'https://www.youtube.com/watch?v=f8au4NlHXfc'
    		],

    		[
    			'title' => 'Chatbot for Events',
    			'description' => 'Improve attendee event experience, give directions, hotel suggestions, know speakers, venue, book the tickets.',
    			'demo_url' => 'https://m.me/556450198079302',
    			'learn_more_url' => url('chatbots/chatbot-for-events'),
    			'video_url' => 'https://www.youtube.com/watch?v=5dcFCV8VFkw'
    		],

    		[
    			'title' => 'Pizza Ordering Chatbot',
    			'description' => 'Allow customers to order pizza via Messenger. Send real time order updates. Recommend new pizzas.',
    			'demo_url' => 'https://m.me/1201814359964053',
    			'learn_more_url' => url('chatbots/pizza-ordering-chatbot'),
    			'video_url' => 'https://www.youtube.com/watch?v=pBzgRQVxLhk'
    		],

    		[
    			'title' => 'FAQ Chatbot',
    			'description' => 'FAQ chatbot can answer the customer question and can act a customer service agent for your website.',
    			'demo_url' => 'https://m.me/2009500185961327',
    			'learn_more_url' => url('chatbots/chatbot-for-fashion-store'),
    			'video_url' => 'https://www.youtube.com/watch?v=ohh1rN4w4EA'
    		],

    		[
    			'title' => 'Chatbot for Fashion Store',
    			'description' => 'Browse fashions, order the products, send real time order updates. Chatbot can send the recommendation to customers.',
    			'demo_url' => 'https://m.me/347846308977757',
    			'learn_more_url' => url('chatbots/chatbot-for-fashion-store'),
    			'video_url' => 'https://www.youtube.com/watch?v=ohh1rN4w4EA'
    		],

    		[
    			'title' => 'Chatbot for Restaurant',
    			'description' => 'Explore the restaurant menus, know the opening hours, order the menus, send the Google map location.',
    			'demo_url' => 'https://m.me/1201814359964053',
    			'learn_more_url' => url('chatbots/chatbot-for-restaurants'),
    			'video_url' => 'https://www.youtube.com/watch?v=tO356hqTENY'
    		],

    		[
    			'title' => 'Chatbot for Flower Shop',
    			'description' => 'Explore the flowers, order the flowers, the customer receives real time order updates in Messenger.',
    			'demo_url' => 'https://m.me/425610657837788',
    			'learn_more_url' => url('chatbots/chatbot-for-flower-shop'),
    			'video_url' => 'https://www.youtube.com/watch?v=7BCyb4G4chA'
    		],

    		[
    			'title' => 'Chatbot for Book Store',
    			'description' => 'Explore the books, order the flowers, the customer receives real time order updates in Messenger.',
    			'demo_url' => 'https://m.me/424906404575167',
    			'learn_more_url' => url('chatbots/chatbot-for-book-store'),
    			'video_url' => 'https://www.youtube.com/watch?v=27PqcQJR1Bo'
    		],

    		[
    			'title' => 'Chatbot for Gadgets Store',
    			'description' => 'Explore the gadgets, order the flowers, the customer receives real time order updates in Messenger.',
    			'demo_url' => 'https://m.me/1900466796891764',
    			'learn_more_url' => url('chatbots/chatbots-for-gadgets-stores'),
    			'video_url' => 'https://www.youtube.com/watch?v=WYEcBwdANs0'
    		],

    		[
    			'title' => 'Unofficial Chatbot for DCB Innovation Carnival',
    			'description' => 'This is an Unofficial chatbot for DCB Innovation Carnival.',
    			'demo_url' => 'https://m.me/129726284326153',
    			'learn_more_url' => url('chatbots/chatbots-for-gadgets-stores'),
    			'video_url' => 'https://www.youtube.com/watch?v=_dlMvxggQu8'
    		]
    	];

        return view('website.demos', compact('chatbots'));
	}

    /**
     * Chatbot usecases.
     *
     * @return [type] [description]
     */
    public function usecases()
    {
        return view('website.usecases');
    }

    /**
     * E-commerce chatbots.
     *
     * @return [type] [description]
     */
    public function ecommerce()
    {
    	return view('website.ecommerce');
    }

    /**
     * Show the project submission form.
     *
     * @return [type] [description]
     */
    public function project()
    {
    	return view('website.submit-project');
    }

    /**
     * Submit the chatbot project.
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
		$this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|max:255',
            'requirement' => 'required|max:10000'
        ]);

        $admin = User::where('email', 'kiran@cedextech.com')->first();

    	$admin->notify(new ProjectFormSubmitted($request->all()));

		flash('Project requirement has been submitted successfully.', 'success');

		return back();
    }

    /**
     * Chatbot details page.
     *
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
    public function show($slug)
    {
    	$chatbots = [
    		'recipe-chatbot',
    		'chatbot-for-events',
    		'pizza-ordering-chatbot',
    		'chatbot-for-fashion-store',
    		'chatbot-for-restaurants',
    		'chatbot-for-flower-shop',
    		'chatbot-for-book-store',
    		'chatbots-for-gadgets-stores'
    	];

    	if(!in_array($slug, $chatbots)) {
    		abort(404);
    	}

    	$path = public_path() . '/' . $slug . '.json';

    	$data = json_decode(File::get($path));

    	return view('website.chatbot-details', compact('data'));
    }
}