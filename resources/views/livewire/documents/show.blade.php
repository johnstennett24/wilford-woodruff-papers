<div>
    <div id="content" role="main">

        <div class="max-w-7xl mx-auto my-12 px-4 lg:px-0">
            <div class="text-4xl text-primary font-semibold my-4 border-b-2 border-gray-300">
                <h2>
                    <span class="title">
                        {{ \Illuminate\Support\Str::of($item->name)->replaceMatches('/\[.*?\]/', '')->trim() }}
                    </span>
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-12">
                <div class="col-span-1 md:col-span-4">
                    <div class="property">
                        <h4>
                            Title
                        </h4>
                        <div class="values">
                            <div class="value" lang="">
                                {{ \Illuminate\Support\Str::of($item->name)->replaceMatches('/\[.*?\]/', '')->trim() }}
                            </div>
                        </div>
                    </div>
                    @if($item->type)
                        <div class="property">
                            <h4>Document Type</h4>
                            <div class="value">
                                <a href="{{ route('documents', ['type' => $item->type]) }}">
                                    {{ $item->type->name }}
                                </a>
                            </div>
                            <div class="my-8">
                                <x-links.primary
                                    href="{{ route('documents.show.transcript', ['item' => $item->uuid]) }}"
                                    target="_blank"
                                >
                                    View Full Transcript
                                </x-links.primary>
                            </div>
                        </div>
                    @endif
                    @hasanyrole('Editor|Admin|Super Admin')
                    @if(! empty($item->count() > 0))
                        <div class="property">
                            <h4>Sections ({{ $item->items->count() }})</h4>
                            @foreach($item->items->sortBy('order') as $section)
                                <div class="value">
                                    {{ $section->name }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @endhasanyrole
                    @if($subjects)
                        <div class="property">
                            <h4>
                                People & Places
                            </h4>
                            <div class="values">
                                @foreach($subjects->sortBy('name') as $subject)
                                    <div class="value" lang="">
                                        <a class="text-secondary"
                                           href="{{ route('subjects.show', ['subject' => $subject]) }}">
                                            {{ $subject->name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-span-1 md:col-span-8">

                    <ul class="divide-y divide-gray-200">

                        @foreach($pages as $page)

                            <x-page-summary :page="$page" />

                        @endforeach

                    </ul>
                    <div class="my-4 px-8">
                        {!! $pages->withQueryString()->links('vendor.pagination.tailwind') !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
