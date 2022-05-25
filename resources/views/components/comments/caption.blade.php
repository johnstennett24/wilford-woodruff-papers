<li class="">
    <div class="flex gap-x-4 py-4">
        <a href="https://www.instagram.com/wilfordwoodruffpapers/"
           target="_blank">
            <img class="h-16 w-16 rounded-full border border-highlight"
                 src="{{ asset('img/logo.png') }}"
                 alt="Wilford Woodruff Papers Foundation">
        </a>
        <div class="flex flex-col gap-y-2">
            <div>
                <p>
                    <a href="https://www.instagram.com/wilfordwoodruffpapers/"
                      class="text-secondary font-semibold"
                      target="_blank">wilfordwoodruffpapers</a>
                </p>
                <p class="text-gray-500">Wilford Woodruff Papers</p>
            </div>
            <div>
                <p>
                    <a href="https://linktr.ee/wilfordwoodruffpapers"
                       class="text-secondary font-semibold"
                       target="_blank">https://linktr.ee/wilfordwoodruffpapers</a>
                </p>
            </div>
        </div>
    </div>
    <div class="flex pt-4 pb-2 space-x-3">
        {{--<div class="flex-shrink-0">
            <img class="h-8 w-8 rounded-full"
                 src="{{ asset('img/logo.png') }}" alt="Wilford Woodruff Papers Foundation">
        </div>--}}
        <div class="min-w-0 flex-1">
            <div class="text-base text-gray-800">
                <a href="https://www.instagram.com/wilfordwoodruffpapers/"
                   class="text-secondary font-semibold"
                   target="_blank">wilfordwoodruffpapers</a>
                {{ $media->description }}
            </div>
        </div>
       {{-- <div>
            @guest()
                <button wire:click="login()">
                    <span class="sr-only">Login to like comment</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 cursor-pointer hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
            @else
                <button wire:click="toggleCommentLike({{ $comment->id }})">
                    <span class="sr-only">Like comment</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 cursor-pointer hover:text-red-700 @if(\Maize\Markable\Models\Like::has($comment, \Illuminate\Support\Facades\Auth::user())) text-red-700 @endif" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </button>
            @endguest
        </div>--}}
    </div>

    <div class="mt-2 flex px-6 pb-4">
        <span class="inline-flex items-center text-sm gap-x-4">
            <span class="text-xs font-medium text-gray-400">{{ $media->date->diffForHumans() }}</span>
            {{--@if(($count = \Maize\Markable\Models\Like::count($comment)) > 0)
                <span class="text-xs font-medium text-gray-400">{{ $count }} {{ str('Like')->plural($count) }}</span>
            @endif
            @if($comment->user_id == Auth::id())
                <span wire:click="deleteComment({{ $comment->id }})"
                      class="text-xs font-medium text-red-700 cursor-pointer">Delete</span>
            @endif--}}
        </span>
    </div>
</li>
