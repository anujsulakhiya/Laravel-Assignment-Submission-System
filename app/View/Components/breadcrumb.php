<?php

namespace App\View\Components;

use Illuminate\View\Component;

class breadcrumb extends Component
{
    public $breadcumb1;
    public $breadcumb;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breadcumb,$breadcumb1)
    {
        $this->breadcumb = $breadcumb;
        $this->breadcumb1 = $breadcumb1;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
