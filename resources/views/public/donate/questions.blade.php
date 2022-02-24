<x-guest-layout>
    <div id="content" role="main">
        <div class="max-w-7xl mx-auto px-4">
            <div class="blocks">
                <div class="grid grid-cols-12 py-12">
                    <div class="col-span-12 md:col-span-3 px-2 py-16">
                        <x-submenu area="Donate"/>
                    </div>
                    <div class="content col-span-12 md:col-span-9">
                        <h2>Contact Us</h2>
                        <livewire:forms.contact />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
