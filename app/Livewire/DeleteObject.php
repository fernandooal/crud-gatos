<?php

namespace App\Livewire;

use App\Models\Gato;
use Livewire\Component;

class DeleteObject extends Component
{
    public $gato;

    public function delete($id){
        Gato::findOrFail($id)->delete();
        return redirect()->route('gatos.index');
    }

    public function permDelete($id){
        Gato::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('gatos.index');
    }

    public function render()
    {
        return view('livewire.delete-object');
    }
}
