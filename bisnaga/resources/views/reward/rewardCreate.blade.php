@extends ('layout')
@section ('content')

@if(session()->has('message'))
{{session()->get('message')}}
@endif
<form action="{{route('reward.store')}}" method="POST" class="container mt-4">
    @csrf
    <legend>Adicionar Categoria</legend>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Nome</label>
        <input type="text" id="disableTextInput" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Descrição</label>
        <input type="text" id="disableTextInput" name="description" class="form-control">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Pontos necessários</label>
        <input type="text" id="disableTextInput" name="require_points" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection