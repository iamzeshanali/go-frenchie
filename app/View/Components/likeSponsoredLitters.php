<?php

namespace App\View\Components;

use Illuminate\View\Component;

class likeSponsoredLitters extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sponsoredSlug;
    public function __construct($slug)
    {
        $this->sponsoredSlug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.like-sponsored-litters');
    }
}
