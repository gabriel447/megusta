<x-layout title="Séries">
    <div class="my-2 w-50">
        <ul class="list-group">
            @foreach ($series as $serie)
            <li class="list-group-item">{{$serie}}</li>
            @endforeach
        </ul>
    </div>
</x-layout>
