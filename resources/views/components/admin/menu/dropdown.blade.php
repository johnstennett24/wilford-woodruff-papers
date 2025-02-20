<div class="flex justify-center">
    <div
        x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }"
        x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
        x-id="['dropdown-button']"
        class="relative z-100"
    >
        <!-- Button -->
        <button
            x-ref="button"
            x-on:click="toggle()"
            :aria-expanded="open"
            :aria-controls="$id('dropdown-button')"
            type="button"
            class="py-2 px-3 text-sm font-medium text-gray-900"
        >
            <span>{{ $text }}</span>
        </button>

        <!-- Panel -->
        <div
            x-ref="panel"
            x-show="open"
            x-transition.origin.top.left
            x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')"
            style="display: none;"
            class="overflow-hidden absolute left-0 z-50 mt-2 w-40 bg-white rounded shadow-md"
        >
            <div>
                @foreach($links as $key => $link)
                    @if($link['auth'])
                        <a href="{{ $link['url'] }}" class="block py-2 px-4 w-full text-sm text-left hover:bg-gray-50 disabled:text-gray-500" >
                            {{ $key }}
                        </a>
                    @endif
                @endforeach
            </div>

        </div>
    </div>
</div>
