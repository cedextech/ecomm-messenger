@extends('layouts.website')

@section('nav-class', 'bg-blue')

@section('title', 'Looking for chatbot development company? | Contact Onchatbot.com')

@section('description', 'Contact us for your custom chatbot development enquiry. We provide the free consultation for chatbot development. Onchatbot is the NLP-driven chatbot building company.')

@section('content')
<section class="inner-banner bg-blue">
    <div class="container">
        <div class="inner-banner-wrapper">
            <div class="row ">
                <div class="col-md-12">
                    <div class="inner-banner-texts text-center">
                        <h2 class="animated wow fadeInDown">{{ __('Contact Onchatbot Team') }}</h2>
                        <p class="wow fadeInUp">{{ __('At Onchatbot we are here to help you with all of your chatbot development needs.Feel free to contact us with your questions.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
	.cnt-form p {
		margin-top: 5px;
	}
</style>

<section class="get-in-tch">
	<div class="container">
	    <div class="col-md-6 col-sm-6 cnt-form">
	        <ul>
	            <li>
	            	<i class="fa fa-envelope"></i>
	                <p title="Onchatbot E-mail">kiran@cedextech.com</p>
	            </li>

	            <li>
	            	<i class="fa fa-skype"></i>
	                <p>mailtokirankk</p>
	            </li>

	            <li>
	            	<i class="fa fa-facebook"></i>
	                <p><a href="https://www.facebook.com/onchatbot/" target="_blank" title="Onchatbot Facebook">https://www.facebook.com/onchatbot/</a></p>
	            </li>

	            <li>
	            	<i class="fa fa-linkedin"></i>
	                <p><a href="https://www.linkedin.com/company-beta/9275689/" target="_blank" title="Onchatbot Linkedin">https://www.linkedin.com/company-beta/9275689/</a></p>
	            </li>
	        </ul>

	        <div class="social-ico">
                <ul>
                    <li></li>
                </ul>
            </div>
	    </div>

	    <div class="col-md-6 col-sm-6 cnt-form1">
	        <form action="contact" method="post">

	        	<div>
	        		@include('flash::message')
	        	</div>

	        	{{ csrf_field() }}

	            <div class="form-group icon-addon addon-md {{ $errors->has('name') ? ' has-error' : '' }}">
	                <input type="text" class="form-control txt-box2" id="" placeholder="Name" name="name">
	                <label class="glyphicon glyphicon-user"></label>

	       			@if ($errors->has('name'))
                        <span class="help-block">
                           {{ $errors->first('name') }}
                        </span>
                    @endif
	            </div>

	            <div class="form-group icon-addon addon-md1 {{ $errors->has('email') ? ' has-error' : '' }}">
	                <input type="email" class="form-control txt-box2" id="" placeholder="E-mail" name="email">
	                <label class="glyphicon glyphicon-envelope"></label>

	       			@if ($errors->has('email'))
                        <span class="help-block">
                           {{ $errors->first('email') }}
                        </span>
                    @endif
	            </div>

	            <div class="form-group icon-addon addon-md2 {{ $errors->has('message') ? ' has-error' : '' }}">
	                <textarea class="form-control" placeholder="Message" rows="4" name="message"></textarea>
	                <label class="glyphicon glyphicon-envelope"></label>

	       		@if ($errors->has('message'))
                        <span class="help-block">
                           {{ $errors->first('message') }}
                        </span>
                    @endif
	            </div>

	            <button type="submit" class="btn btn1 cnct-sbt" name="submit" value="submit">Send</button>
	        </form>
	    </div>
	</div>
</section>

@include('website.contact-section')

@endsection