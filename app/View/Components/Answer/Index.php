<?php

namespace App\View\Components\Answer;

use Closure;
use App\Models\Chirp;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Index extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Chirp $parent)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.answer.index', ['answers' => $this->parent->children()->with('user')->get()]);
    }
}
