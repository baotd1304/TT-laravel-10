<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterWrapper extends Component
{
    public $userCatalogues;
    public $route;

    public function __construct($userCatalogues=[], $route=null)
    {
        $this->userCatalogues = $userCatalogues;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.filter-wrapper');
    }
}