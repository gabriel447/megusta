<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark">Adicionar</a>
    <div class="my-2 w-50">
        <ul class="list-group">
            @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->nome }}</li>
            @endforeach
        </ul>
    </div>
</x-layout>