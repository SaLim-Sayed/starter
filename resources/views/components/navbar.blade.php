{{-- <div class="nav  relative flex items-top justify-center min-h-screen bg-success-100 dark:bg-success-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class=" fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
        <div class=" fixed top-0 right-10 px-6 py-4 sm:block">
            
        </div>
        <div class=" fixed top-0 right-100 px-6 py-4 sm:block">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
            @endforeach ||
                <a href="{{ route('offers.getOffers') }}" class="btn btn-success mx-5">Get All Offers |</a>
                <a href="{{ route('offers.create') }}" class="btn btn-success mx-5">Create Offer</a>
        </div>
        
    @endif
</div> --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">{{trans('messages.offers')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="btn btn-outline-success" rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
                <a class="btn btn-outline-success" href="{{ route('offers.getOffers') }}">{{__('messages.get all offers')}}</a>
                <a class="btn btn-outline-success" href="{{ route('offers.create') }}">{{__('messages.create offer')}}</a>
            </li>
        </ul>
    </div>
</nav>
