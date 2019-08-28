<nav class="navbar navbar-default bg-hm">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png') }}"></a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('ecommerce-chatbot') }}">{{ __('Ecommerce Chatbot') }}</a></li>
                <li><a href="{{ url('chatbots') }}">{{ __('Chatbots') }}</a></li>
                <li><a href="{{ url('chatbots-usecases') }}">{{ __('Use Cases') }}</a></li>
                <li><a href="{{ url('start-chatbot-project') }}">{{ __('Start Chatbot Project') }}</a></li>
                <li><a href="https://blog.onchatbot.com/" target="_blank">{{ __('Blog') }}</a></li>
                
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('img/' . config('app.locale') . '.jpg') }}" title="Onchatbot | Chatbots Development Company">
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="{{ url('language/en') }}"><img src="{{ asset('img/en.jpg') }}">English</a></li>
                        <li><a href="{{ url('language/fr') }}"><img src="{{ asset('img/fr.jpg') }}">français</a></li>
                        <li><a href="{{ url('language/sp') }}"><img src="{{ asset('img/sp.jpg') }}">Español</a></li>
                        <li><a href="{{ url('language/de') }}"><img src="{{ asset('img/de.jpg') }}">Deutsche</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>