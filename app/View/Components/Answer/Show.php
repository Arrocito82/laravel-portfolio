<?php

namespace App\View\Components\Answer;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Chirp;

class Show extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Chirp $comment)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.answer.show');
    }
}
