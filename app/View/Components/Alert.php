<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $textochapa;
    public $textomensaje;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($textochapa = 'Contáctanos' ,$textomensaje='Para dudas y preguntas, escríbeme a hector@hnevado.es')
    {
        
        $this->textochapa = $textochapa;
        $this->textomensaje = $textomensaje;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
