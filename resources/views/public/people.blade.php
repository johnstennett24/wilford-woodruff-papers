@php
    $alpha = [];
    $people = [];
    foreach ($subjects as $person) {
        if(\Illuminate\Support\Str::of($person->name)->contains('Jr.')) {
            $name_suffix = 'Jr.';
            $name = \Illuminate\Support\Str::of($person->name)->replace('Jr.', '');
        } elseif(\Illuminate\Support\Str::of($person->name)->contains('Sr.')) {
            $name_suffix = 'Sr.';
            $name = \Illuminate\Support\Str::of($person->name)->replace('Sr.', '');
        } else {
            $name = $person->name;
        }
        $name = explode(' ', $name);
        $index = substr(end($name), 0, 1);
        if(! array_key_exists($index, $alpha)){
            $alpha[$index] = [];
        }

        $subject = [
            'last_name' => array_pop($name),
            'first_name' => implode(" ", $name) . (! empty($name_suffix)? ' ('.trim(implode(', ', $name_suffix)).')':''),
            'url' => route('subjects.show', ['subject' => $person]),
            #'url' => '/s/'.$page->params['site-slug'].'/page/'.$page->params['page-slug'],
        ];
        $subject['full_name'] = $subject['first_name'] .' '.$subject['last_name'];
        $subject['sort_name'] = $subject['last_name'] .' '.$subject['first_name'];

        $alpha[$index][] = $subject;
        $people[] = $subject;

    }

    function lastNameSort($a, $b)
    {
        if ($a['sort_name'] == $b['sort_name']) {
            return 0;
        }
        return ($a['sort_name'] < $b['sort_name']) ? -1 : 1;
    }

    ksort($alpha);

    usort($people, "lastNameSort");
@endphp
<x-guest-layout>

    <div class="bg-top bg-cover" style="background-image: url({{ asset('img/banners/people.png') }})">
        <div class="py-4 mx-auto max-w-7xl xl:py-12">
            <h1 class="text-4xl text-white md:text-6xl xl:text-8xl">
                People Mentioned in Wilford Woodruff's Papers
            </h1>
        </div>
    </div>

    <div class="px-4 mx-auto max-w-7xl">

        <div class="col-span-12 py-6 px-8">

            <div class="page-title">Recognize Wilford's influence in the lives of the individuals he interacted with</div>

            <h2 class="section-title">People Mentioned in Wilford Woodruff's Papers</h2>
            <p class="text-black">Explore the biographical sketches of the many people who interacted with Wilford Woodruff. Discover their stories through Wilford Woodruff's daily journal entries and their correspondence with him. This list reflects only those people identified in published documents. The information in this list is updated quarterly as new documents are published on this site.</p>

            <script>
                var people = @json($people);

                function trim (s, c) {
                    if (c === "]") c = "\\]";
                    if (c === "^") c = "\\^";
                    if (c === "\\") c = "\\\\";
                    return s.replace(new RegExp(
                        "^[" + c + "]+|[" + c + "]+$", "g"
                    ), "");
                }

                function search(){
                    return {
                        tab: '{{ array_key_first($alpha) }}',
                        q: null,
                        filteredPeople: [],
                        filter() {
                            this.filteredPeople = people.filter( person => this.checkName(person.full_name, trim(this.q.toUpperCase(), " ").split(" ") ) );
                        },
                        checkName(full_name, term) {
                            let match = false;
                            full_name = full_name.toUpperCase();
                            if(term.length == 1){
                                match = full_name.indexOf(term[0]) > -1;
                            } else if(term.length == 2) {
                                match = (full_name.indexOf(trim(term[0], ',')) > -1) && (full_name.indexOf(trim(term[1], ',')) > -1);
                            } else if(term.length > 2) {
                                for(name of term){
                                    if(full_name.indexOf(trim(name, ',')) > -1){
                                        match = true;
                                    }
                                }
                            }
                            return match;
                        }
                    }
                }
            </script>

            <div x-data="search()"
                 class="mt-12 mb-12">

                <div class="mb-8 max-w-7xl text-center">
                    <input class="w-full max-w-xl border-gray-300 shadow-sm sm:max-w-xl sm:text-sm"
                           x-model="q"
                           x-on:keyup.debounce.500ms="filter()"
                           type="search"
                           name="q"
                           value=""
                           placeholder="Search People"
                           aria-label="Search People"
                    >
                </div>

                <div class="h-16">
                    <div class="grid grid-flow-col auto-cols-max gap-4 mb-4"
                         x-show="!q"
                    >
                        @foreach($alpha as $letter => $group)
                        <div class="px-2 pt-2 pb-1 text-xl font-semibold cursor-pointer hover:text-secondary hover:border-b-2 hover:border-secondary"
                             x-on:click="tab = '{{ $letter }}'"
                             :class="{ 'text-secondary border-b-2 border-secondary': tab == '{{ $letter }}'}"
                        >
                            {{ $letter }}
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="px-2 mb-4"
                     x-show="!q"
                     x-cloak
                >
                    @foreach($alpha as $letter => $group)
                        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-4"
                             x-show="tab == '{{ $letter }}'"
                        >

                            @php usort($group, "lastNameSort") @endphp
                                @foreach(collect($group)->split(3) as $column)
                                    <div class="col-span-1">
                                        @foreach($column as $page)
                                            <div>
                                                <a class="text-secondary popup"
                                                   href="{{ $page['url'] }}"
                                                >
                                                    {{ $page['last_name'] }}@if(strlen($page['first_name'])), @endif {{ $page['first_name'] }}
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                        </div>

                    @endforeach

                </div>

                <div class="grid grid-flow-col auto-cols-max px-2"
                     x-show="q"
                     x-cloak
                >
                    <div class="grid grid-cols-1">
                        <template x-for="person in filteredPeople" :key="person.url">
                            <div class="">
                                <a class="text-secondary popup"
                                   x-bind:href="person.url"
                                   x-text="person.last_name + ', ' + person.first_name"
                                >
                                </a>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="px-2 text-secondary"
                     x-show="q && filteredPeople.length < 1"
                     x-cloak
                >
                    No results
                </div>

            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </div>

    </div>

</x-guest-layout>
