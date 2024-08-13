<?php

namespace App\Livewire;

use App\Models\Gato;
use Livewire\Component;

class RestoreObject extends Component
{
    public $gato;

    public function restore($id){
        Gato::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('gatos.index');
    }
    public function render()
    {
        return view('livewire.restore-object');
    }
}
