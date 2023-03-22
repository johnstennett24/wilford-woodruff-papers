@foreach(config('open-graph-image.metatags') as $property => $key)
    @if($attributes->has($key))
        <meta property="{{ $property }}" content="{{ $attributes->get($key) }}">
    @endif
@endforeach

<meta property="og:locale" content="en_US" />
<meta property="og:image" content="{!! og($attributes) !!}">
<meta property="og:image:url" content="{!! og($attributes) !!}">
<meta property="og:image:secure_url" content="{!! og($attributes) !!}" />
<meta property="og:image:type" content="image/{{ config('open-graph-image.image.extension') }}">
<meta property="og:image:width" content="{{ config('open-graph-image.image.width') }}">
<meta property="og:image:height" content="{{ config('open-graph-image.image.height') }}">
