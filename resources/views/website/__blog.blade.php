@extends('layouts.website')

@section('nav-class', 'bg-blue')

@section('title', 'Onchatbot | Learn about chatbots, conversational interfaces, NLP etc')

@section('description', '')

@section('content')
<section class="inner-banner bg-blue">
    <div class="container">
        <div class="inner-banner-wrapper">
            <div class="row ">
                <div class="col-md-12">
                    <div class="inner-banner-texts text-center">
                        <h2 class="animated wow fadeInDown" data-wow-duration="500" data-wow-delay="300ms">{{ __('Learn about chatbots') }}</h2>
                        <p class="wow fadeInUp" data-wow-duration="500" data-wow-delay="200ms">{{ __('Here you can learn about chatbots, NLP, ML, conversational commerce, chatbot development process, Facebook Messenger API, Bot Frameworks etc') }}</p>
        
                        <a href="{{ url('start-chatbot-project') }}" class="btn-bnr hm-btn wow fadeInUp">{{ __('Start Chatbot Project') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" style="padding-bottom: 50px;">
	<div class="container">
		<div class="row">
			<div class="blog-sec">
				
				@foreach($posts as $post)
					<div class="col-md-4 col-sm-4">
						<div class="blog">
							<a href="{{ $post->url }}" target="_blank">
								<div class="hvr-img">
									<img src="{{ asset('img/blog/' . $post->image) }}" class="img-responsive" alt="{{ $post->title }}" title="{{ $post->title }}">
								</div>

								<div class="blog-post">
									<div class="blog-post-cnt">
										<h4>{{ $post->title }}</h4>
										<div class="blog-post-ftr">
											<h6>
												<span>
													<i class="fa fa-clock-o" aria-hidden="true"></i>
													<span>{{ $post->created_at }}</span>
												</span>
												<span>by {{ $post->author }}</span>
											</h6>
										</div>

										<p>{{ $post->description }}</p>
									</div>
								</div>
							</a>
						</div>
					</div>
				@endforeach

			</div>
		</div>
	</div>
</section>

@include('website.contact-section')

@endsection