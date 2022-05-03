<?php

namespace App\Http\Livewire;

use App\Models\Press;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Maize\Markable\Models\Like;

class Feed extends Component
{

    public $showPress = null;

    public $perPage = 10;

    public $filters = [
        'search' => null,
        'type' => [],
    ];

    protected $queryString = ['filters'];

    protected $rules = [
        'filters' => 'max:100',
    ];

    public function mount($press)
    {
        $this->showPress = $press;
    }

    public function render()
    {
        $articles = Press::query()
                            ->select('id', 'type', 'title', 'cover_image', 'slug', 'date', 'subtitle', 'external_link_only')
                            ->orderBy('created_at', 'DESC')
                            ->when(data_get($this->filters, 'search'), function($query, $q) {
                                $query->where('title', 'LIKE', '%' . $q . '%');
                            })
                            ->when(data_get($this->filters, 'type'), function($query, $type) {
                                if(! is_array($type)){
                                    $type = [$type];
                                }
                                $query->whereIn('type', $type);
                            })
                            ->paginate($this->perPage);

        $popular = Press::query()
                            ->select('id', 'type', 'title', 'cover_image', 'slug', 'date', 'subtitle', 'external_link_only')
                            ->whereNotNull('last_liked_at')
                            ->orderBy('last_liked_at', 'DESC')
                            ->limit(5)
                            ->get();

        return view('livewire.feed', [
            'articles' => $articles,
            'popular' => $popular,
        ])
            ->layout('layouts.guest');
    }

    public function submit()
    {

    }

    public function loadMore()
    {
        $this->perPage += 10;
    }


    public function login()
    {
        session(['url.intended' => route('landing-areas.ponder')]);

        return redirect()->route('login');
    }

    public function toggleLike($id)
    {
        Like::toggle($press = Press::find($id), Auth::user());
        $press->total_likes = Like::count($press);
        $press->last_liked_at = now();
        $press->save();
    }

}
