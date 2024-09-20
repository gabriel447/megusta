<x-layout title="Nova Série">
    <form action="/series/salvar" method="post">
        @csrf
        <div class="row mb-3 w-50">
            <label for="nome" class="col-form-label">Nome</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" name="nome">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Inserir</button>
    </form>
</x-layout>