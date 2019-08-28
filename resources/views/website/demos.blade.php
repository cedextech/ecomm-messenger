@extends('layouts.website')

@section('nav-class', 'bg-blue')

@section('title', 'Onchatbot AI driven chatbots for e-commerce, customer services, sales, content marketing, booking, ordering etc')

@section('description', 'Onchatbot builds chatbots for e-commerce, customer support, concierge, sales, lead generation, personal assistant, HR, booking, ordering, content delivery etc')

@section('content')
<section class="inner-banner bg-blue" >
    <div class="container">
        <div class="inner-banner-wrapper">
            <div class="row ">
                <div class="col-md-12">
                    <div class="inner-banner-texts text-center">
                        <h2 class="animated wow fadeInDown" data-wow-duration="500" data-wow-delay="300ms">{{ __('We can build chatbots for your business') }}</h2>
                        <p class="wow fadeInUp" data-wow-duration="500" data-wow-delay="200ms">{{ __('Chatbots offer true customer engagement, personalization of conversation and also help brands to get insights directly from the consumers. We can build rule based and artificial intelligence powered chatbots for Facebook Messenger, Slack, Telegram, Kik, SMS.') }}</p>
        
                        <a href="{{ url('start-chatbot-project') }}" class="btn-bnr hm-btn wow fadeInUp">{{ __('Get a Chatbot Developed') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section  bg-grey2">
    <div class="container clr-dark">
        <div class="heading">
            <h2 class="clr-dark wow fadeInDown" data-wow-duration="500" data-wow-delay="200ms">{{ __('Onchatbot don’t just build chatbots,')  }} <br>  {{ __('We solve the business problems') }}</h2>
            <p class="sub-heading clr-light-dark wow fadeInDown">{{ __('Chatbots offer true customer engagement, personalization of conversation and also help brands to get insights directly from the consumers. ') }}</p>
        </div>

        <div class="row">

        	@foreach($chatbots as $chatbot)
	        	<div class="col-sm-4 text-center wow fadeIn" data-wow-duration="500" data-wow-delay="150ms">
	                <div class="cat-item3">
	                    <h4>{{ $chatbot['title'] }}</h4>
	                    <p>{{ $chatbot['description'] }}</p>

	                    <a target="_blank" class="btn1" href="{{ $chatbot['demo_url'] }}" title="Facebook Messenger - {{ $chatbot['title'] }}">
	                        {{ __('Send to Messenger') }}
	                    </a>

	                    <a target="_blank" href="{{ $chatbot['video_url'] }}" class="btn1" title="Learn about {{ $chatbot['title'] }}">
	                    	{{ __('Learn More') }}
	                    </a>
	                </div>
	            </div>
            @endforeach

        </div>
    </div>
</section>

@include('website.contact-section')

@endsection