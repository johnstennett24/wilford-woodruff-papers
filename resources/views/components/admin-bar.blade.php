@if(auth()->check() && auth()->user()->hasRole([
    'Tagger',
    'Quote Tagging',
    'Editor',
    'Admin',
    'Super Admin',
]))

    <div class="hidden py-4 px-8 w-full text-white bg-black md:block">
        <ul class="flex gap-x-6 items-center">
            <li>
                <img src="{{ asset('img/logo.png') }}"
                     class="w-auto h-6"
                     alt="Wilford Woodruff Logo"
                >
            </li>
            @if(auth()->check() && auth()->user()->hasRole([
                'Editor',
                'Admin',
                'Super Admin',
            ]))
                <li>
                    <a href="/nova"
                       target="_blank"
                    >
                        Nova
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   target="_blank"
                >
                    Content Admin
                </a>
            </li>
            <li>
                <a href="https://fromthepage.com/woodruff/woodruffpapers"
                   target="_blank"
                >
                    FromThePage
                </a>
            </li>
            @if(auth()->check() && auth()->user()->hasRole([
                'Editor',
                'Admin',
                'Super Admin',
            ]))
                <li>
                    <a href="https://analytics.google.com/analytics/web/#/p274180394/reports/intelligenthome"
                       target="_blank"
                    >
                        Google Analytics
                    </a>
                </li>
                <li>
                    <a href="https://search.google.com/search-console?resource_id=sc-domain:wilfordwoodruffpapers.org"
                       target="_blank"
                    >
                        Google Search Console
                    </a>
                </li>
            @endif
            <li>
                <a href="https://www.facebook.com/wilfordwoodruffpapersfoundation"
                   target="_blank"
                >
                    <svg class="w-6 h-6 text-white" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><title>Facebook Logo</title><path fill="#fff" d='M480 257.35c0-123.7-100.3-224-224-224s-224 100.3-224 224c0 111.8 81.9 204.47 189 221.29V322.12h-56.89v-64.77H221V208c0-56.13 33.45-87.16 84.61-87.16 24.51 0 50.15 4.38 50.15 4.38v55.13H327.5c-27.81 0-36.51 17.26-36.51 35v42h62.12l-9.92 64.77H291v156.54c107.1-16.81 189-109.48 189-221.31z' fill-rule='evenodd'/></svg>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/wilfordwoodruffpapers/"
                   target="_blank"
                >
                    <svg class="w-6 h-6 text-white" xmlns='http://www.w3.org/2000/svg' class='ionicon' viewBox='0 0 512 512'><title>Logo Instagram</title><path fill="#fff" d='M349.33 69.33a93.62 93.62 0 0193.34 93.34v186.66a93.62 93.62 0 01-93.34 93.34H162.67a93.62 93.62 0 01-93.34-93.34V162.67a93.62 93.62 0 0193.34-93.34h186.66m0-37.33H162.67C90.8 32 32 90.8 32 162.67v186.66C32 421.2 90.8 480 162.67 480h186.66C421.2 480 480 421.2 480 349.33V162.67C480 90.8 421.2 32 349.33 32z'/><path fill="#fff" d='M377.33 162.67a28 28 0 1128-28 27.94 27.94 0 01-28 28zM256 181.33A74.67 74.67 0 11181.33 256 74.75 74.75 0 01256 181.33m0-37.33a112 112 0 10112 112 112 112 0 00-112-112z'/></svg>
                </a>
            </li>
            <li>
                <a href="https://www.youtube.com/c/WilfordWoodruffPapers"
                   target="_blank"
                >
                    <svg class="w-6 h-6 text-white" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><title>Youtube Logo</title><path fill="#fff" d='M508.64 148.79c0-45-33.1-81.2-74-81.2C379.24 65 322.74 64 265 64h-18c-57.6 0-114.2 1-169.6 3.6C36.6 67.6 3.5 104 3.5 149 1 184.59-.06 220.19 0 255.79q-.15 53.4 3.4 106.9c0 45 33.1 81.5 73.9 81.5 58.2 2.7 117.9 3.9 178.6 3.8q91.2.3 178.6-3.8c40.9 0 74-36.5 74-81.5 2.4-35.7 3.5-71.3 3.4-107q.34-53.4-3.26-106.9zM207 353.89v-196.5l145 98.2z'/></svg>
                </a>
            </li>
            <li>
                <a href="https://www.linkedin.com/company/wilford-woodruff-papers-foundation/"
                   target="_blank"
                >
                    <svg class="w-6 h-6 text-white" xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><title>Linkedin Logo</title><path fill="#fff" d='M444.17 32H70.28C49.85 32 32 46.7 32 66.89v374.72C32 461.91 49.85 480 70.28 480h373.78c20.54 0 35.94-18.21 35.94-38.39V66.89C480.12 46.7 464.6 32 444.17 32zm-273.3 373.43h-64.18V205.88h64.18zM141 175.54h-.46c-20.54 0-33.84-15.29-33.84-34.43 0-19.49 13.65-34.42 34.65-34.42s33.85 14.82 34.31 34.42c-.01 19.14-13.31 34.43-34.66 34.43zm264.43 229.89h-64.18V296.32c0-26.14-9.34-44-32.56-44-17.74 0-28.24 12-32.91 23.69-1.75 4.2-2.22 9.92-2.22 15.76v113.66h-64.18V205.88h64.18v27.77c9.34-13.3 23.93-32.44 57.88-32.44 42.13 0 74 27.77 74 87.64z'/></svg>
                </a>
            </li>
        </ul>
    </div>

@endif
