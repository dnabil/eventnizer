<?php

namespace App\View\Components;

use Illuminate\View\Component;

class productCard extends Component
{

    public $title;
    public $description;
    public $photo;
    public $minPrice;
    public $maxPrice;
    public $link;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $description, $photo, $minPrice, $maxPrice, $link)
    {
        $this->title = $title;
        $this->description = $description;
        $this->photo = $photo;
        $this->minPrice = $minPrice;
        $this->maxPrice = $maxPrice;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}
