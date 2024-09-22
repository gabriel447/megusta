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
                <form action="{{ route('series.destroy', $serie->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
            </li>
            @endforeach 
        </ul>
    </div>
</x-layout>