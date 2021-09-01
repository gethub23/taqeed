<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class AddModel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $route ; 
    public $singleName ; 

    public function __construct($route , $singleName)
    {
        $this->route      = $route ; 
        $this->singleName = $singleName ; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.add-model');
    }
}