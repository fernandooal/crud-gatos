<div class="p-6">
    <h3 class="text-xl font-bold mb-4">{{ $gato->nome }}</h3>
    <div class="mb-2">Idade: {{ $gato->idade }} anos</div>
    <div class="mb-2">Peso: {{ $gato->peso }} kg</div>
    <div class="mb-2">Raça: {{ $gato->raca }}</div>
    <div class="mb-4">Dono: {{ $gato->user->name }}</div>
    <livewire:card-footer :gato="$gato"/>
</div>
