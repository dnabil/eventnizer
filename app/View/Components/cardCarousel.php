<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cardCarousel extends Component
{
    public $title;
    public $subTitle;
    public $contents;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subTitle, $contents)
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->contents = $contents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-carousel');
    }
}
