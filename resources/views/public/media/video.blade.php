<x-guest-layout>
    <div id="content" role="main">
        <div class="max-w-7xl mx-auto px-4">
            <div class="blocks">
                <div class="grid grid-cols-12 py-12">
                    <div class="col-span-12 md:col-span-3 px-2 py-16">
                        <x-submenu area="Media"/>
                    </div>
                    <div class="videos content col-span-12 md:col-span-9">
                        <div class="flex flex-col shadow-lg overflow-hidden">
                            <div class="flex-shrink-0">
                                <iframe style="width: 100%; height: 480px;" src="{{ $video->embed_link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                                <div class="flex-1">
                                    <p class="text-xl font-semibold text-gray-900">
                                        {{ $video->title }}
                                    </p>
                                    <p class="">
                                        {{ $video->subtitle }}
                                    </p>
                                    <p class="">
                                        {!! $video->description !!}
                                    </p>
                                </div>
                            </div>
                            @if(strlen($video->transcript) > 10)
                                <div class="p-6">
                                    <p class="text-xl font-semibold text-gray-900">
                                        Transcript
                                    </p>
                                    <div class="mt-8">
                                        {!! $video->transcript !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
