<form action="{{ $action }} " method="post">
    @csrf
    @if($update)
    @method('PUT')
    @endif
    <div class="row mb-3 w-50">
        <label for="nome" class="col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text"
            id="nome"
            name="nome"
            class="form-control"
            @isset($nome)value="{{ $nome }}"@endisset>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
