<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastrar gato') }}
        </h2>
    </x-slot>

    <div class="py-12 dark:bg-red-600/30">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 gap-6">
            <div class="bg-yellow-300 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: #e5c982;">
                <div class="p-6">
                    <form action="{{ route('gatos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3 grid">
                            <label for="nome">Nome do Gato:</label>
                            <input type="text" name="nome" id="nome" required="required">
                        </div>
                        <div class="mb-3 grid">
                            <label for="idade">Idade do Gato:</label>
                            <input type="number" name="idade" id="idade" required="required">
                        </div>
                        <div class="mb-3 grid">
                            <label for="raca">Raça do Gato:</label>
                            <input type="text" name="raca" id="raca" required="required">
                        </div>
                        <div class="mb-3 grid">
                            <label for="peso">Peso do Gato:</label>
                            <input type="number" name="peso" id="peso" required="required">
                        </div>
                        <div class="mb-3 grid">
                            <label for="sexo">Sexo do Gato:</label>
                            <select id="sexo" name="sexo" required="required">
                                <option selected="selected">Selecione uma opção</option>
                                <option value="m">Macho</option>
                                <option value="f">Fêmea</option>
                            </select>
                        </div>
                        <div class="mb-3 grid">
                            <label for="user_id" >Dono do Gato:</label>
                            <select id="user_id" name="user_id" required="required">
                                <option selected="selected">Selecione uma opção</option>
                                @foreach($donos as $dono)
                                    <option value="{{ $dono->id }}">{{ $dono->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded ">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
