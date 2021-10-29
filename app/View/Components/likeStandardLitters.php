<?php

namespace App\View\Components;

use Illuminate\View\Component;

class likeStandardLitters extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $standardSlug;
    public function __construct($slug)
    {
        $this->standardSlug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.like-standard-litters');
    }
}
