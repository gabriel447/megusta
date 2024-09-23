<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark">Adicionar</a>
    @isset($mensagemSucesso)
    <div class="alert alert-success mt-3">
        {{ $mensagemSucesso }}
    </div>
    @endisset
    <div class="my-2 w-50">
        <ul class="list-group">
            @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->nome }}

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
