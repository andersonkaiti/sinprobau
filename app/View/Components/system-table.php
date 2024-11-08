<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class SystemTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected Collection $news
    ) {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view("components.system-table", ["news" => $this->news]);
    }
}
