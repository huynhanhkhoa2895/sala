<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Style;
class ListStyle extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $style;
    public function __construct()
    {
        //
        $this->style = Style::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.list-style');
    }
}
