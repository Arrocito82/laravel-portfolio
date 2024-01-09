<?php

namespace App\View\Components\Question;

use Closure;
use App\Models\{Chirp,Project};
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Show extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Chirp $comment, public Project $project)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.question.show');
    }
}
