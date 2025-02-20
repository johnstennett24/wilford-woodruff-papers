<x-guest-layout>
    <x-slot name="title">
        Wilford Woodruff's Wives and Children | {{ config('app.name') }}
    </x-slot>
    <div class="bg-top bg-cover" style="background-image: url({{ asset('img/banners/people.png') }})">
        <div class="py-4 mx-auto max-w-7xl xl:py-12">
            <h1 class="text-4xl text-white md:text-6xl xl:text-8xl">
                Wilford Woodruff's Wives and Children
            </h1>
        </div>
    </div>

    <div class="px-4 mx-auto max-w-7xl">

        <div class="col-span-12 py-6 px-8 mb-12">

            <div class="page-title">Recognize Wilford's influence in the lives of the individuals he interacted with</div>

            <h2 class="section-title">Wilford Woodruff's Wives and Children</h2>

            <div class="py-4 px-6" x-data="{
                                        flyoutOpen: null
                                    }">
                <div class="flow-root">
                    <div class="-mb-8">
                        @foreach($wives->groupBy('marriage_year')->sortBy('marriage_year') as $year => $marriages)
                            @foreach($marriages as $wife)
                                <div>
                                    <div class="relative pb-8"><span aria-hidden="true" class="absolute top-5 left-5 -ml-px w-0.5 h-full bg-gray-200">&nbsp;</span>
                                        <div class="flex relative items-start space-x-3">
                                            <div class="relative">
                                                @if($loop->first)
                                                    <span class="text-xl bg-white ring-8 ring-white"> {{ $year }}
                                                        @else
                                                            <span class="text-xl"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                @endif</span> <span class="text-xl">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            </div>
                                            <x-wife :wife="$wife" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-guest-layout>
