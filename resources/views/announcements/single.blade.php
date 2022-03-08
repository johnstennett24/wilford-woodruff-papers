<div class="">
    @if(! empty($announcement->image))
        <div class="max-w-full md:max-w-5xl h-auto mx-auto">
            <a href="{{ $announcement->link }}"
               target="_blank">
                <img src="{{ \Illuminate\Support\Facades\Storage::disk('announcements')->url($announcement->image) }}" alt="{{ $announcement->title }}"/>
            </a>
        </div>
    @endif
    @if(! empty($announcement->description))
        <div class="">
            <p class="text-base my-4">
                {!! $announcement->description !!}
            </p>
        </div>
    @endif
    @if(! empty($announcement->button_link) && ! empty($announcement->button_text))
        <div class="w-full text-center mt-4">
            <a href="{{ $announcement->button_link }}"
               target="_blank"
               class="bg-secondary text-white font-semibold text-center px-6 py-3">
                {{ $announcement->button_text }}
            </a>
        </div>
    @endif
</div>
