@extends('layouts.website')

@section('nav-class', 'bg-blue')

@section('title', 'Onchatbot builds NLP driven chatbots for businesses')

@section('description', 'Onchatbot is the NLP-driven chatbot building company. We build custom chatbots for all industries. Onchatbot build chatbots for Facebook Messenger, Telegram, Slack, Skype etc')

@section('content')
    <section class="inner-banner-page bg-blue" >
        <div id="particles-js"></div>
        <div class="container">
            <div class="banner-texts home-bnr text-center">
                <h2 class="animated wow fadeInDown">We create chatbots for businesses</h2>
                <p class="wow fadeInUp">Chatbots are taking over the world and they will fundamentally revolutionize how humans interact with the digital world. We build chatbots, which helps businesses to stand out in the crowd.</p>

                <div class=" wow fadeInUp">
                	<a href="{{ url('start-chatbot-project') }}" class="btn-bnr hm-btn wow fadeInUp">{{ __('Start Chatbot Project') }}</a>
                </div>
            </div>
        </div>
    </section>

    <!--===== What we Do ======-->

    <section class="section bg-grey2">
    	<div class="container">
    		<div class="row">
    			
    			<div class="what-we">
    				<div class="heading">
    					<h2 class="clr-dark wow fadeInDown">Why Chatbots & What We Provide</h2>
    					<p class="sub-heading clr-light-dark wow fadeInDown">We can build chatbots for your unique business needs</p>
    				</div>

    				<div class="what-we-do">
	    				<div class="col-md-4 col-sm-4 col-xs-12">
	    					<div class="what-do1 text-center wow fadeIn">
	    						<div class="what-icon">
	    							<img src="{{ asset('img/counter.png') }}">
	    						</div>
	    						<div class="what-cnt">
	    							<h4>Multiple Messaging Channels</h4>
	    							<p>Multi channel communication is very important for businesses. Engage customers through popular channels such as Facebook Messenger, Kik, Slack, Skype, Cortana etc.</p>
	    						</div>
	    					</div>
	    				</div>

	    				<div class="col-md-4 col-sm-4 col-xs-12">
	    					<div class="what-do1 text-center wow fadeIn">
	    						<div class="what-icon">
	    							<img src="{{ asset('img/counter.png') }}">
	    						</div>
	    						<div class="what-cnt">
	    							<h4>No App Downloads</h4>
	    							<p>Chatbots are replacing apps. Apps required so much work to find, download and maintain. Now find your favorite chatbot in Facebook Messenger, Skype or Slack.</p>
	    						</div>
	    					</div>
	    				</div>

	    				<div class="col-md-4 col-sm-4 col-xs-12">
	    					<div class="what-do1 text-center wow fadeIn">
	    						<div class="what-icon">
	    							<img src="{{ asset('img/counter.png') }}">
	    						</div>
	    						<div class="what-cnt">
	    							<h4>24x7 Availability</h4>
	    							<p>Chatbots provide the added advantage of handling unlimited one on one conversation 24/7, since unlike their human counterparts; they don’t need rest or sleep.</p>
	    						</div>
	    					</div>
	    				</div>

	    				<div class="col-md-4 col-sm-4 col-xs-12">
	    					<div class="what-do1 text-center wow fadeIn">
	    						<div class="what-icon">
	    							<img src="{{ asset('img/counter.png') }}">
	    						</div>
	    						<div class="what-cnt">
	    							<h4>Natural Language Processing</h4>
	    							<p>Powered with natural language processing (NLP) to recognize the intent of the text and enable the chatbot to create a highly engaging user experiences.</p>
	    						</div>
	    					</div>
	    				</div>

	    				<div class="col-md-4 col-sm-4 col-xs-12">
	    					<div class="what-do1 text-center wow fadeIn">
	    						<div class="what-icon">
	    							<img src="{{ asset('img/counter.png') }}">
	    						</div>
	    						<div class="what-cnt">
	    							<h4>Latest Technologies</h4>
	    							<p>We analyze your business requirements and create the chatbot using latest technologies available. We use Node Js, Mongo DB, api.ai, wit.ai, Luis etc</p>
	    						</div>
	    					</div>
	    				</div>

	    				<div class="col-md-4 col-sm-4 col-xs-12">
	    					<div class="what-do1 text-center wow fadeIn">
	    						<div class="what-icon">
	    							<img src="{{ asset('img/counter.png') }}">
	    						</div>
	    						<div class="what-cnt">
	    							<h4>Custom Solutions</h4>
	    							<p>We can develop highly customized chatbots and virtual agents across a variety of channels for your business requirements and can also provide the infrastructure that scales.</p>
	    						</div>
	    					</div>
	    				</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>


    <!--====== channells ======-->

    <section class="section channells">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
	            	<div class="row">
	            		<div class="wt-do-chnl col-md-12">
		            		<div class="heading">
			    				<h2 class="clr-dark wow fadeInDown">Messaging Channels</h2>
			    				<p class="sub-heading clr-light-dark wow fadeInDown">Reach out to customers where they are. Multi-channel messaging allows the business to reach more customers and make meaningful engagement easily.</p>	
			    			</div>

		            		<div class="centered wow fadeIn">
			            		<div class="col-md-2 col-sm-3 col-xs-4 chnl-item text-center">
			            			<div class="chnl-image" style="background-image: url({{ asset('img/channel/messenger.png') }});"></div>
			            			<div class="chnl-content">
			            				Messenger
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image" style="background-image: url({{ asset('img/channel/slack.png') }});"></div>
			            			<div class="chnl-content">
			            				Slack
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image" style="background-image: url({{ asset('img/channel/telegram.png') }});"></div>
			            			<div class="chnl-content">
			            				Telegram
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image" style="background-image: url({{ asset('img/channel/mail.png') }});"></div>
			            			<div class="chnl-content">
			            				E-mail
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image" style="background-image: url({{ asset('img/channel/kik.png') }});"></div>
			            			<div class="chnl-content">
			            				Kik
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image" style="background-image: url({{ asset('img/channel/skype.png') }});"></div>
			            			<div class="chnl-content">
			            				Skype
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image" style="background-image: url({{ asset('img/channel/bing.png') }});"></div>
			            			<div class="chnl-content">
			            				Bing
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image" style="background-image: url({{ asset('img/channel/cortana.png') }});"></div>
			            			<div class="chnl-content">
			            				Cortana
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image" style="background-image: url({{ asset('img/channel/msteams.png') }});"></div>
			            			<div class="chnl-content">
			            				Microsoft Teams
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image" style="background-image: url({{ asset('img/channel/sms.png') }});"></div>
			            			<div class="chnl-content">
			            				SMS
			            			</div>
			            		</div>
			            	</div>
	            		</div>
	            	</div>
            	</div>
    		</div>
    	</div>
    </section>

    <!--====== Integrations ======-->

    <section class="section bg-grey2">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 col-sm-12">
    				<div class="row">
		            	<div class="wt-do-chnl col-md-12">
		            		<div class="heading">
			    				<h2 class="clr-dark wow fadeInDown">Third Party APIs Integration</h2>
			    				<p class="sub-heading clr-light-dark wow fadeInDown">Integrating the chatbot with third party services such as Zendesk, HubSpot etc allows your business to sync the conversation.</p>	
			    			</div>

		            		<div class="centered wow fadeIn">
			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/zapier.png') }});"></div>
			            			<div class="chnl-content">
			            				Zapier
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/zendesk.png') }});"></div>
			            			<div class="chnl-content">
			            				Zendesk
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/sendgrid.png') }});"></div>
			            			<div class="chnl-content">
			            				SendGrid
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/google-drive.png') }});"></div>
			            			<div class="chnl-content">
			            				Google Drive
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 chnl-item text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/gmail.png') }});"></div>
			            			<div class="chnl-content">
			            				Gmail
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/stripe.png') }});"></div>
			            			<div class="chnl-content">
			            				Stripe
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/paypal.png') }});"></div>
			            			<div class="chnl-content">
			            				Paypal
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/twilio.png') }});"></div>
			            			<div class="chnl-content">
			            				Twilio
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/trello.png') }});"></div>
			            			<div class="chnl-content">
			            				Trello
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/zoho.png') }});"></div>
			            			<div class="chnl-content">
			            				Zoho CRM
			            			</div>
			            		</div>

			            		<div class="col-md-2 col-sm-3 col-xs-4 cnhl-algn text-center">
			            			<div class="chnl-image intr" style="background-image: url({{ asset('img/channel/hubspot.png') }});"></div>
			            			<div class="chnl-content">
			            				HubSpot CRM
			            			</div>
			            		</div>
			            	</div>
		            	</div>
	            	</div>
            	</div>
    		</div>
    	</div>
    </section>


    <!--======= Section =======-->

    <section class="section msg-detail">
    	<div class="container">
    		<div class="row">
    			<div class="msgs">
    				<div class="heading">
	                    <h2 class="wow fadeInDown">How Do Chatbots Work?</h2>

	                    <p class="sub-heading wow fadeInDown" style="text-align: center;"><strong>C</strong>hatbots are computer programs that mimic conversation with people using NLP or AI. They can transform the way you interact with the internet from a series of self-initiated tasks to a conversation.</p>

	                    <p class="sub-heading wow fadeInDown" style="text-align: center;">
	                    "At the moment, chatbots are basically replacing individual apps. Rather than closing Facebook Messenger and opening Uber, you can simply message Uber and ask for a ride.
	                    
	                    By 2018, almost every business will add a chatbot to their e-commerce, marketing, sales, customer support etc and consumers will finally begin to understand the true potential of chatbots." - venturebeat.com
	                    </p>
	                </div>
    			</div>
    		</div>
    	</div>
    </section>

    @include('website.contact-section')

@endsection