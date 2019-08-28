@extends('layouts.website')

@section('nav-class', 'bg-blue')

@section('title', 'Hire expert development team to build chatbot for your business')

@section('description', 'Hire Onchatbot team to develop chatbots for your business. Our primary goal is to provide a solution which solves real problems. We build chatbots for Facebook Messenger, Skype, Telegram, Slack etc.')

@section('content')
<section class="inner-banner bg-blue">
    <div class="container">
        <div class="inner-banner-wrapper">
            <div class="row ">
                <div class="col-md-12">
                    <div class="inner-banner-texts text-center">
                        <h2 class="animated wow fadeInDown" data-wow-duration="500" data-wow-delay="300ms">{{ __('Hire Chatbot Development Team') }}</h2>
                        <p class="wow fadeInUp" data-wow-duration="500" data-wow-delay="200ms">{{ __('Chatbots are the future. They can revolutionize your business by providing better customer engagement. We can help you understand how to integrate chatbots into your business.') }}</p>

                        <a href="{{ url('contact') }}" class="btn-bnr hm-btn wow fadeInUp">{{ __('Contact Us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container" style="margin-top:-40px;">
    	<div class="col-md-6 col-md-offset-3">
	    	<form action="submit-chatbot-project" method="post">
	    		<div>
	        		@include('flash::message')
	        	</div>

	        	{{ csrf_field() }}

				<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
					<input type="text" class="form-control" id="" placeholder="Name*" name="name">

					@if ($errors->has('name'))
                        <span class="help-block">
                           {{ $errors->first('name') }}
                        </span>
                    @endif
				</div>

				<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
					<input type="email" class="form-control" id="" placeholder="E-mail*" name="email">

					@if ($errors->has('email'))
                        <span class="help-block">
                           {{ $errors->first('email') }}
                        </span>
                    @endif
				</div>

				<div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
					<input type="text" class="form-control" id="" placeholder="Company name*" name="company">

					@if ($errors->has('company'))
                        <span class="help-block">
                           {{ $errors->first('company') }}
                        </span>
                    @endif
				</div>

				<div class="form-group {{ $errors->has('requirement') ? ' has-error' : '' }}">
					<textarea class="form-control" rows="10" placeholder="Project details*" name="requirement"></textarea>

					@if ($errors->has('requirement'))
                        <span class="help-block">
                           {{ $errors->first('requirement') }}
                        </span>
                    @endif
				</div>

				<button type="submit" class="btn btn1 cnct-sbt" name="submit" value="submit">Get a Free Estimate</button>
	    	</form>
    	</div>

    	<div class="col-md-6 col-sm-6">
    		<table class="table">

    		</table>
    	</div>
    </div>
</section>
@endsection