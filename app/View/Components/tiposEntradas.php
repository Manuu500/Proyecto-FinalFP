<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Entrada;

class tiposEntradas extends Component
{
    /**
     * Create a new component instance.
     */
    public $entradasBasica;
    public $entradasPremium;
    public function __construct($entradasBasica, $entradasPremium)
    {
        $this->entradasBasica = $entradasBasica;
        $this->entradasPremium = $entradasPremium;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('omponents.tipo-entradas', compact('entradasBasica', 'entradasPremium'));
    }

    
}
