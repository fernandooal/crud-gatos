<?php

namespace App\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $gato;

    public function render()
    {
        return view('livewire.card');
    }
}
