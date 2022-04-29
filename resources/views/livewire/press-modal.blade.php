<div class="press-modal" style="height: calc(100vh - 60px);">
    <div class="h-full grid grid-cols-5">
        <div class="article col-span-5 md:col-span-3 h-full overflow-y-scroll">
            @include('public.landing-areas.media.'.Str::of($press->type)->lower())
        </div>
        <div class="col-span-5 md:col-span-2 h-full overflow-y-scroll">
            <livewire:comments :model="$press">
        </div>
    </div>
</div>
