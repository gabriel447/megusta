<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">
    <a href="{{ route('series.create') }}" class="btn btn-dark">Adicionar</a>
    
    <div class="mt-2 mb-2">
        <ul class="list-group">
            @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('seasons.index', $serie->id) }}">
                    {{ $serie->nome }}
                </a>

                <div class="d-flex">
                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm mx-2">E</a>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                </div>

            </li>
            @endforeach
        </ul>
    </div>
</x-layout>
