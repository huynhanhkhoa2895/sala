<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Color;
class SelectListColor extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $color;
    public function __construct()
    {
        //
        $this->color = Color::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.select-list-color');
    }
}
