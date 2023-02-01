<?php

namespace App\View\Components\Testimonials;

use Illuminate\View\Component;

class ImageTestimonials extends Component
{
    public $images;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($images)
    {
        $this->images = $images;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.testimonials.image-testimonials');
    }
}
