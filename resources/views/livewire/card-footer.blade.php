<div class="flex justify-between">
    @if($gato->trashed())
        <livewire:restore-object :gato="$gato"/>
        <livewire:delete-object :gato="$gato"/>
    @else
        <a href="{{ route('gatos.update', ['id' => $gato->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mr-2">Editar</a>
        <livewire:delete-object :gato="$gato"/>
    @endif
</div>
