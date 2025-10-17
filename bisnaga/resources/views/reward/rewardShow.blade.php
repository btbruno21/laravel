@extends ('layout')
@section ('content')

@if(session()->has('message'))
{{session()->get('message')}}
@endif
<form action="{{route('reward.destroy',  $reward->id)}}" method="POST" class="container mt-4">
    @csrf
    @method('DELETE')
    <legend>Mostrar Categoria</legend>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Nome</label>
        <input type="text" id="disableTextInput" name="name" class="form-control" placeholder="{{$reward->name}}">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Descrição</label>
        <input type="text" id="disableTextInput" name="description" class="form-control" placeholder="{{$reward->description}}">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Pontos necessários</label>
        <input type="text" id="disableTextInput" name="require_points" class="form-control" placeholder="{{$reward->require_points}}">
    </div>
    <button type="submit" class="btn btn-danger">Excluir</button>
</form>
@endsection