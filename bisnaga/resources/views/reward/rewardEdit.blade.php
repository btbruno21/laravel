@extends ('layout')
@section ('content')

@if(session()->has('message'))
{{session()->get('message')}}
@endif
<form action="{{route('reward.update',  $reward->id)}}" method="POST" class="container mt-4">
    @csrf
    @method('PUT')
    <legend>Editar Categoria</legend>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Nome</label>
        <input type="text" id="disableTextInput" name="name" class="form-control" value="{{$reward->name}}">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Descrição</label>
        <input type="text" id="disableTextInput" name="description" class="form-control" value="{{$reward->description}}">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Pontos necessários</label>
        <input type="text" id="disableTextInput" name="require_points" class="form-control" value="{{$reward->require_points}}">
    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
</form>
@endsection