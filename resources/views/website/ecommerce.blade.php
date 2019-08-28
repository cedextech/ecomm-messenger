@extends('layouts.website')

@section('nav-class', 'bg-blue')

@section('title', 'Onchatbot | An AI driven Facebook Messenger chatbots for e-commerce stores')

@section('description', 'Convert your e-commerce store into Facebook Messenger chatbot. lets your customers order from your store through Facebook Messenger. Powered with natural language processing capabilities.')

@section('content')

<section class="home-banner">
    <div id="particles-js"></div>
    <div class="container">
        <div class="banner-texts text-center">
            <h2 class="animated wow fadeInDown" data-wow-duration="500" data-wow-delay="300ms">{{ __('Messenger Chatbot For Ecommerce') }}</h2>
            <p class="wow fadeInUp" data-wow-duration="500" data-wow-delay="200ms">{{ __('A dedicated Chatbot for Facebook Messenger that can revolutionize your online store by reaching 1.94 billion Facebook Users.') }}</p>
            <div class="bnr-newsletter-div wow fadeInUp" data-wow-duration="600" data-wow-delay="500ms">
                
                <form id="form-signup" action="{{ url('signup') }}" role="form" method="POST">
                    <div class="input-group">
                        {{ csrf_field() }}
                        <input type="email" class="form-control get-early-text" placeholder="{{ __('Your e-mail address') }}" name="email" required="required">
                        <span class="input-group-btn">
                            <button class="btn btn-default get-early-btn" type="submit" value="submit" name="submit">{{ __('Sign Up') }}</button>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<section class="section video-section grad1">
    <div class="container">
        <div class="heading">
            <h2 class="clr-dark wow fadeInDown" data-wow-duration="500" data-wow-delay="200ms">{{ __('Video Demo') }}</h2>
            <p class="sub-heading clr-light-dark wow fadeInDown">{{ __('Have a look at the short video about OnChatbot. Realize how easy and simple it is to open an online store with OnChatbot.') }}</p>
        </div>
        <div class="row">
            <div class="video-container wow fadeInUp" data-wow-duration="500" data-wow-delay="600ms">
                <img class="phone-mockup" src="{{ asset('img/home-phone.png') }}">
                <iframe class="bnr-iframe" src="https://www.youtube.com/embed/WYEcBwdANs0?autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen="" __idm_id__="209163265"></iframe>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container clr-dark">
        <div class="heading ">
            <h2 class="clr-dark wow fadeInDown" data-wow-duration="500" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInDown;">
                Find us on
            </h2>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-sm-4 col-md-4 text-center clearfix wow fadeIn" data-wow-duration="500" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeIn;">
                    <div class="cat-item7">
                        <a target="_blank" href="https://www.producthunt.com/posts/onchatbot"><img src="{{ asset('img/logo/producthunt.jpg') }}"></a>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 text-center clearfix wow fadeIn" style="visibility: visible; animation-delay: 200ms; animation-name: fadeIn;">
                    <div class="cat-item7">
                        <a target="_blank" href="https://botlist.co/bots/2967-onchatbot"><img src="{{ asset('img/logo/botlist.jpg') }}"></a>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4 text-center clearfix wow fadeIn" data-wow-duration="500" data-wow-delay="800ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeIn;">
                    <div class="cat-item7">
                        <a target="_blank" href="https://betapage.co/product/onchatbot/"><img src="{{ asset('img/logo/betapage.jpg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-red">
    <div class="container">
        <div class="heading">
            <h2 class="wow fadeInDown" data-wow-duration="500" data-wow-delay="200ms">{{ __('What Make Us Awesome') }}</h2>
            <p class="sub-heading  wow fadeInDown">{{ __('We always had that passion to create something incredible, some thing awesome and some thing that makes the life of people more simpler and easier. While developing Onchatbot, we always kept this in mind and this helped us to bring you some of the finest features.') }}</p>
        </div>
        <div class="row text-center">
            <div class="col-md-4 col-sm-6">
                <div class="feature-item wow fadeIn" data-wow-duration="500" data-wow-delay="200ms">
                    <img src="{{ asset('img/messenger-1.png') }}">
                    <h3>{{ __('Messenger Ordering') }}</h3>
                    <p>{{ __('Take your store to where your customers are. Onchatbot lets your customers order from your store through Facebook Messenger.') }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature-item wow fadeIn" data-wow-duration="500" data-wow-delay="400ms">
                    <img src="{{ asset('img/bell.png') }}">
                    <h3>{{ __('Automatic Order Updates') }}</h3>
                    <p>{{ __('Onchatbot comes with automatic order updates. This lets your customers notified by every update in the order instantly.') }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature-item wow fadeIn" data-wow-duration="500" data-wow-delay="600ms">
                    <img src="{{ asset('img/user.png') }}">
                    <h3>{{ __('Reach Millions Of Users') }}</h3>
                    <p>{{ __('Facebook has more than 1.94 billion monthly active users. Onchatbot lets you to explore this potential and take your business to heights.') }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature-item wow fadeIn" data-wow-duration="500" data-wow-delay="800ms">
                    <img src="{{ asset('img/nlp.png') }}">
                    <h3>{{ __('Natural Language Processing') }}</h3>
                    <p>{{ __('Onchatbot is powered by natural language processing and this helps us to attain the best user and system interaction possible.') }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature-item wow fadeIn" data-wow-duration="500" data-wow-delay="1000ms">
                    <img src="{{ asset('img/refresh.png') }}">
                    <h3>{{ __('Realtime Order Notifications') }}</h3>
                    <p>{{ __('Onchatbot comes with a well designed merchant dashboard which provides realtime order notification along with sales reports.') }}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="feature-item wow fadeIn" data-wow-duration="500" data-wow-delay="1200ms">
                    <img src="{{ asset('img/order.png') }}">
                    <h3>{{ __('Easy Order Management') }}</h3>
                    <p>{{ __('The dedicated dashboard of Onchatbot helps the merchants to update and manage orders easily in real time with out any hassle.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-orange">
    <div class="container">
        <div class="heading">
            <h2 class="wow fadeInDown" data-wow-duration="500" data-wow-delay="200ms">{{ __('How It Works') }}</h2>
            <p class="sub-heading  wow fadeInDown">{{ __('Taking your store Onchatbot is easy and simple, so that you can do it yourself without any external help through these four simple steps.') }}</p>
        </div>
        <div class="row text-center">
            <div class="col-md-3 col-sm-6">
                <div class="works-item wow fadeIn" data-wow-duration="500" data-wow-delay="200ms">
                    <div class="works-item-inner">
                        <img src="{{ asset('img/store.png') }}">
                    </div>
                    <h3>{{ __('Create your store') }}</h3>
                    <p>{{ __('Create your store on Onchatbot by providing necessary information about your business through simple steps.') }}</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="works-item wow fadeIn">
                    <div class="works-item-inner">
                        <img src="{{ asset('img/cart.png') }}">
                    </div>
                    <h3>{{ __('Add your products') }}</h3>
                    <p>{{ __('Once the store is created, you can add products to your store and also manage them from the admin panel provided.') }}</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="works-item wow fadeIn" data-wow-duration="500" data-wow-delay="800ms">
                    <div class="works-item-inner">
                        <img src="{{ asset('img/messenger.png') }}">
                    </div>
                    <h3>{{ __('Link to your facebook page') }}</h3>
                    <p>{{ __('By clicking on the "Connect to Facebook" button on the dashboard &amp; select the page you would like to connect it to and press "Connect".') }}</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="works-item wow fadeIn" data-wow-duration="500" data-wow-delay="1100ms">
                    <div class="works-item-inner">
                        <img src="{{ asset('img/orders.png') }}">
                    </div>
                    <h3>{{ __('Start receiving orders') }}</h3>
                    <p>{{ __('Your store is online now and orders start receiving. You can manage and update the orders from the admin panel provided.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-green">
    <div class="container">
        <div class="heading">
            <h2 class="wow fadeInDown" data-wow-duration="500" data-wow-delay="200ms">{{ __('Dashboard') }}</h2>
            <p class="sub-heading  wow fadeInDown">{{ __('Onchatbot comes with a dedicated feature rich Dashboard. This helps the merchants to update and manage orders easily in real time with out any hassle') }}</p>
        </div>

        <div class="dash-container mt-30 wow fadeInUp" data-wow-duration="500" data-wow-delay="600ms">
            <img class="dashboard-img img-responsive" src="{{ asset('img/br2.png') }}">
        </div>
    </div>
</section>

@endsection