<?php

namespace App\Livewire;

use App\Models\Gato;
use Livewire\Component;

class BodyCatCard extends Component
{

    public $gato;

    public function render()
    {
        return view('livewire.body-cat-card');
    }
}
