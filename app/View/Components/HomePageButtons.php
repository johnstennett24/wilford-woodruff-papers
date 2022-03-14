<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HomePageButtons extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $pages = [
            [
                'image' => 'https://picsum.photos/300/300',
                'title' => 'Search',
                'link' => route('landing-areas.search'),
            ],
            [
                'image' => 'https://picsum.photos/300/300',
                'title' => 'Ponder',
                'link' => route('landing-areas.ponder'),
            ],
            [
                'image' => 'https://picsum.photos/300/300',
                'title' => 'Serve',
                'link' => route('landing-areas.serve'),
            ],
            [
                'image' => 'https://picsum.photos/300/300',
                'title' => 'Testify',
                'link' => route('landing-areas.testify'),
            ],
        ];
        return view('components.home.buttons', [
            'pages' => $pages,
        ]);
    }
}
