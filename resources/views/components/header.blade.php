<header x-data="{
                mobileMenuOpen: false,
            }"
        class="bg-primary"
>
    <div class="relative max-w-7xl mx-auto">

        <div class="justify-between items-center px-4 py-6 sm:px-6 md:justify-start md:space-x-10">
            <!--<div class="relative max-w-7xl mx-auto flex justify-between items-center px-4 py-6 sm:px-6 md:justify-start md:space-x-10">-->
            <div class="md:flex-1 md:flex md:items-center md:justify-between">
                <div class="hidden md:flex space-x-10">
                    <a href="/" class="flex">
                        <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                        <img class="h-10 md:h-36 w-auto "
                             src="{{ asset('img/logo.png') }}"
                             alt="{{ config('app.name', 'Laravel') }}" />
                    </a>
                </div>
                <!--<div class="flex items-center md:ml-12">-->
                <div class=" md:space-x-10">
                    <div class="relative">
                        <div class="relative">
                            <div class="grid grid-cols-1 md:flex justify-center md:justify-end">
                                <div class="md:-mt-6 md:mb-2 md:mb-12 md:pr-8 py-0.5">
                                    <a class="bg-highlight px-4 py-2 text-white text-lg hover:text-secondary block md:inline text-center"
                                       data-formkit-toggle="7ce7f1665b"
                                       href="https://wilford-woodruff-papers.ck.page/7ce7f1665b">
                                        Subscribe for Updates
                                    </a>
                                </div>
                                <div class="md:-mt-8 mb-12 mr-0"
                                     id="search">
                                    <?php /*echo $this->partial('common/search-form'); */?>
                                </div>
                            </div>
                        </div>
                        <div class="relative">
                            <div class="-mr-2 -my-2 md:hidden absolute right-4">
                                <button x-on:click="mobileMenuOpen = ! mobileMenuOpen;"
                                        type="button"
                                        class="bg-secondary p-2 inline-flex items-center justify-center text-white hover:text-highlight focus:outline-none">
                                    <span class="sr-only">Open menu</span>
                                    <!-- Heroicon name: menu -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>
                            <h1 class="font-serif text-2xl md:text-6xl font-medium text-highlight">
                                {{ config('app.name', 'Laravel') }}
                            </h1>
                        </div>
                    </div>
                </div>
                <!--</div>-->
            </div>
        </div>


        <!--
          Mobile menu, show/hide based on mobile menu state.

          Entering: "duration-200 ease-out"
            From: "opacity-0 scale-95"
            To: "opacity-100 scale-100"
          Leaving: "duration-100 ease-in"
            From: "opacity-100 scale-100"
            To: "opacity-0 scale-95"
        -->
        <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden z-10 md:hidden"
             x-show="mobileMenuOpen"
             x-cloak
        >
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <a href="/" class="flex">
                                <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                                <img class="h-10 md:h-36 w-auto "
                                     src="{{ asset('img/logo.png') }}"
                                     alt="{{ config('app.name', 'Laravel') }}" />
                            </a>
                        </div>
                        <div class="-mr-2">
                            <button @click="mobileMenuOpen = ! mobileMenuOpen;"
                                    type="button"
                                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                <span class="sr-only">Close menu</span>
                                <!-- Heroicon name: x -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-6">
                        <nav class="grid gap-6">
                            <a href="{{ route('documents') }}">Documents</a>
                            <a href="{{ route('people') }}">People</a>
                            <a href="/s/wilford-woodruff-papers/page/places">Places</a>
                            <a href="/s/wilford-woodruff-papers/page/timeline">Timeline</a>
                            <a href="/s/wilford-woodruff-papers/media">Search</a>
                            <a href="/s/wilford-woodruff-papers/page/donate-online">Donate</a>
                            <a href="/s/wilford-woodruff-papers/page/volunteer">Get Involved</a>
                        </nav>
                    </div>
                </div>
                <div class="py-6 px-5 space-y-6">
                    <div class="grid grid-cols-2 gap-y-4 gap-x-8">

                        <div class="grid grid-cols-1 gap-y-6">
                            <a href="/s/wilford-woodruff-papers/page/about" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                About
                            </a>

                            <a href="/s/wilford-woodruff-papers/page/volunteer" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                Volunteer
                            </a>

                            <a href="/s/wilford-woodruff-papers/page/meet-the-team" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                Meet the Team
                            </a>

                            <a href="/s/wilford-woodruff-papers/page/editorial-method" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                Editorial Method
                            </a>
                        </div>

                        <div class="grid grid-cols-1 gap-y-6">
                            <a href="/s/wilford-woodruff-papers/photos" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                Photos
                            </a>

                            <a href="/s/wilford-woodruff-papers/page/podcasts" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                Podcasts
                            </a>

                            <a href="/s/wilford-woodruff-papers/page/videos" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                Videos
                            </a>

                            <a href="/s/wilford-woodruff-papers/page/newsroom" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                Newsroom
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div x-data="{
                showAbout: false,
                showMedia: false,
                showDonate: false,
                showGetInvolved: false,
             }"
         class="bg-secondary py-2 hidden md:block">
        <div class="relative max-w-7xl mx-auto">
            <nav class="md:flex md:items-center md:justify-between md:ml-4 px-4">
                <div class="flex space-x-4 md:space-x-10 flex-1 min-w-0">
                    <?php
                    /*                        echo $site->publicNav()->menu()->setPartial('common/navigation/link')->render(null, [
                                                'maxDepth' => $this->themeSetting('nav_depth') - 1
                                            ]);
                                            */?>
                    <a href="/s/wilford-woodruff-papers/documents">Documents</a>
                    <a href="/s/wilford-woodruff-papers/page/people">People</a>
                    <a href="/s/wilford-woodruff-papers/page/places">Places</a>
                    <a href="/s/wilford-woodruff-papers/page/timeline" class="hidden lg:inline-block">Timeline</a>
                    <a href="/s/wilford-woodruff-papers/media">Search</a>
                </div>
                <div class="flex space-x-4 md:space-x-10  mt-4 flex md:mt-0 md:ml-4">
                    <a href="/s/wilford-woodruff-papers/page/about">About</a>

                    <div class="relative inline-block text-left">
                            <span x-on:mouseenter="showAbout = false; showMedia = false; showDonate = false; showGetInvolved = true;"
                                  x-on:click="showGetInvolved = false; showMedia = false; showDonate = false; showGetInvolved = true;"
                                  x-on:click.away="showGetInvolved = false"
                                  class="text-base font-medium text-primary md:text-white md:hover:text-highlight uppercase"
                            >
                                Get Involved
                            </span>
                        <div x-show="showGetInvolved"
                             x-on:mouseleave="showGetInvolved = false"
                             x-cloak
                             class="origin-top-right absolute -right-4 mt-2 w-56 shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="/s/wilford-woodruff-papers/page/volunteer"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Volunteer
                                </a>
                                <a href="/s/wilford-woodruff-papers/page/contribute-documents"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Contribute Documents
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--<div class="relative inline-block text-left">
                        <span x-on:mouseenter="showAbout = true; showMedia = false; showDonate = false; showGetInvolved = false;"
                              x-on:click="showAbout = true; showMedia = false; showDonate = false; showGetInvolved = false;"
                              x-on:click.away="showAbout = false"
                              class="text-base font-medium text-primary md:text-white md:hover:text-highlight uppercase"
                        >
                            About
                        </span>
                        <div x-show="showAbout"
                             x-on:mouseleave="showAbout = false"
                             x-cloak
                             class="origin-top-right absolute -right-4 mt-2 w-60 shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a x-on:mouseenter="showMedia = false; showDonate = false; showGetInvolved = false;"
                                   href="/s/wilford-woodruff-papers/page/about"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">Mission</a>
                                <hr class="border-t border-gray-200 my-5" aria-hidden="true">
                                <h3 class="px-4 py-1 text-base font-bold text-primary uppercase tracking-wider" id="media-library-headline">
                                    Get Involved
                                </h3>
                                <span x-on:mouseenter="showMedia = false; showDonate = false; showGetInvolved = true;"
                                      x-on:click="showMedia = false; showDonate = false; showGetInvolved = true;"
                                      x-on:click.away="showGetInvolved = false"
                                      class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100 uppercase"
                                      role="menuitem"
                                >
                                    Get Involved
                                </span>
                                <a href="/s/wilford-woodruff-papers/page/volunteer"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Volunteer
                                </a>
                                <a href="/s/wilford-woodruff-papers/page/contribute-documents"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Contribute Documents
                                </a>

                            </div>
                        </div>
                    </div>-->




                    <div class="relative inline-block text-left">
                            <span x-on:mouseenter="showAbout = false; showMedia = true; showDonate = false; showGetInvolved = false;"
                                  x-on:click="showMedia = true; showDonate = false; showGetInvolved = false;"
                                  x-on:click.away="showMedia = false"
                                  class="text-base font-medium text-primary md:text-white md:hover:text-highlight uppercase hidden lg:inline-block"
                            >
                                Media
                            </span>
                        <div x-show="showMedia"
                             x-on:mouseleave="showMedia = false"
                             x-cloak
                             class="origin-top-right absolute -right-4 mt-2 w-40 shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="/s/wilford-woodruff-papers/photos"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Photos
                                </a>
                                <a href="/s/wilford-woodruff-papers/page/podcasts"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Podcasts
                                </a>
                                <a href="/s/wilford-woodruff-papers/page/videos"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Videos
                                </a>
                                <a href="/s/wilford-woodruff-papers/page/media-kit"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Media Kit
                                </a>
                                <a href="/s/wilford-woodruff-papers/page/newsroom"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Newsroom
                                </a><!--
                                    <a href="/s/wilford-woodruff-papers/page/news-releases"
                                       class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                       role="menuitem">
                                        News Releases
                                    </a>-->
                            </div>
                        </div>
                    </div>

                    <div class="relative inline-block text-left">
                        <a href="/s/wilford-woodruff-papers/page/donate-online"
                           class="text-base font-medium text-primary md:text-white md:hover:text-highlight uppercase border-2 border-white md:hover:border-highlight rounded-md py-1 px-2"
                        >Donate</a>
                    </div>

                    <!--<div class="relative inline-block text-left">

                        <span x-on:mouseenter="showAbout = false; showMedia = false; showDonate = true; showGetInvolved = false;"
                              x-on:click="showMedia = false; showDonate = true; showGetInvolved = false;"
                              x-on:click.away="showDonate = false"
                              class="text-base font-medium text-primary md:text-white md:hover:text-highlight uppercase border-2 border-white md:hover:border-highlight rounded-md py-1 px-2"
                        >
                            Donate
                        </span>
                        <div x-show="showDonate"
                             x-on:mouseleave="showDonate = false"
                             x-cloak
                             class="origin-top-right absolute -right-4 mt-2 w-40 shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <a href="/s/wilford-woodruff-papers/page/donate-online"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Donate Online
                                </a>
                                <a href="/s/wilford-woodruff-papers/page/check-or-wire"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Check or Wire
                                </a>
                                <a href="/s/wilford-woodruff-papers/page/donation-questions"
                                   class="block px-4 py-2 text-secondary font-medium hover:bg-gray-100"
                                   role="menuitem">
                                    Contact
                                </a>
                            </div>
                        </div>
                    </div>-->
                    <!--<div class="relative inline-block text-left">

                    </div>-->
                </div>
            </nav>
        </div>
    </div>




</header>
