@extends('layouts.website')

@section('nav-class', 'bg-blue')

@section('title', 'Onchatbot | Chatbot Use Cases For Every Industry')

@section('description', 'Chatbot Use Cases For Every Industry. Chatbots can be programmed to handle any process.')

@section('content')

<section class="inner-banner bg-blue">
    <div class="container">
        <div class="inner-banner-wrapper">
            <div class="row ">
                <div class="col-md-12">
                    <div class="inner-banner-texts text-center">
                        <h2 class="animated wow fadeInDown">{{ __('Chatbot Use Cases') }}</h2>
                        <p class="wow fadeInUp">{{ __('Chatbots can be programmed to handle any process. OnChatbot can help you in creating chatbots based on your unique requirements, which will help your business to stand out in the crowd.') }}</p>

                        <a href="{{ url('start-chatbot-project') }}" class="btn-bnr hm-btn wow fadeInUp">{{ __('Start Chatbot Project') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container clr-dark">
        <div class="heading">
            <h2 class="clr-dark wow fadeInDown">{{ __('Chatbot Use Cases') }}</h2>
            <p class="sub-heading clr-light-dark wow fadeInDown">{{ __('You can build a Chatbot for different business needs. It depends on your needs and imagination. Here are few use cases') }}</p>
        </div>

        <div class="row">
            <div class="col-sm-6 wow fadeIn">
                <div class="cat-item4">
                    <img src="{{ asset('img/line-icons/e-commerce.png') }}">
                    <h4>{{ __('E-commerce') }}</h4>
                    <p>{{ __('An E-commerce Chatbot helps to reach out to more potential buyers across social media. Customers can browse products and ask questions about them in natural language conversation. The bot can list different menus, list menu items, add products to cart, display the cart, answer live questions, make product suggestions, process orders and send shipping updates.') }}</p>
                </div>
            </div>

            <div class="col-sm-6 wow fadeIn">
                <div class="cat-item4">
                    <img src="{{ asset('img/line-icons/ticket.png') }}">
                    <h4>{{ __('Event Ticket Booking') }}</h4>
                    <p>{{ __('Ticket booking Chatbot help companies with their ticketing /client support center. The bot will use the AI power and learn how to reply with contextual answers, automatically. The users can directly interact with the chatbot for the different types of tickets available, ticket pricing, date and time of travel etc. Chatbots can also inform if there are any changes in the flight schedule.') }}</p>
                </div>
            </div>

            <div class="col-sm-6 wow fadeIn">
                <div class="cat-item4">
                    <img src="{{ asset('img/line-icons/news.png') }}">
                    <h4>{{ __('News') }}</h4>
                    <p>{{ __('A News Chatbot sends personalized breaking news or specific stories from a specific website, every day, in a private chat message. It can also send a list of stories from multiple publishing platforms. Sport fan bots can send news, alerts, live scores and status from different sports leagues. A news agency can use bots effectively to stay in touch with customers with real live data.') }}</p>
                </div>
            </div>

            <div class="col-sm-6 wow fadeIn">
                <div class="cat-item4">
                    <img src="{{ asset('img/line-icons/pizza.png') }}">
                    <h4>{{ __('Restaurants Food Ordering') }}</h4>
                    <p>{{ __('Food Ordering Chatbot – They allows diners to make table reservations, order food items online, browse important information and menu through the restaurant\'s Facebook Messenger in a more easy and convenient way.') }}<br/>

                    {{ __('Eat and Drink Chatbot – Helps people decide what restaurant or bar to attend according to the preferences and location of the user.') }}</p>
                </div>
            </div>

            <div class="col-sm-6 wow fadeIn">
                <div class="cat-item4">
                    <img src="{{ asset('img/line-icons/room.png') }}">
                    <h4>{{ __('Hotel Booking') }}</h4>
                    <p>{{ __('Hotel booking Chatbot help peoples to search, browse and make hotel reservations. Chatbots can increase and improve the communication with guests and guest engagement before, during and after their stay. Indeed, as an instant messaging app, chatbots can represent a new reservation channel, which will allow clients to easily find and book their stay via a chat interface.') }}</p>
                </div>
            </div>

            <div class="col-sm-6 wow fadeIn">
                <div class="cat-item4">
                    <img src="{{ asset('img/line-icons/support.png') }}">
                    <h4>{{ __('Customer Support') }}</h4>
                    <p>{{ __('Customer support Chatbot can replace live chat agents. The bot can have multiple responders, automated, reply within the given context, use templates and Call-to-Actions. Replying to frequently asked questions or providing simple and timely information are perfect scenarios for a chatbot. A chatbot could provide correct answers, directly reply, or even escalate the request to a person.') }}</p>
                </div>
            </div>

            <div class="col-sm-6 wow fadeIn">
                <div class="cat-item4">
                    <img src="{{ asset('img/line-icons/legal.png') }}">
                    <h4>{{ __('Finance & Legal') }}</h4>
                    <p>{{ __('Stock Chatbot – Stock Chatbot can Send push notifications with live stock quotes of different companies based on client preference.') }}</br>

                    {{ __('Finance Chatbot – They gives immediate  access to updates or alerts about their credit card balance, based on users’ personal preferences.') }}</br>

                    {{ __('Legal Assistant Chatbot – Offers legal assistance, price quotes and other advice to people who are opening a business and who already have one.') }}</p>
                </div>
            </div>

            <div class="col-sm-6 wow fadeIn">
                <div class="cat-item4">
                    <img src="{{ asset('img/line-icons/healthcare.png') }}">
                    <h4>{{ __('Healthcare') }}</h4>
                    <p>{{ __('Bookings & Appointments Chatbot - Embedding Chatbot with calendars and scheduling functionality can improve the efficiency of booking appointments with doctors.') }}<br/>

                    {{ __('Patient Communication Chatbot - With Chatbot, doctors can strengthen their connection with patients by shifting from purely transactional relationships into informative, value-rich interactions.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('website.contact-section')

@endsection