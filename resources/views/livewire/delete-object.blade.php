<div>
    @if($gato->trashed())
        <button wire:click="permDelete({{$gato->id}})" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Excluir permanentemente</button>
    @else
        <button wire:click="delete({{$gato->id}})" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Deletar</button>
    @endif
</div>
