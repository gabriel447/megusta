<x-layout title="Séries">
    <a class="mx-1" href="/series/criar">Adicionar</a>
    <div class="my-2 w-50">
        <ul class="list-group">
            @foreach ($series as $serie)
            <li class="list-group-item">{{$serie}}</li>
            @endforeach
        </ul>
    </div>
</x-layout>
