<?php

namespace App\View\Components\Answer;
use App\Models\{Project, Chirp};
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Create extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Project $project, public Chirp $parent)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.answer.create');
    }
}
