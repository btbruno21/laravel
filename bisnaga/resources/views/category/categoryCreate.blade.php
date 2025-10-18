@extends ('layout')
@section ('content')

@if(session()->has('message'))
{{session()->get('message')}}
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('category.store')}}" method="POST" class="container mt-4">
    @csrf
    <legend>Adicionar Categoria</legend>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Nome</label>
        <input type="text" id="disableTextInput" name="name" class="form-control" value="{{old('name')}}">
    </div>
    <div class="mb-3">
        <label for="disableTextInput" class="form-label">Descrição</label>
        <input type="text" id="disableTextInput" name="description" class="form-control" value="{{old('description')}}">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
@endsection