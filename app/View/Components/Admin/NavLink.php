<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class NavLink extends Component
{
    public $active;
    public $href;

    public function __construct($href, $active = null)
    {
        $this->href = $href;
        $this->active = $active;
    }

    public function render()
    {
        return view('components.admin.nav-link');
    }
}