<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gatos') }}
        </h2>
        <form action="{{ route('gatos.indexSearch') }}" method="GET">
            <input name="filterName" id="filterName" placeholder="Digite o nome do gato" value="{{ request()->input('filterName') }}">
            <select id="filter" name="filter">
                <option value="index" @if($tipoFiltro == 'index') selected="selected" @endif>Gatos disponíveis</option>
                <option value="trashed" @if($tipoFiltro == 'trashed') selected="selected" @endif>Gatos excluídos</option>
                <option value="all" @if($tipoFiltro == 'all') selected="selected" @endif>Todos</option>
            </select>
            <button type="submit" class="bg-gray-50 p-2">Buscar</button>
        </form>
    </x-slot>

    <div class="py-12 dark:bg-red-600/30 ">
        @if($gatos->count() > 0)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($gatos as $gato)
                    <livewire:card :gato="$gato">
                @endforeach
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
                {{ $gatos->appends(['filterName' => $pesquisa, 'filter' => $tipoFiltro])->links() }}
            </div>
        @else
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8 gap-6">
                <div class="bg-yellow-300 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #e5c982;">
                    <div class="p-6">
                        <h1>404 - O gato procurado não existe.</h1>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
