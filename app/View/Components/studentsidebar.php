<?php

namespace App\View\Components;

use Illuminate\View\Component;

class studentsidebar extends Component
{   
    public $studentbreadcumb;
    public $studentbreadcumb1;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($studentbreadcumb,$studentbreadcumb1)
    {
        $this->studentbreadcumb = $studentbreadcumb;
        $this->studentbreadcumb1 = $studentbreadcumb1;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.studentsidebar');
    }
}
