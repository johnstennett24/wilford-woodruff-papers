<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      prefix="og: https://ogp.me/ns#"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="facebook-domain-verification" content="jz329nocbeufu5m4s8g7dxdtz8j2qq" />

        <meta property="og:site_name" content="Wilford Woodruff Papers">

        <x-open-graph-image::metatags title="{{ str($title ?? null)->before('|')->replaceMatches('/\[.*?\]/', '')->replace(' ', '_')->trim() }}" />

        <meta property="og:description" content="Explore Wilford Woodruff's powerful eyewitness account of the Restoration">
        <meta property="og:type" content="website" />
        {{--<meta property="og:image" content="https://wilfordwoodruffpapers.org/img/wilford-woodruff.png">--}}
        <meta property="og:url" content="{{ request()->url() }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="description" content="Explore Wilford Woodruff's powerful eyewitness account of the Restoration"/>
        <meta name="keywords" content="Wilford Woodruff, Restoration, Prophet, The Church of Jesus Christ of Latter-day Saints"/>

        <title>{{ $title ?? config('app.name') }}</title>

        {!! $canonical ?? '' !!}

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">

        <x-favicon />

        <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        @stack('styles')
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
        @include('layouts.partials.google-tag-manager-head')
    </head>
    <body>
        @include('layouts.partials.google-tag-manager-no-script')
        <x-admin-bar />
        <x-header />
        <div class="font-sans antialiased text-gray-900">
            {{ $slot }}
        </div>

        <x-subject-modal />
        <x-footer />

        @if(app()->environment(['production']))
            <x-google />
            <x-facebook-pixel />
        @endif


        @livewireScripts
        @livewire('livewire-ui-modal')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" charset="utf-8"></script>
        <script src="{{ mix('js/app.js') }}"></script>
        @stack('scripts')

        <script>
            function copyShortUrlToClipboard(event) {
                let shortUrl = event.dataset.url;
                navigator.clipboard.writeText(shortUrl).then(() => {
                    // Alert the user that the action took place.
                    // Nobody likes hidden stuff being done under the hood!
                    console.log(shortUrl + " copied to clipboard");
                });
            }
        </script>

        <x-constant-contact />
    </body>
</html>
