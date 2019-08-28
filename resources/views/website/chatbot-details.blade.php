@extends('layouts.website')

@section('nav-class', 'bg-blue')

@section('title', 'Onchatbot | Chatbot Development Company | Contact Us')

@section('description', '')

@section('content')
    <section class="inner-banner-page bg-blue" >
        <div class="container">
            <div class="inner-banner-wrapper">
                <div class="row">
                    <div class="col-md-7 col-sm-6">
                        <div class="inner-banner-texts innr-txt text-center">
                            <h2 class="animated wow fadeInDown" data-wow-duration="500" data-wow-delay="300ms">{{ $data->title }}</h2>
                            <p class="wow fadeInUp" data-wow-duration="500" data-wow-delay="200ms">{{ $data->description }}</p>

                            <a href="{{ url('start-chatbot-project') }}" class="btn-bnr">{{ __('Start Chatbot Project') }}</a>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-6">
                    	<div class="row">
                    		<div class="mob-bck">
	                    		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					                <ol class="carousel-indicators">
					                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					                </ol>

						            <div class="carousel-inner">
					                    <div class="item active chng">
					                        <img src="{{ asset('img/chatbots/recipe-chatbot/1.png') }}" alt="First slide">
					                    </div>

					                    <div class="item chng">
					                        <img src="{{ asset('img/chatbots/recipe-chatbot/2.png') }}" alt="First slide">
					                    </div>

					                    <div class="item chng">
					                        <img src="{{ asset('img/chatbots/recipe-chatbot/3.png') }}" alt="First slide">
					                    </div>
					                </div>
					            </div>
                    		</div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--== Chatbot Features ==-->

    <section class="section">
    	<div class="container">
    		<div class="row">
    			<div class="features clr-dark">
    				<div class="heading">
    					<h2 class="clr-dark wow fadeInDown" data-wow-duration="500" data-wow-delay="200ms">Chatbot Features</h2>
    				</div>

    				<div class="feature-list">

    					@foreach($data->features as $feature)
	    					<div class="col-md-6 col-sm-6">
	    						<div class=" wow fadeIn" data-wow-duration="500" data-wow-delay="200ms">
		    						<div class="ftr-img">
		    							<img src="{{ asset('img/chatbots/feature.png') }}" alt="">
		    							<h4>{{ $feature->title }}</h4>
		    							<p>{{ $feature->description }}</p>
		    						</div>
		    					</div>
	    					</div>
    					@endforeach

    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <!--===== Video Represenattion =====-->

    <section class="inner-video-sec">
		<div class="col-md-6 col-sm-6 vid-grade2">
			<div class="video-inner wow fadeIn" data-wow-duration="500" data-wow-delay="200ms">
				<iframe class="innr-iframe" src="{{ $data->youtube_url }}" frameborder="0" allowfullscreen="" __idm_id__="209163265"></iframe>
			</div>
		</div>

		<div class="col-md-6 col-sm-6 vid-grade">
			<div class="chnl-btn">
				<h4>Facebook Messenger Chatbot</h4>
				<p>{{ $data->channel_description }}</p>
				<img src="{{ asset('img/facebook-messenger.png') }}">
			</div>

			<div class="demo-btn">
				<a href="{{ $data->messenger_url }}" class="btn1 try-demo" target="_blank">Send to Messenger</a>
			</div>
		</div>
    </section>
@include('website.contact-section')

@endsection