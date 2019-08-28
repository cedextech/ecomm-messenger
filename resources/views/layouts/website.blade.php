<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon" />
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="Resource-type" content="Document" />
        <meta name="google-site-verification" content="bSG_l84xiNIUT2W9MLNTzW6TxxAdgtteIgNYDE-3ajo" />

        <!-- Open Graph data -->
		<meta property="og:title" content="@yield('title')" />
		<meta property="og:description" content="@yield('description')" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="{{ url()->full() }}" />
		<meta property="og:image" content="{{ asset('img/og-image.png') }}" />
		<meta property="og:site_name" content="OnChatbot.com" />

		<script type='application/ld+json'>
			{
			   "@context":"http:\/\/schema.org",
			   "@type":"WebSite",
			   "url":"https://onchatbot.com/",
			   "name":"OnChatbot",
			   "description":"OnChatbot is a chatbots development company. We create chatbots for businesses.",
			   "sameAs":[
			      "https://www.facebook.com/onchatbot/",
			      "https://twitter.com/cedextech",
			      "https://www.linkedin.com/company/9275689/",
			      "https://medium.com/@kirankrishnan"
			   ]
			}
        </script>

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link href="{{ mix('/css/website.css') }}" rel="stylesheet">

        <style type="text/css">
        	.msgs p {
        		font-size: 15px;
        	}

        	.what-icon img {
			    width: 64px;
			    height: 64px;
			    margin-bottom: 0px;
			}

			.textarea.form-control {
				border: 1px solid #dfe1e2;
			}

			.banner-texts h2 {
				text-transform: uppercase;
				font-size: 45px;
			}

			.home-bnr p {
				font-size: 20px;
			}

			.banner-texts p {
				font-size: 18px;
			}

			.banner-texts {
				margin-top: -110px;
			}

			.contact-sec span {
				font-size: 25px;
			}

			.btn1 {
				background-color: #6355bc;
				padding: 10px 20px;
			}

			textarea.form-control {
				border: 1px solid #dfe1e2;
			}

			.wt-do-chnl .sub-heading, .blog-sec .sub-heading {
    			margin-bottom: 50px;
			}
        </style>
    </head>
    <body>

        <style type="text/css">
            #preloader {
                position: fixed;
                left: 0;
                top: 0;
                z-index: 999;
                width: 100%;
                height: 100%;
                overflow: visible;
                background: #ffffff url({{ asset('img/preloader.gif') }}) no-repeat center center;
            }
        </style>

        <div id="preloader"></div>

        @include('website.navbar')

        @yield('content')

        <script src="{{ mix('/js/website.js') }}"></script>

        @if(config('app.env') == 'production')
            @include('website.google-analytics')
        @endif

		<span class="skype-button bubble" data-contact-id="mailtokirankk"></span>

        <script type="text/javascript">
            $(document).ready(function() {
                $(window).load(function(){
                    $('#preloader').fadeOut('slow',function(){$(this).remove();});
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                window.makeApiCall = function(type, url, data, callbackSuccess, callbackError) {
                    $.ajax({
                        url: url,
                        type: type,
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            callbackSuccess(response);
                        },
                        error: function(response) {
                            callbackError(response);
                        }
                    });
                }

                $('#form-signup').on('submit', function(event){
                    event.preventDefault();
                    var self = $(this);
                    var btn = self.find('button[name=submit]');

                    btn.attr('disabled', 'disabled');

                    makeApiCall('POST', self.attr('action'), self.serialize(), function(response) {
                        if(response.status == 'success') {
                            sweetAlert({
                                'title': response.message,
                                'type': 'success'
                            });

                            self.find('input[type=email]').val('');

                            btn.removeAttr('disabled');
                        }
                    }, function(response){
                        if(422 == response.status) {
                            sweetAlert({
                                'title': 'Please provide your email address.',
                                'type': 'error'
                            });

                            btn.removeAttr('disabled');
                        }
                    });
                });
            });
        </script>

        @include('website.footer')
    </body>
</html>